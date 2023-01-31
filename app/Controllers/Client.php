<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Client extends ResourceController
{
    protected $modelName = 'App\Models\Client';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
}
