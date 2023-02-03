<?php

namespace App\Controllers;

use App\Models\PersonModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Person extends ResourceController
{

    use ResponseTrait;

    public function index()
    {
        $model = new PersonModel();
        $data['persons'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $model = new PersonModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No person found');
        }
    }

    public function create()
    {
        $model = new PersonModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'note' => $this->request->getVar('note'),
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Person created successfully',
            ],
        ];
        return $this->respondCreated($response);
    }

    public function update($id = null)
    {

        $model = new PersonModel();
        $input = $this->request->getRawInput();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'note' => $this->request->getVar('note'),

        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated',
            ],
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $model = new PersonModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Person successfully deleted',
                ],
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No person found');
        }
    }

}
