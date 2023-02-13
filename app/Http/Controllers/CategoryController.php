<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\recusive;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
 
    private $category;
    public function __construct(Category $category){
        $this->category=$category;
    }
    public function create()
    {
       $data = $this->category->all(); 
       $recusive = new Recusive($data);
       $htmlOption= $recusive->categoryrecusive();
       return view('category.add',compact('htmlOption'));
    } 
     
    public function show()
    {
        return view('category.show');
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name'=>$request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.show');
    }


}