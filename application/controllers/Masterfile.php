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
        $this->load->view('masterfile/login');
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

        $this->load->view('masterfile/dashboard',$data);
        $this->load->view('template/footer');
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