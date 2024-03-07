<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

    public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		parent::__construct();
		$this->load->model('mdl_10k_male', 'male_10k');
        $this->load->model('mdl_10k_female', 'female_10k');
        $this->load->model('mdl_5k_male', 'male_5k');
        $this->load->model('mdl_5k_female', 'female_5k');
	}
    

    public function male_10k()
        {         
            $data = array();
            
            $config = array();
            //base_url () . 'index.php/questions/page/'.$sortfield.'/'.$order.'/',
            $search_string = $this->input->post('search');
            
            $config["per_page"] = 10;
            //max number of page links
            $config['num_links'] = 2;
            //use page number as parameter
            $config['use_page_numbers'] = TRUE;

            $data['search_string'] = '';
            if(!empty($search_string)) {
                
                $this->uri->segment(6, $this->uri->segment(5, 1));
                $data['search_string'] = $this->uri->segment(5, $search_string);
                
            } elseif($this->uri->segment(5) != null && !empty($this->uri->segment(5)) && $this->uri->segment(6) != null) {
                $data['search_string'] = $this->uri->segment(5);
            }
            //set default page uri 
            $page_uri = 5;
            
            if(!empty($data['search_string']))
            $page_uri = 6;
            
            $config["uri_segment"] = $page_uri;
            
            $config["total_rows"] = $this->male_10k->record_count($data['search_string']);
            
            $data['page'] = $this->uri->segment($page_uri, 1);
            
            $data['sort_by'] = $this->uri->segment(3, 'position');
            $orderBy = $this->uri->segment(4, "desc");
            $offset = ($data['page']-1) * $config['per_page'];
            $data['total_rows'] = $config["total_rows"];
            if($orderBy == "asc") $data['sort_order'] = "desc"; else $data['sort_order'] = "asc";


            $config["base_url"] = base_url().'result/male_10k/'.$data['sort_by'].'/'.$orderBy.'/'.$data['search_string'];

            // $config['full_tag_open'] = '<ul class="pagination">';
            // $config['full_tag_close'] = '</ul>';
            // $config['first_link'] = '&laquo; First';
            // $config['first_tag_open'] = '<li class="prev page">';
            // $config['first_tag_close'] = '</li>';
            // $config['last_link'] = 'Last &raquo;';
            // $config['last_tag_open'] = '<li class="next page">';
            // $config['last_tag_close'] = '</li>';
            // $config['next_link'] = 'Next &rarr;';
            // $config['next_tag_open'] = '<li class="next page">';
            // $config['next_tag_close'] = '</li>';
            // $config['prev_link'] = '&larr; Previous';
            // $config['prev_tag_open'] = '<li class="prev page">';
            // $config['prev_tag_close'] = '</li>';
            // $config['cur_tag_open'] = '<li class="active"><a href="">';
            // $config['cur_tag_close'] = '</a></li>';
            // $config['num_tag_open'] = '<li class="page">';
            // $config['num_tag_close'] = '</li>';
            
            $data["data"] = $this->male_10k->get_runners($config["per_page"], $offset, $data['sort_by'], $data['sort_order'], $data['search_string']);
        
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            
            $this->load->view('template/header');
            $this->load->view('result/10k-male', $data);
            $this->load->view('template/footer');
        } 

    public function female_10k()
        {   
            
            $data = array();
		
            $config = array();
            //base_url () . 'index.php/questions/page/'.$sortfield.'/'.$order.'/',
            $search_string = $this->input->post('search');
            
            $config["per_page"] = 10;
            //max number of page links
            $config['num_links'] = 2;
            //use page number as parameter
            $config['use_page_numbers'] = TRUE;

            $data['search_string'] = '';
            if(!empty($search_string)) {
                
                $this->uri->segment(6, $this->uri->segment(5, 1));
                $data['search_string'] = $this->uri->segment(5, $search_string);
                
            } elseif($this->uri->segment(5) != null && !empty($this->uri->segment(5)) && $this->uri->segment(6) != null) {
                $data['search_string'] = $this->uri->segment(5);
            }
            //set default page uri 
            $page_uri = 5;
            
            if(!empty($data['search_string']))
            $page_uri = 6;
            
            $config["uri_segment"] = $page_uri;
            
            $config["total_rows"] = $this->female_10k->record_count($data['search_string']);
            
            $data['page'] = $this->uri->segment($page_uri, 1);
            
            $data['sort_by'] = $this->uri->segment(3, 'position');
            $orderBy = $this->uri->segment(4, "desc");
            $offset = ($data['page']-1) * $config['per_page'];
            $data['total_rows'] = $config["total_rows"];
            if($orderBy == "asc") $data['sort_order'] = "desc"; else $data['sort_order'] = "asc";

        
            $config["base_url"] = base_url().'result/female_10k/'.$data['sort_by'].'/'.$orderBy.'/'.$data['search_string'];


            // $config['full_tag_open'] = '<ul class="pagination">';
            // $config['full_tag_close'] = '</ul>';
            // $config['first_link'] = '&laquo; First';
            // $config['first_tag_open'] = '<li class="prev page">';
            // $config['first_tag_close'] = '</li>';
            // $config['last_link'] = 'Last &raquo;';
            // $config['last_tag_open'] = '<li class="next page">';
            // $config['last_tag_close'] = '</li>';
            // $config['next_link'] = 'Next &rarr;';
            // $config['next_tag_open'] = '<li class="next page">';
            // $config['next_tag_close'] = '</li>';
            // $config['prev_link'] = '&larr; Previous';
            // $config['prev_tag_open'] = '<li class="prev page">';
            // $config['prev_tag_close'] = '</li>';
            // $config['cur_tag_open'] = '<li class="active"><a href="">';
            // $config['cur_tag_close'] = '</a></li>';
            // $config['num_tag_open'] = '<li class="page">';
            // $config['num_tag_close'] = '</li>';
            
            $data["data"] = $this->female_10k->get_runners($config["per_page"], $offset, $data['sort_by'], $data['sort_order'], $data['search_string']);
        
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('template/header');
            $this->load->view('result/10k-female', $data);
            $this->load->view('template/footer');
        } 
            
    public function male_5k()
        {      
            $data = array();
		
            $config = array();
            //base_url () . 'index.php/questions/page/'.$sortfield.'/'.$order.'/',
            $search_string = $this->input->post('search');
            
            $config["per_page"] = 10;
            //max number of page links
            $config['num_links'] = 2;
            //use page number as parameter
            $config['use_page_numbers'] = TRUE;

            $data['search_string'] = '';
            if(!empty($search_string)) {
                
                $this->uri->segment(6, $this->uri->segment(5, 1));
                $data['search_string'] = $this->uri->segment(5, $search_string);
                
            } elseif($this->uri->segment(5) != null && !empty($this->uri->segment(5)) && $this->uri->segment(6) != null) {
                $data['search_string'] = $this->uri->segment(5);
            }
            //set default page uri 
            $page_uri = 5;
            
            if(!empty($data['search_string']))
            $page_uri = 6;
            
            $config["uri_segment"] = $page_uri;
            
            $config["total_rows"] = $this->male_5k->record_count($data['search_string']);
            
            $data['page'] = $this->uri->segment($page_uri, 1);
            
            $data['sort_by'] = $this->uri->segment(3, 'position');
            $orderBy = $this->uri->segment(4, "desc");
            $offset = ($data['page']-1) * $config['per_page'];
            $data['total_rows'] = $config["total_rows"];
            if($orderBy == "asc") $data['sort_order'] = "desc"; else $data['sort_order'] = "asc";

            $config["base_url"] = base_url().'result/female_5k/'.$data['sort_by'].'/'.$orderBy.'/'.$data['search_string'];
            
            
            $data["data"] = $this->male_5k->get_runners($config["per_page"], $offset, $data['sort_by'], $data['sort_order'], $data['search_string']);
        
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('template/header');
            $this->load->view('result/5k-male', $data);
            $this->load->view('template/footer');
        } 

    public function female_5k()
        {    
            $data = array();
		
            $config = array();
            //base_url () . 'index.php/questions/page/'.$sortfield.'/'.$order.'/',
            $search_string = $this->input->post('search');
            
            $config["per_page"] = 10;
            //max number of page links
            $config['num_links'] = 2;
            //use page number as parameter
            $config['use_page_numbers'] = TRUE;

            $data['search_string'] = '';
            if(!empty($search_string)) {
                
                $this->uri->segment(6, $this->uri->segment(5, 1));
                $data['search_string'] = $this->uri->segment(5, $search_string);
                
            } elseif($this->uri->segment(5) != null && !empty($this->uri->segment(5)) && $this->uri->segment(6) != null) {
                $data['search_string'] = $this->uri->segment(5);
            }
            //set default page uri 
            $page_uri = 5;
            
            if(!empty($data['search_string']))
            $page_uri = 6;
            
            $config["uri_segment"] = $page_uri;
            
            $config["total_rows"] = $this->female_5k->record_count($data['search_string']);
            
            $data['page'] = $this->uri->segment($page_uri, 1);
            
            $data['sort_by'] = $this->uri->segment(3, 'position');
            $orderBy = $this->uri->segment(4, "desc");
            $offset = ($data['page']-1) * $config['per_page'];
            $data['total_rows'] = $config["total_rows"];
            if($orderBy == "asc") $data['sort_order'] = "desc"; else $data['sort_order'] = "asc";

            $config["base_url"] = base_url().'result/female_5k/'.$data['sort_by'].'/'.$orderBy.'/'.$data['search_string'];

            
            $data["data"] = $this->female_5k->get_runners($config["per_page"], $offset, $data['sort_by'], $data['sort_order'], $data['search_string']);
        
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $this->load->view('template/header');
            $this->load->view('result/5k-female', $data);
            $this->load->view('template/footer');
        } 
            

}