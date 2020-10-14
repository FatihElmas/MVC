# Basic MVC System for PHP Programming Language
The basic Model-View-Controller template for your php projects.
## Usage
### index.php
```php
    require __DIR__ . '/mvc/database.php';
    require __DIR__ . '/mvc/model.php';
    require __DIR__ . '/mvc/controller.php';
    require __DIR__ . '/mvc/route.php';
    Route::run('/example', '/example/example@index', 'get|post');
```
### Controller/example/example.php
```php
class example extends Controller {
    public function index() {

        $this->view('example/example-view.php', [
            'data' => 'Hello World!'
        ]);
    }
}
```
### View/example/example-view.php
```php
<?php

    echo $data; // Output should be 'Hello World' because we sent data from controller/example/example.php file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Page</title>
</head>
<body>

</body>

</html>
```
