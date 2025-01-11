<?php
return [
    '/' => 'HomeController@index',
    '/form' => 'FormController@index',
    '/about' => 'AboutController@index',
    '/content' => 'ContentController@index',
    '/content/id/{id}/page/{page}' => 'ContentController@show', // เส้นทางแบบไดนามิก
    '/submit' => 'ContentController@store', // รองรับ POST
];