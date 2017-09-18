<?php
// you have to configure database from config/database.php
	class Contact_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		
		public function create_contact(){
		//	$slug = url_title($this->input->post('title'));// i keep it to learn how to use variable
			$data = array(
				'name' => $this->input->post('name'),
				'mail' => $this->input->post('email'),
			    'mobile' => $this->input->post('mobile'),
			    'message' => $this->input->post('message'),
			    
		
			//	'slug' => $slug, // i keep it to learn how to use variable
			//	'user_id' => $this->session->userdata('user_id'), // i will use it later
			//	'post_image' => $post_image // use this to add file later
			);
			return $this->db->insert('contact', $data);
		}
		

		
		
			public function get_contacts(){
			$query = $this->db->get('contact');
				return $query->result_array();
		}
		
			public function get_contact($post_idw){
			$query = $this->db->get_where('contact', array('id' => $post_idw));
			return $query->row_array();
		
		}
		
			public function delete_contact($id){
			$this->db->where('id', $id);
			$this->db->delete('contact');
			return true;
		}
	
		
	//	to get the data by slug
	
		public function get_property1($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				//	$this->db->order_by('id', 'DESC');
			//	$this->db->select('*,posts.id AS posts_id,categories.id AS categories_id');
				$this->db->order_by('posts.id', 'DESC'); // there is an `id` in both tables (posts & categories) so we have to define wich table -- so we add posts.id 
		     //	$this->db->join('categories', 'categories.id = posts.category_id'); // to view information of categories on the same page on index.php
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		
		public function get_property($id = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){
				$this->db->order_by('property.id', 'DESC'); // there is an `id` in both tables (posts & categories) so we have to define wich table -- so we add posts.id 
				$this->db->select('*, property.id AS p_id');
				$this->db->select('files.id AS f_id');
	     		$this->db->join('files', 'files.property_id = property.id', 'left'); // https://stackoverflow.com/questions/28589529/why-mysqls-left-join-is-returning-null-records-when-with-where-clause
	     		$this->db->group_by('files.property_id');// add group_by
				$query = $this->db->get('property');
				return $query->result_array();
			}

				$this->db->select('*, property.id AS p_id');
				$this->db->select('files.id AS f_id');
	     		$this->db->join('files', 'files.property_id = property.id', 'left'); 
		//	$query = $this->db->get_where('property', array('property.id' => $id));
			$query = $this->db->get_where('property', array('property_id' => $id));
			return $query->row_array();
		}
		
		public function delete_property($id){
			$this->db->where('id', $id);
			$this->db->delete('property');
			$this->db->where('property_id', $id);
			$this->db->delete('files');
			$this->db->where('post_id', $id);
			$this->db->delete('comments');
			return true;
		}
		
		public function get_property_toDeleteFile($post_id){
			$query = $this->db->get_where('files', array('id' => $post_id));
			return $query->row();
		}
		
		public function get_files($post_idw){
			$query = $this->db->get_where('files', array('property_id' => $post_idw));
			return $query->result_array();
		}
		public function get_file($post_idw){
			$query = $this->db->get_where('files', array('property_id' => $post_idw));
			return $query->row_array(0);
		}
		
	
		public function delete_file($id){
			$this->db->where('id', $id);
			$this->db->delete('files');
			return true;
		}
		
	    public function update_file($id,$name,$default){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
	
			$data = array(
			    'file_name' => $name,
			    'default' => $default
			);
			$this->db->where('id', $id);
			return $this->db->update('files', $data);
		}
		
		
		
	
		public function update_property(){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
		//	$slug = url_title($this->input->post('title'));
			$data = array(
				'mobile' => $this->input->post('mobile'),
			    'email' => $this->input->post('email'),
			    'country' => $this->input->post('country'),
			    'city' => $this->input->post('city'),
			    'rent_sale' => $this->input->post('rentOrSale'),
			    'price' => $this->input->post('price'),
			    'title' => $this->input->post('title'),
			    'description' => $this->input->post('description'),
				'contact_by' => $this->input->post('emailOrMobile')
				
				
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('property', $data);
		}
		
		
	}