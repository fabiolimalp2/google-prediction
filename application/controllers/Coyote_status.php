<?php
/**
 * Created by PhpStorm.
 * User: Dominus
 * Date: 18/06/2017
 * Time: 01:57
 */

class Coyote_status extends CI_Controller {

    public $client_id = '506970047434-u09rrkoa20fjebtoanubl3kfbmbo5l7g.apps.googleusercontent.com';
    public $service_account_name = 'adm-744@wise-coyote-171600.iam.gserviceaccount.com';
    public $key_filename = 'My_Project-4da87bf7ee30.p12';
    public $project_id = 'wise-coyote-171600';
	public $trained_model_id = 'wise-coyote-model';

	public function index()
	{


// Create Google Client
$client = new Google_Client();
$client->setApplicationName("Google Prediction");

$key = file_get_contents($this->key_filename);

$client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
    $this->service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));
	
$client->setClientId($this->client_id);

// Create Prediction Service
$service = new Google_Service_Prediction($client);

// additional options
$options = array(); 

// print the object result/status
print_r($status);

$status = $service->trainedmodels->get($this->project_id, $this->trained_model_id, $options);


 $data['status'] = $status;
 $this->load->view('coyote_status_view', $data);


} } ?>