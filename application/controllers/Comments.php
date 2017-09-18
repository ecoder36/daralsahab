<?php
	class Comments extends CI_Controller{
		public function create($post_id_from_url){ //$post_id you chose it as you want 
			$id = $this->input->post('id');//from hidden input
			$data['post'] = $this->property_model->get_property($id);
			$post_id = $data['post']['p_id'];
			
			$data['files'] = $this->property_model->get_files($post_id);
		//	print_r($data['files']);die();
			$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = $data['post']['title'];
			
			
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
		  	$this->form_validation->set_rules('body', 'Body', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('property/view', $data);
				$this->load->view('templates/footer');
			} else {
				$this->comment_model->create_comment($post_id_from_url);
				redirect('property/view/'.$id);
			}
		}
		
		public function delete($id){
			$post_id = $this->comment_model->get_comment($id)->post_id;
		
			$this->comment_model->delete_comment($id);
			// Set message
			$this->session->set_flashdata('category_deleted', 'Comments has been deleted');
			
			redirect('property/view/'.$post_id);
		}
		
		
		
		
		public function delete1($id){
			// Check login
			$category_user = $this->category_model->get_category($id)->user_id;
			if(!$this->session->userdata('logged_in_1') ){
				$this->session->set_flashdata('category_deleted_userProblem', 'You can not delete it because you are not login');
				redirect('users/login');
			}
			if($this->session->userdata('user_id') != $category_user ){
				$this->session->set_flashdata('category_deleted_IDuserProblem', 'You can not delete it because you do not have access');
				redirect('categories');
			}
			$this->category_model->delete_category($id);
			// Set message
			$this->session->set_flashdata('category_deleted', 'Your category has been deleted');
			redirect('categories');
		}
	}