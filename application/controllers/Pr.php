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

    public function pr_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['pr_head']=$this->super_model->select_all_order_by('pr_head','pr_date','ASC');
        $this->load->view('pr/pr_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_pr(){
        $pr_no = $this->input->post('pr_no');
        $date_rec = $this->input->post('date_rec');
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
            'pr_attach1'=>$filename1,
            'pr_attach2'=>$filename2,
            'create_date'=>date('Y-m-d H:i:s'),
        );

        if($this->super_model->insert_into("pr_head", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/pr/pr_list'; </script>";
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
                $data['head'][]=array(
                    'pr_no'=>$h->pr_no,
                    'pr_date'=>$h->pr_date,
                    'saved'=>$h->saved,
                    'cancelled'=>$h->cancelled,
                    'pr_attach1'=>$h->pr_attach1,
                    'pr_attach2'=>$h->pr_attach2,
                );
            }
        }else{
            $data['saved']=array();
            $data['cancelled']=array();
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

    public function cancelled_pr(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['pr_head']=$this->super_model->select_all_order_by('pr_head','pr_date','ASC');
        $this->load->view('pr/cancelled_pr',$data);
        $this->load->view('template/footer');
    }
}

?>