<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function categorias()
	{
		$this->load->view('categorizer');
	}
	
	public function sentimentos()
	{
		$this->load->view('sentiment');
	}
	
	public function linguagem()
	{
		$this->load->view('language');
	}
}
