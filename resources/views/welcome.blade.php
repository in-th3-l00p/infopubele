<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InfoPubele</title>

    @vite(["resources/css/app.css", "resources/js/app.js"])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<div class="bg-white">
    <x-landing.header />
    <main class="isolate">
        <!-- Hero section -->
        <x-landing.hero />
        <x-landing.feature />
        <x-landing.cta />
    </main>

    <x-landing.footer />
</div>
</body>
</html>


