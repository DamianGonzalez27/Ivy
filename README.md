<p align="center">
    <img src="Ivy.png" width="300">
</p>

# Ivy
Ivy es un marco de trabajo especialmente diseñado para la creación de API's de una forma sencilla, flexible y sobre todo económica.

## Fundamentos
--- 
Ivy propone un paradigma simple para construir API's tomando como base el protocolo de comunicación ``HTTP`` creando un flujo de información simple para el acceso y manipulación de los recursos computacionales del lado del servidor. El objetivo de Ivy es poder crear puntos de acceso a partir de clases finales PHP y a su vez cada una de estas clases tienen una colección de metodos de ejecución y construcción para el cuerpo de la respuesta para el cliente.

___
<strong>Nota: </strong> Es importante señalar que Ivy no trabaja bajo la arquitectura ```REST``` ya que tiene un enfoque 100% orientado a generar un estándar con respecto a la construcción de peticiones de entrada.
___


## Estándar Ivy
Ivy implementa un estándar en las peticiones de entrada usando la misma estructura para todas las peticiones, de esta forma podemos controlar de mejor manera la construcción de las peticiones y agregar información y acciones adicionales al flujo normal de Ivy.

### Sobre la URL
Para poder interactuar con las aplicaciones Ivy es necesario hacerlo mediante una URL universal para cada punto final, esto nos permite seccionar nuestro sistema e identificar todas las entidades necesarias para cada caso. De esta forma tenemos una colección de puntos finales disponibles para ser consumidos y seccionados de acuerdo a un objetivo en particular.

#### Ejemplo: 
 - https://localhost/api/clientes
 - https://localhost/api/compras
 - https://localhost/api/usuarios

Como podemos observar tenemos un grupo de 3 puntos finales y cada uno de ellos agrupa una colección de metodos especificas de cada uno.

### POST
Ivy implementa un único verbo de comunicación del protocolo ```HTTP``` con el objetivo de reducir la complejidad de construir peticiones, en cambio deroga toda la responsabilidad de acceso e interacción al cuerpo de la petición.

### El cuerpo de la petición
Ivy trabaja e implementa en todas las peticiones de entrada ```Content-Type: multipart/form-data```, lo cual nos permite controlar la información que es enviada y segmentar la petición de acuerdo al método especifico del punto final determinado por la ```URL``` de la petición.

#### _method
---
Se trata de un parametro obligatorio de acceso, este es una representacion literal de los metodos disponibles dentro de cada punto final. Este parametro determina que acción sera ejecutada para la cada petición determinada.

#### _data
---
Se trata de un parametro opcional de la petición el cual contiene en formato ```json``` un arreglo con información importante para llevar a cabo la acción del método a consumir.

#### _filters (beta)
---
Se trata de un parametro opcional de la petición el cual si se encuentra configurados aplicara un filtro determinado a la respuesta del método, estos pueden ser filtros de ordenamiento, búsqueda y selección.

#### Manejo de archivos
---
Ivy es capaz de manipular archivos enviados desde el cliente, para poder enviarlos es importante seguir la convención de los parametros del cuerpo de la petición.

#### Ejemplo: 
--- 
~~~
_image_name_image_1

_image_name_image_2

_document_pdf_name_document

_document_excel_name_document
~~~

## Primeros pasos
Es importante señalar que Ivy implementa el patron de diseño ```Abstract Factory``` o ```Fabrica abstracta``` lo cual permite crear los puntos finales y servicios mediante un archivo de configuración en formato ```json```, mediante el cual Ivy realiza la creación de los puntos finales, configuración de parametros y aplicación de filtros. Esto documento también contiene información importante que puede ser consumida por medio del punto final docs siendo este el único método y endpoint que implementa el verbo ```HTTP GET```

### api.json
---

~~~
{
    "name": "Ivy Api",
    "version": "1.0.0",
    "url": "https://localhost:8000",
    "endpoints": [
        {
            "name": "clientes",
            "options": {
                "class": "\\App\\Endpoints\\Clientes",
                "methods": {
                    "todos":{
                        "function": "todos",
                        "permissions": "CLIENTE_READ"
                    },
                    "all":{
                        "function": "getUsers",
                        "permissions": "CLIENTE_READ"
                    },
                    "single":{
                        "function": "getUser", 
                        "params": {
                            "id": "required"
                        },
                        "permissions": "CLIENTE_READ"
                    }
                }
            }
        },
        {
            "name": "compras",
            "options": {
                "class": "\\App\\Actions\\Compras",
                "methods": {
                    "all":{
                        "function": "getAll",
                        "permissions": "BUY_READ"
                    },
                    "single":{
                        "function": "getBuy", 
                        "params": {
                            "id": "required"
                        },
                        "permissions": "BUY_READ"
                    }
                }
            }
        }
    ]
}
~~~
Este documento contiene un arreglo que almacena el nombre, version y URL del API y una colección de puntos finales, cada punto final contiene el nombre del punto final y una lista de opciones.

