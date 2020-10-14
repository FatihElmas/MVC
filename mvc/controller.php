<?php 

class Controller {

    public function view($name, $data=[]) {
        extract($data);
        require dirname(__DIR__) . '/view/' . $name;

    }

    public function model($name) {
        require dirname(__DIR__) . '/model/' . strtolower($name);
        return new $name();
    }


}
