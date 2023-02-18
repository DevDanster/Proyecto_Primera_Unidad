<?php
// Credenciales de usuario
$users = array(
    array('username' => 'administrador', 'password' => 'asd', 'role' => 'admin', 'profile_pic' => 'img/admin2.png'),
    array('username' => 'cliente', 'password' => '123', 'role' => 'client', 'profile_pic' => 'img/user.png'),
);

// Inicio de sesión
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $success = false;
    $user_role = '';
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $success = true;
            $user_role = $user['role'];
            $profile_pic = $user['profile_pic'];
            break;
        } 
    }

    if ($success) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['profile_pic'] = $profile_pic;

        if ($user_role == 'admin') {
            header('Location: dashboard_admin.php');
        } elseif ($user_role == 'client') {
            header('Location: dashboard_client.php');
        } else {
            // Si el usuario no tiene un rol válido, lo redireccionamos al login
            header('Location: login.php');
        }

        exit;
    } else {
        $error = "<script>
        swal({
          title: '¡UPS! Credenciales Inválidas',
          text: 'Por favor, ingrese un usuario o contraseña válidos.',
          icon: 'error'
        });
      </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">

                <form class="login" action="login.php" method="post">

                    <div class="login__field">

                        <i class="fi fi-sr-user login__icon"></i>
                        <input type="text" class="login__input" placeholder="Usuario" id="username" name="username">

                    </div>

                    <div class="login__field">
                        <i class="fi fi-sr-fingerprint login__icon"></i>
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Contraseña" id="password" name="password">
                    </div>

                    <?php if (isset($error)) { ?>
                        <p style="color: lightcoral;"><?php echo $error; ?></p>
                    <?php } ?>

                    <input type="submit" name="submit" value="Iniciar Sesión" class="button login__submit">

                </form>

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>