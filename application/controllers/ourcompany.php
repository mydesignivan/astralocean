<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ourcompany extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('pages_model');
        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/ourcompany_view.php',
            'tlp_title'            =>  TITLE_OURCOMPANY,
            'tlp_meta_keywords'    =>  META_KEYWORDS_OURCOMPANY,
            'tlp_meta_description' =>  META_DESCRIPTION_OURCOMPANY
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
            'info' => array(
                'ourcompany' => $this->pages_model->get_content('ourcompany')
            )
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>