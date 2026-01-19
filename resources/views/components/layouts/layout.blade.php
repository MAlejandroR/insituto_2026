<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  @vite(["resources/css/app.css","resources/js/app.js"])
</head>
<body>
  <x-layouts.header />
  <x-layouts.nav />
  <main class="h-main bg-main">
    {{ $slot  }}
  </main>
  <x-layouts.footer />
</body>
</html>
