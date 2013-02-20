<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Cashmemoes extends Base
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library("pagination");

        $this->load->model('company');
        $this->load->model('cashmemo');
        $this->load->model('ion_auth_model');
        $this->load->model('project');

        $this->layout->setLayout('layout_admin');

    }

    public function index()

    {
//        $this->load->library('table');
//        $config = array();
//        $config["base_url"] = base_url() . "admin/cashmemoes/index";
//        $config["total_rows"] = $this->cashmemo->recordCount();
//        $config['use_page_numbers'] = TRUE;
//        $config["per_page"] = 10;
//        //$config["num_links"] = 20;
//         $config["uri_segment"] = 3;

//        $this->pagination->initialize($config);
        // $offset = ($this->uri->segment(3) == "") ? "0" : $this->uri->segment(3);

        // echo  $this->pagination->create_links();
//       $this->data["links"] = $this->pagination->create_links();
        //$this->data["products"] = $this->product->fetchRows($config["per_page"], $offset);

        $this->data['cashmemoes'] = $this->cashmemo->getCashmemo();
        $this->layout->view('admin/cashmemos/list',$this->data);
    }

    public function add()
    {
        var_dump($_POST);
        if (!empty($_POST)) {


            $this->addValidation();

            if ($this->form_validation->run()) {

                $this->saveData();
                $this->redirectToHome();

            }

        }
        $this->data['companies'] = $this->cashmemo->getCompany();
        $this->data['receives']=$this->ion_auth_model->getAllUser();
        $this->data['disburses']=$this->ion_auth_model->getDisburse();
        $this->data['projects']=$this->project->getProject();
        $this->layout->view('admin/cashmemos/add',$this->data);
    }

    public function edit($id)
    {
        if (!empty($_POST)) {

            $this->addValidation();

            if ($this->form_validation->run()) {


                $this->saveData();
                $this->redirectToHome();
            }

        }


        $this->data['recives']=$this->cashmemo->getRecive();
        $this->data['disburses']=$this->ion_auth_model->getDisburse();
        $this->data['cashMemoById']=$this->cashmemo->cashMemoById($id);
        $this->data['companies'] = $this->cashmemo->getCompany();
        $this->data['projects'] = $this->cashmemo->getProjectById();
        $this->layout->view('admin/cashmemos/edit', $this->data);
    }

    private function addValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('amount', 'Amount ', 'required');
        $this->form_validation->set_rules('amount_in_words', 'Amount words in', 'required');
        $this->form_validation->set_rules('purpose', 'Purpose text ', 'required');

    }
    private function saveData()
    {

        $data = $this->input->post();

        if (empty($data['memo_id'])) {
            $data['memo_no'] = $this->genRandomString();
            $data['create_by']= $this->session->userdata('user_id');

            $this->cashmemo->create($data);

            $this->session->set_userdata('success_message','Cash Memo Successfully Inserted.');

        } else {

            $data['update_by']= $this->session->userdata('user_id');
            $this->cashmemo->save($data,$data['memo_id']);

            $this->session->set_userdata('success_message','Cash Memo Successfully Updated.');
        }


    }

    private function redirectToHome()
    {
        redirect('admin/cashmemoes');
    }
    private function redirectToHomeprint()
    {
        redirect('admin/cashmemoes/detail');
    }

    function genRandomString()
    {
        $length = 11;
        $characters = md5(uniqid(rand(1, 12)));
        $string = "";

        for ($p = 0; $p < $length; $p++) {
            @$string .= $characters[mt_rand(0, strlen($characters))];
        }

        return $string;
    }
    public function detail($id)
    {
        $this->data['detailCashmemo'] = $this->cashmemo->detail($id);

        $this->layout->view('admin/cashmemos/detail', $this->data);
    }

    public function remove()
    {
        $data['memo_id'] = $this->uri->segment(4);
        $this->cashmemo->delete( $data['memo_id']);
        redirect('admin/cashmemoes');
    }

    public function savePrint()
    {
        $data = $this->input->post();

        if (empty($data['memo_id'])) {
            $data['memo_no'] = $this->genRandomString();
            $data['create_by']= $this->session->userdata('user_id');

            $this->cashmemo->create($data);

            $this->session->set_userdata('success_message','Cash Memo Successfully Inserted.');

        } else {
            $data['update_by']= $this->session->userdata('user_id');
            $this->company->save($data,$data['memo_id']);

            $this->session->set_userdata('success_message','Cash Memo Successfully Updated.');
        }
    }
    public function projectByid()
    {
        $project_id=$_POST['ag'];
        $projects_name=$this->cashmemo->projectNameById($project_id);

        foreach ($projects_name as $Project) {
            echo "<option value = $Project->project_id > $Project->name</option> ";
        }

    }
    public function cashMemoReport(){
        var_dump($_POST);die;
    }

}