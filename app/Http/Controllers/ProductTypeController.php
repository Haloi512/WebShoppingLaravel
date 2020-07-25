<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Categories;
use App\Http\Requests\StoreProductTypeRequests;
use Validator;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = ProductType::paginate(5);
        return view('admin.page.producttype.list',compact('producttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::where('status',1)->get();
        return view('admin.page.producttype.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequests $request)
    {
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if(ProductType::create($data)){
            return redirect()->route('producttype.index')->with('inform','add productType successfully');
        }else{
            return back()->with('inform','add productType failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = ProductType::find($id);
        $category = Categories::where('status',1)->get();
        return response()->json(['category'=>$category,'producttype'=>$producttype],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            [
                'name'=>'required|min:2|max:255|unique:producttype,name',
            ],
            [
                'required'=>'name of producttype need to be fill',
                'min'=>'name of producttype must be 2-255 char',
                'max'=>'name of producttype must be 2-255 char',
                'unique'=>'name of producttype have been existed yet'
            ]
        );
        if($validator->fails()){
            return response()->json(['error'=>true,'message'=>$validator->errors()],200);
        }
        $producttype = ProductType::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        $producttype->update($data);
        if($producttype->update($data)){
            return response()->json(['result' => 'edit producttype successfully ' .$id],200);
        }else{
            return response()->json(['result' => 'edit producttype failed ' .$id],200);
        }
      
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producttype = ProductType::find($id);
        if($producttype->delete()){
            return response()->json(['result' => 'delete producttype successfully ' .$id],200);
        }else{
            return response()->json(['result' => 'delete producttype failed ' .$id],200);
        }
    }
}
