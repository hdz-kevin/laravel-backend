#!/usr/bin/env php

<?php

/**
 * La inmutabilidad es un principio fundamental en la programación funcional.
 * Un objeto inmutable es aquel cuyo estado no puede ser modificado una vez creado.
 * Esto significa que cualquier operación que modifique el estado de un objeto inmutable
 * debe devolver un nuevo objeto con el nuevo estado, dejando el objeto original intacto.
 */

/**
 * Al tener las propiedades privadas, no se puede modificar su valor una vez creado el objeto.
 * Por lo tanto, para modificar el estado de un objeto inmutable, se debe crear un nuevo objeto con el nuevo estado.
 */
class Location {
    private float $x;
    private float $y;

    public function __construct(float $x, float $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float {
        return $this->x;
    }

    public function getY(): float {
        return $this->y;
    }

    /**
     * Si se requiere cambiar el estado del objeto inmutable, se crea un nuevo objeto con el nuevo estado.
     * De esta forma, el objeto original se mantiene intacto.
     */
    public function move(float $x, float $y): self {
        return new self($this->x + $x, $this->y + $y);
    }
}

$location = new Location(1, 2);
// $location->x = 2; // Error
$newLocation = $location->move(11, 22);
print_r($location);
print_r($newLocation);
