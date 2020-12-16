<?php
class Page extends CI_Controller {
    
    public function index()
    {
        $this->view();
    }

    public function view($page = 'home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
        show_404();
        }
        $this->load->library('template');
        $this->template->set('title', ucfirst($page));
        $this->template->load('basic_template','pages/'.$page);

        
    }

    

    



}
?>


