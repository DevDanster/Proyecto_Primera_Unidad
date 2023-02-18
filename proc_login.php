<?php
session_start();

// Array de usuarios
$users = array(
    array('username' => 'administrador', 'password' => 'asd', 'photo' => 'img/admin2.png'),
    array('username' => 'cliente', 'password' => '123', 'photo' => 'img/user.png')
);

// Verificar si se ha iniciado sesión
if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

// Iniciar sesión
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $success = false;

    // Verificar credenciales de usuario
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $success = true;
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['photo'] = $user['photo'];
            header('Location: dashboard.php');
            exit;
        }
    }

    // Mostrar error si las credenciales son incorrectas
    $error =  "<script>
   swal({
     title: '¡UPS! Credenciales Inválidas',
     text: 'Por favor, ingrese un usuario o contraseña válidos.',
     icon: 'error'
   });
 </script>";
}

?>