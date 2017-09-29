<?php
	class Contact extends CI_Controller{
		
		
		public function form(){	
			$data['title'] = 'اتصل بنا' ;
			//$data['file']  = $this->property_model->get_files();
	     	//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/contact', $data);
			$this->load->view('templates/footer');
		}
		
		public function create(){
	        $data['title'] = 'اتصل بنا';
	        //$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required',array('required' => 'يجب كتابة الإسم') );
			$this->form_validation->set_rules('message', 'Message', 'trim|required',array('required' => ' يجب كتابة الرسالة') );
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('pages/contact', $data);
				$this->load->view('templates/footer');
			}else {
						$this->contact_model->create_contact();
						// Set message
						$this->session->set_flashdata('success', 'تم إرسال رسالتك بنجاح');
						redirect('contact/form');
					}
			}
	   
		public function main($offset = 0){	
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			$data['title'] = 'رسائل اتصل بنا';
			$data['posts'] = $this->contact_model->get_contacts() ;
			//$data['file']  = $this->property_model->get_files();
	    	//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/contactview', $data);
			$this->load->view('templates/footer');
		}
		
		public function view($id = NULL ,$slug = NULL){
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			$data['title'] = 'رسالة اتصل بنا';
			$data['post'] = $this->contact_model->get_contact($id);

		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post');//post_updated is an id for the message
				redirect('pages/contactview');
			}
		//	$data['title'] = $data['post']['name'];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/contactviewone', $data);
			$this->load->view('templates/footer');
		}
		
	    public function delete($id){
		    	if(!$this->session->userdata('logged_in_1')){
					$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
					redirect('users/login');
				}
				if($_SESSION['isadmin'] != 1){
						$this->session->set_flashdata('danger', ' خطأ لا يمكنك تنفيذ الأمر ');
						redirect('contact/view/'.$id);
				}
				$delete = $this->contact_model->delete_contact($id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('contact/main');
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ لم يتم الحذف');
					redirect('contact/view/'.$id);
			 	}
		}
	
	

	   
			public function edit($id){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				redirect('users/login');
			}
			
			$data['post'] = $this->property_model->get_property($id);
		//	$data['postid'] = $this->post_model->get_posts_by_id($id,'categories.id');
		// echo $data['post']['title']; 
		// echo $this->post_model->get_posts_by_id($id)['posts_id'].'<br>';
		// echo  $this->post_model->get_posts_by_id($id)['posts_user_id'];
		// die ();
			//Check user
			// if($this->session->userdata('user_id') !=  $this->post_model->get_posts_by_id($id)['posts_user_id']){
			// 	redirect('posts');
			// }
		
			$data['files'] = $this->property_model->get_files($id);
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = 'Edit Post';
			$this->load->view('templates/header', $data);
			$this->load->view('property/edit', $data);
			$this->load->view('templates/footer');
		}
		
		public function update(){

			$post_id = $this->input->post('id');
			if(!$this->input->post('condetion')){
				 $this->session->set_flashdata('danger', 'condetion please');//post_updated is an id for the message
				redirect('property/edit/'.$post_id.'/#condetion');
			}
			$this->property_model->update_property();
        
            $this->session->set_flashdata('success', 'Your post has been updated');//post_updated is an id for the message
			redirect('property/view/'.$post_id);
		}

		
		
		

		
	
	
	
		
	}