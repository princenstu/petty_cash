<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!class_exists('Controller')) {
    class Controller extends CI_Controller
    {
    }
}
class Auth extends Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->library('layout', 'layout_main');
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->database();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('ion_auth_model');
    }

    function index()
    {

        if (!$this->ion_auth->logged_in()) {

            redirect('auth/login', 'refresh');

        } elseif (!$this->ion_auth->is_admin()) {


            redirect('/admin', 'refresh');


        } else {

            $this->user_info();
        }
    }

    public function user_info()
    {
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['users'] = $this->ion_auth->get_users_array();
        $this->load->view('auth/user_info', $this->data);
    }

    function login()
    {
        $this->data['title'] = "Login";

        if ($this->ion_auth->logged_in()) {

            redirect('/admin', 'refresh');
        }

        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember)) {

                $this->session->set_flashdata('message', $this->ion_auth->messages());

                    if( $this->session->userdata('group') == 'members'){

                        $this->data['message'] = "You don't have permission to access this page";
                        $this->session->sess_destroy();
                        redirect('/', 'refresh');
                    }
                redirect('/admin', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/login', 'refresh');
            }
        } else {

            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->load->view('auth/login', $this->data);

        }
    }

    public function member_login()
    {
        $identity = $this->input->post('email');
        $password = $this->input->post('password');

        if(empty($identity) or (empty($password))){
            $response_array['status'] = 'blank';
            $response_array['message'] = 'Email and password required';
            echo json_encode($response_array);
            exit;
        }

        if (!$this->ion_auth->email_check($identity)) {
            $response_array['status'] = 'error';
            $response_array['message'] = $this->lang->line('wrong_email');
            echo json_encode($response_array);
            exit;
        }

        if ($this->ion_auth->login($identity, $password)) {

            $this->data['users'] = $this->ion_auth->get_users_array();
            $person = $this->ion_auth->getMemberInfo($identity);

            $newPersons = array(0 => $person[0]);

            foreach ($_SESSION['persons'] as $existingPersons) {
                if (!empty($existingPersons['first_name'])) {
                    array_push($newPersons, $existingPersons);
                }
            }

            $_SESSION['persons'] = $newPersons;
            $_SESSION['person_index'] = 0;

            $_SESSION['members'] = "1";

            $response_array['status'] = 'success';
            $response_array['message'] = $_SESSION['persons'];

            echo json_encode($response_array);
        }
    }

    public function member_logout()
    {
        $this->ion_auth->logout();
        redirect('/home/index/new');
    }

    function logout()
    {
        $this->data['title'] = "Logout";

        $logout = $this->ion_auth->logout();

        redirect('auth', 'refresh');
    }

    function change_password()
    {
        $this->form_validation->set_rules('old', 'Old password', 'required');
        $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $user = $this->ion_auth->get_user($this->session->userdata('user_id'));

        if ($this->form_validation->run() == false) {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['old_password'] = array('name' => 'old',
                'id' => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array('name' => 'new',
                'id' => 'new',
                'type' => 'password',
            );
            $this->data['new_password_confirm'] = array('name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
            );
            $this->data['user_id'] = array('name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            $this->load->view('auth/change_password', $this->data);
        } else {
            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/change_password', 'refresh');
            }
        }
    }

    function forgot_password()
    {
        $identity = $this->config->item('identity', 'ion_auth');
        $identity_human = ucwords(str_replace('_', ' ', $identity));
        $this->form_validation->set_rules($identity, $identity_human, 'required');
        if ($this->form_validation->run() == false) {
            $this->data[$identity] = array('name' => $identity,
                'id' => $identity,
            );
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['identity'] = $identity;
            $this->data['identity_human'] = $identity_human;
            $this->load->view('auth/forgot_password', $this->data);
        } else {
            $forgotten = $this->ion_auth->forgotten_password($this->input->post($identity));

            if ($forgotten) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('auth/login', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/forgot_password', 'refresh');
            }
        }
    }

    public function reset_password($code)
    {
        $reset = $this->ion_auth->forgotten_password_complete($code);

        if ($reset) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('auth/login', 'refresh');
        } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/forgot_password', 'refresh');
        }
    }

    function activate($id, $code = false)
    {
        if ($code !== false)
            $activation = $this->ion_auth->activate($id, $code);
        else if ($this->ion_auth->is_admin())
            $activation = $this->ion_auth->activate($id);
        else if ($this->ion_auth->is_group())
            $activation = $this->ion_auth->activate($id);


        if ($activation) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('auth', 'refresh');
        } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/forgot_password', 'refresh');
        }
    }

    function deactivate($id = NULL)
    {
        $id = (int)$id;

        $this->form_validation->set_rules('confirm', 'confirmation', 'required');
        $this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

        if ($this->form_validation->run() == FALSE) {
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->get_user_array($id);
            $this->load->view('auth/deactivate_user', $this->data);
        } else {
            if ($this->input->post('confirm') == 'yes') {
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_404();
                }
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            redirect('auth', 'refresh');
        }
    }

    function create_user()
    {
        $this->location = new Locations();

        $this->data['locations'] = $this->location->getLocation();
        $this->data['groups'] = $this->ion_auth_model->getAllGroup();


        $this->data['title'] = "Create User";

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {

            redirect('auth', 'refresh');
        }

        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');


        if ($this->form_validation->run() == true) {

            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));

            $password = $this->input->post('password');
            $email = $this->input->post('email');


            $additional_data = array('first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'group_id' => $this->input->post('group'),
                'location_id' => $this->input->post('location')
            );

            if ($this->ion_auth->email_check($email)) {

                $this->load->view('auth/create_user', $this->data);
            }

        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {

            $this->session->set_flashdata('success_msg', "User Successfully Created .");

            redirect('auth/user_info', 'refresh');
        } else {

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->set_flashdata('success_msg')));

            $this->data['first_name'] = array('name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array('name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array('name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $this->load->view('auth/create_user', $this->data);
        }

    }

    function update_user($id)

    {
        $this->location = new Locations();

        $this->data['locations'] = $this->location->getLocation();
        $this->data['groups'] = $this->ion_auth_model->getAllGroup();
        $this->data['users'] = $this->ion_auth->get_user($id);
        $this->data['title'] = "Update User";
        $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');


        if ($this->form_validation->run() == true) {

            $this->data = $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));

            $this->data = $password = $this->input->post('password');
            $this->data = $email = $this->input->post('email');
            $this->data = $additional_data = array('first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'group_id' => $this->input->post('group'),
                'email' => $this->input->post('email'),
                'location_id' => $this->input->post('location')

            );


        }


        if ($this->form_validation->run() == true && $this->ion_auth->update_user($id, $this->data)) {

            $this->session->set_flashdata('success_msg', "User Successfully Updated .");

            redirect('auth/user_info', 'refresh');
        } else {

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->set_flashdata('success_msg')));

            $this->data['first_name'] = array('name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array('name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array('name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $this->load->view('auth/update_user', $this->data);
        }
    }

    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')
        ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function remove()
    {
        $data['user_id'] = $this->uri->segment(3);
        $this->ion_auth->delete_user($data['user_id']);
        $this->session->set_flashdata('success_msg', "User Successfully Deleted .");
        redirect('auth/user_info', 'refresh');
    }

//user login front end
    public function my_front_end_login()
    {
        if ($this->form_validation->run('login_frontend')) // uses config/form_validation.php
        {

            if (ION_Auth::login($identity, $password)) // Im not familiar with it
            {
                //login success
            } else {
                //login failure
            }
        } else {
            $this->index();
        }
    }


}
