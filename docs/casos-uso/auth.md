
# Casos de Uso — Autenticación y Seguridad

[Volver al README](../README.md)

---
## Índice

- [CU1 — Iniciar Sesión](#cu1--iniciar-sesión)
- [CU2 — Recuperar Contraseña](#cu2--recuperar-contraseña)
- [CU3 — Gestionar Roles y Accesos](#cu3--gestionar-roles-y-accesos)
- [CU20 — Cambiar Contraseña](#cu20--cambiar-contraseña)

---

## Referencias

- [Requerimientos Funcionales](../requerimientos/funcionales.md)
- [Requerimientos No Funcionales](../requerimientos/no-funcionales.md)

---

<br><br>

# CU1 — Iniciar Sesión

## Objetivo
Permitir que Administradores y Doctores accedan al sistema mediante autenticación segura.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador, Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-01 — Autenticación de Usuarios |
| **Prioridad** | Alta |

---

## Precondiciones
- El usuario debe contar con una cuenta activa registrada en el sistema.

---

## Flujo Principal
1. El usuario accede a la pantalla de login.
2. Ingresa correo electrónico y contraseña.
3. El sistema valida las credenciales.
4. El sistema identifica el rol asignado.
5. El sistema concede acceso y redirige al panel correspondiente.

---

## Flujos Alternos

### FA-01 — Credenciales Incorrectas
- El sistema mostrará un mensaje de error.

### FA-02 — Cuenta Desactivada
- El sistema notificará que la cuenta se encuentra desactivada.

---

## Postcondiciones
- El usuario accede al panel correspondiente según su rol.

---

## Reglas de Negocio
- RNF-01 — Contraseñas cifradas.
- RNF-02 — Comunicación mediante HTTPS.
- RNF-04 — Tiempo de respuesta menor a 2 segundos.

---

## Resumen
El sistema valida las credenciales y concede acceso dependiendo de los permisos del usuario.

---

<br><br>

# CU2 — Recuperar Contraseña

## Objetivo
Permitir que los usuarios restablezcan su contraseña mediante correo electrónico seguro.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador, Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-02 — Recuperación de Contraseña |
| **Prioridad** | Media |

---

## Precondiciones
- El usuario debe contar con un correo registrado.

---

## Flujo Principal
1. El usuario selecciona la opción "Olvidé mi contraseña".
2. Ingresa su correo electrónico.
3. El sistema valida el correo registrado.
4. El sistema genera un token seguro.
5. Se envía un enlace de recuperación.
6. El usuario establece una nueva contraseña.

---

## Flujos Alternos

### FA-01 — Correo No Registrado
- El sistema mostrará un mensaje genérico de validación.

---

## Postcondiciones
- La contraseña del usuario queda actualizada correctamente.

---

## Reglas de Negocio
- RNF-01 — Contraseñas encriptadas.
- RNF-02 — Comunicación segura HTTPS.

---

## Resumen
El sistema genera un proceso seguro de recuperación de acceso mediante correo electrónico.

---

<br><br>

# CU3 — Gestionar Roles y Accesos

## Objetivo
Controlar el acceso a funcionalidades según el rol asignado al usuario.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Sistema |
| **Tipo** | Secundario |
| **Referencia** | RF-03 — Control de Accesos |
| **Prioridad** | Alta |

---

## Precondiciones
- El usuario debe haber iniciado sesión correctamente.

---

## Flujo Principal
1. El usuario inicia sesión.
2. El sistema evalúa el rol asignado.
3. El sistema habilita módulos correspondientes.
4. Las funcionalidades restringidas permanecen ocultas.

---

## Flujos Alternos

### FA-01 — Acceso No Autorizado
- El sistema mostrará el mensaje "Acceso Denegado".

---

## Postcondiciones
- El usuario únicamente podrá acceder a funcionalidades autorizadas.

---

## Reglas de Negocio
- RNF-03 — Protección de datos personales.
- RNF-11 — Arquitectura modular.

---

## Resumen
El sistema restringe funcionalidades según permisos y roles definidos.

---

<br><br>

# CU20 — Cambiar Contraseña

## Objetivo
Permitir que los usuarios actualicen su contraseña de acceso de manera segura.

---

## Información General

| Campo | Valor |
|---|---|
| **Actores** | Administrador, Doctor |
| **Tipo** | Primario |
| **Referencia** | RF-20 — Cambio de Contraseña |
| **Prioridad** | Alta |

---

## Precondiciones
- El usuario debe haber iniciado sesión.
- El usuario debe conocer su contraseña actual.

---

## Flujo Principal
1. El usuario accede al módulo de configuración.
2. Ingresa su contraseña actual.
3. Define una nueva contraseña.
4. El sistema valida las credenciales y reglas de seguridad.
5. El usuario confirma el cambio.
6. El sistema actualiza la contraseña.

---

## Flujos Alternos

### FA-01 — Contraseña Actual Incorrecta
- El sistema rechazará el cambio.

### FA-02 — Contraseña No Cumple Requisitos
- El sistema mostrará criterios mínimos de seguridad.

---

## Postcondiciones
- La contraseña queda actualizada correctamente.

---

## Reglas de Negocio
- RNF-01 — Contraseñas cifradas.
- RNF-02 — Comunicación segura HTTPS.
- RNF-03 — Protección de datos personales.

---

## Resumen
El usuario modifica su contraseña mediante un proceso seguro de validación.

---