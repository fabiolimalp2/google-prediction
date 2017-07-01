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
	public function all()
    {
        $result = $this->db->get('model_file');
        return $result;
    }

    public function find($id)
    {
        $row = $this->db->where('id',$id)->limit(1)->get('model_file');
        return $row;
    }

    public function create($data)
    {
        try{
            $this->db->insert('model_file', $data);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($id, $data)
    {
        try{
            $this->db->where('id',$id)->limit(1)->update('model_file', $data);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->db->where('id',$id)->delete('model_file');
            return true;
        }

            //catch exception
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}