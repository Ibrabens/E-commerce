<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function showAllProducts()
    {
        //afficher les derniers produits
        $products=Product::orderBy('updated_at','DESC');
        return view('welcome')->with('count',$products->count())->with('products',  $products->paginate(6));
    }
    public function showHommeProducts()
    {
        //retourner la catégorie dont le nom est 'homme'
        $category=Category::where('name','homme')->first();
        if($category == null)
        {
            return back();
        }
        //afficher les derniers produits appartenant à la catégorie homme
        $products=Product::where('category_id',$category->id)->orderBy('updated_at','DESC');
        return view('welcome')->with('count',$products->count())->with('products',  $products->paginate(6));
    }
    public function showFemmeProducts()
    {
        //retourner la catégorie dont le nom est 'femme'
        $category=Category::where('name','femme')->first();
        if($category == null)
        {
            return back();
        }
        //afficher les derniers produits appartenant à la catégorie femme
        $products=Product::where('category_id',$category->id)->orderBy('updated_at','DESC');
        return view('welcome')->with('count',$products->count())->with('products',  $products->paginate(6));
    }
    public function showSoldeProducts()
    {
        //afficher les derniers produits mis en solde
        $products=Product::where('state','solde')->orderBy('updated_at','DESC');
        return view('welcome')->with('count',$products->count())->with('products',  $products->paginate(6));
    }
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
}
