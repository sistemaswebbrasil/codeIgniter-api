<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PopulatePerson extends Seeder
{
    public function run()
    {

        $data_person = [
            array('name' => 'name 01', 'email' => 'email1@gmail.com', 'note' => 'é um campo de observação 1'),
            array('name' => 'name 02', 'email' => 'email2@gmail.com', 'note' => 'é um campo de observação 2'),
            array('name' => 'name 03', 'email' => 'email3@gmail.com', 'note' => 'é um campo de observação 3'),
            array('name' => 'name 04', 'email' => 'email4@gmail.com', 'note' => 'é um campo de observação 4'),
            array('name' => 'name 05', 'email' => 'email5@gmail.com', 'note' => 'é um campo de observação 5'),
        ];

        $this->db->table('people')->emptyTable();
        $this->db->table('people')->insertBatch($data_person);

    }
}
