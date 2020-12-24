<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Identifie Authentication ==> user login ဝင်ထားမှ ဝင်ကြည့်လို့ရမယ် စစ်လိုက်တာ, 
    public function __construct($value='')
    {
        // $this->middleware('auth:api');
        $this->middleware('auth:api')->except('show','index'); // show , index page ကလွဲပြီး
    }

    public function index()
    {
        $items = Item::all();
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'codeno' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => 'sometimes',
            'description' => 'required',
            'photo' => 'sometimes',
            'brand_id' => 'required',
            'subcategory_id' => 'required',
        ]);


        //upload
        if($request->file()){
            // fileName => 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg',$fileName, 'public');

            $path = '/storage/'.$filePath;
        }

        // store data in Item Model
        $item = new Item;
        $item->photo = $path;
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();

        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'codeno' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => 'sometimes',
            'description' => 'required',
            'photo' => 'sometimes',
            'brand_id' => 'required',
            'subcategory_id' => 'required',
        ]);


        //upload
        if($request->file()){
            // fileName => 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg',$fileName, 'public');

            $path = '/storage/'.$filePath;

            $item->photo = $path;
        }
        
        
        
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();

        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return new ItemResource($item);
    }
}
