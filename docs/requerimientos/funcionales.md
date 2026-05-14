# REQUERIMIENTOS FUNCIONALES
Sistema de Control de Red Médica

---

# RF-01 — Autenticación de Usuarios

## Descripción
El sistema debe permitir a los Administradores y Doctores iniciar sesión mediante un correo electrónico y una contraseña encriptada.

## Flujo normal
1. El usuario accede a la pantalla de login del sistema.
2. El usuario ingresa su correo electrónico y contraseña.
3. El sistema valida las credenciales contrastándolas contra la base de datos.
4. El sistema identifica el rol asignado al usuario.
5. El sistema concede el acceso y redirige al panel correspondiente.

## Excepciones
- Si las credenciales no coinciden, el sistema mostrará un mensaje de error.
- Si la cuenta está desactivada, el sistema notificará al usuario.

## Prioridad
**Alta**

---

# RF-02 — Recuperación de Contraseña

## Descripción
El sistema debe permitir a los usuarios solicitar el restablecimiento de su contraseña mediante un enlace enviado a su correo electrónico registrado.

## Flujo normal
1. El usuario selecciona "Olvidé mi contraseña".
2. El usuario introduce su correo electrónico.
3. El sistema valida el correo.
4. El sistema genera un token seguro y envía un enlace.
5. El usuario restablece la contraseña.

## Excepciones
- Si el correo no existe, el sistema mostrará un mensaje genérico.

## Prioridad
**Media**

---

# RF-03 — Control de Accesos (Roles)

## Descripción
El sistema debe restringir las funciones administrativas únicamente a usuarios con rol Administrador.

## Flujo normal
1. El usuario inicia sesión.
2. El sistema evalúa el rol.
3. Si es Administrador, se muestran módulos administrativos.
4. Si es Doctor, dichos módulos permanecen ocultos.

## Excepciones
- Si un usuario intenta acceder sin permisos, el sistema mostrará "Acceso Denegado".

## Prioridad
**Alta**

---

# RF-04 — Gestión de Especialidades

## Descripción
El sistema debe permitir al Administrador registrar, listar, editar y dar de baja especialidades médicas.

## Flujo normal
1. El Administrador accede al módulo.
2. Visualiza especialidades registradas.
3. Registra, edita o elimina especialidades.
4. El sistema actualiza el catálogo.

## Excepciones
- No se permitirán especialidades duplicadas.

## Prioridad
**Media**

---

# RF-05 — Gestión de Hospitales

## Descripción
El sistema debe permitir al Administrador gestionar hospitales registrados.

## Flujo normal
1. El Administrador accede al catálogo.
2. Visualiza hospitales registrados.
3. Crea, edita o desactiva hospitales.
4. El sistema guarda los cambios.

## Excepciones
- Si faltan datos obligatorios, el sistema rechazará el registro.

## Prioridad
**Media**

---

# RF-06 — Gestión de Áreas de Trabajo

## Descripción
El sistema debe permitir registrar áreas o departamentos dentro de hospitales.

## Flujo normal
1. El Administrador selecciona un hospital.
2. Accede al módulo de áreas.
3. Registra una nueva área.
4. El sistema asocia el área al hospital.

## Excepciones
- No se podrán agregar áreas a hospitales inactivos.

## Prioridad
**Media**

---

# RF-07 — Registro de Doctores

## Descripción
El sistema debe permitir registrar doctores mediante datos obligatorios.

## Flujo normal
1. El Administrador selecciona "Nuevo Doctor".
2. Captura los datos requeridos.
3. Guarda la información.
4. El sistema genera credenciales automáticas.

## Excepciones
- No se permitirán correos o cédulas duplicadas.

## Prioridad
**Alta**

---

# RF-08 — Asignación de Doctor a Hospital

## Descripción
El sistema debe permitir asociar doctores con hospitales.

## Flujo normal
1. El Administrador accede al perfil del doctor.
2. Selecciona hospitales.
3. Guarda los cambios.

## Excepciones
- Doctores inactivos no podrán ser reasignados.

## Prioridad
**Alta**

---

# RF-09 — Asignación de Área de Trabajo

## Descripción
El sistema debe permitir asignar un doctor a un área específica.

## Flujo normal
1. El Administrador selecciona hospital.
2. El sistema carga áreas disponibles.
3. El Administrador asigna el área.
4. El sistema guarda el vínculo.

## Excepciones
- Áreas saturadas o inactivas no estarán disponibles.

