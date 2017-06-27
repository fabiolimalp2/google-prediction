<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Model_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $result = $this->db->get('model_info');
        return $result;
    }

    function get_trained_model($trained_model_id)
    {
        $row = $this->db->where('model_id', $trained_model_id)->limit(1)->get('model_info');
        return $row;
    }
	
	    function get_hosted_model($hosted_model_id)
    {
		$row = $this->db->where('model_id', $hosted_model_id)->limit(1)->get('model_info');
        return $row;
               
    }
}