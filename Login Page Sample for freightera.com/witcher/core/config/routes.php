<?php
return [
    '/' => ['home','index'],
    '/login' => ['home','login'],
    '/profile' => ['home','welcome'],
    '/logout' => ['home','login', ['logout'=>'']],


    '/{@code}' => ['error_handling','index'], // by changing 404 path you have to change it in autoloader.php [line 142]
];