# Cliente de [Tecni-RTM](http://tecnimaq.com/index.php/tecni-rtm/) para Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/andreshg112/tecni-rtm-laravel.svg?style=flat-square)](https://packagist.org/packages/andreshg112/tecni-rtm-laravel)
[![Build Status](https://travis-ci.com/andreshg112/tecni-rtm-laravel.svg?branch=master)](https://travis-ci.com/andreshg112/tecni-rtm-laravel)
[![StyleCI](https://styleci.io/repos/177488663/shield)](https://styleci.io/repos/177488663)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andreshg112/tecni-rtm-laravel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andreshg112/tecni-rtm-laravel/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/andreshg112/tecni-rtm-laravel/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/andreshg112/tecni-rtm-laravel/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/andreshg112/tecni-rtm-laravel.svg?style=flat-square)](https://packagist.org/packages/andreshg112/tecni-rtm-laravel)

Este paquete permite consultar las revisiones técnico-mecánicas (tecnomecánicas) en curso y completadas del sistema Tecni-RTM a través de la API que el software ofrece.

## Requisitos

-   Laravel >= 5.5
-   PHP >= 7.1

> Si quieres soporte para una versión inferior a las especificadas, por favor deja la petición en los [Issues](../../issues) y veré qué puedo hacer.

## Instalación

Puedes instalar el paquete a través de composer:

```bash
composer require andreshg112/tecni-rtm-laravel
```

> Este paquete usa [Laravel Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery), por lo tanto no se debe agregar el paquete a los `providers` de `config/app.php`.

Luego, se recomienda publicar el archivo de configuración así:

```bash
php artisan vendor:publish
```

Y escoger el que diga `Andreshg112\TecniRtm\TecniRtmServiceProvider`.

Después, puedes configurar los datos de acceso en el archivo `.env` los cuales son indicados en el archivo `config/tecni-rtm.php`.

## Uso

Para consultar revisiones terminadas:

```php
use Andreshg112\TecniRtm\TecniRtmFacade;

// Usando el alias de la fachada:
$completed = \TecniRtm::completedReviews();

// Usando la fachada:
$completed = TecniRtmFacade::completedReviews();
```

Para consultar las revisiones en curso:

```php
use Andreshg112\TecniRtm\TecniRtmFacade;

// Usando el alias de la fachada:
$ongoing = \TecniRtm::ongoingReviews();

// Usando la fachada:
$ongoing = TecniRtmFacade::ongoingReviews();
```

### Pruebas

```bash
composer test
```

### Registro de cambios

Por favor, revisa las [Versiones](../../releases) para comprobar lo que ha cambiado recientemente.

## Contribuir

Por favor, mira el archivo [CONTRIBUTING](CONTRIBUTING.md) (en inglés) para más detalles.

### Seguridad

Si descubres algún fallo relacionado con seguridad, por favor escríbeme a andreshg112@gmail.com en vez de hacerlo en los [Issues](../../issues).

## Créditos

-   [Andrés Herrera García](https://github.com/andreshg112)
-   [Todos los colaboradores](../../contributors)

## Licencia

La Licencia MIT. Por favor, mira el archivo [License File](LICENSE.md) (en inglés) para más información.

## Laravel Package Boilerplate

Este paquete se generó usando [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
