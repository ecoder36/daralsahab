<?php
	class Owner_model extends CI_Model{
		public function add(){
			// User data array
			date_default_timezone_set('Asia/Riyadh');
			$data = array(
				'ow_name' => $this->input->post('ow_name'),
                'ow_mobile' => $this->input->post('ow_mobile'),
                'ow_date' => date('Y-m-j H:i:s'),
			);
			// Insert user
			return $this->db->insert('owners', $data);
		}
		
		public function get_owners(){
				$this->db->order_by('ow_id', 'DESC'); 
			//	$this->db->select('*');
				$query = $this->db->get('owners');
				return $query->result_array();
		}
		
		public function get_owner($post_idw){
			$query = $this->db->get_where('owners', array('ow_id' => $post_idw));
			return $query->row_array();
		}
		
		public function update(){
			$data = array(
			   'ow_name' => $this->input->post('ow_name'),
                'ow_mobile' => $this->input->post('ow_mobile'),
			);
			$this->db->where('ow_id', $this->input->post('ow_id'));
			return $this->db->update('owners', $data);
		}
		
		public function delete($id){
			$this->db->where('ow_id', $id);
			$this->db->delete('owners');
			return true;
		}
		
	}