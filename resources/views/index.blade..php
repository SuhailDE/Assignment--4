<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>
    <form method="GET" action="{{ route('contacts.index') }}">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ request()->input('search') }}">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('contacts.create') }}">Add New Contact</a>
    <table>
        <thead>
            <tr>
                <th><a href="{{ route('contacts.index', ['sort' => 'name']) }}">Name</a></th>
                <th><a href="{{ route('contacts.index', ['sort' => 'created_at']) }}">Created At</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->created_at }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                        <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</body>
</html>
