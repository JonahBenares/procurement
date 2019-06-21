<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pr extends CI_Controller {

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


    public function check_diff_multi($arraya, $arrayb){
        foreach ($arraya as $keya => $valuea) {
            if (in_array($valuea, $arrayb)) {
                unset($arraya[$keya]);
            }
        }
        return $arraya;
    }

    public function pr_list(){  
        $data['employee']=$this->super_model->select_all_order_by("employees", "employee_name", "ASC");
        $data['enduse']=$this->super_model->select_all_order_by("enduse", "enduse_name", "ASC");
        $data['purpose']=$this->super_model->select_all_order_by("purpose", "purpose_name", "ASC");
        $data['department']=$this->super_model->select_all_order_by("department", "department_name", "ASC");
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        //$data['pr_head']=$this->super_model->select_all_order_by('pr_head','pr_date','ASC');
         // $pending=$this->pending_prs();
        // print_r($pending);

           // $x=0;
        foreach($this->super_model->select_row_where('pr_head','cancelled','0') AS $head){
               //echo "**".$pending[$x]['pr_id']."<br>";
           
            
            $data['head'][] = array(
                'pr_id'=>$head->pr_id,
                'pr_no'=>$head->pr_no,
                'pr_date'=>$head->pr_date,
                'urgency_num'=>$head->urgency_num,
                'urgency_des'=>$head->urgency_des,
                'department'=>$this->super_model->select_column_where("department",'department_name','department_id',$head->department_id),
                'purpose'=>$this->super_model->select_column_where("purpose",'purpose_name','purpose_id',$head->purpose_id),
                'enduse'=>$this->super_model->select_column_where("enduse",'enduse_name','enduse_id',$head->enduse_id),
                'requestor'=>$this->super_model->select_column_where("employees",'employee_name','employee_id',$head->requested_by),
              
            );
            // $x++;
        }
        $this->load->view('pr/pr_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_pr(){
        $pr_no = $this->input->post('pr_no');
        $date_rec = $this->input->post('date_rec');
        $department = $this->input->post('department');
        $purpose = $this->input->post('purpose');
        $enduse = $this->input->post('enduse');
        $requestor = $this->input->post('requested_by');
        $urnum = $this->input->post('urnum');
        $urdes = $this->input->post('urdes');
        $dest= realpath(APPPATH . '../uploads/');
        $error_ext=0;
        if(!empty($_FILES['pic1']['name'])){
            $img1= basename($_FILES['pic1']['name']);
            $img1=explode('.',$img1);
            $ext1=$img1[1];
            $filename1=$pr_no.'-1.'.$ext1;
            if($ext1=='php' || ($ext1!='png' && $ext1!='PNG' && $ext1 != 'jpg' && $ext1 != 'JPG' && $ext1!='jpeg' && $ext1 != 'JPEG')){
                $error_ext++;
            }else{ 
                move_uploaded_file($_FILES["pic1"]['tmp_name'], $dest.'/'.$filename1);
            }
        } else {
            $filename1="";
        }

        if(!empty($_FILES['pic2']['name'])){
            $img2= basename($_FILES['pic2']['name']);
            $img2=explode('.',$img2);
            $ext2=$img2[1];
            $filename2=$pr_no.'-2.'.$ext2;
            if($ext2=='php' || ($ext2!='png' && $ext2!='PNG' && $ext2 != 'jpg' && $ext2 != 'JPG' && $ext2!='jpeg' && $ext2 != 'JPEG')){
                $error_ext++;
            }else{
                move_uploaded_file($_FILES["pic2"]['tmp_name'], $dest.'/'.$filename2);
            }
        } else {
            $filename2="";
        }

        $data = array(
            'pr_no'=>$pr_no,
            'pr_date'=>$date_rec,
            'enduse_id'=>$enduse,
            'department_id'=>$department,
            'purpose_id'=>$purpose,
            'requested_by'=>$requestor,
            'urgency_num'=>$urnum,
            'urgency_des'=>$urdes,
            'pr_attach1'=>$filename1,
            'pr_attach2'=>$filename2,
            'create_date'=>date('Y-m-d H:i:s'),
        );

        $head_rows = $this->super_model->count_rows("pr_head");
        if($head_rows==0){
            $prid=1;
        } else {
            $maxid=$this->super_model->get_max("pr_head", "pr_id");
            $prid=$maxid+1;
        }

        if($this->super_model->insert_into("pr_head", $data)){
            echo "<script>window.location ='".base_url()."index.php/pr/purchase_request/$prid'; </script>";
        }
    }

    public function purchase_request(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $pr_id = $this->uri->segment(3);
        $data['pr_id'] = $pr_id;
        $row = $this->super_model->count_rows_where('pr_head','pr_id',$pr_id);
        if($row!=0){
            foreach($this->super_model->select_row_where('pr_head','pr_id',$pr_id) AS $h){
                $data['saved']=$h->saved;
                $data['cancelled']=$h->cancelled;
                $data['urgency_num']=$h->urgency_num;
                $data['head'][]=array(
                    'pr_no'=>$h->pr_no,
                    'pr_date'=>$h->pr_date,
                    'urgency_des'=>$h->urgency_des,
                    'department'=>$this->super_model->select_column_where("department",'department_name','department_id',$h->department_id),
                    'purpose'=>$this->super_model->select_column_where("purpose",'purpose_name','purpose_id',$h->purpose_id),
                    'enduse'=>$this->super_model->select_column_where("enduse",'enduse_name','enduse_id',$h->enduse_id),
                    'requestor'=>$this->super_model->select_column_where("employees",'employee_name','employee_id',$h->requested_by),
                    'saved'=>$h->saved,
                    'cancelled'=>$h->cancelled,
                    'pr_attach1'=>$h->pr_attach1,
                    'pr_attach2'=>$h->pr_attach2,
                );
            }
        }else{
            $data['urgency_num']='';
            $data['saved']='';
            $data['cancelled']='';
            $data['head']=array();
        }

        $count = $this->super_model->count_rows_where('pr_details','pr_id',$pr_id);
        if($count!=0){
            foreach($this->super_model->select_row_where("pr_details","pr_id",$pr_id) AS $det){
                $item = $this->super_model->select_column_where("item",'item_name','item_id',$det->item_id);
                $specs = $this->super_model->select_column_where("item",'item_specs','item_id',$det->item_id);
                $data['details'][] = array(
                    'pr_details_id'=>$det->pr_details_id,
                    'pr_id'=>$pr_id,
                    'item'=>$item,
                    'specs'=>$specs,
                    'qty'=>$det->quantity,
                );
            }
        }else {
            $data['details']=array();
        }
        $this->load->view('pr/purchase_request',$data);
        $this->load->view('template/footer');
    }

    public function override_pr(){
        $pr_id=$this->uri->segment(3);
        $data = array(
            'saved'=>0
        );

        if($this->super_model->update_where("pr_head", $data, "pr_id", $pr_id)){
            redirect(base_url().'pr/purchase_request/'.$pr_id);
        }
    }

    public function pr_additem(){  
        $this->load->view('template/header');
        $pr_id = $this->uri->segment(3);
        $data['pr_id'] = $this->uri->segment(3);
        $data['item']=$this->super_model->select_all_order_by('item','item_name','ASC');
        $this->load->view('pr/pr_additem',$data);
        $this->load->view('template/footer');
    }

    public function insert_items(){
        for($x=1;$x<=10;$x++){
            $item= $this->input->post('item'.$x);
            $qty= $this->input->post('qty'.$x);
            $pr_id= $this->input->post('pr_id');
            if(!empty($item)) {
                $rows = $this->super_model->count_custom_where("pr_details","pr_id='$pr_id' AND item_id='$item'");
                $itemname = $this->super_model->select_column_where('item', 'item_name', 'item_id', $item);
                if($rows==0){
                    $data = array(
                        'pr_id'=>$pr_id,
                        'item_id'=>$item,
                        'quantity'=>$qty,
                    );
                    if($this->super_model->insert_into("pr_details", $data)){
                        echo "<script>alert('Successfully Added!'); window.opener.location.reload(); window.close();</script>";
                    }
                } else {
                    echo "<script>alert('$itemname is already linked to this PR. Item duplication prevented.'); window.location ='".base_url()."index.php/pr/pr_additem';</script>";
                }
            } 
        }
    }

    public function delete_item(){
        $prdetid=$this->uri->segment(3);
        $pr_id=$this->uri->segment(4);
        if($this->super_model->delete_where('pr_details', 'pr_details_id', $prdetid)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/pr/purchase_request/$pr_id'; </script>";
        }
    }

    public function saved_pr(){
        $pr_id= $this->input->post('pr_id');
        $data=array(
            'saved'=>1
        );
        if($this->super_model->update_where('pr_head', $data, 'pr_id', $pr_id)){
            echo "<script>alert('Successfully Saved!'); window.location ='".base_url()."index.php/pr/pr_list';</script>";
        }
    }

    public function cancel_pr(){
        $pr_id=$this->uri->segment(3);
        $data=array(
            'cancelled'=>1
        );
        if($this->super_model->update_where('pr_head', $data, 'pr_id', $pr_id)){
            echo "<script>alert('Successfully Cancelled!'); window.location ='".base_url()."index.php/pr/pr_list';</script>";
        }
    }

    public function pending_prs(){
          foreach($this->super_model->custom_query("SELECT * FROM pr_head INNER JOIN pr_details ON pr_head.pr_id = pr_details.pr_id WHERE pr_details.cancelled = '0' ORDER BY pr_date DESC") AS $pr){

                $pr_arr[] = array(
                    'pr_id'=>$pr->pr_id,
                    'item_id'=>$pr->item_id
                );
        }

        foreach($this->super_model->custom_query("SELECT * FROM po_pr INNER JOIN po_items ON po_pr.po_pr_id = po_items.po_pr_id") AS $po){
             $po_arr[] = array(
                'pr_id'=>$po->pr_id,
                'item_id'=>$po->item_id
            );

        }



         $result = $this->check_diff_multi($pr_arr, $po_arr);

        foreach($this->super_model->custom_query("SELECT ah.pr_id, ai.item_id FROM aoq_header ah INNER JOIN aoq_reco ai ON ah.aoq_id = ai.aoq_id WHERE ai.balance != '0' AND ai.balance != ai.quantity") AS $partial){
                
                $result[] = array(
                    'pr_id'=>$partial->pr_id,
                    'item_id'=>$partial->item_id
                );
          }

          return $result;
    }

    public function cancelled_pr(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        /*$data['pr_head']=$this->super_model->select_all_order_by('pr_head','pr_date','ASC');*/
        $count = $this->super_model->count_rows_where('pr_head','cancelled','1');
        if($count!=0){
          
            foreach($this->super_model->select_row_where('pr_head','cancelled','1') AS $heads){
             
                $data['pr_head'][] = array(
                    'pr_id'=>$heads->pr_id,
                    'pr_no'=>$heads->pr_no,
                    'pr_date'=>$heads->pr_date,
                    'urgency_num'=>$heads->urgency_num,
                    'urgency_des'=>$heads->urgency_des,
                    'department'=>$this->super_model->select_column_where("department",'department_name','department_id',$heads->department_id),
                    'requestor'=>$this->super_model->select_column_where("employees",'employee_name','employee_id',$heads->requested_by),
                    //'status'=>$status
                );
                $x++;
            }
        }else {
            $data['pr_head']=array();
        }
        $this->load->view('pr/cancelled_pr',$data);
        $this->load->view('template/footer');
    }
}

?>