<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
        $this->load->library('encpss');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_info() {
        //$data = $this->db->get_where(TBL_USERS, array('user_id'=>$this->session->userdata('user_id')))->row_array();
        $data = $this->db->get_where(TBL_USERS)->row_array();
        return $data;
    }

    public function save(){
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $data = array(
            'commerdiv_email'    => $_POST['txtCommerDivEmail'],
            'commerdivar_phone'  => $_POST['txtCommerDivArPhone'],
            'commerdives_phone'  => $_POST['txtCommerdivEsPhone'],
            'pp_phone'           => $_POST['txtProdPlanPhone'],
            'prodplan_email'     => $_POST['txtProdPlanEmail'],
            'skype'              => $_POST['txtSkype'],
            'username'           => $_POST['txtUser'],
            'last_modified'      => date('Y-m-d H:i:s')
        );

        if( !empty($_POST['txtPssNew']) ){
            $data['password'] = $this->encpss->encode($_POST['txtPssNew']);
        }
        //$this->session->set_userdata(array('username'=>$_POST['txtUser']));

        return $this->db->update(TBL_USERS, $data);
    }

}
?>