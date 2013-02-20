<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Cash_memos extends Base
{
    private $uploadedFile;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->model('cash_memo');
        $this->load->model('company');
        $this->load->model('project');
        $this->load->model('ion_auth_model');

        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('thumb');

        $this->layout->setLayout('layout_admin');
    }

    public function index()
    {
        $this->data['cashmemoes'] = $this->cash_memo->getCashmemo();
        $this->layout->view('admin/cash_memo/list',$this->data);

    }


    public function getCashmemoById($id)
    {
        $this->data['cashmemoes'] = $this->cash_memo->getCashmemoById($id);

        $this->layout->view('admin/cash_memo/detail',$this->data);

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
        $this->data['companies'] = $this->cash_memo->getCompany();
        $this->data['receives']=$this->ion_auth_model->getAllUser();
        $this->data['disburses']=$this->ion_auth_model->getDisburse();
        $this->data['projects']=$this->project->getProject();
        $this->layout->view('admin/cash_memo/add2',$this->data);
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


        $this->data['recives']=$this->cash_memo->getRecive();
        $this->data['disburses']=$this->ion_auth_model->getDisburse();
        $this->data['cashMemoById']=$this->cash_memo->cashMemoById($id);
        $this->data['companies'] = $this->cash_memo->getCompany();
        $this->data['projects'] = $this->cash_memo->getProjectById();
        $this->layout->view('admin/cash_memo/edit', $this->data);
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

            $this->cash_memo->create($data);

            $this->session->set_userdata('success_message','Cash Memo Successfully Inserted.');

        } else {

            $data['update_by']= $this->session->userdata('user_id');
            $this->cash_memo->save($data,$data['memo_id']);

            $this->session->set_userdata('success_message','Cash Memo Successfully Updated.');
        }


    }

    private function redirectToHome()
    {
        redirect('admin/cash_memos');
    }

    private function redirectToHomeprint()
    {
        redirect('admin/cash_memos/detail');
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
        $this->data['detailCashmemo'] = $this->cash_memo->detail($id);

        $this->layout->view('admin/cash_memo/detail', $this->data);
    }

    public function remove()
    {
        $data['memo_id'] = $this->uri->segment(4);
        $this->cash_memo->delete( $data['memo_id']);
        redirect('admin/cash_memos');
    }


    public function projectByid()
    {
        $project_id=$_POST['ag'];
        $projects_name=$this->cash_memo->projectNameById($project_id);

        foreach ($projects_name as $Project) {
            echo "<option value = $Project->project_id > $Project->name</option> ";
        }

    }
    public function cashMemoReport(){
        var_dump($_POST);die;
    }


}