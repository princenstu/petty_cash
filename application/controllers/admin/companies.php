<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Companies extends Base
{
    private $uploadedFile;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->model('company');

        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('thumb');

        $this->layout->setLayout('layout_admin');
    }

    public function index()
    {
        $this->data['companies'] = $this->company->getCompany();

        $this->layout->view('admin/companies/list',$this->data);

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
        $this->layout->view('admin/companies/add', $this->data);
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
        $this->data['company'] = $this->company->getById($id);
        $this->layout->view('admin/companies/edit', $this->data);
    }


    private function addValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Company Name', 'required');

    }
    private function saveData()
    {

        $data = $this->input->post();

        if (empty($data['company_id'])) {
            $data['create_by']= $this->session->userdata('user_id');
            $this->company->create($data);

            $this->session->set_userdata('success_message','Company Successfully Inserted.');

        } else {
            $data['update_by']= $this->session->userdata('user_id');
            $this->company->save($data,$data['company_id']);

            $this->session->set_userdata('success_message','Company Successfully Updated.');
        }

    }

    private function redirectToHome()
    {
        redirect('admin/companies');
    }
    public function remove($id)
    {
        $this->data['company'] = $this->company->delete($id);
        $this->session->set_userdata('success_message','Company Successfully Deleted.');
        $this->layout->view('admin/companies/list', $this->data);
        redirect('admin/companies');
    }


}
