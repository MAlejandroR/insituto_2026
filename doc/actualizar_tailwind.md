## Instalación
Si estamos en ubuntu actualizamos el sistema antes de  instalar
```bash
sudo apt update
sudo apt upgrade -y
```

**1. Instalar php**
Preferiblemente tener instalado la versión 8.3 o mejor la 8.4. Esto lo debes de instalar en tu sistema
No se necesita apache, ya que el servidor web va a ser un servidor interno que tiene cada aplicación de laravel.
---
<hr style="height:2px; background-color:#2563eb; border:none;">

**2. Instalar librerías necesarias de php**



```bash
sudo apt install -y \
php-cli \
php-curl \
php-mbstring \
php-xml \
php-bcmath \
php-zip \
php-mysql
```
En caso de windows simplementes deberás de descomentar en el fichero **php.ini** las líneas donde aparezcan las librerías
```bash
   extension=curl
   extension=dom
   extension=mbstring
   extension=pdo_mysql
   extension=xml
   extension=zip
```
<hr style="height:2px; background-color:#2563eb; border:none;">

**3. Instalar composer**
Se da por supuesto que curl está instalado
Puedes seguir aquí las isntrucciones de la instalación, tanto para windows como para linux
https://getcomposer.org/download/

<hr style="height:2px; background-color:#2563eb; border:none;">

**4. Instalar el instalador de laravel**
Es cómodo tener este instalador que además en el proceso de instalación suele guiarte y preguntar opciones del proyecto
```bash
composer global require laravel/installer

```
Asegúrate luego de tener el programa laravel en el path del sistema. En windows simplemente vuelve a abrir la ventana del terminal o powershell y ya está.
En linux
<hr style="height:2px; background-color:#2563eb; border:none;">

**5. Modificar el path del sistema para poder ejecutar laravel**
Previamente localizamos dónde se ha instalado laravel.
En mi caso en el docker /home/manuel/.config/composer/vendor/laravel/installer/bin
Revisar la ruta, no siempre es esa

Editamos el fichero .bashrc (puede ser otro en función del shell que tengas) y modificamos la variable  path añadiendo esta ruta
Para ello al final del fichero escribimos
```bash
PATH=$PATH:$HOME/.config/composer/vendor/laravel/installer/bin
```

Cargamos el nuevo profile
```bash
source ./.bashrc
```
o bien con el punto que es igual que el comando source

```bash
. ./.bashrc
```
<hr style="height:2px; background-color:#2563eb; border:none;">

**6. Instalar node y npm en sus últimas versiones**
(mínimo se necesita creo que 18 de node y 9 de npm), pongo aquí la 22
Laravel moderno utiliza Node.js y npm para gestionar los assets (Vite, CSS, JS).

```bash
curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
sudo apt install -y nodejs
```
Verifica después la versión
```bash
node -v
npm -v
```