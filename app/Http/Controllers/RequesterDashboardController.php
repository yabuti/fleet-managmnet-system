<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Adjust to your actual model

class RequesterDashboardController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Fetch all items or use appropriate query
        return view('requester.dashboard', compact('items'));
    }

    public function create()
    {
        return view('requester.create'); // Provide view for creating new items
    }

    public function store(Request $request)
    {
        // Validate and store the item
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Item::create([
            'name' => $request->name,
            // Other fields
        ]);

        return redirect()->route('dashboard.requester')->with('success', 'Item created successfully');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('requester.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            // Other fields
        ]);

        return redirect()->route('dashboard.requester')->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard.requester')->with('success', 'Item deleted successfully');
    }
}
