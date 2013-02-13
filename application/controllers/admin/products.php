<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Products extends Base
{
    private $uploadedFile;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");

        $this->load->model('product');

        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->helper('thumb');

        $this->layout->setLayout('layout_admin');
    }

    public function index()

    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            redirect($this->config->item('base_url'), 'refresh');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        }

        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "admin/products";
        $config["total_rows"] = $this->product->recordCount();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $offset = ($this->uri->segment(3) == "") ? "0" : $this->uri->segment(3);

        $this->data["links"] = $this->pagination->create_links();
        $this->data["products"] = $this->product->fetchRows($config["per_page"], $offset);

        $this->layout->view('admin/products/list', $this->data);
    }

    public function add()
    {
        if (!empty($_POST)) {

            $this->addValidation();

            if ($this->form_validation->run()) {
                $this->handleUpload();
                $this->saveData();
                $this->redirectToHome();
            }
        }

        $this->data['categories'] = $this->product->getCategory();
        $this->layout->view('admin/products/add', $this->data);
    }

    public function edit($id)
    {
        if (!empty($_POST)) {

            $this->addValidation();

            if ($this->form_validation->run()) {
                $this->handleUpload();
                $this->saveData();
                $this->redirectToHome();
            }
        }
        $this->data['categories'] = $this->product->getCategory();
        $this->data['product'] = $this->product->getById($id);
        $this->data['productLang'] = $this->product->getLangByID($id);

        $this->layout->view('admin/products/edit', $this->data);
    }

    private function addValidation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Product Title', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('title_de', 'Product Title', 'required');
        $this->form_validation->set_rules('description_de', 'Product Description', 'required');
        $this->form_validation->set_rules('class', 'Class', 'required');
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('category_id', 'category', 'required');
        $this->form_validation->set_rules('price_increment', 'price Increment','required');
        $this->form_validation->set_rules('price_1', 'Price day one','required');
        $this->form_validation->set_rules('price_2', 'Price day two','required');
        $this->form_validation->set_rules('price_3', 'Price day three','required');
        $this->form_validation->set_rules('price_4', 'Price day four','required');
        $this->form_validation->set_rules('price_5', 'Price day five','required');
        $this->form_validation->set_rules('price_6', 'Price day six','required');
        $this->form_validation->set_rules('price_7', 'Price day seven','required');
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

    private function saveData()
    {

        $data = $this->input->post();

        if (!empty($this->uploadedFile)) {
            $data['image'] = $this->uploadedFile['file_name'];
        }

        if (empty($data['product_id'])) {


            $this->product->create($data);

            $this->session->set_userdata('success_message','Product Successfully Inserted.');

        } else {

            $this->product->save($data,$data['product_id']);

            $this->session->set_userdata('success_message','Product Successfully Updated.');
        }

    }

    private function redirectToHome()
    {
        redirect('admin/products');
    }

    public function remove()
    {
        $data['product_id'] = $this->uri->segment(4);
        $data['status'] = "deleted";
        $this->product->delete($data, $data['product_id']);
        redirect('admin/products');
    }
    public function getCategory()
{
    $this->data['categories'] = $this->product->getCategory();
}

}