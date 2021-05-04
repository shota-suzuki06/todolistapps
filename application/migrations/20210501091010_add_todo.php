<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Todo extends CI_Controller {

    public function up()
    {

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'bigserial'
            ),
            'task' => array(
                'type' => 'text'
            )
        ));

        $this->dbforge->create_table('todos');

    }

    public function down()
    {

        $this->dbforge->drop_table('todos');

    }

}
