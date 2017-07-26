<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\validate;
use App\Cat;
use App\Typ;
use App\Film;
use App\Film_typ;
use DB;

class home extends Controller
{

  public function home(){
    $films=Film::join('films as film',function($join){
                $join->on('films.id','=','film.chain_id'); // i want to join the users table with either of these columns
                $join->orOn('films.id','=','film.id');
            })->join('cats', 'films.cat_id', '=', 'cats.id_ca')->
    select(DB::raw('count(film.chain_id) as num,films.*,cats.*'))->groupBy('films.id'
  ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
  ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
  ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->get();

    $count=Film::join('films as film', 'films.id', '=', 'film.chain_id')->join('cats', 'films.cat_id',
      '=', 'cats.id_ca')->groupBy('films.id'
    ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
    ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
    ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->select('films.*','cats.*')->get();


    $filmo=Array('films'=>$films);

    $cat=Cat::all();
    $cato=Array('cat'=>$cat);
    return view('layout.home',compact('cat','films','count'));
  }

  public function cat($id){
    $films=Film::join('films as film',function($join){
                $join->on('films.id','=','film.chain_id'); // i want to join the users table with either of these columns
                $join->orOn('films.id','=','film.id');
            })->join('cats', 'films.cat_id', '=', 'cats.id_ca')->
    select(DB::raw('count(film.chain_id) as num,films.*,cats.*'))->where('films.cat_id',$id)->groupBy('films.id'
  ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
  ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
  ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->get();

    $count=Film::join('films as film', 'films.id', '=', 'film.chain_id')->join('cats', 'films.cat_id',
      '=', 'cats.id_ca')->groupBy('films.id'
    ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
    ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
    ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->select('films.*','cats.*')->where('films.cat_id', $id)->get();
    $filmo=Array('films'=>$films);

    $cat=Cat::all();
    $cato=Array('cat'=>$cat);

    return view('films.film',compact('cat','films','count'));
  }

  public function datials($id){
    $films=Film::find($id);
    $cat=Cat::all();

    $film_type= Film_typ::join('typs', 'film_typ.type_id', '=', 'typs.id')->select('*')->where('film_typ.film_id', $id)->get();

    $catss[]= DB::select(DB::raw('select film_ca from films join cats on cats.id_ca = films.cat_id
                    where films.id = '.$id))[0];


    return view('films.datials',array('films'=>$films,'cat'=>$cat,'film_type'=>$film_type,'cao'=>$catss));
  }

  public function chain($id){
    $films=Film::join('cats', 'films.cat_id', '=', 'cats.id_ca')->select('*')->where('chain_id', $id)->get();
    $cat=Cat::all();
    return view('films.chain',array('films'=>$films,'cat'=>$cat));
  }


}
