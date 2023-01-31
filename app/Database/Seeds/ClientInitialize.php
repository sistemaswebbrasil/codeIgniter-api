<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientInitialize extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Adriano',
        ];
        $this->db->table('clients')->insert($data);
    }
}
