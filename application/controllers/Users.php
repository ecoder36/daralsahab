<?php
	class Users extends CI_Controller{
	public function auto(){
			$data['title'] = 'Auto Refresh';
		$data['link'] = $this->input->get('link');
		 $data['time'] = $this->input->get('time');
		//	$data['link'] = 'https://autorefreshlink.com';
		//$data['time'] = '8';
		if($data['link'] != null){
		$this->load->view('users/auto',$data);
		}else{
		$this->load->view('templates/header');
		$this->load->view('users/auto',$data);
		$this->load->view('templates/footer');
		}
	}
		
		// Log in user
		public function login(){
			$data['title'] = 'Sign In';
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				// Login user
				$user_id = $this->user_model->login($username, $password);
				if($user_id){
					// Create session
				//	die('SUCCESS');//for test
				
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
					$user_data = array(
						'user_id'  => $user_id,
						'username' => $username,
						'name'   => $user['u_name'] ,
						'mobile'   => $user['mobile'] ,
						'email'   => $user['u_email'] ,
						'isadmin' =>$user['is_admin'],
						'logged_in_1' => true
					);
					$this->session->set_userdata($user_data);//from ($user_data) you can access the array when ever you want
					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect('pages/view');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('users/login');
				}		
			}
		}//https://www.codeigniter.com/user_guide/libraries/sessions.html
		
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in_1');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('users/login');
		}
		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}
		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
		
		public function main(){	
			$data['title'] = 'This is Main Property page'.'<br>';
			$data['users'] = $this->user_model->get_users() ;
			//$data['file']  = $this->property_model->get_files();
		//to check if get from database working ---- you can use print_r($data['posts']);

	
			$this->load->view('templates/header', $data);
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');
		}
	
	
		public function view($id = NULL ,$slug = NULL){
			$data['user'] = $this->user_model->get_user($id);
				$post_id = $data['user']['u_id'];
		//	$data['files'] = $this->worker_model->get_files($post_id);
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['user'])){
				//show_404();
				$this->session->set_flashdata('post_updated', 'no user');//post_updated is an id for the message
				redirect('users/main');
			}
			
			$data['title'] = $data['user']['u_name'];
			$this->load->view('templates/header', $data);
			$this->load->view('users/viewone', $data);
			$this->load->view('templates/footer');
		}
		
			
		public function delete($p_id){
			
				$delete = $this->user_model->delete_user($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('category_deleted', 'has been deleted');
					redirect('users/main');
			 	}else{
			 		$this->session->set_flashdata('category_deleted', 'not deleted');
					redirect('users/view/'.$p_id);
			 	}
			 
		}
		
		
		public function edit($id){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				redirect('users/login');
			}
			$data['user'] = $this->user_model->get_user($id);
			if(empty($data['user'])){
				show_404();
			}
			//Check user
			// if($this->session->userdata('user_id') !=  $this->post_model->get_posts_by_id($id)['posts_user_id']){
			// 	redirect('posts');
			// }
				 
			
			 
			$data['title'] = 'Edit User';
			$this->load->view('templates/header', $data);
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');
		}
		
		public function update(){
				//	echo 'SUBMITED';
			//Check login
			// if(!$this->session->userdata('logged_in_1')){
			// 	redirect('users/login');
			// }
		//	echo $this->input->post('country') ; die() ;
			$user_id = $this->input->post('id');
			// if(!$this->input->post('condetion')){
			// 	 $this->session->set_flashdata('post_updated', 'condetion please');//post_updated is an id for the message
			// 	redirect('property/edit/'.$post_id.'/#condetion');
			// }
			$input_username =  $this->input->post('username');
			
				$data['user'] = $this->user_model->get_user($user_id);
			$data['title'] = 'Edit User';
			
		
			
			
			if( $input_username != $data['user']['username']){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists');
			}
			
			
			    $this->form_validation->set_rules('name', 'Name', 'required');
			    
			
			
			//	$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			//	$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[4]|is_unique[users.mobile]', array('is_unique' => 'This mobile already exists. Please choose another one.'));
		    	$this->form_validation->set_rules('isadmin', 'IsAdmin', 'required|max_length[1]|min_length[1]');
			//	$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric');
				if($this->form_validation->run() === FALSE ){
				//redirect('users/edit/'.$user_id,$data);
				$this->load->view('templates/header', $data);
				$this->load->view('users/edit', $data);
				$this->load->view('templates/footer');
			}else{
			
			if (!empty($this->input->post('password'))){
				 $enc_password = md5($this->input->post('password'));
			}else{
				$data['user'] = $this->user_model->get_user($user_id);
				 $enc_password = $data['user']['password'] ;
			}
			$this->user_model->update_user($enc_password);
            $this->session->set_flashdata('post_updated', 'user has been updated');//post_updated is an id for the message
			redirect('users/view/'.$user_id);
			}
		}
		
		public function pagechangepass(){
				//	Check login
			if(!$this->session->userdata('logged_in_1')){
				redirect('users/login');
			}
			
			$data['title'] = 'تغيير الباسورد';
		    	$this->load->view('templates/header', $data);
				$this->load->view('users/changepass', $data);
				$this->load->view('templates/footer');
		}
		
		
		public function changepass(){
			
		//	Check login
			if(!$this->session->userdata('logged_in_1')){
				redirect('users/login');
			}
	

			$user_id = $this->input->post('id');
			if($user_id != $_SESSION['user_id']){
				 $this->session->set_flashdata('danger', 'Error');//post_updated is an id for the message
				 redirect('users/pagechangepass');
			}
			
			$input_pass = md5($this->input->post('oldpassword'));
			$data['user'] = $this->user_model->get_user($user_id);
			
			
			if($data['user']['password'] != $input_pass){
			$this->session->set_flashdata('danger', 'password incorect');
			    redirect('users/pagechangepass');
			}
			
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('danger', 'خطأ في كلمة المرور الجديدة');
			    redirect('users/pagechangepass');
			} else {
			
			if (!empty($this->input->post('password'))){
				 $enc_password = md5($this->input->post('password'));
			}else{
				$data['user'] = $this->user_model->get_user($user_id);
				$enc_password = $data['user']['password'] ;
			}
			$this->user_model->update_user_password($enc_password);
            $this->session->set_flashdata('success', 'password has been updated');//post_updated is an id for the message
			redirect('users/pagechangepass');
			}
		}
		
		
		
		
		// Register user
		public function register(){
			$data['title'] = 'Sign Up';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[4]|is_unique[users.mobile]', array('is_unique' => 'This mobile already exists. Please choose another one.'));
			$this->form_validation->set_rules('isadmin', 'IsAdmin', 'required|max_length[1]|min_length[1]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
			//    die('Continue');//to check if it is pass validation 
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);
				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');//user_registered is an id for the message
				redirect('users/login');
			}
		}
	
	}