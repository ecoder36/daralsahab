<?php
      
	class Terms extends CI_Controller{
	    
    	public function test(){
    			$data['title'] = 'test';
    		$this->load->view('templates/header');
    		$this->load->view('aqar/terms',$data);
    		$this->load->view('templates/footer');	
    	}
    	
		public function index(){
    		redirect('terms/main');
    	}
    	
		public function main(){	
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			
			$data['title'] = 'صفحة البنود';
			$data['terms'] = $this->term_model->get_terms() ;
			//$data['file']  = $this->property_model->get_files();
		//to check if get from database working ---- you can use print_r($data['posts']);
            $data['style'] = "style='display:none;'";
	
			$this->load->view('templates/header', $data);
			$this->load->view('aqar/terms', $data);
			$this->load->view('templates/footer');
		}
		
		// add Owners
		public function add(){
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			if($_SESSION['isadmin'] != 1 && $_SESSION['isadmin'] != 99){
				$this->session->set_flashdata('danger', 'خطأ');
				redirect('/');
			}
			$data['title'] = 'إضافة مالك جديد';
			$data['terms'] = $this->term_model->get_terms() ;
			$data['style'] = "style='display:none;'";
			$this->form_validation->set_rules('term', 'Term', 'trim|required|is_unique[terms.term]', array('is_unique' => 'هذا البند موجود مسبقا'));
			if($this->form_validation->run() === FALSE){
			    //$data['addstyle'] = "style='display:none;'";
				$this->load->view('templates/header', $data);
				$this->load->view('aqar/terms', $data);
				$this->load->view('templates/footer');
			} else {
				$this->term_model->add();
				// Set message
				$this->session->set_flashdata('success', 'تم إضافة البند بنجاح');
				redirect('terms/main');
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
			$data['post'] = $this->term_model->get_term($id);
			if(empty($data['post'])){
				show_404();
			}
		
			$data['style'] = "";
    	    $data['terms'] = $this->term_model->get_terms() ;
    	//	$data['eshow'] = 'editshow' ;
			$data['title'] = 'تعديل البند';
			$this->load->view('templates/header', $data);
			$this->load->view('aqar/terms', $data);
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
		
			$post_id = $this->input->post('term_id');
			
				$this->term_model->update();
	            $this->session->set_flashdata('success', 'تم تحديث البيانات بنجاح');//post_updated is an id for the message
				redirect('terms/main/'.$post_id);
			
		}
	
	        public function delete($p_id){
				//Check login
				if(!$this->session->userdata('logged_in_1')){
					$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
					redirect('users/login');
				}
				if($_SESSION['isadmin'] != 1){
					$this->session->set_flashdata('danger', 'خطأ');
					redirect('terms/edit/'.$p_id);
				}
			
				$delete = $this->term_model->delete($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('terms/main');
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ ! لم يتم الحذف');
					redirect('terms/edit/'.$p_id);
			 	}
			 
		}
	
	
	
	
	}