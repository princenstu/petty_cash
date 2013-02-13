<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Dashboard extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('session');

        $this->layout->setLayout('layout_admin');
        $this->load->helper('url');

    }

    public function index()
    {
        $group = $this->session->userdata('group');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_group($group))
        {
            redirect('/admin', 'refresh');

        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['users'] = $this->ion_auth->get_users_array();
        }

            $this->layout->view('admin/dashboard', $this->data);

    }
}