# slim-fb-api-graph

## Instrucciones
* Clonar repo
* Ejecutar: `composer update`
* Agregar settings de Facebook (_app_id_ y _app_secret_) en: `config/app.php`
* Correr tests con: `composer test`
* Levantar web server local con: `composer start`

## Features extras posibles de agregar:
* Implementar interfaces para los Providers. De esta forma se puede cambiar implementaciones (de sdk a curl por ejemplo)
* Implementar caching del user profile recibido de Facebook (con alguna implementacion similar a [silex-cache-service-provider](https://github.com/moust/silex-cache-service-provider))
* Implementar el recibir fields opcionales al llamado de la api y trasladarlos a la query a Facebook.
* Agregar validación de los fields opcionales del punto anterior (usando [Validation](https://github.com/Respect/Validation) por ejemplo)
* Reemplazar el file de setings con [dotenv](https://github.com/vlucas/phpdotenv)
* Implementar [Fractal](https://fractal.thephpleague.com/) para realizar un output consistente de la data.
