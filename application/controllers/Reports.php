<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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

    public function generate_pr_summary(){
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        redirect(base_url().'reports/pr_report/'.$year.'/'.$month);
    }

    public function generate_po_summary1(){
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        redirect(base_url().'reports/po_report/'.$year.'/'.$month);
    }

	public function pr_report(){
        $year=$this->uri->segment(3);
        $month=$this->uri->segment(4);
        $date = $year."-".$month;
        $data['date']=date('F Y', strtotime($date));

        foreach($this->super_model->select_all_order_by('pr_head', 'pr_date', 'DESC') AS $head){
            $data['pr'][] = array(
                'pr_id'=>$head->pr_id,
                'pr_no'=>$head->pr_no,
                'pr_date'=>$head->pr_date,
                'purpose'=>$this->super_model->select_column_where("purpose",'purpose_name','purpose_id',$head->purpose_id),
                'enduse'=>$this->super_model->select_column_where("enduse",'enduse_name','enduse_id',$head->enduse_id),
            );
        }
        
        $this->load->view('template/header');        
        $this->load->view('reports/pr_report',$data);
        $this->load->view('template/footer');
    }

    public function po_report(){
        $year=$this->uri->segment(3);
        $month=$this->uri->segment(4);
        $date = $year."-".$month;
        $data['date']=date('F Y', strtotime($date));

        $this->load->view('template/header');        
        $this->load->view('reports/po_report',$data);
        $this->load->view('template/footer');
    }
}
?>