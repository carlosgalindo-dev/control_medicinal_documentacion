<?php
session_start();

// Si NO hay sesión iniciada, lo mandamos directo al login por seguridad
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Red Médica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', system-ui, sans-serif; margin: 0; padding: 0; }
        
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f1f5f9;
            color: #1e293b;
        }

        /* --- SIDERBAR (MENÚ LATERAL) --- */
        .sidebar {
            width: 260px;
            background-color: #0f172a;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; bottom: 0; left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 24px;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #1e293b;
            color: #3b82f6;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #94a3b8;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: #1e293b;
            color: #ffffff;
        }

        .sidebar-menu a.active i {
            color: #3b82f6;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid #1e293b;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #ef4444;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-logout:hover { background-color: #dc2626; }

        /* --- CONTENEDOR PRINCIPAL --- */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 40px;
        }

        /* Header del Panel */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .content-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
        }

        .user-pill {
            background-color: #ffffff;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #e2e8f0;
        }

        /* --- CONTENEDOR DE TARJETAS MODULARES --- */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .module-card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 28px;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            gap: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .module-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .module-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #0f172a;
        }

        .module-card p {
            font-size: 14px;
            color: #64748b;
            line-height: 1.5;
        }

        .card-footer-link {
            margin-top: auto;
            font-size: 14px;
            font-weight: 600;
            color: #3b82f6;
            display: flex;
            align-items: center;
            gap: 6px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-house-medical"></i>
            <span>Red Médica</span>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active"><i class="fa-solid fa-chart-pie"></i> Panel General</a></li>
            <li><a href="empleados.php"><i class="fa-solid fa-users"></i> Empleados</a></li>
            <li><a href="#" onclick="alert('Módulo en desarrollo')"><i class="fa-solid fa-calendar-days"></i> Turnos</a></li>
            <li><a href="#" onclick="alert('Módulo en desarrollo')"><i class="fa-solid fa-file-contract"></i> Contratos</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="logout.php" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="content-header">
            <div>
                <h1>Centro de Control Operativo</h1>
            </div>
            <div class="user-pill">
                <i class="fa-solid fa-circle" style="color: #10b981; font-size: 10px;"></i>
                <span>Sesión: <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
            </div>
        </div>

        <div class="modules-grid">
            
            <a href="empleados.php" class="module-card">
                <div class="icon-wrapper" style="background-color: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                <h3>Control de Empleados</h3>
                <p>Gestione expedientes, altas, bajas y perfiles del personal médico y administrativo.</p>
                <div class="card-footer-link">Acceder módulo <i class="fa-solid fa-arrow-right"></i></div>
            </a>

            <a href="#" class="module-card" onclick="alert('Módulo en desarrollo')">
                <div class="icon-wrapper" style="background-color: rgba(16, 185, 129, 0.1); color: #10b981;">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <h3>Turnos e Incidencias</h3>
                <p>Planeación y asignación de jornadas matutinas, vespertinas y nocturnas.</p>
                <div class="card-footer-link">Acceder módulo <i class="fa-solid fa-arrow-right"></i></div>
            </a>

            <a href="#" class="module-card" onclick="alert('Módulo en desarrollo')">
                <div class="icon-wrapper" style="background-color: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <h3>Contratos y Sueldos</h3>
                <p>Monitoreo de estructuras de salarios, prestaciones y vigencia de contratos.</p>
                <div class="card-footer-link">Acceder módulo <i class="fa-solid fa-arrow-right"></i></div>
            </a>

            <a href="#" class="module-card" onclick="alert('Módulo en desarrollo')">
                <div class="icon-wrapper" style="background-color: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3>Bitácora del Sistema</h3>
                <p>Auditoría de seguridad y logs transaccionales del personal de RH.</p>
                <div class="card-footer-link">Acceder módulo <i class="fa-solid fa-arrow-right"></i></div>
            </a>

        </div>
    </div>

</body>
</html>