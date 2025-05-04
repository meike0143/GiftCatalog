<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gift;

class GiftController extends Controller
{
    /**
     *  Display a list of Gift
     */
    public function index()
    {
        return view('gifts.index', [
            'gifts' => Gift::all()
        ]);
    }

    /**
     *  Show the form for creating a new Gift
     */
    public function create()
    {
        return view('gifts.create');
    }

    /**
     *  Store a new Gift in the database
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required',
        ]);
        // Create a new Gift model object
        $journey = Gift::create($validated);
        // Redirect to the gifts index page
        return redirect()->route('gifts.index');
    }

    /**
     *  Show the details of the specified Gift
     */
    public function show(Gift $gift)
    {
        return view('gifts.show', [
            'gift' => $gift
        ]);
    }

    /**
     *  Show the form for editing the specified Gift
     */
    public function edit(Gift $gift)
    {
        return view('gifts.edit', [
            'gift' => $gift
        ]);
    }

    /**
     *  Update the specified Gift in the database
     */
    public function update(Request $request, Gift $gift)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required',
        ]);

        $gift->update($validated);
        // Redirect to the gifts show page
        return redirect()->route('gifts.show', $gift);
    }

    /**
     *  Display a confirmation screen for deleting the specified Gift
     */
    public function delete(Gift $gift)
    {
        return view('gifts.delete', [
            'gift' => $gift
        ]);
    }

    /**
     *  Remove the specified Gift from the database
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();
        // Redirect to the gifts index page
        return redirect()->route('gifts.index')
            ->with('success', 'Gift successfully deleted');
    }
}
