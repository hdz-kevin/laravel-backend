#!/usr/bin/env php

<?php

/**
 * Las funciones puras son aquellas que cumplen con dos principios fundamentales:
 * 1. No tienen efectos secundarios sobre elementos externos.
 * 2. Siempre retornan el mismo resultado para los mismos argumentos.
 */

class Counter {
    public int $count = 0;
}

/**
 * Esta función NO es Pura porque modifica el estado interno del objeto $counter.
 */
function increment(Counter $counter): int {
    $counter->count++;
    return $counter->count;
}

$counter = new Counter();
echo increment($counter) . PHP_EOL; // 1
echo increment($counter) . PHP_EOL; // 2
echo increment($counter) . PHP_EOL; // 3
echo increment($counter) . PHP_EOL; // 4
print_r($counter);

echo "----------------" . PHP_EOL;

/**
 * Esta función cumple con los principios de las funciones puras.
 *  1. No modifica ningún elemento externo a ella.
 *  2. Para la misma entrada, siempre retorna la misma salida.
 */
function add(float $a, float $b): float {
    return $a + $b;
}

echo add(1, 2) . PHP_EOL; // 3
echo add(1, 2) . PHP_EOL; // 3
echo add(1, 2) . PHP_EOL; // 3
echo add(1, 2) . PHP_EOL; // 3
