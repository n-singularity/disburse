<?php

use App\Controllers\Disburse;

App\Services\Route::POST('disburse', function ($params){
    (new Disburse())->storeDisburse($params);
});

App\Services\Route::GET('disburse/:id_transaction', function ($params){
    (new Disburse())->showDisburse($params['id_transaction'], $params);
});

App\Services\Route::GET('disburse/:id_transaction/refresh', function ($params){
    (new Disburse())->refreshAndGetDisburse($params['id_transaction'], $params);
});