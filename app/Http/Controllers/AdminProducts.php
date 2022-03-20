<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProducts extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retourner tous les produits avec une pagination de 15 produits
        return view('home')->with('products', Product::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //afficher le formulaire pour créer un nouveau produit
        return view('backend.create_product')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        //remplir les propriétés du tuple avec les données reçues dans la requette

        $category = Category::where('id',$request->category_id)->first();
        if ($request->file('picture')) {
            $fileName = Storage::disk('public')->put('images/'.$category->name.'s/', $request->picture);
        }

        $product = new Product();
        $product->picture =$fileName;
        $product->name =$request->name;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->size =implode(",", $request->size);
        $product->visible =$request->visible;
        $product->state =$request->state;
        $product->reference =$request->reference;
        $product->category_id =$request->category_id;
        //sauvegarder
        $product->save();

        session()->flash('success', 'produit créé succès');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //retourner le produit avec l'id passé en parametre
        $product=Product::where('id',$id)->first();
        //retourner à la page d'accueil si le produit n'est pas trouvé
        if ($product==null) {
            session()->flash('error', 'produit non trouvé');
            return redirect(route('welcome'));
        } else {
            //afficher les détails du produit dans une nouvelle page
            return view('frontend.product')->with('product', $product);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retourner le produit avec l'id passé en parametre
        $product=Product::where('id',$id)->first();
         //retourner à la page d'accueil si le produit n'est pas trouvé
        if ($product==null) {
            session()->flash('error', 'produit non trouvé');
            return redirect(route('product.index'));
        } else {
            // retourner, à la page du formulaire, le produit avec id égal l'id passé en parametre plus toutes les catégories en cas de changement
            return view('backend.update_product')->with('product', $product)->with('categories', Category::all());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        //retourner le produit avec l'id passé en parametre
        $product=Product::where('id',$id)->first();
        $category = Category::where('id',$request->category_id)->first();
        if ($request->file('picture')) {
            $fileName = Storage::disk('public')->put('images/'.$category->name.'s/', $request->picture);
          //  Storage::disk('public')->delete($product->picture);
        }
         //mettre à jour les propriétés
        $product->picture =$fileName;
        $product->name =$request->name;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->size =implode(",", $request->size);
        $product->visible =$request->visible;
        $product->state =$request->state;
        $product->reference =$request->reference;
        $product->category_id =$request->category_id;
        $product->save();
        session()->flash('success', 'product updated successfuly');
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //retourner le produit avec l'id passé en parametre
        $product=Product::where('id',$id)->first();

         //retourner à la liste des produits si le produit n'éxiste pas
        if ($product==null) {
            session()->flash('error', 'produit non trouvé');
            return redirect(route('product.index'));
        } else {
            //supprimer le produit
            $product->delete();
      //      Storage::disk('public')->delete($product->picture);
            session()->flash('success', 'product supprimée avec succès');
            return redirect(route('product.index'));
        }

    }
}
