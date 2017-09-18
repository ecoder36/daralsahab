<?php
	class Contact extends CI_Controller{
		
		
		
		public function form(){	
			$data['title'] = 'contactPage' ;
			//$data['file']  = $this->property_model->get_files();
	     	//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/contact', $data);
			$this->load->view('templates/footer');
		}
		
		public function create(){
	        $data['title'] = 'Create New';
	        //$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('pages/contact', $data);
				$this->load->view('templates/footer');
			}else {
						$this->contact_model->create_contact();
						// Set message
						$this->session->set_flashdata('post_created', 'Your post has been created');
						redirect('contact/form');
					}
			}
	   
		
		public function main($offset = 0){	
			$data['title'] = 'This is Main contact page'.'<br>';
			$data['posts'] = $this->contact_model->get_contacts() ;
			//$data['file']  = $this->property_model->get_files();
	    	//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header', $data);
			$this->load->view('pages/contactview', $data);
			$this->load->view('templates/footer');
		}
		
		public function view($id = NULL ,$slug = NULL){
			$data['post'] = $this->contact_model->get_contact($id);
		
		//	$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('post_updated', 'no post');//post_updated is an id for the message
				redirect('pages/contactview');
			}
		//	$data['title'] = $data['post']['name'];
			$this->load->view('templates/header', $data);
			$this->load->view('pages/contactviewone', $data);
			$this->load->view('templates/footer');
		}
		
	public function delete($id){
	
				$delete = $this->contact_model->delete_contact($id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('category_deleted', 'has been deleted');
					redirect('contact/main');
			 	}else{
			 		$this->session->set_flashdata('category_deleted', 'not deleted');
					redirect('contact/view/'.$id);
			 	}
			 
		}
	
		public function main2($offset = 0){	
			 // Pagination config
			$config['base_url'] = base_url() . "property/main/";
			$config['total_rows'] = $this->db->count_all('property');
			$config['per_page'] = 5;
			$config['uri_segment'] = 3;//on 8th video has been explained on 4:23 --- 3 is 3rd part of url
			$config['use_page_numbers'] = TRUE;
			// Produces: class="myclass"
			$config['attributes'] = array('class' => 'pagination-links');//change also in post_model->get_posts
//https://www.codeigniter.com/userguide3/libraries/pagination.html
			//Init Pagination
			$this->pagination->initialize($config);
		
			// Init Pagination
			$data['title'] = 'This is Main Property page'.'<br>';
			$data['posts'] = $this->property_model->get_property(FALSE, $config['per_page'], $offset) ;
			//$data['file']  = $this->property_model->get_files();
		//to check if get from database working ---- you can use print_r($data['posts']);
			$this->load->view('templates/header');
			$this->load->view('property/main', $data);
			$this->load->view('templates/footer');
		}
	
		
		public function view1($id = NULL ,$slug = NULL){
			$data['post'] = $this->property_model->get_property($id);
				$post_id = $data['post']['p_id'];
			$data['files'] = $this->property_model->get_files($post_id);
		//	print_r($data['files']);die();
			$data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($data['post'])){
				//show_404();
				$this->session->set_flashdata('post_updated', 'no post');//post_updated is an id for the message
				redirect('property/main');
			}
			$data['title'] = $data['post']['title'];
			$this->load->view('templates/header');
			$this->load->view('property/view', $data);
			$this->load->view('templates/footer');
		}
		
	   public function create1(){
	   	
	        $data['title'] = 'Create New';
	  //      $this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('rentOrSale', 'Rent or Sale', 'required');
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header');
				$this->load->view('property/create', $data);
				$this->load->view('templates/footer');
			}else {
    
						$this->property_model->create_property();
			
		         	// Upload Image
						$config['upload_path'] = './assets/images/posts';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size'] = '2048';
						$config['max_width'] = '2000';
						$config['max_height'] = '2000';
						$this->load->library('upload', $config);
						
						
						$property_id =	$this->db->insert_id('property.id');
						
						if($this->upload->do_upload('f1')  ){
							$data = array('upload_data' => $this->upload->data());
							$post_image =$this->upload->data('file_name');
							$default = 'def';
							$this->property_model->create_file($post_image,$property_id,$default);
						}
						if($this->upload->do_upload('f2')){
							$data = array('upload_data' => $this->upload->data());
							$post_image =$this->upload->data('file_name');
							$default = 'notdef';
							$this->property_model->create_file($post_image,$property_id,$default);
						} 
						//if(!$this->upload->do_upload('f1') && !$this->upload->do_upload('f2')){
						else{
							$errors = array('error' => $this->upload->display_errors());
							$post_noimage = 'noimage.jpg';
							$default = 'noimg';
							$this->property_model->create_file($post_noimage,$property_id,$default);
						}
						
							
						
						 	// Set message
							$this->session->set_flashdata('post_created', 'Your post has been created');
			
							redirect('property/main');
					}
				}
	   

	   
			public function edit($id){
				//Check login
			// if(!$this->session->userdata('logged_in_1')){
			// 	redirect('users/login');
			// }
			
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
				//	echo 'SUBMITED';
			//Check login
			// if(!$this->session->userdata('logged_in_1')){
			// 	redirect('users/login');
			// }
		//	echo $this->input->post('country') ; die() ;
			$post_id = $this->input->post('id');
			if(!$this->input->post('condetion')){
				 $this->session->set_flashdata('post_updated', 'condetion please');//post_updated is an id for the message
				redirect('property/edit/'.$post_id.'/#condetion');
			}
			$this->property_model->update_property();
        
            $this->session->set_flashdata('post_updated', 'Your post has been updated');//post_updated is an id for the message
			redirect('property/view/'.$post_id);
		}
		
		public function add_file(){
				$post_id = $this->input->post('id');
				
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload', $config);
				
					$files = $this->property_model->get_files($post_id);
				if(count($files) > 5){
			 		$this->session->set_flashdata('post_updated', 'You can not Add more');//post_updated is an id for the message
					redirect('property/edit/'.$post_id);
			 	}
			 	
				if($this->upload->do_upload('morefile')  ){
					
					$data = array('upload_data' => $this->upload->data());
					$post_image = $this->upload->data('file_name');
					$default = 'notdef';
					$this->property_model->create_file($post_image,$post_id,$default);
				
		
				     
				 	if( $this->property_model->get_file($post_id)['file_name'] == 'noimage.jpg'){
				 		$file = $this->property_model->get_file($post_id);
				 		$fid = $file['id'];
				 		$this->property_model->delete_file($fid);
				 	}
				 	
				 
				 	
				
					$this->session->set_flashdata('post_updated', 'Your post has been added');//post_updated is an id for the message
					redirect('property/edit/'.$post_id);
				}else{
					 $error = array('error' => $this->upload->display_errors());
					 $this->session->set_flashdata('post_updated',$error['error']);//post_updated is an id for the message
					redirect('property/edit/'.$post_id);
				}
	   //         $this->session->set_flashdata('post_updated', 'Your post has been added');//post_updated is an id for the message
				// redirect('property/view/'.$post_id);
		}
		
		
		
		public function delete_file($id){
			$post_id = $this->property_model->get_property_toDeleteFile($id)->property_id;
			$file_name = $this->property_model->get_property_toDeleteFile($id)->file_name;
			$file_default = $this->property_model->get_property_toDeleteFile($id)->default;
			 if( $file_name == "noimage.jpg"){
					$this->session->set_flashdata('category_deleted', 'can not delete this image you can only Add New');
					redirect('property/edit/'.$post_id);
			 }else{
			 	$files = $this->property_model->get_files($post_id);
			 	if(count($files) > 1){
			 		$path_to_file = './assets/images/posts/'.$file_name ;
					unlink($path_to_file);
					$this->property_model->delete_file($id);
			 	}
			 	if(count($files) == 1){
			 		$file = $this->property_model->get_file($post_id);
			 		$fid = $file['id'];
			 		$fname =  "noimage.jpg";
			 		$default = "noimg";
			 		$this->property_model->update_file($fid,$fname,$default);
			 		$path_to_file = './assets/images/posts/'.$file_name ;
					unlink($path_to_file);
			 	}
			 	$this->session->set_flashdata('category_deleted', 'img has been deleted');
					redirect('property/edit/'.$post_id);
			 }
		}
		
		public function delete2($p_id){
				$files = $this->property_model->get_files($p_id);
				foreach($files as $file) : 
					 $path_to_file = './assets/images/posts/'.$file['file_name'] ;
					 if($file['file_name'] != 'noimage.jpg'){
					 	unlink($path_to_file);
					 }
					 
				endforeach; 
				$delete = $this->property_model->delete_property($p_id) ; 
			 	if($delete){
			 		$this->session->set_flashdata('category_deleted', 'has been deleted');
					redirect('property/main');
			 	}else{
			 		$this->session->set_flashdata('category_deleted', 'not deleted');
					redirect('property/view/'.$p_id);
			 	}
			 
		}
	
	
		
	}