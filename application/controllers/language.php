<?php

class Language extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('language_model');
    }

    function switchLang($laguage)
    {

        if ($laguage) {

            $this->session->set_userdata('language', $laguage);
            $this->load->model('language_model');
            $this->language_model->language_access($laguage);
            echo json_encode(array('status' => 'success', 'message' => 'success'));
        }
    }

}