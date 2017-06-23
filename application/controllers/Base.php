<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller
{

    public $client_id = '506970047434-u09rrkoa20fjebtoanubl3kfbmbo5l7g.apps.googleusercontent.com';

    public $service_account_name = 'adm-744@wise-coyote-171600.iam.gserviceaccount.com';

    public $key_filename = 'My_Project-4da87bf7ee30.p12';

    public $project_id = '414649711441';

    public function index()
    {
        $html = $this->load->view('welcome_message');
        $this->show($html, false);
    }

    public function categorias()
    {
        $data = array(
            'client_id' => $this->client_id,
            'service_account_name' => $this->service_account_name,
            'key_filename' => $this->key_filename,
            'project_id' => $this->project_id
        );
        $html = $this->load->view('categorizer', $data, true);
        $this->show($html, false);
    }

    public function sentimentos()
    {
        $data = array(
            'client_id' => $this->client_id,
            'service_account_name' => $this->service_account_name,
            'key_filename' => $this->key_filename,
'project_id' => $this->project_id
        );
        $html = $this->load->view('sentiment', $data, true);
        $this->show($html, false);
    }

    public function linguagem()
    {
        $data = array(
            'client_id' => $this->client_id,
            'service_account_name' => $this->service_account_name,
            'key_filename' => $this->key_filename,
'project_id' => $this->project_id
        );
        $html = $this->load->view('language', $data, true);
        $this->show($html, false);
    }

    function show($content)
    {
        $html = $this->load->view('header', null, true);
        $html .= $content;
        $html .= $this->load->view('footer', null, true);
        echo $html;
    }
}
