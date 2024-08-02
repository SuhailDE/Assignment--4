<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }
        
        // Sorting functionality
        if ($request->has('sort_by')) {
            $sortBy = $request->input('sort_by');
            $query->orderBy($sortBy);
        }

        $contacts = $query->paginate(10);
        return view('index', compact('contacts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Contact::create($request->all());
        return redirect('/contacts');
    }

    public function show(Contact $contact)
    {
        return view('show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $contact->update($request->all());
        return redirect('/contacts');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts');
    }
}
?>