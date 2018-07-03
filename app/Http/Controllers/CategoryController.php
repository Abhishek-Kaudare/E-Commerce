<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$category = new Category;
    		$category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->parent_id = $data['parent_id'];
    		$category->url = $data['url'];
    		$category->save();
    		return redirect('/admin/view-category')->with('flash_message_success','Category added Successfully!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function viewCategories(){
        $categories=Category::get();
        return view('admin.categories.view_categories')->with(compact("categories"));
    }

    public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'parent_id' => $data['parent_id'],'url'=>$data['url']]);
            return redirect('/admin/view-category')->with('flash_message_success','Category updated Successfully!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_categories')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory($id = null){
        if(!empty($id)){
            //echo "<pre>"; print_r($data); die;
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category deleted Successfully!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_categories')->with(compact('categoryDetails'));
    }
}
