<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/base.php';

class Home extends Base
{
    private $saferpayID;

    public function __construct()
    {
        parent::__construct();

        $this->load->config("app");
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('affiliate');

        $this->load->helper('url');
        $this->load->helper('http');
        $this->load->helper('thumb');
        $this->load->helper('form_validation_helper');

        $this->layout->setLayout('layout_main');
        $this->initiateSession();
    }


    public function index()
    {

    }

    private function isValid($person)
    {
        $requiredFields = array('title', 'first_name', 'last_name', 'date_start', 'date_end', 'products');
        $valid = true;

        foreach ($requiredFields as $requiredField) {
            if (empty($person[$requiredField])) {
                $valid = false;
                break;
            }
        }

        return $valid;
    }

    private function sendEmail($email, $subject, $message, $attachment = null, $cc = null)
    {
        $this->load->library('email');

        $this->email->from('info@skiservice-corvatsch.com', 'Skiservice Corvatsch Rent');
        $this->email->to($email);

        if (!empty($cc)) {
            $this->email->cc($cc);
        }

        $this->email->subject($subject);
        $this->email->message($message);

        if (!empty($attachment)) {
            $this->email->attach($attachment);
        }

        $this->email->send();
    }

    public function sendRegistrationEmail()
    {
        $email = $_SESSION['billing']['login_email'];

        $subject = "Welcome to Skiservice Corvatsch Rent";

        $message = <<<MAIL
Thank you for registration with Skiservice Corvatsch. Please use this information for future login:

Email: {$email}
Password: {$_SESSION['billing']['password']}

We are looking forward to welcoming you in our shop. Please let us know if you have any wishes or if your need further assistance. It will be our pleasure to be there for you to make your skiing and snowboarding experience unforgettable.

Skiservice Corvatsch – comfortable and modern skiing at its best.
MAIL;

        //$attachment = $_SERVER['DOCUMENT_ROOT'] . "/order/$orderId" . ".pdf";

        $this->sendEmail($email, $subject, $message);
    }

    public function createPdf($orderId)
    {
        $this->load->library('invoice');

        $order = $this->order->detail($orderId);
        $rentals = $this->order->rentalDetail($orderId);

        $file = $_SERVER['DOCUMENT_ROOT'] . "/order/$orderId.pdf";
        $template = $_SERVER['DOCUMENT_ROOT'] . "/assets/invoice.pdf";

        $this->invoice->loadTemplate($template);
        $this->invoice->setData($order, $rentals);
        $this->invoice->generate();
        $this->invoice->save($file);
    }

    public function registerUser($user_email,$password)
    {

        $additional_data = $_SESSION['persons'];
        $group_name      = 'member';

        if (!$this->ion_auth->email_check($user_email)) {
            unset($_SESSION['registration_error']);
            $this->ion_auth->member_register($user_email, $password, $username = false, $additional_data, $group_name);
            $this->sendRegistrationEmail();
            return true;
        } else {
            $_SESSION['registration_error'] = "Email already exists, please use another email.";
            redirect('/step4');
        }

    }

}