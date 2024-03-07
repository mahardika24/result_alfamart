<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_users extends CI_model{

    function cek_login($username,$password){
        // return $this->db->query("SELECT * FROM sys_users where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
        return $this->db->get_where('sys_users', array('username' => $this->db->escape_str($username), 'password' => $this->db->escape_str($password)));    
    }
    
	function users(){
		return $this->db->get('sys_users');
	}

    function users_pagination($number,$offset,$keyword = null){
        if ($keyword){
            $this->db->like('username', $keyword);
            $this->db->or_like('email', $keyword);
        }
		return  $this->db->get('sys_users',$number,$offset)->result();
	}


	function users_add(){
        $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),                        
                        'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                        'email'=>$this->db->escape_str($this->input->post('c')),
                        'no_telp'=>$this->db->escape_str($this->input->post('d')),
                        'password'=>md5($this->input->post('e')),
                        'level'=>$this->db->escape_str($this->input->post('f')),
                        'blokir'=>$this->db->escape_str($this->input->post('g')),
                        'id_session'=>md5($this->input->post('a')));
        $this->db->insert('sys_users',$datadb);
    }

    function users_edit($id){
        // return $this->db->query("SELECT * FROM sys_users where username='$id'");
        return $this->db->get_where('sys_users', array('username' => $id));
    }

    function users_update(){
            if (trim($this->input->post('e'))==''){            
                $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                'email'=>$this->db->escape_str($this->input->post('c')),
                                'no_telp'=>$this->db->escape_str($this->input->post('d')),
                                'level'=>$this->db->escape_str($this->input->post('f')),
                                'blokir'=>$this->db->escape_str($this->input->post('g')),
                                'id_session'=>md5($this->input->post('a')));
                $this->db->where('username',$this->input->post('a'));
                $this->db->update('sys_users',$datadb);
            }else{            
                $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                'email'=>$this->db->escape_str($this->input->post('c')),
                                'no_telp'=>$this->db->escape_str($this->input->post('d')),
                                'password'=>md5($this->input->post('e')),
                                'level'=>$this->db->escape_str($this->input->post('f')),
                                'blokir'=>$this->db->escape_str($this->input->post('g')),
                                'id_session'=>md5($this->input->post('a')));
                $this->db->where('username',$this->input->post('a'));
                $this->db->update('sys_users',$datadb);
            }
    }




    

}