La lista de opciones de cada punto final contiene el ```namespace``` de la clase que se desea instanciar y una colección de métodos disponibles para consumo. 

Cada método de consumo implementa 4 reglas de operación: 

- function: Es el nombre de la función PHP a ejecutar (_method)
- params: Son los parametros requeridos para ejecutar la función (_data)
- permission: Se refiere a los permisos que debe tener un usuario para poder ejecutar la función
- files: Se refiere al limite de ficheros que puede admitir Ivy

### services.json
--- 
~~~
{
    "hostingerSMTP": {
        "class": "\\App\\Services\\Hostinger",
        "construct": {
            "host": "smtp.hostinger.com",
            "port": "430",
            "user": "user",
            "password": "123"
        }
    },
    "firebaseClient": {
        "class": "\\App\\Services\\Firebase",
        "construct": {
            "secret-key": "secret",
            "site-key": "430"
        }
    },
    "databaseA": {
        "class": "\\App\\Services\\DatabaseA",
        "construct": {
            "host": "database.host",
            "port": "360",
            "user": "user",
            "password": "123"
        }
    },
    "databaseB": {
        "class": "\\App\\Services\\DatabaseB",
        "construct": {
            "host": "database.host",
            "port": "360",
            "user": "user",
            "password": "123"
        }
    }
}
~~~
Este documento contiene una colección de servicios que estarán disponibles bajo el contexto de ejecución del método del punto final, dandonos la flexibilidad de obtener una instancia pre-construida y lista para ser usada.
## Puntos finales
--- 
Los puntos finales de Ivy son en si una clase final PHP, estas agrupan una colección de metodos configurables por el programador que le permiten dotar de lógica simple para cada uno de ellos y asi derogar una única responsabilidad creada a partir de la funcionalidad practica de cada método.

#### Ejemplo 1:
---
~~~
<?php namespace App\Endpoints;

use Core\Abstracts\EndpointsAbstract;

final class Cliente extends EndpointsAbstract
{
    public function todos()
    {
        // Algo que hacer
    }

    public function crear()
    {
        // Algo que hacer
    }

    public function eliminar()
    {
        // Algo que hacer
    }

    public function editar()
    {
        // Algo que hacer
    }

    public function mostrarUno()
    {
        // Algo que hacer
    }

    public function importar()
    {
        // Algo que hacer
    }

    public function exportar()
    {
        // algo que hacer
    }
}
~~~

Como podemos observar un punto final es una abstracción de una entidad del sistema, a su vez estos contienen una colección de metodos que tienen una responsabilidad definida por el programador, en este caso en particular podemos ver que el punto final implementa los metodos estándar de ```REST``` y adicionalmente dos metodos que funcionan para importar y exportar una colección de clientes. Esta practica le permite al programador escalar cada punto final con una gama de metodos personalizados y ademas le provee de flexibilidad para el mantenimiento de cada método en especifico.

### Obtención de información
---
Para acceder a la información de la petición cada punto final debe extender de una clase abstracta padre, la cual le provee una serie de metodos útiles. Esta clase utiliza dos clases puente en el constructor encargadas de manipular la información de la peticion y los servicios disponibles para la ejecución de un método de punto final.

### EndpointsAbstract
---
~~~
<?php namespace Core\Abstracts;

use Core\Bridges\ServicesBridge;
use Core\Bridges\RequestBridge;

abstract class EndpointsAbstract
{

    private ServicesBridge $serviceBridge;

    private RequestBridge $requestBridge;

    public function __construct(RequestBridge $requestBridge, ServicesBridge $servicesBridge)
    {
        $this->serviceBridge = $servicesBridge;

        $this->requestBridge = $requestBridge;
    }

    public function getService($service)
    {
        return $this->serviceBridge->getService($service);
    }

    public function getData()
    {
        return $this->requestBridge->getData();
    }

    public function getParam($paramName)
    {
        return $this->requestBridge->getParam($paramName);
    }

    public function getFiles()
    {
        return $this->requestBridge->getFiles();
    }

    public function getFile($fileName)
    {
        return $this->requestBridge->getFile($fileName);
    }
}
~~~