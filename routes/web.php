<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/////////////////////////////////////// Operaciones ///////////////////////////////////////
Route::pattern('num1', '[0-9]+');
Route::pattern('num2', '[0-9]+');

Route::get('/operaciones/{operacion}/{num1}/{num2}', function ($operacion, $num1, $num2) {
    switch ($operacion) {
        case 'suma':
            $resultado = $num1 + $num2;
            break;
        case 'resta':
            $resultado = $num1 - $num2;
            break;
        case 'multiplicacion':
            $resultado = $num1 * $num2;
            break;
        case 'division':
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                return "No se puede dividir entre cero";
            }
            break;
        default:
            return "Operación no válida";
    }

    return "El resultado de la operación $operacion es: $resultado";
});

/////////////////////////////////////// Saludar Usuario ///////////////////////////////////////
Route::pattern('nombre', '[A-Za-zÀ-ÖØ-öø-ÿ\s]+');
Route::pattern('apellido', '[A-Za-zÀ-ÖØ-öø-ÿ\s]+');

Route::get('/saludo/{nombre}/{apellido?}', function ($nombre, $apellido = null) {
    return "¡Hola $nombre" . ($apellido ? " $apellido" : "") . "!";
});

/////////////////////////////////////// Saludo Desde Vista ///////////////////////////////////////
Route::get('/user/{nombre}', function ($nombre) {
    return view('user', ['nombre' => $nombre]);
});
