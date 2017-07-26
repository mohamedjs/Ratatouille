@extends('layout.home1')

@section('content')
@if($films !=null)
@foreach ($films as $film)
  @if($film->num==0 )
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <a href="datials/{{$film->id}}"><div class="film-content">
        <img  src="image/{{$film->film_img}}">
        <div class="film-film">
          <h1>{{$film->film_name}}</h1>
        </div>
        <div class="film-hover wow bounceInRight" data-wow-duration="2s">
          <h2>{{$film->datials}}</h2>
        </div>
        <div class="film-fa wow  wow bounceInLeft" data-wow-duration="2s">
          <a href="/film/{{$film->cat_id}}"><i class="fa fa-film"></i><span>{{$film->film_ca}}</span></a>
          <a href="#"><i class="fa fa-eye"></i><span>123456</span></a>
        </div>
      </div></a>
    </div>
    @endif
    @endforeach
    @foreach ($count as $count)
      <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <a href="chain/{{$count->id}}"><div class="film-content">
          <img  src="image/{{$count->film_img}}">
          <div class="film-film">
            <h1>{{$count->film_name}}</h1>
          </div>
          <div class="film-hover wow bounceInRight" data-wow-duration="2s">
            <h2>{{$count->datials}}</h2>
          </div>
          <div class="film-fa wow  wow bounceInLeft" data-wow-duration="2s">
            <a href="/film/{{$count->cat_id}}"><i class="fa fa-film"></i><span>{{$count->film_ca}}</span></a>
            <a href="#"><i class="fa fa-eye"></i><span>123456</span></a>
          </div>
        </div></a>
      </div>
      @endforeach
    @endif
@endsection
