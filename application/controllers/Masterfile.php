<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterfile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
        $this->load->model('super_model');
        date_default_timezone_set("Asia/Manila");
        
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

	public function index(){
        $this->load->view('masterfile/index');
    }

    public function dashboard(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/dashboard');
        $this->load->view('template/footer');
    }

    public function employee_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/employee_list');
        $this->load->view('template/footer');
    }
    public function update_employee(){
        $this->load->view('template/header');
        $this->load->view('masterfile/update_employee');
        $this->load->view('template/footer');
    }

    public function department_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/department_list');
        $this->load->view('template/footer');
    }
    public function update_department(){
        $this->load->view('template/header');
        $this->load->view('masterfile/update_department');
        $this->load->view('template/footer');
    }

    public function purpose_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/purpose_list');
        $this->load->view('template/footer');
    }
    public function update_purpose(){
        $this->load->view('template/header');
        $this->load->view('masterfile/update_purpose');
        $this->load->view('template/footer');
    }

    public function enduse_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('masterfile/enduse_list');
        $this->load->view('template/footer');
    }
    public function update_enduse(){
        $this->load->view('template/header');
        $this->load->view('masterfile/update_enduse');
        $this->load->view('template/footer');
    }

}

?>