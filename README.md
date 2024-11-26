# SAFEGDL
## Descripción
Este es un proyecto que te ayuda a proteger tu seguridad. Ofreciendo un mapa que te marca rutas en las cuales no hay peligrosidad.
Lo que hace esta aplicación es que puedes marcar un origen(lugar donde estás) y un destino para pode calcular la mejora ruta segura.
Encuentra la mejor ruta para llegar a tu destino con confianza.
SafeGDL te guía por caminos más seguros y protegidos, evitando áreas de riesgo para que tu experiencia de viaje sea tranquila y sin preocupaciones.


## Características

- Calcular rutas: Podrás hacer el cálculo de rutas seguras y rápidas mediante la información que tenemos en nuestra base de datos. Queremos ser tu herramienta de viaje preferida.
- Reportar delitos: Contamos con un apartado de reporte de delitos donde buscamos que todos aquellos incidentes que te han pasado no queden olvidados; ayuda a otras personas a poder tener cuidado acerca de su seguridad.
- Llamada de emergencia: Implementamos dentro de la aplicación un botón especial para aquellos momentos donde consideres que tu seguridad está comprometida. Úsalo sin coste alguno y de forma accesible.

## Prerrequisitos
- Laragon
- GIT
- Node.js y npm
- Composer

## Clonar el Repositorio

Abre una terminal y navega hasta la carpeta www de Laragon (normalmente C:\laragon\www), donde se alojarán tus proyectos. Luego, clona el repositorio:

```bash
cd C:\laragon\www
git clone <URL-DEL-REPOSITORIO>
cd <NOMBRE-DEL-PROYECTO>
```

##  Instalar Dependencias de PHP

Ejecuta el siguiente comando para instalar las dependencias necesarias del proyecto:

```bash
composer install
```

## Configurar el Archivo .env

Renombra el archivo .env.example a .env:

```bash
cp .env.example .env
```

Luego, edita el archivo .env para configurar la base de datos y otras variables. Ejemplo:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña

```

## Generar la Clave de la Aplicación

Laravel necesita una clave única para encriptación. Genera una clave con:

```bash
php artisan key:generate
```

## Crear la Base de Datos

- Abre HeidiSQL o el cliente de base de datos que prefieras (incluido en Laragon).
- Crea una nueva base de datos con el nombre que configuraste en el archivo .env.

## Ejecutar Migraciones y Seeders

Ejecuta las migraciones para crear las tablas en la base de datos:

```bash
php artisan migrate
php artisan db:seed
```

## Instalar Dependencias de Node.js

Instala las dependencias de front-end necesarias con:

```bash
npm install
```

## Compilar Archivos de Front-End

Compila los archivos de front-end para que Laravel pueda servirlos correctamente:

```bash
npm run build
```

## Iniciar el Servidor Local

Para levantar el servidor de Laravel, ejecuta:

```bash
php artisan serve
```

## Bienvenida

![image](https://github.com/user-attachments/assets/8cf9a66c-dbb6-4cb4-8730-4ec4105fcf14)

![image](https://github.com/user-attachments/assets/2c1f9b12-72ee-4a73-866d-b6ab02cf2523)

![image](https://github.com/user-attachments/assets/182d8ee2-5800-4a9e-85f1-7647d8bba344)

## Reportar delito

![image](https://github.com/user-attachments/assets/526fce20-cb9b-43b2-870d-cc08440ffce1)

## Calcular ruta y mapa

![image](https://github.com/user-attachments/assets/4b481551-e595-4fbd-ab30-21cd79600e1e)

## Mis delitos

![image](https://github.com/user-attachments/assets/fdd17b98-e9b4-4d45-a8ee-21e1bce40e7b)

## Agregar contacto de emergencia

![image](https://github.com/user-attachments/assets/16713527-c967-415d-9956-bf564947b0ab)

![image](https://github.com/user-attachments/assets/11774c06-df10-49ed-8d3f-d074cc7f185b)

![image](https://github.com/user-attachments/assets/67216708-85ff-4f62-bde6-aea5fc265457)

## Botón de compartir mi ubicación

![image](https://github.com/user-attachments/assets/d9320c1e-eb00-408a-90fa-86432bb9aafb)

![image](https://github.com/user-attachments/assets/32ced504-29fd-4f30-856e-ffdce5c4e260)

## Botón para llamar al 911

![image](https://github.com/user-attachments/assets/1441cc84-e6ea-4629-ae62-f5403bc13fd3)

## Vista de moderador

![image](https://github.com/user-attachments/assets/8ec5847f-80bc-435e-bbdb-8c6efc8b4505)

![image](https://github.com/user-attachments/assets/c3dde089-f725-43c6-b945-7838cd3fd57a)

## Diagrama de secuencia

![DiagramaDeSecuencias](https://github.com/user-attachments/assets/e5dc1d5e-b713-42c9-8186-a99a22dc7f7b)

## Diagrama de casos de uso

![Diagrama_de_casos_de_uso_GonzalezMorquecho_EsauEmmanuel](https://github.com/user-attachments/assets/ffa84428-2811-46b4-bea0-a2dabd76fd05)

## Diagrama de clases

![Diagrama de clases](https://github.com/user-attachments/assets/bd5799d2-5407-41a1-93f4-ebd1c0f63a5e)



















