<?php
/**
 * Created by PhpStorm.
 * User: Dominus
 * Date: 18/06/2017
 * Time: 01:57
 */

class Sentiment extends CI_Controller {

public $client_id = '506970047434-u09rrkoa20fjebtoanubl3kfbmbo5l7g.apps.googleusercontent.com';
    public $service_account_name = 'adm-744@wise-coyote-171600.iam.gserviceaccount.com';
    public $key_filename = 'My_Project-4da87bf7ee30.p12';
    public $project_id = '414649711441';
	public $hosted_model_id = 'sample.sentiment';

	public function index()
	{



// Create Google Client

$client = new Google_Client();
$client->setApplicationName("Google Prediction");

$key = file_get_contents($this->key_filename);

$client->setAssertionCredentials(new Google_Auth_AssertionCredentials($this->service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));

$client->setClientId($this->client_id);

// Create Prediction Service

$service = new Google_Service_Prediction($client);

//var_dump($_POST);

$text_input = 'you mad';

$input_input = new Google_Service_Prediction_InputInput();

$input_input->setCsvInstance(array($text_input));

$input = new Google_Service_Prediction_Input();

$input->setInput($input_input);

// additional options

$options = array();

$result = $service->hostedmodels->predict($this->project_id, $this->hosted_model_id, $input, $options);

// print the object result

// print_r($result);

  $data['result'] = $result;
  
  $this->load->view('header');

 $this->load->view('sentiment_view', $data);
  
  $this->load->view('footer');
  
	}
}
