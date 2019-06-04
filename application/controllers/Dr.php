<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dr extends CI_Controller {

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

    public function add_dr(){   

            $head_rows = $this->super_model->count_rows("dr_head");
            if($head_rows==0){
                $dr_id=1;
                $dr_no = 1000;
            } else {
                $maxid=$this->super_model->get_max("dr_head", "dr_id");
                $maxno=$this->super_model->get_max("dr_head", "dr_no");
                $dr_id=$maxid+1;
                $dr_no = $maxno + 1;
            }

          $drhead = array(
                'dr_id'=>$dr_id,
                'dr_no'=>$dr_no,
                'direct_purchase'=>1,
                'create_date'=>$this->input->post('dr_date')
            );
            if($this->super_model->insert_into("dr_head", $drhead)){
                 redirect(base_url().'dr/dr_prnt/'.$dr_id);
            }

    }

    


    public function dr_list(){   
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('dr/dr_list');
        $this->load->view('template/footer');
    }

    public function dr_prnt(){   
        $dr_id=$this->uri->segment(3);
        $data['dr_id']=$dr_id;
        $data['head'] =  $this->super_model->select_row_where('dr_head', 'dr_id', $dr_id);
        $this->load->view('template/header');
        $this->load->view('dr/dr_prnt',$data);
        $this->load->view('template/footer');
    }

    public function additemdr(){   
        $this->load->view('template/header');
        $this->load->view('dr/additemdr');
        $this->load->view('template/footer');
    }

}

?>