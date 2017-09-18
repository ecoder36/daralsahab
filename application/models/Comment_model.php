<?php
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		public function create_comment($post_idw){
			$data = array(
				'post_id' => $post_idw,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body'),
				'ip_address' => $this->input->ip_address()
			);
			return $this->db->insert('comments', $data);
		}
		public function get_comments($post_idw){
			$query = $this->db->get_where('comments', array('post_id' => $post_idw));
			return $query->result_array();
		}
		public function get_comment($post_id){
			$query = $this->db->get_where('comments', array('id' => $post_id));
			return $query->row();
		}
		public function delete_comment($id){
			$this->db->where('id', $id);
			$this->db->delete('comments');
			return true;
		}
	}
	
	// when you create a model you need to add it to the config/autoload.php

	// to activate model go to config/autoload.php & go to $autoload['model'] = array() 
	// and add model name 'Comment_model' ---- > $autoload['model'] = array('post_model', 'Category_model', 'Comment_model');