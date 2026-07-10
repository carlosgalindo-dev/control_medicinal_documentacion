<?php
session_start();

// Control de acceso: Si no está logueado, se va al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Simulación de datos que vendrían de las tablas 'empleados', 'tipos_personal' y 'usuarios' de tu BD
$empleados = [
    [
        'id' => 1,
        'nombre' => 'Carlos Mendoza Sánchez',
        'puesto' => 'Director Médico',
        'correo' => 'admin@redmedica.com',
        'telefono' => '3312345678',
        'estatus' => 'Activo',
        'docs' => '13/13'
    ],
    [
        'id' => 2,
        'nombre' => 'Laura Flores Díaz',
        'puesto' => 'Recursos Humanos',
        'correo' => 'rh@redmedica.com',
        'telefono' => '3323456789',
        'estatus' => 'Activo',
        'docs' => '11/13'
    ],
    [
        'id' => 3,
        'nombre' => 'Alejandro Pérez García',
        'puesto' => 'Doctor (Pediatría)',
        'correo' => 'doctor.perez@redmedica.com',
        'telefono' => '3334567890',
        'estatus' => 'Activo',
        'docs' => '13/13'
    ],
    [
        'id' => 4,
        'nombre' => 'María Gómez López',
        'puesto' => 'Enfermera',
        'correo' => 'enfermera.gomez@redmedica.com',
        'telefono' => '3345678901',
        'estatus' => 'Suspendido',
        'docs' => '09/13'
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Empleados - Red Médica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at 80% 20%, #9bc5e7 0%, #6ba2d2 40%, #4a82b8 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
        }

        /* --- HEADER ADMINISTRATIVO --- */
        header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: 600;
        }

        .user-session {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
        }

        .btn-logout {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 5px 12px;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: rgba(217, 83, 79, 0.8);
            border-color: transparent;
            color: white;
        }

        /* --- CONTENEDOR PRINCIPAL --- */
        main {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: 30px auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .back-link {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            opacity: 0.9;
        }

        .back-link:hover {
            opacity: 1;
            text-decoration: underline;
        }

        /* --- BARRA DE ACCIONES (ALTAS / BUSCADOR) --- */
        .action-bar {
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px;
            border-radius: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        }

        @media (max-width: 700px) {
            .action-bar { flex-direction: column; align-items: stretch; }
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: white;
            outline: none;
            font-size: 14px;
        }

        .search-box input::placeholder { color: rgba(255,255,255,0.8); }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.8);
        }

        .btn-alta {
            background: linear-gradient(to bottom, #7cb3eb 0%, #478cd1 100%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .btn-alta:hover {
            background: linear-gradient(to bottom, #8ec1f7 0%, #549be6 100%);
        }

        /* --- CONTENEDOR DE TABLA DE EMPLEADOS --- */
        .table-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 800px;
        }

        th {
            padding: 14px 16px;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            font-size: 14px;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
        }

        td {
            padding: 16px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.05);
        }

        /* --- ESTATUS BADGES --- */
        .badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .badge-activo { background-color: rgba(40, 167, 69, 0.35); border: 1px solid rgba(40, 167, 69, 0.5); color: #e2fcdb; }
        .badge-suspendido { background-color: rgba(220, 53, 69, 0.35); border: 1px solid rgba(220, 53, 69, 0.5); color: #fce2e2; }

        /* --- BOTONES DE ACCIÓN EN TABLA --- */
        .actions-cell {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: white;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 13px;
        }

        .btn-profile:hover { background: #4fc3f7; border-color: transparent; }
        .btn-docs:hover { background: #ba68c8; border-color: transparent; }
        .btn-delete:hover { background: #e57373; border-color: transparent; }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <i class="fa-solid fa-users-gear"></i>
            <span>Control de Empleados</span>
        </div>
        <div class="user-session">
            <span><i class="fa-regular fa-user"></i> <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
            <a href="logout.php" class="btn-logout">Salir</a>
        </div>
    </header>

    <main>
        
        <div>
            <a href="index.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Volver al Portal General</a>
        </div>

        <section class="action-bar">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar empleado por nombre, RFC o puesto...">
            </div>
            
            <a href="#" class="btn-alta" onclick="alert('Desplegar modal de Registro de Datos Personales, CURP, RFC e id_rol')">
                <i class="fa-solid fa-user-plus"></i>
                <span>Alta de Empleado</span>
            </a>
        </section>

        <section class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>Puesto / Función</th>
                        <th>Contacto</th>
                        <th>Documentación</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empleados as $emp): ?>
                        <tr>
                            <td><strong>#<?php echo $emp['id']; ?></strong></td>
                            <td><?php echo htmlspecialchars($emp['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($emp['puesto']); ?></td>
                            <td>
                                <div style="font-size: 13px;"><?php echo htmlspecialchars($emp['correo']); ?></div>
                                <div style="font-size: 12px; color: rgba(255,255,255,0.7);"><?php echo htmlspecialchars($emp['telefono']); ?></div>
                            </td>
                            <td>
                                <i class="fa-regular fa-file-pdf" style="color: #ff8a80; margin-right: 5px;"></i> 
                                <?php echo $emp['docs']; ?> Validados
                            </td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($emp['estatus']); ?>">
                                    <?php echo $emp['estatus']; ?>
                                </span>
                            </td>
                            <td class="actions-cell">
                                <a href="#" class="btn-action btn-profile" title="Ver Perfil Completo" onclick="alert('Cargando expediente personal, CURP, RFC y Formación Académica del empleado.')">
                                    <i class="fa-solid fa-address-card"></i>
                                </a>
                                <a href="#" class="btn-action btn-docs" title="Validar Documentos Oficiales (INE, Cédula...)" onclick="alert('Abriendo bandeja de archivos PDF anexados pendientes de validación.')">
                                    <i class="fa-solid fa-folder-open"></i>
                                </a>
                                <a href="#" class="btn-action btn-delete" title="Dar de Baja / Suspender" onclick="return confirm('¿Está seguro de que desea cambiar el estatus operativo de este empleado?')">
                                    <i class="fa-solid fa-user-slash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>