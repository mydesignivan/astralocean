<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pages_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function update(){
        $this->db->where('pagename', $_POST['pagename']);
        return $this->db->update(TBL_PAGES, array('content'=>$_POST['content']));
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>