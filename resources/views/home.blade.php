<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-100 text-gray-800 ml-20">
    <br><br>
    <div class="p-10">
        <a href={{route('products.index')}} class="text-6xl font-semibold text-blue-500">
            Afficher les produits
        </a>
    </div>
</body>
</html>
