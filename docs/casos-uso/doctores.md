
# Casos de Uso — Doctores

[Volver al README](../README.md)

---
## Índice

- [CU11 — Consultar Perfil](#cu11--consultar-perfil)
- [CU12 — Actualizar Datos de Contacto](#cu12--actualizar-datos-de-contacto)
- [CU13 — Enviar Notificaciones](#cu13--enviar-notificaciones)
- [CU15 — Buscar Red Médica](#cu15--buscar-red-médica)
- [CU16 — Subir Documentos](#cu16--subir-documentos)

---

## Referencias

- [Requerimientos Funcionales](../requerimientos/funcionales.md)
- [Requerimientos No Funcionales](../requerimientos/no-funcionales.md)

---

<br><br>

# CU11 — Consultar Perfil

## Objetivo
Permitir que el doctor consulte su información personal y laboral.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-11 — Consulta de Información de Perfil |
| **Prioridad** | Alta |

---

## Precondiciones
- El doctor debe haber iniciado sesión.

---

## Flujo Principal
1. El doctor accede al sistema.
2. Selecciona la opción "Mi Perfil".
3. El sistema consulta la información registrada.
4. El sistema muestra los datos personales y laborales.

---

## Flujos Alternos

### FA-01 — Retraso de Información
- El sistema mostrará un indicador de carga.

---

## Postcondiciones
- El doctor visualiza correctamente su información.

---

## Reglas de Negocio
- RNF-06 — Diseño responsivo.
- RNF-12 — Accesibilidad web.

---

## Resumen
El doctor consulta información relacionada con su perfil profesional.

---

<br><br>

# CU12 — Actualizar Datos de Contacto

## Objetivo
Permitir que el doctor actualice su información de contacto.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-12 — Actualización de Datos de Contacto |
| **Prioridad** | Media |

---

## Precondiciones
- El usuario debe haber iniciado sesión.

---

## Flujo Principal
1. El doctor accede al apartado de configuración.
2. Modifica correo electrónico o teléfono.
3. El sistema valida la información.
4. El doctor guarda los cambios.
5. El sistema actualiza los datos.

---

## Flujos Alternos

### FA-01 — Correo Inválido
- El sistema rechazará el cambio.

---

## Postcondiciones
- Los datos de contacto quedan actualizados correctamente.

---

## Reglas de Negocio
- RNF-03 — Protección de datos personales.
- RNF-06 — Adaptabilidad móvil.

---

## Resumen
El doctor administra su información básica de contacto.

---

<br><br>

# CU13 — Enviar Notificaciones

## Objetivo
Permitir el envío automático de notificaciones relacionadas con cambios relevantes.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Sistema |
| **Tipo** | Secundario |
| **Referencia** | RF-13 — Notificaciones de Sistema |
| **Prioridad** | Media |

---

## Precondiciones
- Debe existir una acción relevante dentro del sistema.

---

## Flujo Principal
1. El administrador realiza una modificación relevante.
2. El sistema genera una notificación automática.
3. El sistema prepara el contenido del correo.
4. El sistema envía la notificación al doctor correspondiente.

---

## Flujos Alternos

### FA-01 — Error de Envío
- El sistema registrará el incidente en logs.

---

## Postcondiciones
- El usuario recibe una notificación relacionada con cambios importantes.

---

## Reglas de Negocio
- RNF-02 — Comunicación segura HTTPS.
- RNF-09 — Respaldo de información.

---

## Resumen
El sistema informa automáticamente eventos relevantes mediante correo electrónico.

---

<br><br>

# CU15 — Buscar Red Médica

## Objetivo
Permitir localizar doctores por especialidad u hospital.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-15 — Buscador de Red Médica |
| **Prioridad** | Baja |

---

## Precondiciones
- El doctor debe haber iniciado sesión.

---

## Flujo Principal
1. El doctor accede al directorio médico.
2. Selecciona filtros de búsqueda.
3. El sistema procesa la consulta.
4. El sistema muestra coincidencias disponibles.

---

## Flujos Alternos

### FA-01 — Sin Resultados
- El sistema mostrará mensaje informativo.

### FA-02 — Doctor Inactivo
- El sistema omitirá resultados inactivos.

---

## Postcondiciones
- El doctor obtiene resultados válidos de búsqueda.

---

## Reglas de Negocio
- RNF-04 — Optimización de consultas.
- RNF-06 — Diseño adaptable.

---

## Resumen
El doctor consulta información de colegas dentro de la red médica.

---

<br><br>

# CU16 — Subir Documentos

## Objetivo
Permitir almacenar documentación profesional asociada a doctores.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-16 — Repositorio de Documentos |
| **Prioridad** | Media |

---

## Precondiciones
- El usuario debe haber iniciado sesión.

---

## Flujo Principal
1. El doctor accede al módulo de documentación.
2. Selecciona un archivo PDF.
3. El sistema valida el tamaño y formato.
4. El usuario confirma la carga.
5. El sistema almacena el documento.

---

## Flujos Alternos

### FA-01 — Archivo Excede Tamaño Permitido
- El sistema rechazará la carga.

### FA-02 — Formato Inválido
- El sistema impedirá almacenar el archivo.

---

## Postcondiciones
- El documento queda almacenado correctamente.

---

## Reglas de Negocio
- RNF-09 — Respaldo automático.
- RNF-03 — Protección de datos.

---

## Resumen
El doctor almacena documentación profesional en formato PDF.

---

