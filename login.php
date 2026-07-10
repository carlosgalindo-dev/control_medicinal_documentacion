<?php
session_start();

$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user']) && isset($_POST['password'])) {
    $correo_ingresado = trim($_POST['user']); 
    $password_ingresada = trim($_POST['password']);

    if (!empty($correo_ingresado) && !empty($password_ingresada)) {
        
       
        $host = 'localhost';
        $db   = 'RedMedica'; 
        $user_db = 'root';      
        $pass_db = 'root'; 

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user_db, $pass_db);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     
            $stmt = $pdo->prepare("SELECT id_usuario, correo, password, id_rol, estado FROM usuarios WHERE correo = :correo LIMIT 1");
            $stmt->execute(['correo' => $correo_ingresado]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if ($usuario['estado'] !== 'Activo') {
                    $error = "Esta cuenta se encuentra inactiva.";
                } 
          
                elseif (md5($password_ingresada) === $usuario['password']) {
                    
                    $update = $pdo->prepare("UPDATE usuarios SET ultimo_acceso = NOW() WHERE id_usuario = :id");
                    $update->execute(['id' => $usuario['id_usuario']]);

                    
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['usuario']    = $usuario['correo'];
                    $_SESSION['id_rol']     = $usuario['id_rol']; 

                
                    header("Location: admin.php");
                    exit;
                } else {
                    $error = "El usuario o la contraseña son incorrectos.";
                }
            } else {
                $error = "El usuario o la contraseña son incorrectos.";
            }

        } catch (PDOException $e) {
            $error = "Error en el servidor: " . $e->getMessage();
        }
    } else {
        $error = "Por favor, llena todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login - Red Médica</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            margin: 0; padding: 0; height: 100vh; display: flex; align-items: center; justify-content: flex-start; 
            padding-left: 10%; background: radial-gradient(circle at 80% 50%, #9bc5e7 0%, #6ba2d2 40%, #4a82b8 100%); overflow: hidden;
        }
        .login-box { 
            background: rgba(255, 255, 255, 0.22); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.35); padding: 40px 35px; border-radius: 22px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.15); width: 100%; max-width: 360px; text-align: center;
        }
        h2 { color: #ffffff; margin-top: 0; margin-bottom: 30px; font-weight: 400; font-size: 26px; text-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .error-msg { color: white; background-color: rgba(217, 83, 79, 0.85); padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; }
        input[type="text"], input[type="password"] { 
            width: 100%; padding: 14px 16px; margin-bottom: 18px; background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 10px; box-sizing: border-box; font-size: 15px; color: #ffffff; outline: none;
        }
        input[type="text"]::placeholder, input[type="password"]::placeholder { color: rgba(255, 255, 255, 0.75); }
        input[type="text"]:focus, input[type="password"]:focus { background: rgba(255, 255, 255, 0.6); border-color: rgba(255, 255, 255, 0.8); }
        button { 
            width: 100%; background: linear-gradient(to bottom, #7cb3eb 0%, #478cd1 100%); border: 1px solid rgba(255, 255, 255, 0.4);
            color: white; padding: 14px; border-radius: 10px; cursor: pointer; font-size: 18px; font-weight: 500; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); margin-top: 10px;
        }
        button:hover { background: linear-gradient(to bottom, #8ec1f7 0%, #549be6 100%); }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Member Login</h2>

    <?php if (!empty($error)): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <input type="text" id="user" name="user" required placeholder="E-mail or Username">
        <input type="password" id="password" name="password" required placeholder="Password">
        <button type="submit">Log In</button>
    </form>
</div>

</body>
</html>