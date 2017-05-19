<?php

Route::get("/example/", 'ExampleController@get');
Route::post("/example/", 'ExampleController@post');
Route::put("/example/@id", 'ExampleController@put');
Route::delete("/example/@id", 'ExampleController@delete');