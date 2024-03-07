<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
		
    function index(){	
		if (isset($_POST['submit'])){				
			$username = $this->input->post('a');			
			$password = md5($this->input->post('b'));					
			$cek = $this->model_users->cek_login($username,$password);
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>$row['username'],
									'nama_lengkap'=>$row['nama_lengkap'],
									'email'=>$row['email'],
									'level'=>$row['level']));
				redirect('administrator/home');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/login',$data);
			}
		}else{
			if ($this->session->level != ''){
				redirect('administrator/home');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';			
				$this->load->view('administrator/login');
			}			
		}
	}

    function home(){				
		cek_session_login();

		$this->load->view('administrator/template/header');
		$this->load->view('administrator/template/menu');	
		$this->load->view('administrator/template/content');			
		$this->load->view('administrator/template/footer');
		
	}

	function data(){		
		cek_session_login();
		$this->load->view('administrator/template/header');
		$this->load->view('administrator/template/menu');	
		$this->load->view('administrator/datatable');			
		$this->load->view('administrator/template/footer');
		
	}

	function datahtml(){		
		cek_session_login();
		$this->load->view('administrator/template/header');
		$this->load->view('administrator/template/menu');	
		$this->load->view('administrator/tabelhtml');			
		$this->load->view('administrator/template/footer');
		
	}
	

	//Users
	function users(){
		cek_session_login();
		if(isset($_POST['submit'])){
			// echo $this->input->post('keyword');
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		} else {			
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// $data['record'] = $this->model_users->users();						
		$config['base_url'] = base_url('administrator/users');		
		$this->db->like('username', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->from('sys_users');
		// $config['total_rows'] = $this->model_users->users()->num_rows();
		$config['total_rows']	= $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;				

		
		$data['start']	=  $this->uri->segment('3');
		
		$this->pagination->initialize($config);	
		
		$data['record'] = $this->model_users->users_pagination($config['per_page'],$data['start'],$data['keyword']);				

		// $data['record'] = $this->model_users->users_pagination($config['per_page'],$from);
		// $this->load->view('v_data',$data);

		$this->load->view('administrator/template/header');
		$this->load->view('administrator/template/menu');
		$this->load->view('administrator/mod_users/users', $data);
		$this->load->view('administrator/template/footer');
	}

	function add_user(){
		cek_session_login();
		$id = $this->session->username;
		if (isset($_POST['submit'])){
			$this->model_users->users_add();
			redirect('administrator/users');
		}else{
			$data['mo'] = 'users';
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->load->view('administrator/template/header');
			$this->load->view('administrator/template/menu');
			$this->load->view('administrator/mod_users/add_user', $data);
			$this->load->view('administrator/template/footer');
		}
	}

	function edit_user(){
		cek_session_login();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_users->users_update();
			redirect('administrator/users');
		}else{
			$data['mo'] = 'edit_user';
			$data['rows'] = $this->model_users->users_edit($id)->row_array();			
			$this->load->view('administrator/template/header');
			$this->load->view('administrator/template/menu');
			$this->load->view('administrator/mod_users/edit_user', $data);
			$this->load->view('administrator/template/footer');
		}
	}

	//Products
	function products(){
		cek_session_login();
		
		$data['record'] = $this->model_produk->getDataAllProduct();

		$this->load->library('pagination');		
		$config['base_url'] = 'http://localhost/sayuran/products/page/';
		$config['total_rows'] = 10;
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('administrator/template/header');
		$this->load->view('administrator/template/menu');
		$this->load->view('administrator/mod_products/products', $data);
		$this->load->view('administrator/template/footer');
	}

	function add_product(){
		cek_session_login();
		$id = $this->session->username;
		if (isset($_POST['submit'])){			
			$this->model_users->users_add();
			redirect('administrator/products');
		}else{
			$data['mo'] = 'users';
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->load->view('administrator/template/header');
			$this->load->view('administrator/template/menu');
			$this->load->view('administrator/mod_users/add_user', $data);
			$this->load->view('administrator/template/footer');
		}
	}
   
	//Upload-Magazine
	function upload_magazine(){
		cek_session_login();

		if (isset($_POST['submit'])){			
			$this->load->library('upload');
			$config['upload_path'] = './file_magazine/';
			$config['allowed_types'] = 'zip';
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('file')){
				$error = array('error'=>$this->upload->display_errors());
				$this->load->view('administrator/template/header');
				$this->load->view('administrator/template/menu');
				$this->load->view('administrator/mod_uploadmagazine/upload_magazine',$error);
				$this->load->view('administrator/template/footer');
			}else{
				$data = array('uploaded_data'=>$this->upload->data());
				$zip = new ZipArchive;
				$file = $data['uploaded_data']['full_path'];

				if($zip->open($file)==TRUE){
					$zip->extractTo('./data/');
					$zip->close();
					$success = array('success'=>'Zip file uploaded and extracted!');
					$this->load->view('administrator/template/header');
					$this->load->view('administrator/template/menu');
					$this->load->view('administrator/mod_uploadmagazine/upload_magazine',$success);
					$this->load->view('administrator/template/footer');
				}else{
					$error = array('error'=>'Unable to extract the zip file!');
					$this->load->view('administrator/template/header');
					$this->load->view('administrator/template/menu');
					$this->load->view('administrator/mod_uploadmagazine/upload_magazine',$error);
					$this->load->view('administrator/template/footer');
				}

			}
	
		}else{
			$data['mo'] = 'upload_magazine';		
			$this->load->view('administrator/template/header');
			$this->load->view('administrator/template/menu');
			$this->load->view('administrator/mod_uploadmagazine/upload_magazine', $data);
			$this->load->view('administrator/template/footer');
		}
	}


	//Magazine
	function magazine(){
		cek_session_login();

		if(isset($_POST['submit'])){
			// echo $this->input->post('keyword');
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);	
		} else {			
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// $data['record'] = $this->model_users->users();						
		$config['base_url'] = base_url('administrator/magazine');		
		$this->db->like('nama_edisi', $data['keyword']);			
		$this->db->from('sys_majalah');
		// $config['total_rows'] = $this->model_users->users()->num_rows();
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;				

		
		$data['start']	=  $this->uri->segment('3');
		
		$this->pagination->initialize($config);	
		
		$data['record'] = $this->model_magazine->magazine_pagination($config['per_page'],$data['start'],$data['keyword']);				

		// $data['record'] = $this->model_users->users_pagination($config['per_page'],$from);
		// $this->load->view('v_data',$data);

		$this->load->view('administrator/template/header');
		$this->load->view('administrator/template/menu');
		$this->load->view('administrator/mod_magazine/magazine', $data);
		$this->load->view('administrator/template/footer');
	}

	function add_magazine(){
		cek_session_login();

		if (isset($_POST['submit'])){		
			$this->model_magazine->magazine_add();
			redirect('administrator/magazine');
		}else{
			$data['mo'] = 'magazine';				
			$this->load->view('administrator/template/header');
			$this->load->view('administrator/template/menu');
			$this->load->view('administrator/mod_magazine/add_magazine', $data);
			$this->load->view('administrator/template/footer');
		}
	}

	function edit_magazine(){
		cek_session_login();

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){				
			$this->model_magazine->magazine_update();
			redirect('administrator/magazine');
		}else{
			$data['rows'] = $this->model_magazine->magazine_list_update($id)->row_array();				
			$this->load->view('administrator/template/header');
			$this->load->view('administrator/template/menu');
			$this->load->view('administrator/mod_magazine/edit_magazine', $data);
			$this->load->view('administrator/template/footer');
		}
	}
		

	//logout

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('administrator'));
	}


}