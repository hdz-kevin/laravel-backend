#!/usr/bin/env php

<?php

/**
 * Una funcion de primera clase es aquella que puede ser tratada como cualquier otro valor.
 * Esto significa que puede ser asignada a una variable, pasada como argumento a otra funcion,
 * o retornada como resultado de otra funcion.
 */

/**
 * Asignar una funcion anónima a una variable.
 */
$multiply = function(float $a, float $b): float {
    return $a * $b;
};

echo $multiply(1, 2) . PHP_EOL;
echo $multiply(2, 2) . PHP_EOL;
echo $multiply(3, 2) . PHP_EOL;
echo $multiply(4, 2) . PHP_EOL;
