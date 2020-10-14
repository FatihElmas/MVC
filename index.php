<?php 
    require __DIR__ . '/mvc/database.php';
    require __DIR__ . '/mvc/model.php';
    require __DIR__ . '/mvc/controller.php';
    require __DIR__ . '/mvc/route.php';
    Route::run('/example', '/example/example@index', 'get|post');
?>