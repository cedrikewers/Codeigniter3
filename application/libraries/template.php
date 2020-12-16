<?php
class Template {

    var $template_data = array();
    function set($key, $value){
        $this->template_data[$key] = $value;
        
    }

    
    

    function load($template, $view, $view_data = array()){
        $this-> CI =& get_instance();
        $this->set('nav_list', array('Home','Yes')); 
        $this->set('content', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data);
        }
        

}
?>


