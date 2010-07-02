<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
        $this->load->library("simplelogin");
        $this->load->library('dataview', array(
            'tlp_section'          =>  'paneladmin/pages_view.php',
            'tlp_title'            =>  TITLE_INDEX
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_script'    =>  array('tinymce', 'pages')
            //'info'  =>  $this->users_model->get_info()
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/


    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>