<?php
// you have to configure database from config/database.php
	class Contract_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		
    	public function get_contracts(){
				$this->db->order_by('co_id', 'DESC'); 
			//	$this->db->select('*');
				$query = $this->db->get('contracts');
				return $query->result_array();
		}
		
		public function get_contract($post_idw){
			$query = $this->db->get_where('contracts', array('co_id' => $post_idw));
			return $query->row_array();
		}
		
		public function add(){
			// User data array
			date_default_timezone_set('Asia/Riyadh');
			$data = array(
				'owner' => $this->input->post('owner'),
				'co_rental' => $this->input->post('co_rental'),
				'co_mobile' => $this->input->post('co_mobile'),
				'co_flat' => $this->input->post('co_flat'),
				'co_start' => $this->input->post('co_start'),
				'co_end' => $this->input->post('co_end'),
                'co_date' => date('Y-m-j H:i:s'),
			);
			// Insert user
			return $this->db->insert('contracts', $data);
		}
		
	}