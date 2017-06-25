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
        $result = $this->hosted_model_predict($text_input, $hosted_model_id);
        $data['result'] = $result;
        $html = $this->load->view('categorizer_view', $data, true);
        $this->show($html);
    }

    public function sentiment()
    {
        $hosted_model_id = 'sample.sentiment';
        $text_input = 'How about meeting up later?';
        $result = $this->hosted_model_predict($text_input, $hosted_model_id);
        $data['result'] = $result;
        $html = $this->load->view('sentiment_view', $data, true);
        $this->show($html);
    }

    public function language()
    {
        $hosted_model_id = 'sample.languageid';
        $text_input = 'How about meeting up later?';
        $result = $this->hosted_model_predict($text_input, $hosted_model_id);
        $data['result'] = $result;
        $html = $this->load->view('language_view', $data, true);
        $this->show($html);
    }

    public function coyote_upload()
    {
		$training_model_id = 'wise-coyote-model';
        $training_result = $this->call_google_storage($training_model_id);
        $data['training_result'] = $training_result;
        $html = $this->load->view('coyote_upload_view', $data, true);
        $this->show($html);
    }

    public function coyote_status()
    {
        $trained_model_id = 'wise-coyote-model';
        $status = $this->trained_model_status($trained_model_id);
        $data['status'] = $status;
        $html = $this->load->view('coyote_status_view', $data, true);
        $this->show($html);
    }

    public function coyote_predict()
    {
        $trained_model_id = 'wise-coyote-model';
        $text_input = 'How about meeting up later?';
        $result = $this->trained_model_predict($text_input, $trained_model_id);
        $data['result'] = $result;
        $html = $this->load->view('coyote_trained_view', $data, true);
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

    public function call_google_storage($training_model_id)
    {

        $client_id = $this->config->item('client_id');
        $key_filename = $this->config->item('key_filename');
        $project_id = $this->config->item('project_id');
        $service_account_name = $this->config->item('service_account_name');
        $bucket_name = $this->config->item('bucket_name');
        $store_file_name = $this->config->item('store_file_name');
        $local_file = $this->config->item('local_file');

        $client = new Google_Client();
        $client->setApplicationName("Storage and Google Prediction");
        $key = file_get_contents($key_filename);

        $client->setClientId($client_id);
        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
            $service_account_name, array(
            'https://www.googleapis.com/auth/prediction',
            'https://www.googleapis.com/auth/devstorage.read_write'), $key));

        $storage = new Google_Service_Storage($client);

// https://developers.google.com/storage/docs/json_api/v1/buckets/insert
        $storage_object = new Google_Service_Storage_StorageObject();
        $storage_object->setBucket($bucket_name);
        $storage_object->setName($store_file_name);

        $store_options = array(
            'data' => file_get_contents($local_file),
            'mimeType' => 'text/plain',
            'uploadType' => 'media'
        );

        echo "Uploading model... ";

        $store_response = $storage->objects->insert($bucket_name, $storage_object, $store_options);

        echo "Done\n";

        echo "Training model... ";

        $prediction = new Google_Service_Prediction($client);

        $insert = new Google_Service_Prediction_Insert();
        $insert->setId($training_model_id);
        $insert->setStorageDataLocation($bucket_name . '/' . $store_file_name);

        $training_options = array();
        $training_result = $prediction->trainedmodels->insert($project_id, $insert, $training_options);

        return $training_result;
		
    }
	
	 public function trained_model_status($trained_model_id)
	 {
	$client_id = $this->config->item('client_id');
        $key_filename = $this->config->item('key_filename');
        $project_id = $this->config->item('project_id');
        $service_account_name = $this->config->item('service_account_name');
		
	// Create Google Client
$client = new Google_Client();
$client->setApplicationName("Google Prediction");

$key = file_get_contents($key_filename);

$client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
    $service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));
	
$client->setClientId($client_id);

// Create Prediction Service
$service = new Google_Service_Prediction($client);

// additional options
$options = array(); 

// print the object result/status


$status = $service->trainedmodels->get($project_id, $trained_model_id, $options);

//print_r($status);

return $status;
	 }

    public function trained_model_predict($text_input, $trained_model_id)
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
        $service = new Google_Service_Prediction($client);

        $input_input = new Google_Service_Prediction_InputInput();
        $input_input->setCsvInstance(array($text_input));

        $input = new Google_Service_Prediction_Input();
        $input->setInput($input_input);

        $options = array();
        $result = $service->trainedmodels->predict($project_id, $trained_model_id, $input, $options);

        return $result;
    }

    public function hosted_model_predict($text_input, $hosted_model_id)
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

        $service = new Google_Service_Prediction($client);
        $input_input = new Google_Service_Prediction_InputInput();
        $input_input->setCsvInstance(array($text_input));
        $input = new Google_Service_Prediction_Input();
        $input->setInput($input_input);

        $options = array();
        $result = $service->hostedmodels->predict($project_id, $hosted_model_id, $input, $options);

        return $result;
    }
}
