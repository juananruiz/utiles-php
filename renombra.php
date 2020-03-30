<?php

$directorio = opendir(__DIR__);
mkdir ($directorio . '/renombrados');

while ($archivo = readdir($directorio)) {
    if (!is_dir($archivo) AND strpos($archivo, '.jpg')) {
        $numero = (int) substr($archivo, strpos($archivo, '_') + 1, -4);
        if (0 === $numero % 2) {
            $archivo_nuevo = 'renombrados/obra_' . (string)($numero / 2) . '_imagen.jpg';
        } else {
            $archivo_nuevo = 'renombrados/obra_' . (string)round($numero / 2) . '_ficha.jpg';
        }
        echo $archivo . ' >>> ' . $archivo_nuevo . "\n";
        rename($archivo, $archivo_nuevo);
    }
}
