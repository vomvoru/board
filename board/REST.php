<?php
namespace App;

abstract class REST {
    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $this->get();
        }
        else if($method === 'POST'){
            $this->post();
        }
        else if($method === 'PUT'){
            $this->put();
        }
        else if($method === 'DELETE'){
            $this->delete();
        }
    }

    abstract public function get();
    abstract public function post();
    abstract public function put();
    abstract public function delete();
}