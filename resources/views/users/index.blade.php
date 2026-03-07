<x-layout>
    <x-slot name="heading">User List</x-slot>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['gender'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>