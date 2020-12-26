<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view("sendemail");
    }
    public function sendEmail()
    {
        $config = array(
            'protocol'=> 'smtp',
            'smtp_host'=> 'smtp.example.com',
            'smtp_port'=>587,
            'smtp_crypto' => 'tls',
            'smtp_user'=> "YOUR EMAIL ADDRESS",
            'smtp_pass'=> "PASSWORD",
            'charset'=>'utf-8',
            'mailtype'=>'text',
        );
        $from=$this->input->post("from");
        $msg=$this->input->post('msg');
        $to=$this->input->post('to');
        $subject=$this->input->post('subject');
        $this->load->library('email',$config);
        print_r($this->email->print_debugger());
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($msg);
        if($this->email->send()){
            $this->session->set_userdata("sucmsg","Mail has been sent...");
        }else{
            $this->session->set_userdata("errmsg","Something Wrong! Please try again ...");
        }
        redirect("EmailController");
    }
}

?>