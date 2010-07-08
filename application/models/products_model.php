<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_list($limit, $offset) {
        $sql = 'product_id, productname, image, image_thumb, order';
        $ret = array();

        $this->db->select($sql);
        $this->db->from(TBL_PRODUCTS);
        $ret['count_rows'] = $this->db->count_all_results();

        $this->db->select($sql);
        $this->db->order_by('order', 'asc');
        $ret['result'] = $this->db->get(TBL_PRODUCTS, $limit, $offset);

        return $ret;
    }

    public function get_info($id) {
        return $this->db->get_where(TBL_PRODUCTS, array('product_id'=>$id))->row_array();
    }

    public function create($filename){
        $part = part_filename($filename);
        $reference = normalize($_POST['txtProductName']);

        $data = array(
            'productname'   => $_POST['txtProductName'],
            'reference'     => $reference,
            'content_about'                  => $_POST['txtContent_about'],
            'content_productcharacteristics' => $_POST['txtContent_productcharacteristics'],
            'content_freezingmethods'        => $_POST['txtContent_freezingmethods'],
            'date_added'  => date('Y-m-d H:i:s'),
            'image'       => $filename,
            'image_thumb' => $part['basename']."_thumb.".$part['ext']
        );

        if( !$this->db->insert(TBL_PRODUCTS, $data) ) {
            return array(
                'status'    =>  'error',
                'msgerror'  =>  'Los datos no han sido guardados'
            );
        }

        $id = $this->db->insert_id();

        return array('status'=>'ok', 'id'=>$id);
    }

    public function edit($id, $filename){
        $data = array(
            'productname'   => $_POST['txtProductName'],
            'content_about'                  => $_POST['txtContent_about'],
            'content_productcharacteristics' => $_POST['txtContent_productcharacteristics'],
            'content_freezingmethods'        => $_POST['txtContent_freezingmethods'],
            'last_modified' => date('Y-m-d H:i:s')
        );

        if( !empty($filename) ) {
            $part = part_filename($filename);
            $data['image'] = $filename;
            $data['image_thumb'] = $part['basename']."_thumb.".$part['ext'];
        }

        $this->db->where('product_id', $id);
        if( !$this->db->update(TBL_PRODUCTS, $data) ) {
            return array(
                'status'    =>  'error',
                'msgerror'  =>  'Los datos no han sido guardados'
            );
        }

        return array('status'=>'ok');
    }

    public function delete($id){
        $res = $this->get_info($id);

        $this->db->where('product_id', $id);
        if( $this->db->delete(TBL_PRODUCTS) ){
            $part = part_filename($res['image']);
            @unlink(UPLOAD_DIR.$res['image']);
            @unlink(UPLOAD_DIR.$part['basename']."_thumb.".$part['ext']);

        }else return false;

        return true;
    }

    public function order($post){
        //print_array($post, true);

        $order = $post['initorder'];

        for( $n=1; $n<= count($post['tblList'])-1; $n++ ){
            $arr = explode("_", substr($post['tblList'][$n], 2));

            $this->db->where('product_id', $arr[1]);
            if( !$this->db->update(TBL_PRODUCTS, array('order'=>$order)) ) return false;
            $order++;
        }

        return true;
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}
?>