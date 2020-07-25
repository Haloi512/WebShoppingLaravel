<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::paginate(5);
        return view('admin.page.category.list',compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Categories::create([
            'name' =>$request->name,
            'slug'=>utf8tourl($request->name),
            'status'=>$request->status,
        ]);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return response()->json($category,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $id
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
                [
                    'name'=>'required|min:2|max:255'
                ],
                [
                    'required'=>'name need to be fill',
                    'min'=>'name must be 2-255 char',
                    'max'=>'name must be 2-255 char',
                ]
            );
            if($validator->fails()){
                return response()->json(['errors' => 'true','message' => $validator->errors()],200);
            };
            $category = Categories::find($id);
            $category->update([
                'name' =>$request->name,
                'slug'=>utf8tourl($request->name),
                'status'=>$request->status,
            ]);
            return response()->json(['success' => 'edit category successfully','data'=>$category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return reponse()->json(['success'=>'delete category successfully']);
    }
}
