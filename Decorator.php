<?php

// Interfaz base
interface Personaje {
    public function obtenerArmas();
}

// Clase básica del personaje
class PersonajeBase implements Personaje {
    public function obtenerArmas() {
        return "Manos vacías";
    }
}

// Decorator base
abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }
}

// Decorator Espada
class EspadaDecorator extends ArmaDecorator {
    public function obtenerArmas() {
        return $this->personaje->obtenerArmas() . ", Espada equipada";
    }
}

// Decorator Arco
class ArcoDecorator extends ArmaDecorator {
    public function obtenerArmas() {
        return $this->personaje->obtenerArmas() . ", Arco equipado";
    }
}

// Uso
$personaje = new PersonajeBase();
$personajeConEspada = new EspadaDecorator($personaje);
$personajeConArco = new ArcoDecorator($personajeConEspada);

echo $personajeConArco->obtenerArmas();
