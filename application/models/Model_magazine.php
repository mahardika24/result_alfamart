<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_magazine extends CI_model{

    
	function getMagazine(){
		// return $this->db->get_where('sys_majalah', ['status_aktif'=>'Y']);
        $this->db->select('*');
        $this->db->from('sys_majalah');
        $this->db->where('status_aktif', 'Y');
        $this->db->order_by("id_majalah", "desc");
        return $this->db->get();        
	}

    function magazine_pagination($number,$offset,$keyword = null){
        if ($keyword){
            $this->db->like('nama_edisi', $keyword);           
        }
		return  $this->db->get('sys_majalah',$number,$offset)->result();
	}

	function magazine_add(){        
        $new_name = date('Y-m-d');
        $config['upload_path'] = 'cover/';
        $config['allowed_types'] = 'jpg|png|JPG|JPEG';
        $config['max_size'] = '4000'; // kb
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');        
        $hasil=$this->upload->data();            
        if ($hasil['is_image']=='0'){
            $datadb = array('tahun'=>$this->db->escape_str($this->input->post('a')),                        
                            'nama_edisi'=>$this->db->escape_str($this->input->post('b')),                                
                            'link_majalah'=>$this->db->escape_str($this->input->post('d')),                        
                            'status_aktif'=>$this->db->escape_str($this->input->post('e')),
                            'tgl_upload'=>$this->db->escape_str(unix_to_human(time(), TRUE, 'id')),
                            'last_modified'=>$this->db->escape_str(unix_to_human(time(), TRUE, 'id')),
                            'last_user'=>$this->db->escape_str($this->session->userdata('username')),
                            'hits'=>$this->db->escape_str(0));
        }else{               
            $datadb = array('tahun'=>$this->db->escape_str($this->input->post('a')),                      
                            'nama_edisi'=>$this->db->escape_str($this->input->post('b')),
                            'thumbnail_img'=>$hasil['file_name'],
                            'link_majalah'=>$this->db->escape_str($this->input->post('d')),                   
                            'status_aktif'=>$this->db->escape_str($this->input->post('e')),
                            'tgl_upload'=>$this->db->escape_str(unix_to_human(time(), TRUE, 'id')),
                            'last_modified'=>$this->db->escape_str(unix_to_human(time(), TRUE, 'id')),
                            'last_user'=>$this->db->escape_str($this->session->userdata('username')),
                            'hits'=>$this->db->escape_str(0));
        }
        $this->db->insert('sys_majalah',$datadb);  
        
    }

    function magazine_list_update($id){        
        return $this->db->get_where('sys_majalah', array('id_majalah' => $id));
    }

    function magazine_update(){
        $id = $this->uri->segment(3);
        $new_name = date('Y-m-d');
        $config['upload_path'] = 'cover/';
        $config['allowed_types'] = 'jpg|png|JPG|JPEG';
        $config['max_size'] = '4000'; // kb
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');        
        $hasil=$this->upload->data();      
        if ($hasil['is_image']=='0'){
            $datadb = array('tahun'=>$this->db->escape_str($this->input->post('a')),                        
                            'nama_edisi'=>$this->db->escape_str($this->input->post('b')),                                
                            'link_majalah'=>$this->db->escape_str($this->input->post('d')),                        
                            'status_aktif'=>$this->db->escape_str($this->input->post('e')),
                            'last_modified'=>$this->db->escape_str(unix_to_human(time(), TRUE, 'id')),
                            'last_user'=>$this->db->escape_str($this->session->userdata('username')),
                            'hits'=>$this->db->escape_str(0));
        }else{
            $datadb = array('tahun'=>$this->db->escape_str($this->input->post('a')),                      
                            'nama_edisi'=>$this->db->escape_str($this->input->post('b')),
                            'thumbnail_img'=>$hasil['file_name'],
                            'link_majalah'=>$this->db->escape_str($this->input->post('d')),                   
                            'status_aktif'=>$this->db->escape_str($this->input->post('e')),
                            'last_modified'=>$this->db->escape_str(unix_to_human(time(), TRUE, 'id')),
                            'last_user'=>$this->db->escape_str($this->session->userdata('username')),
                            'hits'=>$this->db->escape_str(0));
        }
        $this->db->where('id_majalah',$this->db->escape_str($this->input->post('id')));
        $this->db->update('sys_majalah',$datadb);
            
    }



}