@extends('layout.home2')

@section('content')
      <div class="poster-image">
        <img src="../image/{{$films->film_img}}" alt="" style="width:100%;height:100%;">
      </div>
      <div class="film-fi">
        <div class="container">
          <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" >
            <div class="type">
              <p><span>الجودة:</span><a href="../searchquality/{{$films->quality}}">{{$films->quality}}</a></p>
              <p><span>القسم:</span><a href="../film/{{$films->cat_id}}">@foreach ($cao as $caos){{$caos->film_ca}}@endforeach</a></p>
              <p><span>السنة:</span><a href="../searchyear/{{$films->year}}">{{$films->year}}</a></p>
              <p><span>النوع:</span><a href="#">@foreach ($film_type as $film_type)
                  <a href="/searchtype/{{$film_type->id}}" > {{$film_type->film_type}}</a>--@endforeach
                            </a></p>
            <a href="{{$films->promo}}"  ><button type="button" class="btn btn-normal">مشاهدة اعلان الفيلم</button></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-5 col-sm-8 col-xs-12">
            <div class="film-datiles">
              <h2>{{$films->film_name}}</h2>
              <p>{{$films->datials}}</p>
              <div class="description">
                <div class="name">
                  <p>القصة :</p>
                </div>
                <div class="content">
                  <p>{{$films->story}}</p>
                </div>
              </div>
            <a href="{{$films->cima4u}}"> <button type="button" class="btn btn-normal">cima4u</button></a>
            <a href="{{$films->dardarkom}}"> <button type="button" class="btn btn-normal">dardarkom</button></a>
            <a href="{{$films->aflm}}"> <button type="button" class="btn btn-normal">aflm</button></a>
            <a href="{{$films->cinemalek}}"> <button type="button" class="btn btn-normal">cinemalek</button></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
            <div class="imagef">
              <img src="../image/{{$films->film_img}}">
            </div>
          </div>
        </div>
      </div>
@endsection
