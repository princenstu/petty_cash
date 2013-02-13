<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Base Controller
 *
 * Common tasks of all controllers are done here. Only inherit, no direct use please.
 *
 * @category Controller
 * @author   Emran Hasan <emran@rightbrainsolution.com>
 */
abstract class Base extends CI_Controller
{
    protected $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->prepareEnvironment();
    }

    protected function prepareEnvironment()
    {
        $this->load->library('Layout');
    }

    protected function _ensureLoggedIn()
    {
        if (!$this->session->userdata('username')) {
            redirect('user');
        }
    }

    public function lang(){
       if(! $this->session->userdata('language')){
            redirect('');
        }
    }

}