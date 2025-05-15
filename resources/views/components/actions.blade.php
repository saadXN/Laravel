<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-between mb-3 p-4">
        <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
            Ajouter un Product
        </a>

        <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Afficher les Produits
        </a>
    </div>        
</body>
</html>
