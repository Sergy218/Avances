<?php
require '../modelo/clientemodelo.php';
require '../modelo/modelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopilar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $nit = $_POST['nit'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $activo = $_POST['activo'];

    // Crear una instancia de la clase usuario
    $nuevoUsuario = new usuario(null, $nombre, $apellidos, $direccion, $nit, $email, $telefono, $activo);

    // Llamar al modelo para agregar el usuario
    $resultado = $_DB->insertUsuario($nuevoUsuario);

    if ($resultado) {
        // Los datos se agregaron exitosamente
        header('Location: http://localhost/apps/h3/sign-in/vista/cliente.php'); 
        exit;
    } else {
    }
}
