<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class archives extends Base
{
    private $uploadedFile;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->model('cashmemo');
        $this->load->model('archive');
        $this->load->model('ion_auth_model');
        $this->load->helper('html');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->layout->setLayout('layout_admin');
    }

    public function index()
    {
        $this->data['cashmemoes'] = $this->archive->getArchive();
       //var_dump($this->data['cashmemoes']);die;
        $this->layout->view('admin/archives/list',$this->data);

    }
    public function getCashmemoById($id)
    {
        $this->data['cashmemoes'] = $this->cashmemo->getCashmemoById($id);

        $this->layout->view('admin/cashmemoes/detail',$this->data);

    }
    public function add()
    {       $id=$_POST['memo_id'];
        $this->saveData();
        $this->remove($id);
        $this->redirectToHome();
        $this->session->set_userdata('success_message','Data Successfully Inserted.');
        $this->layout->view('admin/cashmemoes/detail',$this->data);
    }

    private function saveData()
    {

        $data = $this->input->post();
//        var_dump($data);die;
        $data['create_date'] = date('Y-m-d H:i:s');
        $this->archive->create($data);

    }

    private function redirectToHome()
    {
        redirect('admin/archives');
    }
    public function remove($id)
    {
        $this->data['cashmemo'] = $this->archive->delete($id);

    }


    public function unarchive()
    {
        $data['memo_id'] = $this->uri->segment(4);
        $this->data['unarchive']=$this->archive->getUnarchive($data['memo_id']);
        //var_dump($data);die;
        $this->data['archives'] = $this->archive->save($this->data['unarchive'], $data['memo_id']);
        $this->redirectToHome();
    }


}