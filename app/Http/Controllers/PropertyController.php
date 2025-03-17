<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PropertyController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $query = Property::query();
    
        if ($request->has('type') && in_array($request->type, ['venta', 'alquiler'])) {
            $query->where('type', $request->type);
        }
    
        $properties = $query->get();
    
        return view('properties.index', compact('properties'));
    }
    

    public function myProperties()
    {
        $properties = Property::where('user_id', auth()->id())->get();
        return view('properties.myProperties', compact('properties'));
    }
    
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function create()
    {
        $this->authorize('create', Property::class);
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Property::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:venta,alquiler',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        Property::create($data);

        return redirect()->route('properties.index')->with('success', 'Propiedad creada.');
    }

    public function edit(Property $property)
    {
        $this->authorize('update', $property);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $this->authorize('update', $property);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:venta,alquiler',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }

            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        $property->update($data);

        return redirect()->route('properties.index')->with('success', 'Propiedad actualizada.');
    }

    public function destroy(Property $property)
    {
        $this->authorize('delete', $property);

        if ($property->image) {
            Storage::disk('public')->delete($property->image);
        }

        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Propiedad eliminada.');
    }
}
