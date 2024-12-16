<?php

//------- Interfaz Personaje
interface Personaje {
    public function atacar();
    public function velocidad();
}

//------------------------ Clase Esqueleto
class Esqueleto implements Personaje {
    public function atacar() {
        return "Esqueleto ataca con flechas";
    }

    public function velocidad() {
        return "Velocidad del Esqueleto: lenta";
    }
}

//---------------- Clase Zombi
class Zombi implements Personaje {
    public function atacar() {
        return "Zombi ataca con mordiscos";
    }

    public function velocidad() {
        return "Velocidad del Zombi: rápida";
    }
}

//------------------- Clase Factory para crear personajes
class FactoryPersonaje {
    public static function crearPersonaje($nivel) {
        if ($nivel === "fácil") 
            return new Esqueleto();
        elseif ($nivel === "difícil") 
            return new Zombi();
        throw new Exception("Nivel no válido");
    }
}

//------------------ Uso
$nivel = "fácil";
$personaje = FactoryPersonaje::crearPersonaje($nivel);
echo $personaje->atacar() . "\n";
echo $personaje->velocidad() . "\n";
