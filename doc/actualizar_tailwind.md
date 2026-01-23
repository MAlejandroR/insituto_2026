## Actualizar Tailwind
Tras intalar breeze, el sistema deja instalado tailwind en su versión 3.

Conviene actualizar tailwind  a su versión 4

Acciones:
Para desinstalar elminamos de los ficheros donde especificamos las instalaciones
1. Borrar en package json las referenicas a tailwind y a postcss
   Entes de borrar
   ```bash
    "devDependencies": {
        "@tailwindcss/forms": "^0.5.2",
        "@tailwindcss/vite": "^4.0.0",
        "alpinejs": "^3.4.2",
        "autoprefixer": "^10.4.2",
        "axios": "^1.11.0",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^2.0.0",
        "postcss": "^8.4.31",
        "tailwindcss": "^3.1.0",
        "vite": "^7.0.7"
    }
   ```
Después de borrar:
```bash
    "devDependencies": {
        "alpinejs": "^3.4.2",
        "autoprefixer": "^10.4.2",
        "axios": "^1.11.0",
        "concurrently": "^9.0.1",
        "laravel-vite-plugin": "^2.0.0",
        "vite": "^7.0.7"
    }
```

Elimiar los siguientes ficheros y carpetas
```bash
sudo rm -r node_modules
sudo rm package-lock.json
sudo rm tailwind.config.js postcss.config.js
```

2.- Instalamos tailwindcss en su versión 
```bash
npm install tailwindcss @tailwindcss/vite
```
3.- Modificamos el fichero de vite vite.config.php
Añadimos que vite use el framework tailwind

```bash
import { defineConfig } from 'vite';
import tailwindcss from "@tailwindcss/vite";
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss()
    ],
});
```
4.- Modificamos el app.css incluyendo que use tailwind
Quitamos lo que hubiera y dejamos lo siguiente
```bash
@import "tailwindcss";
```








