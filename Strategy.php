<?php

//-------------Estrategia interface
interface Estrategia {
    public function mostrar($mensaje);
}

//------------ Estrategia: Consola
class ConsolaStrategy implements Estrategia {
    public function mostrar($mensaje) {
        echo "Consola: " . $mensaje . "\n";
    }
}

// Estrategia: JSON
class JsonStrategy implements Estrategia {
    public function mostrar($mensaje) {
        echo json_encode(["mensaje" => $mensaje]) . "\n";
    }
}

//------------ Estrategia: Archivo TXT
class ArchivoStrategy implements Estrategia {
    public function mostrar($mensaje) {
        file_put_contents("salida.txt", $mensaje);
        echo "Mensaje guardado en salida.txt\n";
    }
}

//------------------- Contexto
class Contexto {
    private $estrategia;

    public function setEstrategia(Estrategia $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrarMensaje($mensaje) {
        $this->estrategia->mostrar($mensaje);
    }
}

// Uso
$contexto = new Contexto();

$contexto->setEstrategia(new ConsolaStrategy());
$contexto->mostrarMensaje("Hola mundo");

$contexto->setEstrategia(new JsonStrategy());
$contexto->mostrarMensaje("Hola mundo");

$contexto->setEstrategia(new ArchivoStrategy());
$contexto->mostrarMensaje("Hola mundo");
