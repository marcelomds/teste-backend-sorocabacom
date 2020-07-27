<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    /**
     * Rotas de Cards
     */
    Route::namespace('Card')->group(function () {
        Route::resource('cards', 'CardController')->except('create', 'show');
    });

    /**
     * Rotas de Conteúdo Geral
     */
    Route::namespace('GeneralContent')->group(function () {
        Route::get('general-content', 'GeneralContentController@index')
            ->name('generalContent.index');
        Route::put('general-content', 'GeneralContentController@updateOrCreate')
            ->name('generalContent.updateOrCreate');
    });

});
