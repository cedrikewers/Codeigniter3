<?php
class Database extends CI_Controller {
    
    public function index()
    {
        $this->mydata();
    }

    function __construct(){
        parent::__construct(); // calls the super constructor
        $this->load->model('Db_model');
        
        }

    public function mydata($page = 'database'){
        if ( ! file_exists(APPPATH.'views/data/'.$page.'.php'))
        {
        show_404();
        }
            $data['content'] = $this->Db_model->get_data();
            $this->load->library('breadcrumb');

            $breadcrumb_items = [
                'Home' => '/',
                'Database' => 'data/database',
            ];
            
            $template = [
                'tag_open' => '<ol class="breadcrumb">',
                'crumb_open' => '<li class="breadcrumb-item">',
                'crumb_active' => '<li class="breadcrumb-item active" aria-current="page">'
            ];
            $this->breadcrumb->set_template($template);
            $this->breadcrumb->add_item($breadcrumb_items);
            $data['breadcrumb_bootstrap_style'] = $this->breadcrumb->generate();
        $this->load->library('template');
        $this->template->set('title', ucfirst($page));
        $this->template->load('basic_template','data/'.$page, $data);

        
    }

    public function create(){
        $headline = $this->input->post('headline');
        $content = $this->input->post('content');
        $name = $this->input->post('name');
        $id = $this->Db_model->create($headline,$content,$name);
        echo $headline;
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->Db_model->delete($id);
    }

    public function update(){
        $headline = $this->input->post('headline');
        $content = $this->input->post('content');
        $name = $this->input->post('name');
        $id=$this->input->post('id');
        $this->Db_model->update($id,$headline,$content,$name);
        }
        
       

    

    



}
?>