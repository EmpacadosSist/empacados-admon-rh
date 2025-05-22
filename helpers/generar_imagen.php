<?php
function generarImagen($nombre, $numEmp, $contra) {
    // Ruta de la imagen base
    $imagen_base = 'http://empacadosmty.fortiddns.com:81/conecta-empacados/assets/img/credentials.png';
    
    // Crear imagen desde el archivo original
    $imagen = imagecreatefrompng($imagen_base);

    // Obtener el ancho de la imagen
    $anchoImagen = imagesx($imagen);

    // Definir colores
    $blanco = imagecolorallocate($imagen, 255, 255, 255);

    // Ruta de la fuente (debes subir un archivo TTF a tu servidor, por ejemplo Arial.ttf)
    $fuente = __DIR__ . '/inter.ttf'; // Asegúrate de tener esta fuente en la carpeta helpers

    $fuente2= __DIR__ . '/inter_light.ttf';

    // Definir tamaños de letra
    $tamanioNombre = 70;
    $tamanioEmp = 55;
    $tamanioContra = 55;

    // Agregar texto en la imagen
    //imagettftext($imagen, $tamaño, $angulo, $x, $y, $color, $fuente, "Texto");
    /*
    $imagen	La imagen en la que se dibujará el texto.
    $tamaño	Tamaño de la fuente en píxeles.
    $angulo	Ángulo de rotación (0 es horizontal).
    $x	Posición horizontal del texto (más alto = más a la derecha).
    $y	Posición vertical del texto (más alto = más abajo).
    $color	Color del texto.
    $fuente	Ruta del archivo de fuente (TTF).
    "Texto"	El texto que se imprimirá en la imagen.
    */

    // ** Centrar solo el texto del nombre en X**
    function centrarTextoX($texto, $tamanio, $fuente, $anchoImagen) {
      $cajaTexto = imagettfbbox($tamanio, 0, $fuente, $texto);
      $anchoTexto = $cajaTexto[2] - $cajaTexto[0]; // Ancho del texto
      return (int)(($anchoImagen - $anchoTexto) / 2); // Posición X centrada
    }

    // Calcular posición X solo para el nombre
    $posXNombre = centrarTextoX($nombre, $tamanioNombre, $fuente, $anchoImagen);

    imagettftext($imagen, $tamanioNombre, 0, $posXNombre, 970, $blanco, $fuente, $nombre);
    imagettftext($imagen, $tamanioEmp, 0, 285, 1400, $blanco, $fuente2, $numEmp);
    imagettftext($imagen, $tamanioContra, 0, 285, 1685, $blanco, $fuente2, $contra);

    // Guardar la imagen generada
    $ruta_guardado = __DIR__ . '/email_image.png';
    imagepng($imagen, $ruta_guardado);
    imagedestroy($imagen);

    return $ruta_guardado; // Devuelve la ruta de la imagen generada
}
?>
