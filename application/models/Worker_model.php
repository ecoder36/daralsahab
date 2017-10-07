<?php
// you have to configure database from config/database.php
	class Worker_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		
		public function create_worker(){
		//	$slug = url_title($this->input->post('title'));// i keep it to learn how to use variable
			$data = array(
			    'name'     => $this->input->post('name'),
			    'mobile'   => $this->input->post('mobile'),
			    'workerID' => $this->input->post('workerID'),
			    'idDate'   => $this->input->post('idDate'),
			    
			    
			//	'slug' => $slug, // i keep it to learn how to use variable
			//	'user_id' => $this->session->userdata('user_id'), // i will use it later
			//	'post_image' => $post_image // use this to add file later
			);
			return $this->db->insert('worker', $data);
		}
		
	public function create_file($post_image,$property_id,$default){
		$data = array(
			'file' => $post_image ,
			'worker_id' => $property_id ,
			'default' => $default
			);
			return $this->db->insert('files', $data);
		}
		

		public function get_workers(){
				$this->db->order_by('worker.id', 'DESC'); // there is an `id` in both tables (posts & categories) so we have to define wich table -- so we add posts.id 
				$this->db->select('*');
	     		$this->db->join('files', 'files.worker_id = worker.id', 'left'); // https://stackoverflow.com/questions/28589529/why-mysqls-left-join-is-returning-null-records-when-with-where-clause
	     		$this->db->group_by('files.worker_id');// add group_by
				$query = $this->db->get('worker');
				return $query->result_array();
	
		}
		
		public function get_worker($id = FALSE){
				
			$this->db->select('*');
	     	$this->db->join('files', 'files.worker_id = worker.id', 'left'); 
			$query = $this->db->get_where('worker', array('worker_id' => $id));
			return $query->row_array();
	
		}
		
		public function get_files($post_idw){
			$query = $this->db->get_where('files', array('worker_id' => $post_idw));
			return $query->result_array();
		}
		public function get_file($post_idw){
			$query = $this->db->get_where('files', array('worker_id' => $post_idw));
			return $query->row_array(0);
		}
		
		public function delete_worker($id){
			$this->db->where('id', $id);
			$this->db->delete('worker');
			$this->db->where('worker_id', $id);
			$this->db->delete('files');
			
			return true;
		}
		
		
		public function get_worker_toDeleteFile($post_id){
			$query = $this->db->get_where('files', array('f_id' => $post_id));
			return $query->row();
		}
		
		
		
	
		public function delete_file($id){
			$this->db->where('f_id', $id);
			$this->db->delete('files');
			return true;
		}
		
	    public function update_file($id,$name,$default){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
	
			$data = array(
			    'file' => $name,
			    'default' => $default
			);
			$this->db->where('f_id', $id);
			return $this->db->update('files', $data);
		}
		
		
		
	
		
		public function update_worker(){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
		//	$slug = url_title($this->input->post('title'));
			$data = array(
			    'name'     => $this->input->post('name'),
			    'mobile'   => $this->input->post('mobile'),
			    'workerID' => $this->input->post('workerID'),
			    'idDate'   => $this->input->post('idDate'),
				
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('worker', $data);
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
		
	
	
	}