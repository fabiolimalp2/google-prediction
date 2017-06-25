<?php

/**
 * Created by PhpStorm.
 * User: Dominus
 * Date: 18/06/2017
 * Time: 01:57
 */
class Coyote_upload extends CI_Controller
{

    public $client_id = '506970047434-u09rrkoa20fjebtoanubl3kfbmbo5l7g.apps.googleusercontent.com';
    public $service_account_name = 'adm-744@wise-coyote-171600.iam.gserviceaccount.com';
    public $key_filename = 'My_Project-4da87bf7ee30.p12';
    public $project_id = 'wise-coyote-171600';
    public $training_model_id = 'wise-coyote-model';
	// somente para upload
	public $bucket_name = 'my-container';
// model file to upload
public $local_file = "language_id.txt"; 
// the filename that'll be used when stored on Google Storage
public $store_file_name = "language_id.txt"; 

    public function index()
    {
		
// Create Google Client
$client = new Google_Client();
$client->setApplicationName("Storage and Google Prediction");

$key = file_get_contents($this->key_filename);

        $client->setClientId($this->client_id);

        $client->setAssertionCredentials(new Google_Auth_AssertionCredentials(
            $this->service_account_name, array(
            'https://www.googleapis.com/auth/prediction',
            'https://www.googleapis.com/auth/devstorage.read_write'), $key));
      
// Create Storage Service
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

// Create Prediction Service
        $prediction = new Google_Service_Prediction($client);

        $insert = new Google_Service_Prediction_Insert();
        $insert->setId($this->training_model_id);
        $insert->setStorageDataLocation($this->bucket_name . '/' . $this->store_file_name);

        $training_options = array();
        $training_result = $prediction->trainedmodels->insert($this->project_id, $insert, $training_options);

      
// print the object result
         print_r($training_result);
		
		 $data['training_result'] = $training_result;
         $this->load->view('coyote_upload_view', $data);
		
	}}?>

 