<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rfdis extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('super_model');
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

    public function create_rfd(){
         $rfd_count = $this->super_model->count_rows("rfd");
            if($rfd_count==0){
            $rfd_id=1;
         } else {
            $maxrfdid=$this->super_model->get_max("rfd", "rfd_id");
            $rfd_id=$maxrfdid+1;
         }

         if($this->input->post('cash')==1){
            $cash=1;
            $check=0;
         } else {
            $cash=0;
            $check=1;
         }

         $create = date("Y-m-d H:i:s");
         $data =array(
            'rfd_id'=>$rfd_id,
            'rfd_date'=>$this->input->post('rfd_date'),
            'apv_no'=>$this->input->post('apv_no'),
            'company'=>$this->input->post('company'),
            'pay_to'=>$this->input->post('pay_to'),
            'check_name'=>$this->input->post('check_name'),
            'cash'=>$cash,
            'check'=>$check,
            'bank_no'=>$this->input->post('bank_no'),
            'check_date'=>$this->input->post('check_due'),
            'due_date'=>$this->input->post('due_date'),
            'prepared_by'=>$_SESSION['user_id'],
            'create_date'=>$create,
            'direct_purchase'=>1
         );

         if($this->super_model->insert_into("rfd", $data)){
            redirect(base_url().'rfdis/rfdis_prnt/'.$rfd_id);
         }

    }

    public function getname($column, $table, $col_id, $val_id){
        $name = $this->super_model->select_column_where($table, $column, $col_id, $val_id);
        return $name;
    }

	public function rfdis_list(){	
        $data['supplier']=$this->super_model->select_all_order_by("vendor_head", "vendor_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('rfdis/rfdis_list',$data);
        $this->load->view('template/footer');
    }

    public function rfdis_prnt(){	
        $rfd_id=$this->uri->segment(3);
        $data['rfd'] = $this->super_model->select_row_where("rfd", "rfd_id", $rfd_id);
        $supplier_id = $this->super_model->select_column_where('rfd', 'pay_to', 'rfd_id', $rfd_id);
        $data['vat'] = $this->super_model->select_column_where('vendor_head', 'vat', 'vendor_id', $supplier_id);
        $data['ewt'] = $this->super_model->select_column_where('vendor_head', 'ewt', 'vendor_id', $supplier_id);
        $this->load->view('template/header');
        $this->load->view('rfdis/rfdis_prnt',$data);
        $this->load->view('template/footer');
    }

    public function additemrfd(){	
        $this->load->view('template/header');
        $this->load->view('rfdis/additemrfd');
        $this->load->view('template/footer');
    }



}

?>