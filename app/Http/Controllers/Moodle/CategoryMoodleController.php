<?php

namespace App\Http\Controllers\Moodle;

use App\Http\Controllers\Controller;
use App\Models\CategoryMoodle;
use Illuminate\Http\Request;

class CategoryMoodleController extends Controller
{
    
    public function index()
    {
        $categories = CategoryMoodle::select('id','name','parent')->get();
        $categoriesM=[];
        foreach($categories as $category){
            if($category->parent !=0){
                $parent = CategoryMoodle::select('name')->where('id','=',$category->parent)->first();
                $category->parent =$parent->name; 
            }else{
                $category->parent='';
            }
            $cat['value'] = $category->id;
            $cat['text'] = $category->name .'-'.$category->parent;
            array_push($categoriesM,$cat);
        }
        
        return response()->json(['data'=>$categoriesM]);
    }
    public function show($id)
    {
        
        $categoryMoodle = CategoryMoodle::select('id','name','parent')->where('id','=',$id)->first();
        if($categoryMoodle->parent !=0){
            $parent = CategoryMoodle::select('name')->where('id','=',$categoryMoodle->parent)->first();
            $categoryMoodle->parent =$parent->name; 
        }else{
            $categoryMoodle->parent='';
        }
        return response()->json(['data'=>$categoryMoodle]);
    }

    
}
