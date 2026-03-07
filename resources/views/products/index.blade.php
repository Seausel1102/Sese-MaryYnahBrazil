<x-layout>
    <x-slot name="heading">Products</x-slot>

    <!-- <p><strong>productKey:</strong> {{ $productKey ?? '' }}</p> -->

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse(($products ?? []) as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- <h2 class="h4 mt-4">Tasks</h2>
    <ul>
        @forelse(($tasks ?? []) as $t)
            <li>{{ $t }}</li>
        @empty
            <li>No tasks yet.</li>
        @endforelse
    </ul> -->
</x-layout>