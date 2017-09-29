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
			$data['title'] = 'تسجيل الدخول';
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
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

					// for masteruser
					if($_SESSION['isadmin'] == 99){
						$this->session->set_flashdata('success', "استعادة كلمة المرور");
						redirect('users/masteruser');
					}
			
			
					// Set message
					$this->session->set_flashdata('success', 'تم تسجيل الدخول بنجاح');
					redirect('pages/view');
				} else {
					// Set message
					$this->session->set_flashdata('danger', 'يوجد خطأ في تسجيل الدخول');
					redirect('users/login');
				}		
			}
		}//https://www.codeigniter.com/user_guide/libraries/sessions.html
		
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in_1');

			// Set message
			$this->session->set_flashdata('success', 'تم تسجيل الخروج بنجاح');
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
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			
			$data['title'] = 'صفحة المستخدمين';
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
				$this->session->set_flashdata('danger', 'no user');
				redirect('users/main');
			}
			
			$data['title'] = $data['user']['u_name'];
			$this->load->view('templates/header', $data);
			$this->load->view('users/viewone', $data);
			$this->load->view('templates/footer');
		}
		
			
		public function delete($p_id){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('/');
			}
			// for masteruser
			$data['user'] = $this->user_model->get_user($p_id);
			if($_SESSION['isadmin'] == 99){
				$this->session->set_flashdata('danger', 'يمكنك تحديث البينات من هنا');
				redirect('users/masteruser');
			}
			
			if($data['user']['is_admin'] == 99){
				$this->session->set_flashdata('danger', 'خطأ لا يمكن تحديث البيانات');
				redirect('/');
			}
			
				$delete = $this->user_model->delete_user($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('users/main');
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ لم يتم الحذف');
					redirect('users/view/'.$p_id);
			 	}
			 
		}
		
		
		public function edit($id){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('/');
			}
			$data['user'] = $this->user_model->get_user($id);
			if(empty($data['user'])){
				show_404();
			}
	
			$data['title'] = 'تعديل بيانات المستخدم';
			$this->load->view('templates/header', $data);
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');
		}
		
		public function update(){
			//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('/');
			}
			
			
			
			$user_id = $this->input->post('id');
			$input_username =  $this->input->post('username');
			$input_email =  $this->input->post('email');
			$input_mobile =  $this->input->post('mobile');
			$data['user'] = $this->user_model->get_user($user_id);
			
			// for masteruser
			if($_SESSION['isadmin'] == 99){
				$this->session->set_flashdata('danger', 'يمكنك تحديث البينات من هنا');
				redirect('users/masteruser');
			}
			if($data['user']['is_admin'] == 99){
				$this->session->set_flashdata('danger', 'خطأ لا يمكن تحديث البيانات');
				redirect('/');
			}
				
			$data['title'] = 'Edit User';
		if( $input_username != $data['user']['username']){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists');
			}
		if( $input_email != $data['user']['u_email']){
					$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email_exists');
			}
		if( $input_mobile != $data['user']['mobile']){
				$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[4]|is_unique[users.mobile]', array('is_unique' => 'This mobile already exists. Please choose another one.'));
			}
			    $this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('isadmin', 'IsAdmin', 'trim|required|max_length[1]|min_length[1]');
				$this->form_validation->set_rules('password', 'Password', 'trim');
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
            $this->session->set_flashdata('success', 'تم تعديل المستخدم بنجاح');//post_updated is an id for the message
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
				 $this->session->set_flashdata('danger', 'خطأ يوجد مشكلة');//post_updated is an id for the message
				 redirect('users/pagechangepass');
			}
			
			
			$input_pass = md5($this->input->post('oldpassword'));
			$data['user'] = $this->user_model->get_user($user_id);
			
			
			if($data['user']['password'] != $input_pass){
			$this->session->set_flashdata('danger', 'الباسوورد القديم غير صحيح');
			    redirect('users/pagechangepass');
			}
			
			// for masteruser
			if($_SESSION['isadmin'] == 99){
				$this->session->set_flashdata('danger', ' لا يمكنك تغيير كلمة المرور');
				redirect('users/masteruser');
			}
			if($data['user']['is_admin'] == 99){
				$this->session->set_flashdata('danger', 'خطأ لا يمكن تحديث البيانات');
				redirect('/');
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
            $this->session->set_flashdata('success', 'تم تحديث كلمة المرور بنجاح');
			redirect('users/pagechangepass');
			}
		}
		
		
		
		
		// Register user
		public function register(){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1 && $_SESSION['isadmin'] != 99){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('/');
			}
			$data['title'] = 'إضافة مستخدم جديد';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email_exists');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[4]|is_unique[users.mobile]', array('is_unique' => 'This mobile already exists. Please choose another one.'));
			$this->form_validation->set_rules('isadmin', 'IsAdmin', 'trim|required|max_length[1]|min_length[1]',array('required' => 'خطأ يجب اختيار الصلاحية') );
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
				$this->session->set_flashdata('success', 'تم إضافة المستخدم بنجاح');
				redirect('users/register');
			}
		}
	
	 public function masteruser()
   {
   		//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 99){
				$this->session->set_flashdata('danger', 'لا يمكنك الوصول لهذه الصفحة');
				redirect('/');
			}
			$data['users'] = $this->user_model->get_users() ;
        	$data['title'] = 'masteruser';
		    $this->load->view('templates/header', $data);
			$this->load->view('users/masteruser', $data);
			$this->load->view('templates/footer');
   }
   
    public function resetmaster($get_id)
   {
   	/*
   	username : admin
   	password : Master@Password99
   	*/
   	
   		//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 99){
				$this->session->set_flashdata('danger', 'لا يمكنك الوصول لهذه الصفحة');
				redirect('/');
			}
		// for masteruser
			$data['user'] = $this->user_model->get_user($get_id);
			
			if($data['user']['is_admin'] == 99){
				$this->session->set_flashdata('danger', 'خطأ لا يمكن تحديث البيانات');
				redirect('users/masteruser');
			}
			
        	$data['title'] = 'masteruser';
		  
         	$Npassword  = 123456789;
         	$uname = $data['user']['username'];
			$enc_password = md5($Npassword);
			if($this->user_model->reset_user_password($enc_password, $get_id)){
				$this->session->set_flashdata('success', " كلمة المرور الجديدة  $Npassword للمستخدم $uname");   
				redirect('users/masteruser');
			}
   }

     public function ResetPassword()
   {
        	$data['title'] = ' استرجاع كلمة المرور ';
		    $this->load->view('templates/header', $data);
			$this->load->view('users/resetpass', $data);
			$this->load->view('templates/footer');
   }
	/*
Forgotpassword email sender:
http://findnerd.com/list/view/How-to-make-forgot-password-in-codeigniter/17641/
*/
   public function ForgotPassword()
   {
  
   /*
   **
     don't forget to add if of masteruser
   **
   */
   $email = $this->input->post('email');  
        // $mobile = $this->input->post('mobile');  
         $findemail = $this->user_model->check_email_and_mobile($email, $mobile = null);  
         if($findemail){
         	$id = $findemail['u_id'];
         	$findemail['u_email'];
         	$passwordplain  = rand(999999999,9999999999);
        //$newpass['password'] = md5($passwordplain);
				 $enc_password = md5($passwordplain);
			
		//	$this->user_model->reset_user_password($enc_password, $id);
   /*
   **
     don't forget to add the condition of masteruser
   **
   */
			$findEmailAfterReset = $this->user_model->check_email_and_mobile($email, $mobile = null);  
			echo $passwordplain."<br>";
			echo $enc_password.'<br>' ;
			echo $id.'<br>' ;
			echo $findEmailAfterReset['password'];
			die();
				// Set message
         	
         $this->session->set_flashdata('success',$findemail['u_email']);
         redirect('users/ResetPassword');
      
          $this->usermodel->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('danger',' يوجد خطأ في معلومات الاسترجاع ');
          redirect(base_url().'users/ResetPassword','refresh');
      }
   }
	}