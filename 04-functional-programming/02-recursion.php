#!/usr/bin/env php

<?php

/**
 * La recursividad es una técnica que permite a las funciones autoinvocarse para resolver problemas complejos.
 *
 * Cualquier función recursiva tiene dos secciones de código claramente divididas:
 *  - Por un lado tenemos la sección en la que la función se llama a sí misma.
 *  - Por otro lado, tiene que existir siempre una condición en la que la función retorna sin volver a llamarse.
 *    Esto es muy importante porque de lo contrario, la función se llamaría de manera indefinida, lo que puede provocar
 *    un desbordamiento de pila (StackOverflow).
 */

$n = 10;

function reverseCount(int $n): void {
    if ($n < 1)
        return;

    echo "N: " . $n . PHP_EOL;

    reverseCount($n - 1);
}

reverseCount($n);

/**
 * Ejemplo de una función recursiva que calcula el factorial de un número.
 */
function factorial(int $n): int {
    if ($n <= 1)
        return 1;

    return $n * factorial($n - 1);
}

$n = 5;

echo PHP_EOL."$n! = ".factorial($n).PHP_EOL;
