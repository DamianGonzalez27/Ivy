# Ivy

Es un framework de desarrollo orientado 100% al desarrollo de microservicios con PHP

Esta basado en el patron de diseño Abstract Factory, lo cual nos permite crear una clase PHP para cada enpoint. Esta diseñado para trabajar exclisivamente con data, mediente el manejo de Request y Response. 

## ¿Como empiezo a usarlo?

Es muy sencillo, actualmente Ivy se encuentra en su primer realease y esta en los paquetes de composer, comenzar a usarlo es tan sencillo como teclear en tu terminal 

``$ composer create-project damiandev/ivy nombre_proyecto``

Esto te creara la carpeta nombre_proyecto, la cual contendra todo el codigo necesario para comenzar una aplicacion Ivy sencilla. 

## Entornos de desarrollo y produccion

Para poder ejecutar aplicaciones Ivy es necesario tener en cuenta una serie de conceptos, los cuales son:

### Servidor

El servidor es el equipo de computo en el que se ejecuta el programa, en terminos comunes: es la maquina en donde se ejecutan nuestros scripts php, en terminos de desarrollo lo podriamos comparar con el localhost.

Cuando nos disponemos a desarrollar una aplicacion php, es muy comun que nos dispongamos a instalar una serie de herramientas que nos permiten comenzar con la programación de nuestra aplicación, es aqui cuando comenzamos a investigar en los entornos de desarrollo, y nos encontramos con varios programas informaticos.

Un servidor web es un programa informatico que se encarga de procesar una aplicacion y realizar conexiones bidireccionales o unidireccionales, sincronicas o asincronicas con el cliente, generando una respuesta en cualquier lenguaje o aplicacion, para este caso hare bastante enfasis en dos tecnologias importantes [Apache](https://httpd.apache.org) y [Nginx](https://www.nginx.com), servidores web con mucha documentacion y con un uso bastante expandido.

En ambos casos es recomendable que si el servidor que se usará, es una instalacion limpia de alguno de estos, debemos configurar un ``Virtual Host`` para que este apunte a la carpeta ``Public/`` de nuestro proyecto Ivy.

### Peticiones (Requests)

## Algunos entornos de desarrollo compatibles

### [Laragon](https://laragon.org)

La carpeta raiz del proyecto debe estar localizada en la carpeta www de tu carpeta de instalacion laragon. Para mas informacion consulta la [documentacion oficial](https://laragon.org/docs/install.html).

### [Valet](https://laravel.com/docs/7.x/valet)

En el caso de estar usando el entorno de desarrollo valet ya sea en MacOS o en Linux, es importante realizar un link simbolico de la aplicacion dentro de la carpeta ``Public/`` del proyecto que has creado. Bastaria con situarte con la terminal dentro de la carpeta ``Public/`` y ejecutar:

``$ valet link app_name``

Esto con la finalidad de hacer que la carpeta principal del servidor sea la carpeta ``Public/`` ejecutando el archivo ``index.php`` y las reglas contenidas en el archivo ``.htaccess``.

Con estas configuraciones basicas podremos ejecutar aplicaciones Ivy, si quieres mas informacion al respecto visita la [documentacion oficial](https://laravel.com/docs/7.x/valet).

## Funcionamiento de Ivy

Dudas, comentarios o sugerencias, puedes contactarme en [ing.gonzaleza@outlook.com](mailto:ing.gonzaleza@outlook.com)