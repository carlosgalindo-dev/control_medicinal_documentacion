# REQUERIMIENTOS NO FUNCIONALES
Sistema de Control de Red Médica

---

# RNF-01 — Protección de Datos (Seguridad)

## Descripción
El sistema debe encriptar las contraseñas en la base de datos utilizando algoritmos de hash seguros.

## Flujo normal / Comportamiento
Cada vez que un usuario cree o modifique una contraseña, esta deberá pasar por un proceso de cifrado seguro antes de almacenarse.

## Excepciones / Restricciones
- Bajo ninguna circunstancia se almacenarán contraseñas en texto plano.
- No se mostrarán contraseñas en logs o correos electrónicos.

## Prioridad
**Alta**

---

# RNF-02 — Cifrado de Conexión

## Descripción
Toda comunicación entre cliente y servidor debe realizarse mediante HTTPS.

## Flujo normal / Comportamiento
El servidor utilizará certificados SSL/TLS para proteger la comunicación y garantizar la privacidad de los datos.

## Excepciones / Restricciones
- Las conexiones HTTP serán redirigidas automáticamente a HTTPS.

## Prioridad
**Alta**

---

# RNF-03 — Cumplimiento Legal (Privacidad)

## Descripción
El sistema debe cumplir las normativas de protección de datos personales.

## Flujo normal / Comportamiento
El sistema mostrará términos y condiciones y aviso de privacidad al primer acceso.

## Excepciones / Restricciones
- Los datos recopilados no podrán utilizarse para fines externos.

## Prioridad
**Alta**

---

# RNF-04 — Tiempo de Respuesta

## Descripción
El sistema deberá responder consultas críticas en menos de 2 segundos.

## Flujo normal / Comportamiento
Las APIs y la base de datos deberán optimizarse para mantener tiempos de respuesta rápidos.

## Excepciones / Restricciones
- No aplica durante fallas severas de red o saturación extrema.

## Prioridad
**Media**

---

# RNF-05 — Disponibilidad

## Descripción
El sistema deberá garantizar disponibilidad 24/7.

## Flujo normal / Comportamiento
Las tareas de mantenimiento deberán realizarse fuera de horarios críticos.

## Excepciones / Restricciones
- No se consideran fallas de infraestructura externa o causas de fuerza mayor.

## Prioridad
**Alta**

---

# RNF-06 — Diseño Responsivo (Adaptabilidad)

## Descripción
La interfaz deberá adaptarse a computadoras y dispositivos móviles.

## Flujo normal / Comportamiento
La interfaz utilizará diseño responsivo mediante CSS adaptable.

## Excepciones / Restricciones
- No se garantiza compatibilidad total en pantallas menores a 320px.

## Prioridad
**Media**

---

# RNF-07 — Compatibilidad de Navegadores

## Descripción
El sistema deberá funcionar correctamente en navegadores modernos.

## Flujo normal / Comportamiento
La aplicación seguirá estándares modernos compatibles con Chrome, Firefox, Edge y Safari.

## Excepciones / Restricciones
- Navegadores obsoletos como Internet Explorer no serán soportados.

## Prioridad
**Media**

---

# RNF-08 — Facilidad de Uso (Usabilidad)

## Descripción
El sistema deberá contar con una interfaz intuitiva y fácil de usar.

## Flujo normal / Comportamiento
El registro de un doctor deberá realizarse en menos de 5 pasos.

## Excepciones / Restricciones
- Los procesos adicionales de seguridad no se consideran dentro de esta métrica.

## Prioridad
**Media**

---

# RNF-09 — Respaldo de Información

## Descripción
El sistema deberá generar respaldos automáticos diarios.

## Flujo normal / Comportamiento
Los respaldos serán almacenados en servidores alternos seguros.

## Excepciones / Restricciones
- Los respaldos deberán conservarse durante al menos 30 días.

## Prioridad
**Alta**

---

# RNF-10 — Escalabilidad

## Descripción
El sistema deberá soportar crecimiento de usuarios y hospitales.

## Flujo normal / Comportamiento
La arquitectura deberá permitir ampliaciones modulares.

## Excepciones / Restricciones
- El tiempo de respuesta no deberá superar 5 segundos con hasta 5,000 usuarios.

## Prioridad
**Media**

---

# RNF-11 — Mantenibilidad

## Descripción
El sistema deberá utilizar una arquitectura modular.

## Flujo normal / Comportamiento
Los módulos deberán estar desacoplados para facilitar mantenimiento.

## Excepciones / Restricciones
- La documentación técnica deberá mantenerse actualizada.

## Prioridad
**Media**

---

# RNF-12 — Accesibilidad

## Descripción
La interfaz deberá cumplir principios básicos de accesibilidad web.

## Flujo normal / Comportamiento
El sistema permitirá navegación mediante teclado y contraste adecuado.

## Excepciones / Restricciones
- Se tomará como referencia la norma WCAG nivel AA.

## Prioridad
**Media**