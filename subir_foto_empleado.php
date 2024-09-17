<?php
require_once('conexion/conexion.php');

// Configurar el directorio de subida
$target_dir = "assets/img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar si el archivo es una imagen
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo "El archivo no es una imagen.";
    $uploadOk = 0;
}

// Verificar si $uploadOk es 0 por un error 
if ($uploadOk == 0) {
    echo "Lo siento, el archivo no se ha subido.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Obtener el dato extra
        $numEmpleado = $_POST['empNumHidd'];

        // Insertar la ruta de la imagen y el dato extra en la base de datos
        $sql = "CALL insert_image('$target_file', '$numEmpleado')";
        // $sql = "INSERT INTO images (path, NumEmpleado) VALUES ('$target_file', '$numEmpleado')";
        if ($conn->query($sql) === TRUE) {
            echo "La imagen y el dato extra han sido subidos y guardados correctamente.";
        } else {
            echo "Error al guardar la imagen: " . $conn->error;
        }
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

    $conn->close();
?>
