<?php

/**
 * @Author: Feri Harjulianto
 * @Date:   2018-09-05 09:48:54
 * @Last Modified by:   Feri Harjulianto
 * @Last Modified time: 2018-09-05 10:12:19
 */

Route::prefix('fingerprint')->group(function () {
    Route::get('/', function () {
        echo "Hello World";
    });

    Route::get('/test', 'idekite\flecxodesdk\flexcodeSDKController@index');
});