<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Preencher aqui os dados para acessar a api do google predict
| client_id
| service_account_name
| key_file_name
| sample_id
| project_id
| Dados adicionais para acessar a api do google storage
|--------------------------------------------------------------------------
*/

$config['client_id'] = '506970047434-u09rrkoa20fjebtoanubl3kfbmbo5l7g.apps.googleusercontent.com';
$config['service_account_name'] = 'adm-744@wise-coyote-171600.iam.gserviceaccount.com';
$config['key_filename'] = 'My_Project-4da87bf7ee30.p12';
$config['sample_id'] = '414649711441';
$config['project_id'] = 'wise-coyote-171600';



// Google storage api
$config['bucket_name'] = 'my-container';
$config['local_file'] = 'language_id.txt';
$config['store_file_name'] = 'language_id.txt';