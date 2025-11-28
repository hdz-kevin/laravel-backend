#!/usr/bin/env php

<?php
/**
 * Los traits son un mecanismo de reutilización de código en un lenguaje de herencia simple como PHP.
 * Un trait intenta reducir ciertas limitaciones de la herencia simple, permitiendo reutilizar un cierto número de
 * métodos en clases independientes.
 *
 * Un trait es similar a una clase, pero solo sirve para agrupar funcionalidades.
 * No es posible instanciar un Trait en sí mismo.
 * Es un añadido a la herencia tradicional, que permite el uso de métodos de clase sin necesidad de herencia.
 */


trait EmailSender
{
    public function sendEmail(string $email, string $content): static
    {
        echo "Sending email to $email with content: $content\n";
        return $this;
    }
}

trait DB
{
    public function save(): static
    {
        echo "Saving in the database...\n";
        return $this;
    }
}


/**
 * Al usar el trait EmailSender, la clase va a tener toda la funcionalidad del trait.
 */
class Invoice
{
    use EmailSender, DB;
}

(new Invoice())
    ->sendEmail("george@george.com", "Invoice 123")
    ->save();
