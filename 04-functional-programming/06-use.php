#!/usr/bin/env php

<?php

/**
 * use() es una funcion que permite usar variables, constantes, funciones y clases
 * que están fuera del scope actual
 */

$greeting = "Hello";

/**
 * Para acceder a variables externas dentro de una funcion normal (no anonima) se debe
 * usar la palabra reservada global
 */
function showGreeting(): void {
    global $greeting;
    echo $greeting . PHP_EOL;
}

showGreeting();

/**
 * En funciones anonimas se puede acceder a variables externas usando la palabra reservada use()
 */
$showGreeting2 = function () use($greeting): void {
    echo $greeting . PHP_EOL;
};

$showGreeting2();

// !Important: Las variables pasadas a use() tomas el valor en el momento de la creacion de la funcion,
// no en el momento de la ejecucion como los parámetros normales
$greeting = "Hello 2";

$showGreeting2(); // El nuevo valor de la variable usada no se refleja al ejecutar la funcion
