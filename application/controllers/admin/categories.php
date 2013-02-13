<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    include_once __DIR__ . '/../base.php';

class Categories extends Base
{
    private $uploadedFile;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");

        $this->load->helper('url');
        $this->load->helper('thumb');

        $this->load->model('category');

        $this->layout->setLayout('layout_admin');
    }

    public function index()
    {
       $this->data['categories'] = $this->category->getCategory();

        $this->layout->view('admin/categories/list',$this->data);

    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->addValidation();
            $this->handleUpload();
            if ($this->form_validation->run()) {

                $this->saveData();
                $this->redirectToHome();
            }
        }
        $this->layout->view('admin/categories/add', $this->data);
    }

    private function handleUpload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1024';
        $config['encrypt_name']	= true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

            $this->uploadedFile = $this->upload->data();

        }
    }

    public function edit($id)
    {
        if (!empty($_POST)) {

            $this->addValidation();
            $this->handleUpload();
            if ($this->form_validation->run()) {
                $this->saveData();
                $this->redirectToHome();
            }
        }
        $this->data['categories'] = $this->category->getCategory();

        $this->data['category'] = $this->category->getById($id);
        $this->data['category_de'] = $this->category->getByLang($id);

        $this->layout->view('admin/categories/edit', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('name', 'Category', 'required');

    }


    private function saveData()
    {

        $data = $this->input->post();

        if (!empty($this->uploadedFile)) {
            $data['image'] = $this->uploadedFile['file_name'];
        }

        if (empty($data['category_id'])) {

            $this->category->create($data);

            $this->session->set_userdata('success_message','Category Successfully Inserted.');
        } else {
            $this->category->save($data, $data['category_id']);

            $this->session->set_userdata('success_message','Category Successfully Updated.');
        }

    }


    private function redirectToHome()
    {
        redirect('admin/categories');
    }

    public function remove($id)
    {
        $this->data['category'] = $this->category->delete($id);
        $this->session->set_userdata('success_message','Category Successfully Deleted.');
        $this->layout->view('admin/categories/list', $this->data);
        redirect('admin/categories');
    }

    public function getCategory()
    {
        $this->data['categories'] = $this->product->getCategory();
    }

}