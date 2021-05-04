<?php
class Todos_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_todos()
        {
                $query = $this->db->query('SELECT * FROM todos ORDER BY id ASC');
                return $query->result_array();
        }

        public function insert_todos()
        {
                $data = array(
                        'task' => htmlspecialchars( $this->input->post('task'), ENT_QUOTES)
                );
                return $this->db->insert('todos', $data);
        }

        public function update()
        {
                $data = array(
                        'task' => htmlspecialchars( $this->input->post('task'), ENT_QUOTES)
                );
                $this->db->where('id', $this->input->post('id'));
                return $this->db->update('todos', $data);
        }

        public function delete()
        {
                return $this->db->delete('todos', array('id'=>$this->input->post('id')));
        }

        public function find_by_id($id) {
                return $this->db->get_where('todos', array('id' => $id))->row();
        }

}