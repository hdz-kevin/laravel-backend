#!/usr/bin/env php

<?php

/**
 * Una funcion de orden superior es aquella que puede recibir otras funciones como parámetros o también
 * retornar una función como resultado.
 */

/**
 * Ejemplo de una funcion de orden superior que recibe una funcion como parametro.
 */
function repeat(int $times, callable $fn): void {
    for ($i = 0; $i < $times; $i++) {
        $fn();
    }
}

repeat(5, function() {
    echo "Hello World!\n";
});
