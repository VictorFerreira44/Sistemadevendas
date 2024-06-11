<?php


Route::get('/produto', [ProdutoController::class,'index']);

Route::get('/produtos/{id}',[ProdutoController::class], 'show');

Route::post('/produtos',[ProdutoController::class], 'store');

Route::put('/produtos/{id}',[ProdutoController::class], 'update');

Route::delete('/produtos/{id}',[ProdutoController::class], 'destroy');

?>