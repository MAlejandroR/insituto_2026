## Crear un proyecto
**1.- Con el comando  laravel o con composer**
```bash
laravel new instituto
```
o
```bash
composer create-project laravel/laravel instituto
```
Mejor hacerlo con el comando **laravel**

<hr style="height:2px; background-color:#2563eb; border:none;">

**2.- En el proceso de instalación seleccionar**
Selecciona breeze, de esta forma estará instalado tanto breeze (paquete para gestionar la autenticación) como tailwind (paquete de front)
![creando_pryecto/img.png](img.png)
La gestión de la parte visual la haremos en principio con blade
![creando_pryecto/img_1.png](img_1.png)
El resto de opciones todo por defecto
En la base de datos para agilizar selecciona **SQLite**

![creando_pryecto/img_2.png](img_2.png)
Ejecutas las migraciones (creará tablas en un fichero de SQLite, luego lo haremos en **mysql** con un docker)
![creando_pryecto/img_3.png](img_3.png)

<hr style="height:2px; background-color:#2563eb; border:none;">

**3.- Instalar dependencias de front**
Esta acción es posible que ya se haya ejecutado en el proceso de instalación, sobre todo por haber instalado **breeze**
```bash
npm install
```
<hr style="height:2px; background-color:#2563eb; border:none;">

**4.- Levantar el servidor de front**
```bash
npm run dev
```

Y observamos la salida
```bash
> dev
> vite


  VITE v7.3.1  ready in 322 ms

  ➜  Local:   http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  press h + enter to show help

  LARAVEL v12.47.0  plugin v2.0.1

  ➜  APP_URL: http://localhost
```

* El servidor Vite mantiene activo un servicio de desarrollo que proporciona
**recarga en caliente (Hot Module Replacement, HMR)** a través de un puerto
(normalmente el **5173**).

* Este servicio se encarga de recompilar automáticamente los assets frontend
(JavaScript, CSS y Tailwind) cada vez que se modifica algún archivo dentro de
`resources/`, incluyendo los utilizados en las plantillas Blade.

* Una característica importante de Tailwind es que **solo genera las clases CSS
que realmente se utilizan** en el proyecto, además de las clases base del
framework. Este servicio lo actualiza continuamente si usamos nuevas clases

* Este proceso **no se ejecuta en segundo plano**, por lo que el terminal en el
que se lance quedará dedicado exclusivamente a Vite mientras dure el desarrollo.
**5.- Levantar el servidor web**

* Puedes interactuar con él. la **h** te muestra esta ayuda con las letras
```bash
h
  Shortcuts
  press r + enter to restart the server
  press u + enter to show server url
  press o + enter to open in browser
  press c + enter to clear console
  press q + enter to quit
```  

<hr style="height:2px; background-color:#2563eb; border:none;">

6.- **Levantar el servidor de back**

* Laravel incluye un **servidor de desarrollo integrado** que permite ejecutar la
aplicación sin necesidad de instalar Apache o Nginx.

* Este servidor atiende las **peticiones HTTP** de la aplicación y, por defecto,
escucha en el puerto **8000**.

* Al igual que ocurre con el servidor de Vite, este proceso **no se ejecuta en
segundo plano**, por lo que el terminal en el que se lance quedará dedicado a
este servicio mientras esté activo, salvo que lo ejecutemos en background
```bash
php artisan serve
```
Y observamos la salida

```bash


   INFO  Server running on [http://127.0.0.1:8000].  

  Press Ctrl+C to stop the server

```
