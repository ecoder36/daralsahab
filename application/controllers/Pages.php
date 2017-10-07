<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){ // = 'home' to set the default page and here home.php is the default &&&& $page is an example you can chose any thing else any variable to use it
            
            redirect("/");
            
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            
            $data['title'] = ucfirst($page); //ucfirst ---- it is for capital
        
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
    
    	public function test(){
				$data['title'] = '  test  ' ;
	
			$this->load->view('test', @$data);
    	}
    	
    	public function mainpage(){
				$data['title'] = '  mainpage  ' ;
	
			$this->load->view('pages/mainpage', @$data);
    	}
    		
    	public function main(){
			$data['title'] = '  mainpage  ' ;
			$this->load->view('templates/header', $data);
            $this->load->view('pages/main', $data);
            $this->load->view('templates/footer');
            
    	}
    }