<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-6">
        <h1 class="mb-6 text-3xl font-bold">Products List</h1>

        <x-actions />

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form method="GET" action="{{ route('products.index') }}" class="mb-4 flex items-center gap-4">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category</label>
                <select name="category" id="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded shadow-sm">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="pt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Search
                </button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm" style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $product->name }}</td>
                            <td class="py-3 px-4">{{ $product->price}}</td>
                            <td class="py-3 px-4">{{ $product->category->name }}</td>
                            <td class="py-3 px-4 space-x-2">
                                <a href="{{ route('products.show', $product->id) }}" 
                                    class="text-green-600 font-semibold">
                                    Show
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" 
                                    class="text-blue-600 font-semibold">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="text-red-600 font-semibold">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</body>
</html>
