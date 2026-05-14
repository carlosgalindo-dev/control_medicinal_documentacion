# Casos de Uso — Administración

[Volver al README](../README.md)

---

## Índice

- [CU4 — Gestionar Especialidades](#cu4--gestionar-especialidades)
- [CU5 — Gestionar Hospitales](#cu5--gestionar-hospitales)
- [CU6 — Gestionar Áreas de Trabajo](#cu6--gestionar-áreas-de-trabajo)
- [CU7 — Registrar Doctor](#cu7--registrar-doctor)
- [CU8 — Asignar Doctor a Hospital](#cu8--asignar-doctor-a-hospital)
- [CU9 — Asignar Área de Trabajo](#cu9--asignar-área-de-trabajo)
- [CU10 — Modificar Datos del Doctor](#cu10--modificar-datos-del-doctor)
- [CU14 — Gestionar Turnos Médicos](#cu14--gestionar-turnos-médicos)
- [CU17 — Desactivar Doctor](#cu17--desactivar-doctor)
- [CU18 — Registrar Bitácora](#cu18--registrar-bitácora)
- [CU19 — Exportar Reportes](#cu19--exportar-reportes)
- [CU21 — Consultar Dashboard Administrativo](#cu21--consultar-dashboard-administrativo)

---

## Referencias

- [Requerimientos Funcionales](../requerimientos/funcionales.md)
- [Requerimientos No Funcionales](../requerimientos/no-funcionales.md)
---

<br><br>

# CU4 — Gestionar Especialidades

## Objetivo
Permitir administrar el catálogo de especialidades médicas.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-04 — Gestión de Especialidades |
| **Prioridad** | Media |

---

## Precondiciones
- El administrador debe haber iniciado sesión.
- Debe contar con permisos válidos.

---

## Flujo Principal
1. El administrador accede al módulo de especialidades.
2. Visualiza las especialidades registradas.
3. Registra, edita o elimina una especialidad.
4. El sistema actualiza el catálogo.

---

## Flujos Alternos

### FA-01 — Especialidad Duplicada
- El sistema rechazará el registro.

---

## Postcondiciones
- Las especialidades quedan actualizadas en el sistema.

---

## Reglas de Negocio
- RNF-04 — Tiempo de respuesta optimizado.
- RNF-06 — Diseño responsivo.

---

## Resumen
El administrador administra las especialidades médicas disponibles en la red médica.

---

<br><br>

# CU5 — Gestionar Hospitales

## Objetivo
Permitir administrar hospitales registrados en el sistema.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-05 — Gestión de Hospitales |
| **Prioridad** | Media |

---

## Precondiciones
- El administrador debe contar con permisos válidos.

---

## Flujo Principal
1. El administrador accede al catálogo de hospitales.
2. Visualiza hospitales registrados.
3. Crea, modifica o desactiva hospitales.
4. El sistema guarda los cambios realizados.

---

## Flujos Alternos

### FA-01 — Datos Incompletos
- El sistema rechazará el registro o actualización.

---

## Postcondiciones
- Los hospitales quedan registrados o actualizados correctamente.

---

## Reglas de Negocio
- RNF-05 — Disponibilidad 24/7.
- RNF-10 — Escalabilidad del sistema.

---

## Resumen
El administrador administra hospitales pertenecientes a la red médica.

---

<br><br>

# CU6 — Gestionar Áreas de Trabajo

## Objetivo
Permitir registrar y administrar áreas hospitalarias.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-06 — Gestión de Áreas de Trabajo |
| **Prioridad** | Media |

---

## Precondiciones
- El hospital seleccionado debe encontrarse activo.

---

## Flujo Principal
1. El administrador selecciona un hospital.
2. Accede al módulo de áreas.
3. Registra una nueva área.
4. El sistema asocia el área al hospital.

---

## Flujos Alternos

### FA-01 — Hospital Inactivo
- El sistema impedirá registrar áreas.

---

## Postcondiciones
- El área queda asociada correctamente al hospital.

---

## Reglas de Negocio
- RNF-11 — Arquitectura modular.
- RNF-06 — Diseño responsivo.

---

## Resumen
El administrador administra departamentos y áreas de trabajo hospitalarias.

---

<br><br>

# CU7 — Registrar Doctor

## Objetivo
Permitir registrar nuevos doctores dentro de la red médica.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-07 — Registro de Doctores |
| **Prioridad** | Alta |

---

## Precondiciones
- El administrador debe contar con permisos válidos.

---

## Flujo Principal
1. El administrador selecciona "Nuevo Doctor".
2. Captura la información requerida.
3. El sistema valida los datos.
4. El sistema genera credenciales automáticas.
5. El sistema guarda el registro.

---

## Flujos Alternos

### FA-01 — Correo Duplicado
- El sistema rechazará el registro.

### FA-02 — Cédula Duplicada
- El sistema impedirá guardar la información.

---

## Postcondiciones
- El doctor queda registrado correctamente.

---

## Reglas de Negocio
- RNF-01 — Contraseñas cifradas.
- RNF-08 — Registro intuitivo menor a 5 pasos.

---

## Resumen
El administrador registra nuevos doctores y el sistema genera credenciales automáticamente.

---

<br><br>

# CU8 — Asignar Doctor a Hospital

## Objetivo
Permitir asociar doctores con hospitales registrados.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-08 — Asignación de Doctor a Hospital |
| **Prioridad** | Alta |

---

## Precondiciones
- El doctor debe existir y encontrarse activo.

---

## Flujo Principal
1. El administrador accede al perfil del doctor.
2. Selecciona hospitales disponibles.
3. Guarda los cambios.
4. El sistema registra la asociación.

---

## Flujos Alternos

### FA-01 — Doctor Inactivo
- El sistema impedirá realizar asignaciones.

---

## Postcondiciones
- El doctor queda asociado al hospital seleccionado.

---

## Reglas de Negocio
- RNF-10 — Escalabilidad.
- RNF-04 — Respuesta rápida.

---

## Resumen
El administrador asigna doctores a hospitales pertenecientes a la red médica.

---

<br><br>

# CU9 — Asignar Área de Trabajo

## Objetivo
Permitir asignar doctores a áreas específicas dentro de hospitales.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-09 — Asignación de Área de Trabajo |
| **Prioridad** | Alta |

---

## Precondiciones
- El hospital y área deben estar activos.

---

## Flujo Principal
1. El administrador selecciona un hospital.
2. El sistema carga áreas disponibles.
3. El administrador selecciona un área.
4. El sistema guarda la asignación.

---

## Flujos Alternos

### FA-01 — Área Saturada
- El sistema bloqueará la asignación.

### FA-02 — Área Inactiva
- El sistema ocultará el área disponible.

---

## Postcondiciones
- El doctor queda asociado al área correspondiente.

---

## Reglas de Negocio
- RNF-10 — Soporte de crecimiento modular.

---

## Resumen
El sistema relaciona doctores con áreas hospitalarias disponibles.

---

<br><br>

# CU10 — Modificar Datos del Doctor

## Objetivo
Permitir actualizar la información personal y profesional de un doctor registrado.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-10 — Modificación de Datos del Doctor |
| **Prioridad** | Alta |

---

## Precondiciones
- El doctor debe existir en el sistema.
- El administrador debe contar con permisos válidos.

---

## Flujo Principal
1. El administrador selecciona un doctor registrado.
2. El sistema muestra la información actual.
3. El administrador modifica los datos necesarios.
4. El sistema valida la información.
5. El administrador guarda los cambios.
6. El sistema actualiza el registro.

---

## Flujos Alternos

### FA-01 — Datos Inválidos
- El sistema impedirá guardar la información.

---

## Postcondiciones
- La información del doctor queda actualizada correctamente.

---

## Reglas de Negocio
- RNF-04 — Tiempo de respuesta optimizado.
- RNF-11 — Arquitectura modular.

---

## Resumen
El administrador actualiza información previamente registrada del doctor.

---

<br><br>

---
# CU14 — Gestionar Turnos Médicos

## Objetivo
Permitir administrar horarios y turnos médicos dentro de hospitales.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-14 — Gestión de Turnos y Horarios |
| **Prioridad** | Alta |

---

## Precondiciones
- El hospital y doctor deben encontrarse activos.

---

## Flujo Principal
1. El administrador accede al módulo de turnos.
2. Selecciona hospital y horario.
3. Define el turno médico.
4. El sistema valida conflictos de horario.
5. El sistema guarda el turno.

---

## Flujos Alternos

### FA-01 — Traslape de Horarios
- El sistema impedirá registrar el turno.

---

## Postcondiciones
- El turno médico queda registrado correctamente.

---

## Reglas de Negocio
- RNF-04 — Respuesta menor a 2 segundos.
- RNF-10 — Escalabilidad del sistema.

---

## Resumen
El administrador asigna horarios médicos evitando conflictos de disponibilidad.

---

<br><br>

# CU17 — Desactivar Doctor

## Objetivo
Permitir desactivar doctores conservando su historial operativo.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-17 — Baja de Doctores |
| **Prioridad** | Alta |

---

## Precondiciones
- El doctor debe existir dentro del sistema.

---

## Flujo Principal
1. El administrador selecciona un doctor.
2. Elige la opción "Desactivar".
3. El sistema solicita confirmación.
4. El administrador confirma la operación.
5. El sistema actualiza el estado del doctor.

---

## Flujos Alternos

### FA-01 — Turnos Activos Existentes
- El sistema mostrará advertencia antes de continuar.

---

## Postcondiciones
- El doctor queda marcado como inactivo.

---

## Reglas de Negocio
- RNF-09 — Conservación de respaldos.
- RNF-11 — Mantenibilidad modular.

---

## Resumen
El administrador realiza bajas lógicas conservando historial médico y operativo.

---

<br><br>

# CU18 — Registrar Bitácora

## Objetivo
Permitir almacenar acciones administrativas relevantes dentro del sistema.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Sistema |
| **Tipo** | Secundario |
| **Referencia** | RF-18 — Bitácora de Actividades |
| **Prioridad** | Alta |

---

## Precondiciones
- Debe ejecutarse una acción administrativa relevante.

---

## Flujo Principal
1. El administrador realiza una operación.
2. El sistema captura usuario, acción y fecha.
3. El sistema registra la información en bitácora.

---

## Flujos Alternos

### FA-01 — Error de Registro
- El sistema almacenará el incidente en logs internos.

---

## Postcondiciones
- La actividad queda registrada correctamente.

---

## Reglas de Negocio
- RNF-09 — Respaldo de información.
- RNF-03 — Protección de datos personales.

---

## Resumen
El sistema registra eventos importantes relacionados con actividades administrativas.

---

<br><br>

# CU19 — Exportar Reportes

## Objetivo
Permitir generar reportes descargables del sistema.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-19 — Exportación de Reportes |
| **Prioridad** | Media |

---

## Precondiciones
- Deben existir datos disponibles para exportación.

---

## Flujo Principal
1. El administrador accede al módulo de reportes.
2. Selecciona el tipo de información.
3. Define formato de exportación.
4. El sistema genera el archivo.
5. El usuario descarga el reporte.

---

## Flujos Alternos

### FA-01 — Información Vacía
- El sistema notificará que no existen datos disponibles.

---

## Postcondiciones
- El reporte queda generado correctamente en PDF o Excel.

---

## Reglas de Negocio
- RNF-04 — Tiempo de respuesta eficiente.
- RNF-10 — Escalabilidad en generación de reportes.

---

## Resumen
El administrador exporta información del sistema en distintos formatos.

---

<br><br>


# CU21 — Consultar Dashboard Administrativo

## Objetivo
Permitir visualizar métricas generales relacionadas con la red médica.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador |
| **Tipo** | Primario |
| **Referencia** | RF-21 — Dashboard Administrativo |
| **Prioridad** | Media |

---

## Precondiciones
- El administrador debe haber iniciado sesión.
- Deben existir métricas registradas dentro del sistema.

---

## Flujo Principal
1. El administrador accede al dashboard administrativo.
2. El sistema consulta métricas generales.
3. El sistema procesa información estadística.
4. El dashboard muestra indicadores y gráficas.
5. El administrador consulta la información disponible.

---

## Flujos Alternos

### FA-01 — Error en Métricas
- El sistema mostrará advertencias parciales.

### FA-02 — Sin Información Disponible
- El sistema mostrará panel vacío informativo.

---

## Postcondiciones
- Las métricas administrativas son visualizadas correctamente.

---

## Reglas de Negocio
- RNF-04 — Tiempo de respuesta menor a 2 segundos.
- RNF-06 — Diseño responsivo.
- RNF-10 — Escalabilidad del sistema.

---

## Resumen
El sistema presenta métricas e indicadores administrativos de la red médica.

--- 