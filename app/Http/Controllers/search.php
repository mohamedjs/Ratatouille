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

class search extends Controller
{
  public function searchname(Request $request){
    $search=$request->input('searchbyname');
    $films=Film::join('films as film',function($join){
                $join->on('films.id','=','film.chain_id'); // i want to join the users table with either of these columns
                $join->orOn('films.id','=','film.id');
            })->join('cats', 'films.cat_id', '=', 'cats.id_ca')->
    select(DB::raw('count(film.chain_id) as num,films.*,cats.*'))->groupBy('films.id'
  ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
  ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
  ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->where('films.film_name', $search)->get();
    $filmo=Array('films'=>$films);

    $cat=Cat::all();
    $cato=Array('cat'=>$cat);

    return view('films.searchname',compact('cat','films'));
    }

public function searchyear($year){
      $films=Film::join('films as film',function($join){
                  $join->on('films.id','=','film.chain_id'); // i want to join the users table with either of these columns
                  $join->orOn('films.id','=','film.id');
              })->join('cats', 'films.cat_id', '=', 'cats.id_ca')->
      select(DB::raw('count(film.chain_id) as num,films.*,cats.*'))->groupBy('films.id'
    ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
    ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
    ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->where('films.year', $year)->get();
      $filmo=Array('films'=>$films);

      $cat=Cat::all();
      $cato=Array('cat'=>$cat);
      return view('films.searchyear',compact('cat','films'));
  }
  public function searchquality($quality){
        $films=Film::join('films as film',function($join){
                    $join->on('films.id','=','film.chain_id'); // i want to join the users table with either of these columns
                    $join->orOn('films.id','=','film.id');
                })->join('cats', 'films.cat_id', '=', 'cats.id_ca')->
        select(DB::raw('count(film.chain_id) as num,films.*,cats.*'))->groupBy('films.id'
      ,'films.film_name','films.datials','films.story','films.year','films.quality','films.cima4u'
      ,'films.dardarkom','films.aflm','films.cinemalek','films.promo','films.film_img','films.film_img'
      ,'films.cat_id','films.chain_id','cats.id_ca','cats.film_ca')->where('films.quality', $quality)->get();
        $filmo=Array('films'=>$films);

        $cat=Cat::all();
        $cato=Array('cat'=>$cat);
        return view('films.searchquality',compact('cat','films'));
    }

      public function searchtype($type){
        $films= Film_typ::join('typs', 'film_typ.type_id', '=', 'typs.id')->join('films','film_typ.film_id',
            '=','films.id')->join('cats', 'films.cat_id', '=', 'cats.id_ca')->select('*')->where('typs.id', $type)->get();
        $filmo=Array('films'=>$films);

        $cat=Cat::all();
        $cato=Array('cat'=>$cat);
        return view('films.searchtype',compact('cat','films'));
        }
}
