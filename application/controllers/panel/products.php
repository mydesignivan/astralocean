<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('products_model');
        $this->load->library("simplelogin");
        $this->load->library('dataview', array(
            'tlp_section'  =>  'paneladmin/products_view.php',
            'tlp_title'    =>  TITLE_INDEX,
            'tlp_script'   =>  'products'
        ));
        $this->_data = $this->dataview->get_data();

        $this->_count_per_page=10;
        $uri = $this->uri->uri_to_assoc(2);
        $this->_offset = !isset($uri['page']) ? 0 : $uri['page'];
}

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;
    private $_file;
    private $_filename;
    private $_count_per_page;
    private $_offset;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->library('pagination');
        
        $listProducts = $this->products_model->get_list($this->_count_per_page, $this->_offset);

        $config['base_url'] = site_url('/panel/products/index/page/');
        $config['total_rows'] = $listProducts['count_rows'];
        $config['per_page'] = $this->_count_per_page;
        $config['uri_segment'] = $this->uri->total_segments();
        $this->pagination->initialize($config);

        $this->_data = $this->dataview->set_data(array(
            'listProducts'  =>  $listProducts['result']
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(4);

        if( $id ){  // Edit
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'  =>  'paneladmin/products_form_view.php',
                'info'         =>  $this->products_model->get_info($id),
                'tlp_script'   =>  array('fancybox', 'validator', 'products')
            ));

        }else{    // New
            $this->_data = $this->dataview->set_data(array(
                'tlp_section'  =>  'paneladmin/products_form_view.php',
                'tlp_script'   =>  array('validator', 'products')
            ));
        }

        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){         

            $res = $this->_upload();
            $msgerror = "";

            if( $res['status']=="ok" ){
                $res = $this->products_model->create($this->_filename);

                if( $res['status']=="error" ) $this->_delete_images($this->_filename);

            }else $msgerror = $res['msgerror'];

            $this->session->set_flashdata('savestatus', $res['status']);
            $this->session->set_flashdata('msgerror', @$res['msgerror']);

            redirect($res['status']=="ok" ? '/panel/products/' : '/panel/products/form/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->_upload();
            $msgerror="";

            if( $res['status']=="ok" ){
                if( !empty($this->_file['tmp_name']) && $_POST['filename']!=$this->_filename ) $this->_delete_images($_POST['filename']);

                $res = $this->products_model->edit($_POST['product_id'], $this->_filename);

                if( $res['status']=="error" ) $this->_delete_images($this->_filename);

            }else $msgerror = $res['msgerror'];

            $this->session->set_flashdata('savestatus', $res['status']);
            $this->session->set_flashdata('msgerror', @$res['msgerror']);

            redirect($res['status']=="ok" ? '/panel/products/' : '/panel/products/form/'.$_POST['product_id']);
        }
    }

    public function delete(){
        $id = $this->uri->segment(4);
        if( $id && $this->products_model->delete($id) ) redirect('/panel/products/');
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _upload(){
        $this->_file = $_FILES[key($_FILES)];
        if( is_numeric($_POST['product_id']) && empty($this->_file['tmp_name']) ) return array('status'=>'ok');
        
        $this->load->helper('form');
        $this->load->library('image_lib');

        //Valida
        if( !is_uploaded_file($this->_file['tmp_name']) ) return array('status'=>'error', 'msgerror'=>ERR_UPLOAD_NOTUPLOAD);
        $size = (int)UPLOAD_MAXSIZE;
        if( round($this->_file['size']/1024, 2) > (int)UPLOAD_MAXSIZE ) {
            return array('status'=>'error', 'msgerror'=>sprintf(ERR_UPLOAD_MAXSIZE, (string)($size/1024)));
        }
        if( !$this->_is_allowed_filetype() ) return array('status'=>'error', 'msgerror'=>ERR_UPLOAD_FILETYPE);

        //Copia la imagen
        $this->_filename = $filename = $this->_get_filename($id);

        $ext = substr($filename, (strripos($filename, ".")-strlen($filename))+1);
        $basename = substr($filename, 0, strripos($filename, "."));

        $this->_filename_thumb = $basename."_thumb".$ext;

        move_uploaded_file($this->_file['tmp_name'], UPLOAD_DIR.$filename);

        $sizes = getimagesize(UPLOAD_DIR_TMP.$filename);

        // Crea una copia y dimensiona la imagen  (THUMB)
        $config = array();
        $config['source_image'] = UPLOAD_DIR.$filename;
        $config['width'] = IMAGE_THUMB_WIDTH;
        $config['create_thumb'] = TRUE;
        $config['height'] = IMAGE_THUMB_HEIGHT;

        $this->image_lib->initialize($config);
        if( $this->image_lib->resize() ) {
            // Dimensiona la imagen original   (ORIGINAL)
            if( $sizes[0] > IMAGE_ORIGINAL_WIDTH || $sizes[1] > IMAGE_ORIGINAL_HEIGHT ){
                $config = array();
                $config['source_image'] = UPLOAD_DIR.$filename;
                if( $sizes[0] > IMAGE_ORIGINAL_WIDTH ) $config['width'] = IMAGE_ORIGINAL_WIDTH;
                if( $sizes[1] > IMAGE_ORIGINAL_HEIGHT ) $config['height'] = IMAGE_ORIGINAL_HEIGHT;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if( !$this->image_lib->resize() ) return array('status'=>'error', 'msgerror'=>$this->image_lib->display_errors());
            }

        }else return array('status'=>'error', 'msgerror'=>$this->image_lib->display_errors());
        
        return array('status'=>'ok');
    }

    private function _get_filename(){
        $name = preg_replace("/\s+/", "_", strtolower($this->_file['name']));
        return uniqid(time()) ."__". $name;
    }

    private function _is_allowed_filetype(){
        require_once(APPPATH.'config/mimes'.EXT);

        $extention = explode("|", UPLOAD_FILETYPE);
        foreach( $extention as $ext ){
            $mime = $mimes[$ext];

            if( is_array($mime) ){
                if( in_array($this->_file['type'], $mime) ) return true;
            }else{
                if( $mime==$this->_file['type'] ) return true;
            }
        }
        return false;
    }

    private function _delete_images($filename){
        $part = part_filename($filename);
        @unlink(UPLOAD_DIR.$filename);
        @unlink(UPLOAD_DIR.$part['basename']."_thumb.".$part['ext']);
    }

}

?>