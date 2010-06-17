<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contacts extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library('dataview', array(
            'tlp_section'          =>  'frontpage/contacts_view.php',
            'tlp_title'            =>  TITLE_CONTACT,
            'tlp_script'           =>  array('contact', 'validator'),
            'tlp_meta_keywords'    =>  META_KEYWORDS_CONTACT,
            'tlp_meta_description' =>  META_DESCRIPTION_CONTACT
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');
            $this->load->model('users_model');

            $message = sprintf(EMAIL_CONTACT_MESSAGE,
                $_POST['txtName'],
                $_POST['txtEmail'],
                nl2br($_POST['txtConsult'])
            );

            $userdata = $this->users_model->get_info();

            $this->email->from($_POST['txtEmail'], $_POST['txtName']);
            $this->email->to($userdata['email']);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message($message);
            if( $this->email->send() ){
                $this->session->set_flashdata('statusmail', 'ok');
            }else {
                $this->session->set_flashdata('statusmail', 'error');
            }
            redirect('/contacts/');
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>