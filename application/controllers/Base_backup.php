<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller
{

    public function index()
    {
        $html = $this->load->view('welcome_message', '', true);
       return $this->show($html);

    }

    public function category()
    {
        $hosted_model_id = 'sample.tagger';
		$text_input = 'How about meeting up later?';
        $result = $this->call_google_predict($text_input, $hosted_model_id);
        $data['result'] = $result;
        $html = $this->load->view('categorizer_view', $data, true);
        $this->show($html);
    }

    public function sentiment()
    {
        $hosted_model_id = 'sample.sentiment';
		$text_input = 'How about meeting up later?';
        $result = $this->call_google_predict($text_input, $hosted_model_id);
        $data['result'] = $result;
        $html = $this->load->view('sentiment_view', $data, true);
        $this->show($html);
    }

    public function language()
    {
        $hosted_model_id = 'sample.languageid';
		$text_input = 'How about meeting up later?';
        $result = $this->call_google_predict($text_input, $hosted_model_id);
        $data['result'] = $result;
        $html = $this->load->view('language_view', $data, true);
        $this->show($html);
    }

    public function recebe()
    {


    }

    function show($content)
    {
        $html = $this->load->view('header', null, true);
        $html .= $content;
        $html .= $this->load->view('footer', null, true);
        echo $html;
    }

    public function call_google_predict($text_input, $hosted_model_id)
    {

        $client_id = $this->config->item('client_id');
        $service_account_name = $this->config->item('service_account_name');
        $key_filename = $this->config->item('key_filename');
        $project_id = $this->config->item('project_id');
        $client = new Google_Client();
        $client->setApplicationName("Google Prediction");
        $key = file_get_contents($key_filename);
        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials($service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));
        $client->setClientId($client_id);

// Create Prediction Service

        $service = new Google_Service_Prediction($client);
        $input_input = new Google_Service_Prediction_InputInput();
        $input_input->setCsvInstance(array($text_input));
        $input = new Google_Service_Prediction_Input();
        $input->setInput($input_input);

// additional options

        $options = array();
        $result = $service->hostedmodels->predict($project_id, $hosted_model_id, $input, $options);

        return $result;
    }
}
