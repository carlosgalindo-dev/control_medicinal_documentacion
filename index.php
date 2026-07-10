<?php
session_start();
// Estructura limpia: sin redirecciones automáticas forzadas para mantener el Index de libre navegación pública
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Control - Red Médica</title>
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
            display: flex;
            flex-direction: column;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* --- MENÚ DE NAVEGACIÓN SUPERIOR (GLASS) --- */
        header {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.25);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .logo i {
            font-size: 26px;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ffffff;
        }

        .btn-login-nav {
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 8px 20px;
            border-radius: 8px;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-login-nav:hover {
            background: white;
            color: #4a82b8;
        }

        /* --- CONTENEDOR PRINCIPAL --- */
        main {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: 40px auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        /* --- SECCIÓN HERO (BIENVENIDA CENTRALIZADA) --- */
        .hero-section {
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .hero-text h1 {
            font-size: 36px;
            margin-bottom: 12px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .hero-text p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            line-height: 1.6;
            max-width: 600px;
            margin-bottom: 25px;
        }

        .btn-main-access {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(to bottom, #7cb3eb 0%, #478cd1 100%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 14px 30px;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-main-access:hover {
            background: linear-gradient(to bottom, #8ec1f7 0%, #549be6 100%);
            transform: translateY(-1px);
        }

        /* --- SECCIÓN INDICADORES / ESTADÍSTICAS --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 25px 20px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        .stat-card i {
            font-size: 32px;
            color: rgba(255,255,255,0.85);
        }

        .stat-info h3 {
            font-size: 24px;
            font-weight: 600;
        }

        .stat-info p {
            font-size: 13px;
            color: rgba(255,255,255,0.75);
        }

        /* --- SECCIÓN ACCESOS DE CONTROL DE PERSONAL & AVISOS --- */
        .content-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        @media (max-width: 850px) {
            .content-layout { grid-template-columns: 1fr; }
            .hero-section { flex-direction: column; text-align: center; }
            .hero-text p { margin-left: auto; margin-right: auto; }
        }

        .panel-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 30px;
            border-radius: 20px;
        }

        .panel-box h2 {
            font-size: 20px;
            margin-bottom: 20px;
            font-weight: 500;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Módulos internos */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .module-item {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            padding: 18px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .module-item:hover {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.4);
        }

        .module-item i { font-size: 22px; }
        .module-item h4 { font-size: 15px; font-weight: 600; }
        .module-item p { font-size: 12px; color: rgba(255,255,255,0.75); }

        /* Lista de avisos institucionales */
        .news-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .news-item {
            background: rgba(255,255,255,0.08);
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 13px;
            border-left: 4px solid #7cb3eb;
        }

        .news-item span {
            font-size: 11px;
            color: rgba(255,255,255,0.6);
            display: block;
            margin-bottom: 4px;
        }

        /* --- FOOTER FORMAL --- */
        footer {
            background: rgba(0, 0, 0, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding: 20px 5%;
            text-align: center;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <i class="fa-solid fa-square-h"></i>
            <span>Red Médica</span>
        </div>
        <ul class="nav-links">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Módulos</a></li>
            <li><a href="#">Asistencia</a></li>
            <li><a href="#">Soporte</a></li>
        </ul>
        <a href="login.php" class="btn-login-nav"><i class="fa-solid fa-lock"></i> Acceso</a>
    </header>

    <main>
        
        <section class="hero-section">
            <div class="hero-text">
                <h1>Plataforma de Gestión Integral</h1>
                <p>Sistema centralizado de control de personal administrativo, operativo y cuerpo médico. Optimice la asignación de turnos, incidencias y gestión de expedientes de la red hospitalaria.</p>
                <a href="login.php" class="btn-main-access">
                    <span>Ingresar al Panel de Control</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="hero-icon" style="font-size: 90px; color: rgba(255,255,255,0.25); padding-right: 20px;">
                <i class="fa-solid fa-shield-heart"></i>
            </div>
        </section>

        <section class="stats-grid">
            <div class="stat-card">
                <i class="fa-solid fa-hospital"></i>
                <div class="stat-info">
                    <h3>Activa</h3>
                    <p>Red de Hospitales</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fa-solid fa-user-doctor"></i>
                <div class="stat-info">
                    <h3>Control</h3>
                    <p>Médicos y Especialistas</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fa-solid fa-clock"></i>
                <div class="stat-info">
                    <h3>24 / 7</h3>
                    <p>Gestión de Horarios</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fa-solid fa-fingerprint"></i>
                <div class="stat-info">
                    <h3>Biométrico</h3>
                    <p>Asistencia General</p>
                </div>
            </div>
        </section>

        <div class="content-layout">
            
            <section class="panel-box">
                <h2><i class="fa-solid fa-sliders"></i> Núcleos de Control Operativo</h2>
                <div class="modules-grid">
                    
                    <div class="module-item" onclick="window.location.href='login.php'">
                        <i class="fa-solid fa-users-gear" style="color: #ffb74d;"></i>
                        <h4>Control de Empleados</h4>
                        <p>Altas, bajas, perfiles de personal y documentación oficial.</p>
                    </div>

                    <div class="module-item" onclick="window.location.href='login.php'">
                        <i class="fa-solid fa-calendar-check" style="color: #81c784;"></i>
                        <h4>Turnos e Incidencias</h4>
                        <p>Planeación de jornadas matutinas, vespertinas y nocturnas.</p>
                    </div>

                    <div class="module-item" onclick="window.location.href='login.php'">
                        <i class="fa-solid fa-file-invoice-dollar" style="color: #4fc3f7;"></i>
                        <h4>Contratos y Sueldos</h4>
                        <p>Estructuras de salarios base y vigencia de contrataciones.</p>
                    </div>

                    <div class="module-item" onclick="window.location.href='login.php'">
                        <i class="fa-solid fa-clipboard-list" style="color: #ba68c8;"></i>
                        <h4>Bitácora del Sistema</h4>
                        <p>Auditoría de acciones e historial transaccional de seguridad.</p>
                    </div>

                </div>
            </section>

            <section class="panel-box">
                <h2><i class="fa-solid fa-bullhorn"></i> Estado del Portal</h2>
                <div class="news-list">
                    <div class="news-item">
                        <span>Hoy, 08:00 AM</span>
                        <strong>Monitoreo de Asistencia Activo:</strong> Recuerde registrar sus incidencias antes del corte de nómina semanal.
                    </div>
                    <div class="news-item">
                        <span>Ayer</span>
                        <strong>Módulo de Seguridad:</strong> El cifrado y la auditoría por IP se encuentran operando con normalidad en la base de datos.
                    </div>
                </div>
            </section>

        </div>

    </main>

    <footer>
        <p>&copy; 2026 Red Médica Hospitalaria. Sistema de Gestión y Control Interno Reservado.</p>
    </footer>

</body>
</html>