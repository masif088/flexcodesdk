<?php

/**
 * @Author: Feri Harjulianto
 * @Date:   2018-09-05 09:48:54
 * @Last Modified by:   Mokhamad Asif
 * @Last Modified time: 2021-03-25 23:08:00
 */

Route::group(['namespace' => 'idekite\flexcodesdk\Controllers'], function()
{
    Route::get('test', ['uses' => 'flexcodeSDKController@index']);

    Route::prefix('fingerprints')->group(function () {
        Route::get('/', function () {
            echo "hello world";
        });

        Route::get('status', ['uses' => 'flexcodeSDKController@status']);
        Route::get('ac', ['uses' => 'flexcodeSDKController@ac']);

        //get fingerprint registration URL
        Route::get('register/{id}', ['uses' => 'flexcodeSDKController@register']);
        Route::post('register/{id}', ['uses' => 'flexcodeSDKController@save']);

        //verify
        Route::get('verify/{id}', ['uses' => 'flexcodeSDKController@verify']);
        Route::post('verify/{id}', ['uses' => 'flexcodeSDKController@saveverify']);


    });
});