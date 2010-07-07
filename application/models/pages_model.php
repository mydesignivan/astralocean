<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pages_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function save(){
        if( $this->_exists_page() ){
            $this->db->where('pagename', $_POST['pagename']);
            $res = $this->db->update(TBL_PAGES, array('content'=>$_POST['content']));

        }else{
            $data = array(
                'pagename'        =>  $_POST['pagename'],
                'content'         =>  $_POST['content'],
                'last_modified'   =>  date('Y-m-d H:i:s')
            );
            $res = $this->db->insert(TBL_PAGES, $data);
        }
        return $res;
    }

    public function get_content($pagename){
        $query = $this->db->get_where(TBL_PAGES, array('pagename'=>$pagename));
        $content="";
        if( $query->num_rows>0 ) {
            $row = $query->row_array();
            $content = $row['content'];
        }

        return $content;
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
     private function _exists_page(){
         $res = $this->db->get_where(TBL_PAGES, array('pagename'=>$_POST['pagename']))->num_rows;
         return $res>0 ? true : false;
     }
}
?>