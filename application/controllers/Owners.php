<?php
      
	class Owners extends CI_Controller{
	    
	public function test(){
			$data['title'] = 'test';
		$this->load->view('templates/header');
		$this->load->view('aqar/owners',$data);
		$this->load->view('templates/footer');	
	}
	
	public function index(){
    		redirect('owners/main');
    	}
    	
	public function main(){	
				//Check login
			if(!$this->session->userdata('logged_in_1')){
				$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
				redirect('users/login');
			}
			
			$data['title'] = 'صفحة الملاك';
			$data['owners'] = $this->owner_model->get_owners() ;
			//$data['file']  = $this->property_model->get_files();
	    	//to check if get from database working ---- you can use print_r($data['posts']);
           $data['style'] = "style='display:none;'";
	
			$this->load->view('templates/header', $data);
			$this->load->view('aqar/owners', $data);
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
			$data['owners'] = $this->owner_model->get_owners() ;
			$data['style'] = "style='display:none;'";
			$this->form_validation->set_rules('ow_name', 'Name', 'required');
			$this->form_validation->set_rules('ow_mobile', 'Mobile', 'trim|required|min_length[10]|is_unique[owners.ow_mobile]', array('is_unique' => 'This mobile already exists. Please choose another one.'));
			if($this->form_validation->run() === FALSE){
			    //$data['addstyle'] = "style='display:none;'";
				$this->load->view('templates/header', $data);
				$this->load->view('aqar/owners', $data);
				$this->load->view('templates/footer');
			} else {
				$this->owner_model->add();
				// Set message
				$this->session->set_flashdata('success', 'تم إضافة المالك بنجاح');
				redirect('owners/main');
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
			$data['post'] = $this->owner_model->get_owner($id);
			if(empty($data['post'])){
				show_404();
			}
		
			$data['style'] = "";
    	    $data['owners'] = $this->owner_model->get_owners() ;
    	//	$data['eshow'] = 'editshow' ;
			$data['title'] = 'تعديل بيانات المالك';
			$this->load->view('templates/header', $data);
			$this->load->view('aqar/owners', $data);
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
		
			$post_id = $this->input->post('ow_id');
			
				$this->owner_model->update();
	            $this->session->set_flashdata('success', 'تم تحديث البيانات بنجاح');//post_updated is an id for the message
				redirect('owners/edit/'.$post_id);
			
		}
	
	        public function delete($p_id){
				//Check login
				if(!$this->session->userdata('logged_in_1')){
					$this->session->set_flashdata('danger', 'يجب تسجيل الدخول');
					redirect('users/login');
				}
				if($_SESSION['isadmin'] != 1){
					$this->session->set_flashdata('danger', 'خطأ');
					redirect('owners/edit/'.$p_id);
				}
			
				$delete = $this->owner_model->delete($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('success', 'تم الحذف بنجاح');
					redirect('owners/main');
			 	}else{
			 		$this->session->set_flashdata('danger', 'خطأ ! لم يتم الحذف');
					redirect('owners/edit/'.$p_id);
			 	}
			 
		}
	
	
	
	
	}