<?php
/**
 * Created by PhpStorm.
 * User: Dominus
 * Date: 18/06/2017
 * Time: 01:57
 */


// Create Google Client

$client = new Google_Client();
$client->setApplicationName("Google Prediction");

$key = file_get_contents($key_filename);

$client->setAssertionCredentials(new Google_Auth_AssertionCredentials($service_account_name, array('https://www.googleapis.com/auth/prediction'), $key));

$client->setClientId($client_id);

// Create Prediction Service

$service = new Google_Service_Prediction($client);

$hosted_model_id = 'sample.languageid';
$text_input = 'How about meeting up later?';

$input_input = new Google_Service_Prediction_InputInput();

$input_input->setCsvInstance(array($text_input));

$input = new Google_Service_Prediction_Input();

$input->setInput($input_input);

// additional options

$options = array();

$result = $service->hostedmodels->predict($project_id, $hosted_model_id, $input, $options);

// print the object result

print_r($result);
