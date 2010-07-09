<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('products_model');
        $this->load->library('dataview', array(
            'tlp_title'            =>  TITLE_PRODUCTS,
            'tlp_meta_keywords'    =>  META_KEYWORDS_PRODUCTS,
            'tlp_meta_description' =>  META_DESCRIPTION_PRODUCTS
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
            'tlp_section'  => 'frontpage/products_view.php',
            'listProducts' => $this->products_model->get_list_front()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function display(){
        $ref = $this->uri->segment(2);
        if( empty($ref) ) redirect($this->config->item('base_url'));

        $info = $this->products_model->get_info($ref);

        $this->_data = $this->dataview->set_data(array(
            'tlp_section'       => 'frontpage/products_detail_view.php',
            'tlp_title_section' => 'Product '.$info['productname'],
            'info'              => $info
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>