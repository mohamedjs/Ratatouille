<?php

namespace App\Http\Controllers;
use \Input as Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\validate;
use App\Cat;
use App\Typ;
use App\Film;
use App\Film_typ;

class admin extends Controller
{
      public function __construct()
      {
          $this->middleware('admin');
      }
    public function adhome(Request $request){
      $cat=new Cat();
      $type=new Typ();
      $film=new Film();
      if($request->isMethod('post')){

        if ($request->input('film-cat')!=null){
        $cat->film_ca=$request->input('film-cat');
        $cat->save();
      }
      elseif ($request->input('film-type')!=null) {
        $type->film_type=$request->input('film-type');
        $type->save();
        $types=Typ::all();
        $typo=Array('types'=>$types);
        return response()->json($typo);
      }
      else{
        $film->film_name=$request->input('film');
        $film->datials=$request->input('datiles');
        $film->story=$request->input('story');
        $film->quality=$request->input('quality');
        $film->year=$request->input('year');
        $film->cima4u=$request->input('cima4u');
        $film->dardarkom=$request->input('dardarkom');
        $film->aflm=$request->input('2aflm');
        $film->cinemalek=$request->input('cinemalek');
        $film->promo=$request->input('promo');
        $film->cat_id=$request->Input('cattype');
        $film->chain_id=$request->input('chain');
        $file=Input::file('file');
        $img_name = $request->input('film').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('image'),$img_name);
        $film->film_img = $img_name ;
        $film->save();
        $filmid=$film->id;
        $film_types=$request->input('type');
        foreach ($film_types as $film_typee) {
          $film_type=new Film_typ();
            $film_type->film_id=$filmid;
            $film_type->type_id = $film_typee;
            $film_type->save() ;
        }
      }
      }
      $cat=Cat::all();
      $cato=Array('cat'=>$cat);

      $films=Film::whereNull('chain_id')->get();
      $filmo=Array('films'=>$films);

      $types=Typ::all();
      $typo=Array('types'=>$types);

      return view('layout.adhome',compact('cat','films','types'));
  }



}
