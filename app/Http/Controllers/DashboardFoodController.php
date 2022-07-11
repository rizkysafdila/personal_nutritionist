<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class DashboardFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.foods.index',[
            'title' => 'Foods',
            'foods' => Food::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.foods.create', [
            'title' => 'Add New Food',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'weight' => 'required',
            'calories' => 'required'
        ]);

        Food::create($validatedData);

        return redirect('/dashboard/foods')->with('success', 'New food has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('dashboard.foods.edit', [
            'title' => 'Edit Foods',
            'food' => $food
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $rules = [
            'name' => 'required|max:255',
            'weight' => 'required',
            'calories' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Food::where('id', $food->id)->update($validatedData);

        return redirect('/dashboard/foods')->with('success', 'Food has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        Food::destroy($food->id);
        return redirect('/dashboard/foods')->with('success', "Food has been deleted!");
    }
}
