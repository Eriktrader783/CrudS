<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;

Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');

Route::get('/', fn() => redirect()->route('estudiantes.index'));

Route::get('/estudiantes',        [EstudianteController::class,'index'])->name('estudiantes.index');
Route::post('/estudiantes',       [EstudianteController::class,'store'])->name('estudiantes.store');
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class,'destroy'])->name('estudiantes.destroy');

