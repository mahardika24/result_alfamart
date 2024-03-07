<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class mdl_10k_female extends CI_Model {
 
    var $table = 'result_10k_female';
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_runners($per_page, $offset, $sortfield, $orderBy, $search_string, $id=0)
	{
		if(empty($id)){
			//echo $per_page.'fff'.$offset.'fff'.$sortfield.'fff'.$orderBy;
			if(!empty($search_string)) {
				$this->db->like('athlete_name',$search_string);	
				$this->db->or_like('bib_number',$search_string);				
			}
			$this->db->order_by("$sortfield", "$orderBy");
			$this->db->limit($per_page,$offset);
			$query = $this->db->get('result_10k_female');
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
			return $data;
		}
		return false;
		} else {
		$query = $this->db->get_where('result_10k_female', array('id_result' => $id));
		return $query->row_array();
		}
	}
    public function record_count($search_string) {
		if(!empty($search_string)) {
			$this->db->like('athlete_name',$search_string);
		}
       return $this->db->count_all_results("result_10k_female");
    }
}
