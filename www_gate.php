<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usr_logi'];
    $pass = $_POST['usr_pass'];
    $captcha = $_POST['captcha'];

    // Aquí deberías validar el captcha
    if ($captcha != $_SESSION['captcha']) {
        echo "Captcha incorrecto";
        exit;
    }

    // Aquí deberías validar las credenciales del usuario
    // Esto es solo un ejemplo, deberías usar una base de datos
    if ($user == 'admin' && $pass == '1234') {
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}

// Generar un captcha simple
$captcha_num = rand(1000, 9999);
$_SESSION['captcha'] = $captcha_num;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="www_gate.php" method="post">
        <input type="hidden" name="acc" value="aut">
        <input type="text" name="usr_logi" maxlength="13" placeholder="Usuario" value="">
        <input type="password" name="usr_pass" maxlength="10" placeholder="NIP">
        <img src="captcha.php" alt="Captcha">
        <input type="text" id="captcha" name="captcha" maxlength="10" placeholder="Captcha"><br>
        <button type="submit" id="login-button">Acceder</button>
    </form>
</body>
</html>