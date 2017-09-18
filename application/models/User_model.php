<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			date_default_timezone_set('Asia/Riyadh');
			$data = array(
				'u_name' => $this->input->post('name'),
				'u_email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'is_admin' => $this->input->post('isadmin'),
                'password' => $enc_password,
                'registered_at' => date('Y-m-j H:i:s'),
                
			);
			// Insert user
			return $this->db->insert('users', $data);
		}
		// Log user in
		public function login($username, $password){
			// Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row(0)->u_id;
			} else {
				return false;
			}
		}
		
			/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('u_id');
		$this->db->from('users');
		$this->db->where('username', $username) ;$this->db->or_where('u_email', $username);

		return $this->db->get()->row('id');
		
	}
	

		
		// Check username exists
	public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		// Check email exists
	public function check_email_exists($email){
			$query = $this->db->get_where('users', array('u_email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		
				/**
		 * get_user function.
		 * 
		 * @access public
		 * @param mixed $user_id
		 * @return object the user object
		 */
		public function get_user111($user_id) {
			
			$this->db->from('users');
			$this->db->where('u_id', $user_id);
			return $this->db->get()->row();
		
			
		}
		
		public function get_user($post_idw){
			$query = $this->db->get_where('users', array('u_id' => $post_idw));
			return $query->row_array();
		}
		
		public function get_users(){
				$this->db->order_by('users.u_id', 'DESC'); // there is an `id` in both tables (posts & categories) so we have to define wich table -- so we add posts.id 
			//	$this->db->select('*');
				$query = $this->db->get('users');
				return $query->result_array();
	
		}
		
	
		
		public function delete_user($id){
			$this->db->where('u_id', $id);
			$this->db->delete('users');
			return true;
		}
		
		public function update_user_password($enc_password){
			$data = array(
				//'u_email' => $this->input->post('email'),
                'password' => $enc_password,
			);
			$this->db->where('u_id', $this->input->post('id'));
			return $this->db->update('users', $data);
		}
		
		public function update_user($enc_password){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
		//	$slug = url_title($this->input->post('title'));
			$data = array(
			   'u_name' => $this->input->post('name'),
				'u_email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'is_admin' => $this->input->post('isadmin'),
                'password' => $enc_password,
			);
			$this->db->where('u_id', $this->input->post('id'));
			return $this->db->update('users', $data);
		}
	}
	
		// when you create a model you need to add it to the config/autoload.php

	// to activate model go to config/autoload.php & go to $autoload['model'] = array() 
	// and add model name 'user_model' ---- > $autoload['model'] = array('post_model', 'category_model', 'comment_model','user_model');