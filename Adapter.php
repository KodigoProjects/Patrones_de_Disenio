<?php

// Clase original: Windows 7
class ArchivoWindows7 {
    public function abrirArchivo() {
        return "Abriendo archivo en formato Windows 7";
    }
}

// Clase Adaptador para Windows 10
class AdaptadorWindows10 {
    private $archivo;

    public function __construct(ArchivoWindows7 $archivo) {
        $this->archivo = $archivo;
    }

    public function abrirArchivo() {
        return $this->archivo->abrirArchivo() . " adaptado para Windows 10";
    }
}

// Clase Windows 10
class Windows10 {
    public function aceptarArchivo($archivo) {
        return $archivo->abrirArchivo();
    }
}


$archivoWindows7 = new ArchivoWindows7();
$adaptador = new AdaptadorWindows10($archivoWindows7);

$windows10 = new Windows10();
echo $windows10->aceptarArchivo($adaptador);
