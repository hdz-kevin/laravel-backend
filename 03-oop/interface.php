#!/usr/bin/env php

<?php
/**
 * Las interfaces son una forma de definir un contrato que una clase debe cumplir.
 * Si una clase implementa una interface, entonces debe cumplir con todos los métodos que se definen en la interface.
 */

interface SendInterface
{
    public function send(string $message): void;
}

interface SaveInterface
{
    public function save(): void;
}

/**
 * Una clase puede implementar múltiples interfaces a la vez.
 *
 * Ahora, Document se puede categorizar y comportar como SendInterface y SaveInterface.
 */
class Document implements SendInterface, SaveInterface
{
    public function send(string $message): void
    {
        echo "The document is sending...\n";
    }

    public function save(): void
    {
        echo "The document is saving...\n";
    }
}

/**
 * Clase que solo implementa SaveInterface.
 */
class BeerRepository implements SaveInterface
{
    public function save(): void
    {
        echo "Saving the beer in the database...\n";
    }
}

/**
 * Clase que internamente use una Interface.
 */
class SaveProcess
{
    private SaveInterface $saveManager;

    /**
     * SaveProcess puede recibir cualquier implementación de SaveInterface.
     */
    public function __construct(SaveInterface $saveManager)
    {
        $this->saveManager = $saveManager;
    }

    /**
     * Ejecuta el método save de la implementación de SaveInterface.
     */
    public function process(): void
    {
        echo "Doing something before saving...\n";
        $this->saveManager->save();
    }
}

// Ejemplo de uso
$beerRepository = new BeerRepository();
$document = new Document();

$saveProcess = new SaveProcess($beerRepository);
$saveProcess->process();

$saveProcess = new SaveProcess($document);
$saveProcess->process();
