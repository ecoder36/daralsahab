<?php
	class Term_model extends CI_Model{
		public function add(){
			// User data array
			date_default_timezone_set('Asia/Riyadh');
			$data = array(
				'term' => $this->input->post('term'),
			);
			// Insert user
			return $this->db->insert('terms', $data);
		}
		
		public function get_terms(){
				$this->db->order_by('term_id', 'DESC'); 
			//	$this->db->select('*');
				$query = $this->db->get('terms');
				return $query->result_array();
		}
		
		public function get_term($post_idw){
			$query = $this->db->get_where('terms', array('term_id' => $post_idw));
			return $query->row_array();
		}
		
		public function update(){
			$data = array(
			   'term' => $this->input->post('term'),
			);
			$this->db->where('term_id', $this->input->post('term_id'));
			return $this->db->update('terms', $data);
		}
		
		public function delete($id){
			$this->db->where('term_id', $id);
			$this->db->delete('terms');
			return true;
		}
		
	}