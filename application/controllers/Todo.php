<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('todos_model');
		$this->load->helper('form');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['todo'] = $this->todos_model->get_todos();
		$this->load->view('todo', $data);
	}

	public function insert() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('task', 'タスク', array('required', 'max_length[70]'));
		if ($this->form_validation->run() === TRUE) {
			$this->todos_model->insert_todos();
		}
		redirect('/');
	}

	public function edit($id)
	{
		$data['value'] = 'edit';
		$data['todo'] = $this->find_by_id($id);
		$this->load->view('edit', $data);
    }

	public function edit_confirm() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
																			
		$this->form_validation->set_rules('task', 'タスク', array('required', 'max_length[70]'));
		if ($this->form_validation->run() === TRUE) {
			$this->todos_model->update();
			redirect('/');
		} else {
			$this->edit($this->input->post('id'));
		}
	}

	public function delete($id)
	{
		$data['value'] = 'delete';
		$data['todo'] = $this->find_by_id($id);
		$this->load->view('edit', $data);
	}

	public function delete_confirm() {
		$this->todos_model->delete();
		redirect('/');
	}

	public function find_by_id($id)
	{
		return $this->todos_model->find_by_id($id);
	}

}
