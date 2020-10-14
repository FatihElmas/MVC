<?php
class example extends Controller {
    public function index() {

        $this->view('example/example-view.php', [
            'data' => 'Hello World!'
        ]);
    }
}