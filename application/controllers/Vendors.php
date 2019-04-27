<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	  function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }

	}
	public function view_vendors_per_item(){
        $this->load->view('template/header');
        $this->load->view('vendors/view_vendors_per_item');
        $this->load->view('template/footer');
    }
    public function vendor_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('vendors/vendor_list');
        $this->load->view('template/footer');
    }
    public function update_vendor(){
        $this->load->view('template/header');
        $this->load->view('vendors/update_vendor');
        $this->load->view('template/footer');
    }
    public function vendor_details(){
        $this->load->view('template/header');
        $this->load->view('vendors/vendor_details');
        $this->load->view('template/footer');
    }
    public function add_vendoritem(){
        $this->load->view('template/header');
        $this->load->view('vendors/add_vendoritem');
        $this->load->view('template/footer');
    }
    
	
}

?>