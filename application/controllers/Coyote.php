<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coyote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->client_id = $this->config->item('client_id');
        $this->service_account_name = $this->config->item('service_account_name');
        $this->key_filename = $this->config->item('key_filename');
        $this->project_id = $this->config->item('project_id');
		$this->sample_id = $this->config->item('sample_id');
        $this->bucket_name = $this->config->item('bucket_name');
        $this->store_file_name = 'alimentos_id';
        $this->local_file = 'alimentos_id.txt';
    }


    public function index()
    {
        $html = $this->load->view('menu_view', '', true);
		$html .= $this->load->view('form_view', '', true);
        return $this->show($html);

    }

    public function coyote_upload()
    {
        $training_model_id = 'wise-coyote-model';
        $training_result = $this->call_google_storage($training_model_id);
        $data['training_result'] = $training_result;
        $html = $this->load->view('coyote_upload_view', $data, true);
		$html .= $this->load->view('form_view', $data, true);
        return $this->show($html);
    }

    public function coyote_status()
    {
        $trained_model_id = 'wise-coyote-model';
        $status = $this->trained_model_status($trained_model_id);
        $data['status'] = $status;
	
        $html = $this->load->view('coyote_status_view', $data, true);
        return $this->show($html);
    }

    public function coyote_predict()
    {
		
		$text_input = trim($_POST['pesquisa']);
        $trained_model_id = 'wise-coyote-model';
       
        $result = $this->trained_model_predict($text_input, $trained_model_id);
        $data['result'] = $result;
		$data['action'] = 'coyote_predict';
        $html = $this->load->view('coyote_trained_view', $data, true);
		$html .= $this->load->view('form_view', $data, true);
        return $this->show($html);
    }

    public function recebe()
    {

var_dump($_POST);

    }

    function show($content)
    {
        $html = $this->load->view('header', null, true);
        $html .= $content;
        $html .= $this->load->view('footer', null, true);
        echo $html;
    }

    public function call_google_storage($training_model_id)
    {
        $client = new Google_Client();
        $client->setApplicationName("Storage and Google Prediction");
        $key = file_get_contents($this->key_filename);
        $client->setClientId($this->client_id);
        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
            $this->service_account_name, array(
            'https://www.googleapis.com/auth/prediction',
            'https://www.googleapis.com/auth/devstorage.read_write'), $key));

        $storage = new Google_Service_Storage($client);

// https://developers.google.com/storage/docs/json_api/v1/buckets/insert
        $storage_object = new Google_Service_Storage_StorageObject();
        $storage_object->setBucket($this->bucket_name);
        $storage_object->setName($this->store_file_name);

        $store_options = array(
            'data' => file_get_contents($this->local_file),
            'mimeType' => 'text/plain',
            'uploadType' => 'media'
        );

        echo "Uploading model... ";

        $store_response = $storage->objects->insert($this->bucket_name, $storage_object, $store_options);

        echo "Done\n";

        echo "Training model... ";

        $prediction = new Google_Service_Prediction($client);

        $insert = new Google_Service_Prediction_Insert();
        $insert->setId($training_model_id);
        $insert->setStorageDataLocation($this->bucket_name . '/' . $this->store_file_name);

        $training_options = array();
        $training_result = $prediction->trainedmodels->insert($this->project_id, $insert, $training_options);

        return $training_result;

    }

    public function trained_model_status($trained_model_id)
    {

        $client = new Google_Client();
        $client->setApplicationName("Google Prediction");

        $key = file_get_contents($this->key_filename);

        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
            $this->service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));

        $client->setClientId($this->client_id);

        $service = new Google_Service_Prediction($client);

        $options = array();

        $status = $service->trainedmodels->get($this->project_id, $trained_model_id, $options);

        return $status;
    }

    public function trained_model_predict($text_input, $trained_model_id)
    {

        $client = new Google_Client();
        $client->setApplicationName("Google Prediction");
        $key = file_get_contents($this->key_filename);
        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials($this->service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));
        $client->setClientId($this->client_id);
        $service = new Google_Service_Prediction($client);

        $input_input = new Google_Service_Prediction_InputInput();
        $input_input->setCsvInstance(array($text_input));

        $input = new Google_Service_Prediction_Input();
        $input->setInput($input_input);

        $options = array();
        $result = $service->trainedmodels->predict($this->project_id, $trained_model_id, $input, $options);

        return $result;
    }

    public function hosted_model_predict($text_input, $hosted_model_id)
    {

        $client = new Google_Client();
        $client->setApplicationName("Google Prediction");
        $key = file_get_contents($this->key_filename);
        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials($this->service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));
        $client->setClientId($this->client_id);

        $service = new Google_Service_Prediction($client);
        $input_input = new Google_Service_Prediction_InputInput();
        $input_input->setCsvInstance(array($text_input));
        $input = new Google_Service_Prediction_Input();
        $input->setInput($input_input);

        $options = array();
        $result = $service->hostedmodels->predict($this->sample_id, $hosted_model_id, $input, $options);

        return $result;
    }
}