<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
	public function get();//all list
	public function getById($id);//show
	public function store($data);//save
	public function edit($id);//edit
	public function update($data);//update
	public function destroy($id);//delete
}