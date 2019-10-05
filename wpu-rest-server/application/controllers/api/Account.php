<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Account extends CI_Controller{

    use REST_Controller { 
        REST_Controller::__construct as private __resTraitConstruct; 
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Account_model');
    }

    public function index_get(){
        
        $id = $this->get('id');

        if ($id === null) {
            $account = $this->Account_model->getAccount();
        } 
        else
        {
            $account = $this->Account_model->getAccount($id);
        }
        
        if ($account){

            $this->response([
                'status' => true,
                'data' => $account
            ], 200); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Not found'
            ], 404);
        }  
    }

    public function index_delete(){
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'please input an id'
            ], 400);
        } 
        else
        {
           if ($this->Account_model->deleteAccount($id) > 0 )
           {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'account deleted'
                ], 204); 
           } 
           else{
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], 400);
           }
        }
    }

    public function index_post(){
        $data = [
            'mobile' => $this->post('mobile'),
            'firstname' => $this->post('firstname'),
            'lastname' => $this->post('lastname'),
            'dob' => $this->post('dob'),
            'gender' => $this->post('gender'),
            'email' => $this->post('email')
        ];

        if ($this->Account_model->createAccount($data) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'account has been created'
            ], 201); 
        }
        else {
            $this->response([
                'status' => false,
                'message' => 'failed'
            ], 400);
        }

    }

    public function index_put(){
        $id = $this->put('id');
        $data = [
            'mobile' => $this->put('mobile'),
            'firstname' => $this->put('firstname'),
            'lastname' => $this->put('lastname'),
            'dob' => $this->put('dob'),
            'gender' => $this->put('gender'),
            'email' => $this->put('email')
        ];

        if ($this->Account_model->updateAccount($data, $id) > 0 ){
            $this->response([
                'status' => true,
                'message' => 'account has been updated'
            ], 204); 
        }
        else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], 400);
        }
    }

}