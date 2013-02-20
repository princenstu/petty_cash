<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Projects extends Base
{
    private $uploadedFile;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->model('project');

        $this->load->helper('language');
        $this->load->helper('url');
        $this->layout->setLayout('layout_admin');
    }

    public function index()
    {
        $this->data['projects'] = $this->project->getProject();

        $this->layout->view('admin/projects/list',$this->data);

    }
    public function add()
    {
        if (!empty($_POST)) {

            $this->addValidation();

            if ($this->form_validation->run()) {
                $this->saveData();
                $this->redirectToHome();
            }
        }
        $this->data['companies'] = $this->project->getCompany();
        $this->layout->view('admin/projects/add', $this->data);
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
        $this->data['companies'] = $this->project->getCompany();
        $this->data['project'] = $this->project->getById($id);
        $this->layout->view('admin/projects/edit', $this->data);
    }


    private function addValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Project Name', 'required');

    }
    private function saveData()
    {

        $data = $this->input->post();

        if (empty($data['project_id'])) {
            $data['create_date'] = date('Y-m-d H:i:s');
            $data['create_by']= $this->session->userdata('user_id');
            $this->project->create($data);

            $this->session->set_userdata('success_message','Project Successfully Inserted.');

        } else {
            $data['update_date'] = date('Y-m-d H:i:s');
            $data['update_by']= $this->session->userdata('user_id');
            $this->project->save($data,$data['project_id']);

            $this->session->set_userdata('success_message','Project Successfully Updated.');
        }

    }

    private function redirectToHome()
    {
        redirect('admin/projects');
    }
    public function remove($id)
    {
        $this->data['project'] = $this->project->delete($id);
        $this->session->set_userdata('success_message','Project Successfully Deleted.');
        //$this->layout->view('admin/projects/list', $this->data);
        redirect('admin/projects');
    }


}