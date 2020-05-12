<?php

use App\Controllers\DisburseController;

App\Services\Route::POST('/disburse', function ($params){
    (new DisburseController())->storeDisburse($params);
});

App\Services\Route::GET('/disburse/:id_transaction', function ($params){
    (new DisburseController())->showDisburse($params['id_transaction']);
});

App\Services\Route::GET('/disburse/:id_transaction/refresh', function ($params){
    (new DisburseController())->refreshAndShowDisburse($params['id_transaction']);
});

echo "Not Found";
http_response_code(404);