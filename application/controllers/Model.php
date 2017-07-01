<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_model');
    }

    public function index()
    {
        $data = ['models' => $this->Model_model->all()];
		$html = $this->load->view('model_view', $data, true);
		$this->show($html);
    }

    public function add()
    {
        $rules = [         [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ]        ];

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE)
        {
            $html = $this->load->view('add_file', '', true);
				$this->show($html);
        }
        else
        {
            $config = [
                'upload_path' => './uploads/',
                'allowed_types' => 'txt',
                'max_size' => 2000
            ];

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('add_file', $error);
            }
            else
            {
                $models = $this->upload->data();
                $data = [
                    'file' => 'uploads/' . $models['file'],
                    'name' => set_value('name')
                ];
                $this->Model_model->create($data);
                $this->session->set_flashdata('message', 'Novo modelo foi adicionado..');
                redirect('model');
            }
        }
    }

    public function edit($id)
    {
        $rules = [            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ]        ];

        $this->form_validation->set_rules($rules);
        $models = $this->Model_model->find($id)->row();

        if ($this->form_validation->run() == FALSE)
        {
			$data['models']= $models;
            $html = $this->load->view('edit_file', $data, true);
			$this->show($html);
        }
        else
        {
            if (isset($_FILES["userfile"]["name"]))
            {
                $config = [
                    'upload_path' => './uploads/',
                    'allowed_types' => 'txt',
                    'max_size' => 2000
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('edit_file', ['files' => $files, 'error' => $error]);
                } else {
                    $file = $this->upload->data();
                    $data['file'] = 'uploads/' . $file['file'];
                    unlink($files->file);
                }
            }

            $data['name'] = set_value('name');
            $this->Model_model->update($id, $data);
            $this->session->set_flashdata('message', 'Modelo foi alterado..');
            redirect('model');
        }
    }

    public function delete($id)
    {
        $this->Model_model->delete($id);
        $this->session->set_flashdata('message', 'Modelo foi deletado..');
        redirect('model');
    }
	
	function show($content)
    {
        $html = $this->load->view('header', null, true);
        $html .= $content;
        $html .= $this->load->view('footer', null, true);
        echo $html;
    }
}
