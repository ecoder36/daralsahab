<?php
	class Worker extends CI_Controller{
		
		public function sms(){
				$data['title'] = '  الرسائل  ' ;
				
			$this->load->view('templates/header', @$data);
			$this->load->view('sms/form', @$data);
			$this->load->view('templates/footer');
			}
			
		public function mail(){	

			$this->load->library('email');
			$this->email->set_newline("\r\n");
			
			$this->email->from('sultan.zagzoog@gmail.com', 'Your Name');
			$this->email->to('sultan.zagzoog@gmail.com');
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			
			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');
			
		//	$path = $this->config->item('server_root');
			
			$mail = $this->email->send();
			
			if($mail){
				echo "success"."<br>";
			}else{
				show_error($this->email->print_debugger());
				echo "failur";
			}
die();

			}

	public function form(){	
		
	
			//Check login
			 if(!$this->session->userdata('logged_in_1')){
			 	$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
			 	redirect('users/login');
			 }
			 
			$data['title'] = 'إضافة معلومات العاملين' ;
			//$data['file']  = $this->property_model->get_files();
	     	//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/worker', $data);
			$this->load->view('templates/footer');
		}
	
	public function create(){
	   	if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
	        $data['title'] = 'إضافة عامل';
	  //      $this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('pages/worker', $data);
				$this->load->view('templates/footer');
			}else {
    
						$this->worker_model->create_worker();
			
		         	// Upload Image
						$config['upload_path'] = './assets/images/posts';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size'] = '20480';// 20 MB
						$config['max_width'] = '9000';
						$config['max_height'] = '9000';
						$this->load->library('upload', $config);
						
						
						$worker_id =	$this->db->insert_id('worker.id');
						
						if($this->upload->do_upload('f1')  ){
							$data = array('upload_data' => $this->upload->data());
							$post_image =$this->upload->data('file_name');
							$default = 'def';
							$this->worker_model->create_file($post_image,$worker_id,$default);
						}
					
						//if(!$this->upload->do_upload('f1') && !$this->upload->do_upload('f2')){
						else{
							$errors = array('error' => $this->upload->display_errors());
							
					    //    $this->session->set_flashdata('post_created',$errors['error']);//post_updated is an id for the message
					
							$post_noimage = 'noimage.jpg';
							$default = 'noimg';
							$this->worker_model->create_file($post_noimage,$worker_id,$default);
				
						}
						
						 	// Set message
							$this->session->set_flashdata('success', 'تم الحفظ بنجاح');
	
			
							redirect('worker/form');
					}
				}
				
		public function main(){	
				//Check login
			 if(!$this->session->userdata('logged_in_1')){
			 	$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
			 	redirect('users/login');
			 }
			$data['title'] = 'قائمة العاملين';
			$data['posts'] = $this->worker_model->get_workers() ;
		

			$this->load->view('templates/header', $data);
			$this->load->view('pages/workerview', $data);
			$this->load->view('templates/footer');
		}
	
		public function view($id = NULL ,$slug = NULL){
				//Check login
			 if(!$this->session->userdata('logged_in_1')){
			 	$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
			 	redirect('users/login');
			 }
			$data['post'] = $this->worker_model->get_worker($id);
				$post_id = $data['post']['id'];
			$data['files'] = $this->worker_model->get_files($post_id);
		//	print_r($data['files']);die();
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post');//post_updated is an id for the message
				redirect('worker/main');
			}
			$data['title'] = $data['post']['name'];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/workerviewone', $data);
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
					redirect('worker/view/'.$p_id);
				}
				$files = $this->worker_model->get_files($p_id);
				foreach($files as $file) : 
					 $path_to_file = './assets/images/posts/'.$file['file'] ;
					 if($file['file'] != 'noimage.jpg'){
					 	unlink($path_to_file);
					 }
				endforeach; 
				$delete = $this->worker_model->delete_worker($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('worker/view/'.$p_id);
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ ! لم يتم الحذف');
					redirect('pages/workerviewone/'.$p_id);
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
				redirect('worker/view/'.$id);
			}
			$data['post'] = $this->worker_model->get_worker($id);

			//Check user
			// if($this->session->userdata('user_id') !=  $this->post_model->get_posts_by_id($id)['posts_user_id']){
			// 	redirect('posts');
			// }
		
			$data['files'] = $this->worker_model->get_files($id);
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = 'تعديل البيانات';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/workeredit', $data);
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
		
			$post_id = $this->input->post('id');
			
				$this->worker_model->update_worker();
	            $this->session->set_flashdata('success', 'تم تحديث البيانات بنجاح');//post_updated is an id for the message
				redirect('worker/view/'.$post_id);
			
		}
	
	
		public function add_file(){
				$post_id = $this->input->post('id');
				
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '20480';
				$config['max_width'] = '9000';
				$config['max_height'] = '9000';
				$this->load->library('upload', $config);
				
					$files = $this->worker_model->get_files($post_id);
				if(count($files) > 5){
			 		$this->session->set_flashdata('danger', 'لا يمكنك إضافة المزيد');//post_updated is an id for the message
					redirect('worker/edit/'.$post_id);
			 	}
			 	
				if($this->upload->do_upload('morefile')  ){
					
					$data = array('upload_data' => $this->upload->data());
					$post_image = $this->upload->data('file_name');
					$default = 'notdef';
					$this->worker_model->create_file($post_image,$post_id,$default);
				
				//to delete the name of noimage.jpg after adding file
				 if( $this->worker_model->get_file($post_id)['file'] == 'noimage.jpg'){
				 		$file = $this->worker_model->get_file($post_id);
				 		$fid = $file['f_id'];
				 		$this->worker_model->delete_file($fid);
				 	}
				 	
					$this->session->set_flashdata('success', 'تمت الإضافة بنجاح');//post_updated is an id for the message
					redirect('worker/edit/'.$post_id);
				}else{
					 $error = array('error' => $this->upload->display_errors());
					 $this->session->set_flashdata('danger',$error['error']);//post_updated is an id for the message
					redirect('worker/edit/'.$post_id);
				}
	   //         $this->session->set_flashdata('post_updated', 'Your post has been added');//post_updated is an id for the message
				// redirect('property/view/'.$post_id);
		}
		
		
		
		public function delete_file($id){
			$post_id = $this->worker_model->get_worker_toDeleteFile($id)->worker_id;
			$file_name = $this->worker_model->get_worker_toDeleteFile($id)->file;
			$file_default = $this->worker_model->get_worker_toDeleteFile($id)->default;
			 if( $file_name == "noimage.jpg"){
					$this->session->set_flashdata('danger', 'can not delete this image you can only Add New');
					redirect('worker/edit/'.$post_id);
			 }else{
			 	$files = $this->worker_model->get_files($post_id);
			 	if(count($files) > 1){
			 		$path_to_file = './assets/images/posts/'.$file_name ;
					unlink($path_to_file);
					$this->worker_model->delete_file($id);
			 	}
			 	if(count($files) == 1){
			 		
			 		$file = $this->worker_model->get_file($post_id);
			 		$fid = $file['f_id'];
			 		$fname =  "noimage.jpg";
			 		$default = "noimg";
			 	
			 		$this->worker_model->update_file($fid,$fname,$default);
			 		$path_to_file = './assets/images/posts/'.$file_name ;
					unlink($path_to_file);
			 	}
			 	$this->session->set_flashdata('success', 'تم حذف الصورة بنجاح');
					redirect('worker/edit/'.$post_id);
			 }
		}
	   
		
	}