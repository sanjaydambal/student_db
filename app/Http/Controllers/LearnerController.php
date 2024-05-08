<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learner; // Import the Learner model

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learners = Learner::all();
        return view('index', compact('learners'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            
        ]);
        $learner = Learner::create($storeData); // Update class name to use uppercase 'L'
        return redirect('/learners')->with('completed', 'Learner has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $learner = Learner::findOrFail($id); // Update class name to use uppercase 'L'
        return view('edit', compact('learner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            
        ]);
        Learner::whereId($id)->update($updateData); 
        return redirect('/learners')->with('completed', 'Learner has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $learner = Learner::findOrFail($id); 
        $learner->delete();
        return redirect('/learners')->with('completed', 'Learner has been deleted');
    }
}
