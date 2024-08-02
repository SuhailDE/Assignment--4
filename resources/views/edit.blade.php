<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $contact->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $contact->email }}" required>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $contact->phone }}">
        <label>Address:</label>
        <textarea name="address">{{ $contact->address }}</textarea>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('contacts.index') }}">Back to list</a>
</body>
</html>