## Prioridad
**Alta**

---

# RF-10 — Modificación de Datos del Doctor

## Descripción
El sistema debe permitir actualizar información del doctor.

## Flujo normal
1. El Administrador selecciona un doctor.
2. Edita información.
3. Guarda cambios.
4. El sistema actualiza registros.

## Excepciones
- Campos inválidos impedirán el guardado.

## Prioridad
**Alta**

---

# RF-11 — Consulta de Información de Perfil

## Descripción
El Doctor podrá visualizar su información personal y laboral.

## Flujo normal
1. El Doctor inicia sesión.
2. Accede a "Mi Perfil".
3. El sistema muestra información registrada.

## Excepciones
- Si hay retrasos, el sistema mostrará un cargador.

## Prioridad
**Alta**

---

# RF-12 — Actualización de Datos de Contacto

## Descripción
El Doctor podrá modificar únicamente correo y teléfono.

## Flujo normal
1. El Doctor accede a configuración.
2. Modifica datos de contacto.
3. Guarda cambios.
4. El sistema valida y actualiza.

## Excepciones
- Correos inválidos serán rechazados.

## Prioridad
**Media**

---

# RF-13 — Notificaciones de Sistema

## Descripción
El sistema enviará correos automáticos cuando existan cambios relevantes.

## Flujo normal
1. El Administrador realiza cambios.
2. El sistema genera notificación.
3. Envía correo al Doctor.

## Excepciones
- Si falla el correo, el sistema registrará el error.

## Prioridad
**Media**

---

# RF-14 — Gestión de Turnos y Horarios

## Descripción
El Administrador podrá asignar turnos médicos.

## Flujo normal
1. Selecciona "Gestionar Turnos".
2. Elige hospital y horario.
3. Guarda turno.
4. El sistema valida conflictos.

## Excepciones
- No se permitirán traslapes de horario.

## Prioridad
**Alta**

---

# RF-15 — Buscador de Red Médica

## Descripción
Los doctores podrán buscar colegas por especialidad u hospital.

## Flujo normal
1. Accede al directorio.
2. Realiza búsqueda.
3. El sistema muestra coincidencias.

## Excepciones
- Doctores inactivos no aparecerán.

## Prioridad
**Baja**

---

# RF-16 — Repositorio de Documentos

## Descripción
El Doctor podrá subir documentos profesionales en PDF.

## Flujo normal
1. Accede a documentación.
2. Selecciona documento.
3. Carga archivo PDF.
4. El sistema almacena el documento.

## Excepciones
- Archivos mayores a 10MB serán rechazados.

## Prioridad
**Media**

---

# RF-17 — Baja de Doctores

## Descripción
El sistema permitirá desactivar doctores sin eliminar historial.

## Flujo normal
1. El Administrador selecciona doctor.
2. Elige "Desactivar".
3. Confirma operación.
4. El sistema cambia estado.

## Excepciones
- Si existen turnos activos, el sistema advertirá.

## Prioridad
**Alta**

---

# RF-18 — Bitácora de Actividades

## Descripción
El sistema registrará acciones administrativas importantes.

## Flujo normal
1. El Administrador realiza acciones.
2. El sistema guarda usuario, fecha y acción.

## Excepciones
- Si falla el log, el sistema registrará el incidente.

## Prioridad
**Alta**

---

# RF-19 — Exportación de Reportes

## Descripción
El sistema permitirá exportar reportes PDF o Excel.

## Flujo normal
1. El usuario accede a reportes.
2. Selecciona información.
3. El sistema genera archivo.

## Excepciones
- Si no hay datos, el sistema notificará.

## Prioridad
**Media**

---

# RF-20 — Cambio de Contraseña

## Descripción
El sistema permitirá cambiar la contraseña después de iniciar sesión.

## Flujo normal
1. El usuario accede a configuración.
2. Ingresa contraseña actual.
3. Define nueva contraseña.
4. El sistema valida y actualiza.

## Excepciones
- Contraseña incorrecta bloqueará el cambio.

## Prioridad
**Alta**

---

# RF-21 — Dashboard Administrativo

## Descripción
El sistema mostrará métricas generales de la red médica.

## Flujo normal
1. El Administrador inicia sesión.
2. El sistema carga métricas generales.
3. El Administrador consulta información.

## Excepciones
- Si falla una métrica, el sistema mostrará advertencia.

## Prioridad
**Media**