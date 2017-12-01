<?php
	class Receipts extends CI_Controller{
		

			
		public function create(){
	        $data['title'] = '  سند جديد ';
	        $data['owners'] = $this->owner_model->get_owners() ;
	       	$cid = $this->input->post('contract_id');
	    $data['terms'] = $this->term_model->get_terms() ;
	        $data['contract'] = $this->contract_model->get_contract($cid);
			$data['receipts'] = $this->receipt_model->get_receipts_of_rental($cid);
			$data['contr_id'] = $cid;
	        //$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('amount', 'Name', 'trim|required',array('required' => ' يجب كتابة المبلغ المدفوع') );
		//	$this->form_validation->set_rules('message', 'Message', 'trim|required',array('required' => ' يجب كتابة الرسالة') );
			if($this->form_validation->run() === FALSE){
	        	$this->load->view('templates/header', $data);
				$this->load->view('aqar/view', $data);
				$this->load->view('templates/footer');
		
			}else {
				$this->receipt_model->add();
				// Set message
				
				$this->session->set_flashdata('success', ' تم إنشاء السند ');
				redirect('receipts/view/'.$cid);
				}
			}
			
			
		public function view($id){
		
			$data['terms'] = $this->term_model->get_terms() ;
			$data['contract'] = $this->contract_model->get_contract($id);
			$data['receipts'] = $this->receipt_model->get_receipts_of_rental($id);
			$data['contr_id'] = $id;
			if(empty($data['contract'])){
				//show_404();
				$this->session->set_flashdata('danger', 'no post');//post_updated is an id for the message
				redirect('contracts/main');
			}
		    $data['title'] = $data['contract']['co_rental'];
			$this->load->view('templates/header', $data);
			$this->load->view('aqar/view', $data);
			$this->load->view('templates/footer');
		}
		
			
			
			
			
			
			
	}