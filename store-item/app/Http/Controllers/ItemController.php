<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::all();
        return response()->json($item);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'stock'=>'required|string|max:255',
            // 'category_id'=>'required'
            
        ]);
        if($validator->fails())
            return response()->json($validator->errors());
        $item=Item::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'stock'=>$request->stock,
            // 'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id,
        ]);
            return response()->json(['Item is created succesfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'stock'=>'required|string|max:255',
            
        ]);
        if($validator->fails())
            return response()->json($validator->errors());
        $item->name = $request->name;
        $item->description = $request->description;
        $item->stock = $request->stock;

        $item->save();

        return response()->json("Item is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json("Item is deleted successfully");
    }
}
