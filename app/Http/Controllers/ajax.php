<?php

namespace App\Http\Controllers;

use \Input as Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\validate;
use App\Cat;
use App\Typ;
use App\Film;
use App\Film_typ;;

class ajax extends Controller
{
  public function gettype(Request $request){
    $type=new Typ();
    if($request->input('name')){
    $type->film_type=$request->input('name');
    $type->save();}

    $types=Typ::all();
    $typo=Array('types'=>$types);
    return response()->json($typo);
  }
  public function gettypee(){
    $types=Typ::all();
    $typo=Array('types'=>$types);
    return response()->json($typo);
  }

public function getcat(Request $request){
    $cat=new Cat();
    $cat->film_ca=$request->input('name');
    $cat->save();

    $cat=Cat::all();
    $cato=Array('cat'=>$cat);
  return response()->json($cato) ;
}

public function getfilm(){
    $films=Film::whereNull('chain_id')->get();
    $filmo=Array('films'=>$films);
    return response()->json($filmo);
}
public function change(Request $request){
    $id=$request->input('id');
    $films=Film::where('cat_id',$id)->whereNull('chain_id')->get();
    $filmo=Array('films'=>$films);
    return response()->json($filmo);
}
}
