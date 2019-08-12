<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Product;
use App\Category;

class CategoryController extends Controller
{
    private $categoryRepositoryInterface;
     public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {

        //$this->middleware('auth')->except(['index', 'show']);
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;  
    }

    public function index()
    {
    	// $categories= Category::all();
    	// foreach($categories as $category) {
    	// 	dd($category->products);
    	// }
    }

    public function show($id)
	{
	   $product = $this->categoryRepositoryInterface->getById($id);
          //dd($category);
        return view('categories.show',array('products' => $product));


	}
    public function edit($id)
    {
          $category = $this->categoryRepositoryInterface->getById($id);
          //dd($category);
            return view('products.edit',array('categories' => $category));


    }

}