# Kit reutilizable PHP + MySQL — Práctica de repaso

Proyecto de ejemplo para practicar HTML, CSS, JavaScript, PHP y MySQL con el contexto de soporte técnico universitario.

## Requisitos
- XAMPP con Apache y MySQL activos, o un servidor PHP y MySQL equivalente.
- PHP con la extensión `mysqli`.
- MySQL / MariaDB.

## Instalación rápida en XAMPP
1. Copia la carpeta `kit_php_mysql_examen` dentro de `htdocs`.
2. Inicia Apache y MySQL desde XAMPP.
3. Abre phpMyAdmin o MySQL Workbench y ejecuta todo el contenido de `database.sql`.
4. Revisa `config/conexion.php` y ajusta usuario, contraseña y puerto.
5. Abre `http://localhost/kit_php_mysql_examen/`.

## Puerto de MySQL
- Si usas el MySQL de XAMPP, normalmente es el puerto `3306`.
- Si usas el MySQL Community Server que configuraste aparte, en tu caso lo habías dejado en `3307`.
- El puerto configurado en `conexion.php` debe coincidir con el servidor que contiene la base de datos.

## Archivos principales
- `config/conexion.php`: conexión compartida.
- `index.php`: menú principal.
- `usuarios.php`: registrar y listar usuarios.
- `equipos.php`: registrar y listar equipos.
- `solicitudes.php`: registrar solicitudes relacionadas con usuarios y equipos.
- `seguimiento.php`: consultar solicitudes y cambiar estado / observación.
- `database.sql`: crea la base de datos y las tablas.
- `css/estilos.css`: estilos.
- `js/validaciones.js`: validación básica del lado del navegador.

## Cómo adaptar el proyecto a otro contexto
1. Cambia nombres de tablas y columnas en `database.sql`.
2. Cambia los nombres usados en las consultas PHP para que coincidan.
3. Cambia los `name` de los inputs y sus correspondientes `$_POST`.
4. Cambia textos y títulos HTML.
5. Mantén la conexión centralizada y reutiliza el patrón `INSERT`, `SELECT`, `UPDATE` y `JOIN`.

## Ideas que debes recordar
- `INSERT INTO`: insertar registros.
- `SELECT`: consultar registros.
- `UPDATE ... WHERE`: actualizar un registro o conjunto específico.
- `INNER JOIN`: combinar datos relacionados de varias tablas.
- `$_POST`: recibir datos enviados por un formulario POST.
- `require_once`: incluir un archivo una sola vez.
- `prepare`, `bind_param`, `execute`: consulta preparada para reducir el riesgo de inyección SQL.
- `htmlspecialchars`: mostrar texto de forma segura en HTML.

Este repositorio es una guía de estudio. Practica escribir las partes principales sin copiar y asegúrate de entender qué hace cada archivo.
