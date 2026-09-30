# Base Evaluaciones 2

Sitio web del curso **Programacion en PHP y MySQL - Nivel Avanzado**. Integra las ocho unidades practicas desarrolladas durante el curso.

## Requisitos

- XAMPP con Apache, PHP 8.0 o superior y MariaDB/MySQL.
- Extension GD de PHP habilitada para la unidad 4.
- Extension `mysqli` habilitada.

## Instalacion en XAMPP

1. Copiar la carpeta `base_evaluaciones2` dentro de `C:\xampp\htdocs`.
2. Iniciar Apache y MySQL desde el panel de XAMPP.
3. Abrir phpMyAdmin en `http://localhost/phpmyadmin`.
4. Importar el archivo `phpavanzado.sql`. El script crea la base `phpavanzado` y sus tablas.
5. Abrir `http://localhost/base_evaluaciones2/`.

La conexion usa estos valores por defecto de XAMPP en `conect.php`:

- Servidor: `localhost`
- Usuario: `root`
- Contraseña: vacia
- Base de datos: `phpavanzado`

Si tu instalacion usa otros datos, modificar solamente `conect.php`.

## Unidades

- Unidad 1: alta y listado de clases.
- Unidad 2: calculo de fechas.
- Unidad 3: comentarios en archivo de texto.
- Unidad 4: marca de agua y miniatura con GD.
- Unidad 5: formulario con captcha.
- Unidad 6: clase `usuarios` con encapsulamiento.
- Unidad 7: administrador de productos.
- Unidad 8: registro e ingreso con contraseñas encriptadas.

## Verificacion rapida

Probar los enlaces de las ocho unidades desde la pagina principal. Para la unidad 1, la unidad 5, la unidad 7 y la unidad 8 es necesario que la base de datos este importada. La unidad 4 requiere que GD este habilitada.
