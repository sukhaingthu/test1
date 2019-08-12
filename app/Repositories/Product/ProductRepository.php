<?php

namespace App\Repositories\Product;

use App\Product;
use App\Category;

class ProductRepository implements ProductRepositoryInterface
{
	public function get() //all list
	{
		$products = Product::paginate(10); 
		return $products;
	}
	//public function getcategory() //all list
	//{
		//$category = Category::all(); 
		//return $category;
	//}
	public function getById($id)//show
	{
		$product = Product::find($id);
		return $product;
	}
	public function store($data)//save
	{
		$product = new product();
		$product = $data;
		$product->save();
		return $product;
	}
	
	public function edit($id)//edit
	{

	}
	public function update($data)//update
	{
		$product = $this->getById($data['id']);
		$product->fill($data);
		$product->save($data);
	}
	public function destroy($id)//delete
	{
		  $Product = Product::find($id);
          $Product->delete();
		
	}
}

	
	
	
	
	