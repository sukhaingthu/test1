<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    private $productRepositoryInterface;
    private $categoryRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface,CategoryRepositoryInterface $categoryRepositoryInterface)
    {

        //$this->middleware('auth')->except(['index', 'show']);
        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;  
       
    }



    public function index()
    {
       //$products = Product::query()->paginate(10); 
       // dd($products);
        //$products = Product::all();
        // dd($products);
        //return view('products.list',array('products'=>$products));
        $products = $this->productRepositoryInterface->get();
        return view('products.list')->with('products',$products);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepositoryInterface->get();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product = new Product();
         $product->name = $request->input('name');
         $product->description = $request->input('descriptions');
         $product->price = $request->input('price');
         $product->producedon = $request->input('produced_on');
         $product->category_id = $request->input('category_id');
         $product = $this->productRepositoryInterface->store($product);
       
       //$product = $this->productRepositoryInterface->store($request->all());
       return redirect('/products')->with('success','Product is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::find($id);
        // dd($product);
        $products = $this->productRepositoryInterface->getById($id);
        return view('products.show',array('product' => $products));
        //return view('products.show')->with('product',$product);
        //return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepositoryInterface->get();
        $products = $this->productRepositoryInterface->getById($id);
         return view('products.edit',array('categories'=> $categories,'products'=> $products));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $data = $this->validate($request,[
            'descriptions' => 'required',
            'name'=>'required',
            'price'=>'required',
            'produced_on' => 'required',
            'category_id' =>'required',
        ]);

        $data['id'] = $request->id;
        $this->productRepositoryInterface->update($data);
        return redirect('/products')->with('success','Support Product has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $user = User::find($id);
        if(empty($user)){
            $this->setError('404',$id);
            return $this->response('404');
        }else{
            user::find($id)->delete();
            this->data(array("deleted" =>1));
            return $this->response('200');
        }

    }

}
