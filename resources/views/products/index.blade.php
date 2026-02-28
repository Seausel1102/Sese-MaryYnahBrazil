<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products and Tasks</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Products</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['category'] ?? '' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h1>Tasks</h1>
        @if(!empty($tasks) && count($tasks) > 0)
            <ul>
                @foreach($tasks as $task)
                    <li>{{ $task }}</li>
                @endforeach
            </ul>
        @else
            <p>No tasks found.</p>
        @endif

        <p>Product Key: {{ $productKey }}</p>
    </div>
</body>
</html>