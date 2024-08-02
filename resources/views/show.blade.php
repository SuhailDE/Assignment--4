<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
</head>
<body>
    <h1>Contact Details</h1>
    <p>Name: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Phone: {{ $contact->phone }}</p>
    <p>Address: {{ $contact->address }}</p>
    <a href="{{ route('contacts.index') }}">Back to list</a>
</body>
</html>
