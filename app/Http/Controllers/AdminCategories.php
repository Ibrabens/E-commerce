<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategories extends Controller
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
        //retourner toutes les categories
        return view('backend.categories')->with('categories', Category::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //afficher le formulaire pour ajouter une categorie
        return view('backend.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        //sauvegarder un nouveau tuple dans la table categories
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        session()->flash('success', 'category created successfuly');
        return redirect(route('category.index'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        //retourner à la liste des catégories si la catégorie n'éxiste pas
        if ($category==null) {
            
            session()->flash('error', 'categorie non trouvée');
            return redirect(route('category.index'));
        } else {
            // retourner, à la page du formulaire, la categorie avec id égal l'id passé en parametre 
            return view('backend.update_category')->with('category', $category);
        }
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
        //valider les valeurs des propriétés (required pour obligatoire / string pour chaine de caractères)
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        $category = Category::where('id',$id)->first();
        //retourner à la liste des catégories si la catégorie n'éxiste pas
        if ($category==null) {
            session()->flash('error', 'categorie non trouvée');
            return redirect(route('category.index'));
        } else {
            //mettre à jour les propriétés 
            $category->name=$request->name;
            $category->description =$request->description;
            $category->save();
            session()->flash('success', 'category updated successfuly');
            return redirect(route('category.index'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //retourner la catégorie avec l'id passé en parametre
        $category = Category::where('id',$id)->first();
         //retourner à la liste des catégories si la catégorie n'éxiste pas
        if ($category==null) {
            session()->flash('error', 'categorie non trouvée');
            return redirect(route('category.index'));
        } else {
            //supprimer la catégorie
            $category->delete();
            session()->flash('success', 'category supprimée avec succès');
            return redirect(route('category.index'));
        }

    }
}
