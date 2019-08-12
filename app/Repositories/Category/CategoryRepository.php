<?php

namespace App\Repositories\Category;

use App\Product;
use App\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
	public function get() //all list
	{
		$category = Category::all(); 
		return $category;
	}
	public function getById($id)//show
	{
		$products = Product::where('category_id', $id)->paginate(5);
		return $products;
	}
	public function store($data)//save
	{
		
	}
	
	public function edit($id)//edit
	{
		 $category = Category::find($id);
		 return $category;
	}
	public function update($data)//update
	{
		//$product = $this->getById($data['id']);
		//$product->fill($data);
		//$product->save($data);
	}
	public function destroy($id)//delete
	{
		
	}
}

	
	
	
	
	