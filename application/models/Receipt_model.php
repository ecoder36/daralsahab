<?php
// you have to configure database from config/database.php
	class Receipt_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		
    	public function get_receipts(){
				$this->db->order_by('receipt_id', 'DESC'); 
			//	$this->db->select('*');
				$query = $this->db->get('receipts');
				return $query->result_array();
		}
		
		public function get_receipts_of_rental($contract_id){
		//		$this->db->order_by('receipt_id', 'DESC'); 
	
				$query = $this->db->get_where('receipts', array('contract_id' => $contract_id));
			return $query->result_array();
		}
		
		
		public function get_receipt($post_idw){
			$query = $this->db->get_where('receipts', array('receipt_id' => $post_idw));
			return $query->row_array();
		}
		
		public function add(){
			// User data array
			date_default_timezone_set('Asia/Riyadh');
			$data = array(
				'payer' => $this->input->post('payer'),
				'contract_id' => $this->input->post('contract_id'),
				'amount' => $this->input->post('amount'),
				'from_date' => $this->input->post('from_date'),
				'to_date' => $this->input->post('to_date'),
				'clarification' => $this->input->post('clarification'),
				'recipient' => $this->input->post('recipient'),
                'receipt_date' => date('Y-m-j H:i:s'),
			);
			// Insert user
			return $this->db->insert('receipts', $data);
		}
		
	}