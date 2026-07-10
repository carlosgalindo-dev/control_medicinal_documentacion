<?php
session_start();
session_unset();
session_destroy(); // Borra por completo la sesión activa
header("Location: login.php"); // Te regresa limpio al formulario
exit;