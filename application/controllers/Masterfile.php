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
        if(empty($_SESSION['user_id'])){
            $this->load->view('masterfile/login');
        }else {
            $data['pending_rfq'] = $this->super_model->count_custom_where("rfq_head","saved='1' AND completed='0' AND served='0'");
            $pending_rfq=$this->super_model->count_custom_where("rfq_head","saved='1' AND completed='0' AND served='0'");
            $all=$this->super_model->count_custom_where("rfq_head","saved='1' AND served='0'");


            $data['for_te'] = $this->super_model->count_custom_where("aoq_header","saved='1' AND completed='0' AND served='0'");
            $pending_te=$this->super_model->count_custom_where("aoq_header","saved='1' AND completed='0' AND served='0'");
            $all_aoq=$this->super_model->count_custom_where("aoq_header","saved='1' AND served='0'");

            $count_po=0;
            $count_rfd=0;
           foreach($this->super_model->select_custom_where("po_head", "saved='1' AND cancelled='0'") AS $po){
                $count_po++;
              
                foreach($this->super_model->select_custom_where("rfd", "po_id = '$po->po_id'") AS $rfd){
                    $count_rfd++;
                }
           }
           
           $data['pending_rfd'] = $count_po-$count_rfd;

           if($all!=0){
            $data['percent_rfq'] = ($pending_rfq/$all)*100;
           } else {
             $data['percent_rfq'] =0;
           }

            if($all_aoq!=0){
                $data['percent_te'] = ($pending_te/$all_aoq)*100;
            } else {
                $data['percent_te']=0;
            }

            if($count_po!=0){
             $data['percent_rfd'] = ($count_rfd/$count_po)*100;
            } else {
                $data['percent_rfd']=0;
            }
            $this->load->view('template/header');
            $this->load->view('template/navbar');

            $data['count_rfq']=$this->super_model->count_rows('rfq_head');
            $data['count_aoq']=$this->super_model->count_rows('aoq_header');
            $data['count_po']=$this->super_model->count_rows('po_head');

            $this->load->view('masterfile/dashboard',$data);
            $this->load->view('template/footer');
        }
    }

    public function dashboard(){
        $data['pending_rfq'] = $this->super_model->count_custom_where("rfq_head","saved='1' AND completed='0' AND served='0'");
        $pending_rfq=$this->super_model->count_custom_where("rfq_head","saved='1' AND completed='0' AND served='0'");
        $all=$this->super_model->count_custom_where("rfq_head","saved='1' AND served='0'");


        $data['for_te'] = $this->super_model->count_custom_where("aoq_header","saved='1' AND completed='0' AND served='0'");
        $pending_te=$this->super_model->count_custom_where("aoq_header","saved='1' AND completed='0' AND served='0'");
        $all_aoq=$this->super_model->count_custom_where("aoq_header","saved='1' AND served='0'");

        $count_po=0;
        $count_rfd=0;
       foreach($this->super_model->select_custom_where("po_head", "saved='1' AND cancelled='0'") AS $po){
            $count_po++;
          
            foreach($this->super_model->select_custom_where("rfd", "po_id = '$po->po_id'") AS $rfd){
                $count_rfd++;
            }
       }

     

       $data['pending_rfd'] = $count_po-$count_rfd;

       if($all!=0){
        $data['percent_rfq'] = ($pending_rfq/$all)*100;
       } else {
         $data['percent_rfq'] =0;
       }

        if($all_aoq!=0){
            $data['percent_te'] = ($pending_te/$all_aoq)*100;
        } else {
            $data['percent_te']=0;
        }

        if($count_po!=0){
         $data['percent_rfd'] = ($count_rfd/$count_po)*100;
        } else {
            $data['percent_rfd']=0;
        }
        $this->load->view('template/header');
        $this->load->view('template/navbar');

        $data['count_rfq']=$this->super_model->count_rows('rfq_head');
        $data['count_aoq']=$this->super_model->count_rows('aoq_header');
        $data['count_po']=$this->super_model->count_rows('po_head');

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
          foreach($result AS $res){

            $pr_details_id = $this->super_model->select_column_custom_where("pr_details", "pr_details_id", "pr_id = '$res[pr_id]' AND item_id = '$res[item_id]'");
            $rfq_outgoing = $this->super_model->count_custom_query("SELECT rh.rfq_id FROM rfq_head rh INNER JOIN rfq_detail rd ON rh.rfq_id = rd.rfq_id WHERE rh.pr_id = '$res[pr_id]' AND rd.item_id = '$res[item_id]' GROUP BY rd.item_id");

            $rfq_incoming = $this->super_model->count_custom_query("SELECT rh.rfq_id FROM rfq_head rh INNER JOIN rfq_detail rd ON rh.rfq_id = rd.rfq_id WHERE rh.pr_id = '$res[pr_id]' AND rd.item_id = '$res[item_id]' AND rh.saved = '1' AND rh.completed='1' GROUP BY rd.item_id");

            $refer_mnl = $this->super_model->select_column_custom_where("aoq_header", "refer_mnl", "pr_id = '$res[pr_id]'");
            $refer_date = $this->super_model->select_column_custom_where("aoq_header", "refer_date", "pr_id = '$res[pr_id]'");

            $aoq_for_te = $this->super_model->count_custom_query("SELECT ah.aoq_id FROM aoq_header ah INNER JOIN aoq_items ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$res[pr_id]' AND ai.item_id = '$res[item_id]' GROUP BY ai.item_id");

            $te_done = $this->super_model->count_custom_query("SELECT ah.aoq_id FROM aoq_header ah INNER JOIN aoq_items ai ON ah.aoq_id = ai.aoq_id WHERE ah.pr_id = '$res[pr_id]' AND ai.item_id = '$res[item_id]'  AND ah.saved = '1' AND ah.completed='1' GROUP BY ai.item_id");

            $po = $this->super_model->count_custom_query("SELECT pop.po_id FROM po_head ph INNER JOIN po_pr pop ON ph.po_id = pop.po_id INNER JOIN po_items pi ON pop.po_pr_id = pi.po_pr_id  WHERE pop.pr_id = '$res[pr_id]' AND pi.item_id = '$res[item_id]' AND  ph.saved='1' AND ph.cancelled = '0' GROUP BY pi.item_id");

          
            $data['pr_details'][]= array(
                'pr_details_id'=>$pr_details_id,
                'pr_no'=>$this->super_model->select_column_where("pr_head",'pr_no','pr_id',$res['pr_id']), 
                'item_name'=>$this->super_model->select_column_where("item",'item_name','item_id',$res['item_id']), 
                'item_specs'=>$this->super_model->select_column_where("item",'item_specs','item_id',$res['item_id']), 
                'rfq_outgoing'=>$rfq_outgoing,
                'rfq_incoming'=>$rfq_incoming,
                'for_te'=>$aoq_for_te,
                'te_done'=>$te_done,
                'po'=>$po,
                'refer_mnl'=>$refer_mnl,
                'refer_date'=>$refer_date,
            );

        }
        $this->load->view('masterfile/dashboard',$data);
        $this->load->view('template/footer');
    }

    public function check_diff_multi($arraya, $arrayb){
        foreach ($arraya as $keya => $valuea) {
            if (in_array($valuea, $arrayb)) {
                unset($arraya[$keya]);
            }
        }
        return $arraya;
    }

    public function cancel_pr(){
        $pr_details_id =$this->input->post('pr_details_id');
        $reason=$this->input->post('cancel_reason');
        $cancel_date = date('Y-m-d H:i:s');


        $data=array(
            'cancelled'=>1,
            'cancel_reason'=>$reason,
            'cancel_date'=>$cancel_date
        );
      /*  echo  $pr_details_id;
        print_r($data);*/
        if($this->super_model->update_where("pr_details", $data, "pr_details_id", $pr_details_id)){
            redirect(base_url().'masterfile/dashboard/');
        }
    }

    public function login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $count=$this->super_model->login_user($username,$password);
        if($count>0){   
            $password1 =md5($this->input->post('password'));
            $fetch=$this->super_model->select_custom_where("users", "username = '$username' AND (password = '$password' OR password = '$password1')");
            foreach($fetch AS $d){
                $userid = $d->user_id;
                $username = $d->username;
                $fullname = $d->fullname;
            }
            $newdata = array(
               'user_id'=> $userid,
               'username'=> $username,
               'fullname'=> $fullname,
               'logged_in'=> TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url().'index.php/masterfile/dashboard/');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Username And Password Do not Exist!');
            $this->load->view('masterfile/login');      
        }
    }

    public function user_logout(){
        $this->session->sess_destroy();
        $this->load->view('template/header');
        $this->load->view('masterfile/login');
        $this->load->view('template/footer');
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."index.php/masterfile/index'; </script>";
    }

    public function employee_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['department']=$this->super_model->select_all_order_by('department', 'department_name', 'ASC');
        foreach($this->super_model->select_all_order_by('employees', 'employee_name', 'ASC') AS $emp){
            $data['employees'][]=array(
                'emp_id'=>$emp->employee_id,
                'employee'=>$emp->employee_name,
                'position'=>$emp->position,
                'department'=>$this->super_model->select_column_where('department','department_name','department_id',$emp->department_id)
            );
        }
        $this->load->view('masterfile/employee_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_emp(){
        $emp_name = trim($this->input->post('emp_name')," ");
        $dept = trim($this->input->post('dept')," ");
        $position = trim($this->input->post('position')," ");
        $data = array(
            'employee_name'=>$emp_name,
            'department_id'=>$dept,
            'position'=>$position,
        );
        if($this->super_model->insert_into("employees", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/masterfile/employee_list'; </script>";
        }
    }

    public function update_employee(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['department']=$this->super_model->select_all_order_by('department', 'department_name', 'ASC');
        $data['emp'] = $this->super_model->select_row_where('employees', 'employee_id', $id);
        $this->load->view('masterfile/update_employee',$data);
        $this->load->view('template/footer');
    }

    public function edit_employee(){
        $data = array(
            'employee_name'=>$this->input->post('emp_name'),
            'department_id'=>$this->input->post('dept'),
            'position'=>$this->input->post('position'),
        );
        $emp_id = $this->input->post('emp_id');
            if($this->super_model->update_where('employees', $data, 'employee_id', $emp_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_employee(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('employees', 'employee_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/masterfile/employee_list'; </script>";
        }
    }

    public function department_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['department']=$this->super_model->select_all_order_by('department', 'department_name', 'ASC');
        $this->load->view('masterfile/department_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_dept(){
        $dept = trim($this->input->post('dept')," ");
        $data = array(
            'department_name'=>$dept
        );
        if($this->super_model->insert_into("department", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/masterfile/department_list'; </script>";
        }
    }

    public function update_department(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['department'] = $this->super_model->select_row_where('department', 'department_id', $id);
        $this->load->view('masterfile/update_department',$data);
        $this->load->view('template/footer');
    }

    public function edit_dept(){
        $data = array(
            'department_name'=>$this->input->post('dept'),
        );
        $dept_id = $this->input->post('dept_id');
            if($this->super_model->update_where('department', $data, 'department_id', $dept_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_dept(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('department', 'department_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/masterfile/department_list'; </script>";
        }
    }

    public function unit_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['unit']=$this->super_model->select_all_order_by('unit', 'unit_name', 'ASC');
        $this->load->view('masterfile/unit_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_unit(){
        $unit = trim($this->input->post('unit')," ");
        $data = array(
            'unit_name'=>$unit
        );
        if($this->super_model->insert_into("unit", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/masterfile/unit_list'; </script>";
        }
    }

    public function update_unit(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['unit'] = $this->super_model->select_row_where('unit', 'unit_id', $id);
        $this->load->view('masterfile/update_unit',$data);
        $this->load->view('template/footer');
    }

    public function edit_unit(){
        $data = array(
            'unit_name'=>$this->input->post('unit'),
        );
        $unit_id = $this->input->post('unit_id');
            if($this->super_model->update_where('unit', $data, 'unit_id', $unit_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_unit(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('unit', 'unit_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/masterfile/unit_list'; </script>";
        }
    }

    public function purpose_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['purpose']=$this->super_model->select_all_order_by('purpose', 'purpose_name', 'ASC');
        $this->load->view('masterfile/purpose_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_purpose(){
        $purpose = trim($this->input->post('purpose')," ");
        $data = array(
            'purpose_name'=>$purpose
        );
        if($this->super_model->insert_into("purpose", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/masterfile/purpose_list'; </script>";
        }
    }

    public function update_purpose(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['purpose'] = $this->super_model->select_row_where('purpose', 'purpose_id', $id);
        $this->load->view('masterfile/update_purpose',$data);
        $this->load->view('template/footer');
    }

    public function edit_purpose(){
        $data = array(
            'purpose_name'=>$this->input->post('purpose'),
        );
        $purpose_id = $this->input->post('purpose_id');
            if($this->super_model->update_where('purpose', $data, 'purpose_id', $purpose_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_purpose(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('purpose', 'purpose_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/masterfile/purpose_list'; </script>";
        }
    }

    public function enduse_list(){
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $data['enduse']=$this->super_model->select_all_order_by('enduse', 'enduse_name', 'ASC');
        $this->load->view('masterfile/enduse_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_enduse(){
        $enduse = trim($this->input->post('enduse')," ");
        $data = array(
            'enduse_name'=>$enduse
        );
        if($this->super_model->insert_into("enduse", $data)){
            echo "<script>alert('Successfully Added!'); window.location ='".base_url()."index.php/masterfile/enduse_list'; </script>";
        }
    }

    public function update_enduse(){
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['enduse'] = $this->super_model->select_row_where('enduse', 'enduse_id', $id);
        $this->load->view('masterfile/update_enduse',$data);
        $this->load->view('template/footer');
    }

    public function edit_enduse(){
        $data = array(
            'enduse_name'=>$this->input->post('enduse'),
        );
        $enduse_id = $this->input->post('enduse_id');
            if($this->super_model->update_where('enduse', $data, 'enduse_id', $enduse_id)){
            echo "<script>alert('Successfully Updated!'); window.opener.location.reload(); window.close();</script>";
        }
    }

    public function delete_enduse(){
        $id=$this->uri->segment(3);
        if($this->super_model->delete_where('enduse', 'enduse_id', $id)){
            echo "<script>alert('Succesfully Deleted'); 
                window.location ='".base_url()."index.php/masterfile/enduse_list'; </script>";
        }
    }

}

?>