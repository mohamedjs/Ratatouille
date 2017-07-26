<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Ratatouille</title>
        <link rel="stylesheet" href="css/animate.css">
        <link rel="shortcut icon" href="image/83.png"  />
        <link rel="stylesheet" href="css/Normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/stylee.css">
    </head>
    <body>
        <div class="clearfix"></div>
          <nav class="navbar navbar-default navbar-fixed-top">
           <div class="container-flauid">
             <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>
                <a class="navbar-brand" href="../layouts/templete.blade.php"><i class="fa fa-home fa-2x"></i></a>
            </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right wow fadeInRight" data-wow-duration="2s" id="cat_ul">
                  <li><a class="activee" href="/"><i class="fa fa-home fa-2x"></i></a></li>
                   @if($cat !=null)
                     @foreach ($cat as $cats)
                     <li>
                        <a href="/film/{{$cats->id_ca}}">{{$cats->film_ca}}</a>
                     </li>
                     @endforeach
                   @endif
               </ul>
             </div>
           </div>
          </nav>
          <div class="admin">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="add-cat">
                <div class="name-add">
                  <h2>اضافة نوع</h2>
                </div>
                  <form class="form-horizontal" method="post" action="/admin">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">اضافة قسم:</label>
                      <div class="col-sm-10">
                        <input type="text" name="film-cat" class="form-control" id="film-cat" placeholder="ادخل نوع الفيلم">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="add-cat" class="btn btn-default" id="add-cat" style="width: 20%;color: red;
                        background-color: aqua;">اضافة</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="add-cat">
                <div class="name-add">
                  <h2>اضافة نوع</h2>
                </div>
                  <form class="form-horizontal">
                     {!! csrf_field() !!}
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">نوع الفيلم:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="film-type" name="film-type" placeholder="ادخل نوع الفيلم">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="add-type" name="add-type" class="btn btn-default" style="width: 20%;color: red;
                        background-color: aqua;">اضافة</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="add-film">
                <div class="name-add">
                  <h2>اضافة فيلم</h2>
                </div>
                  <form class="form-horizontal" method="post" action="/admin" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">اسم الفيلم:</label>
                      <div class="col-sm-9">
                        <input type="text" name="film" class="form-control" id="email" placeholder="ادخل اسم الفيلم">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">التفاصيل:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="datiles" id="email" placeholder="ادخل التفاصيل">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">القصة:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="story" id="email" placeholder="ادخل القصة">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">الجودة:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="quality" id="email" placeholder="الجودة">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">انتاج سنة:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="year" id="email" placeholder="سنة الانتاج">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">سينما للجميع:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="cima4u" id="email" placeholder="لينك">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">الدار دركم:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="dardarkom" id="email" placeholder="لينك">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">افلام:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="2aflm" id="email" placeholder="لينك">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">سينما ليك:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="cinemalek" id="email" placeholder="لينك">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">اعلان الفيلم:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="promo" id="email" placeholder="لينك">
                      </div>
                    </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-sm-6">
                     <div class="form-group">
                       <label class="control-label col-sm-3" for="email">القسم:</label>
                       <div class="col-sm-9">
                         <select id="cattype" class="form-control"  name="cattype">
                           @if($cat !=null)
                             @foreach ($cat as $cat)
                               <option value="{{$cat->id_ca}}">{{$cat->film_ca}}</option>
                             @endforeach
                           @endif
                         </select>
                       </div>
                     </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="email">اسم السلسلة:</label>
                        <div class="col-sm-9">
                          <select id="film_type" class="form-control"  name="chain" style="width:100%">
                            <option value=" ">Null</option>
                            @if($films !=null)
                              @foreach ($films as $film)
                                <option value="{{$film->id}}">{{$film->film_name}}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="email">نوع الفيلم:</label>
                        <div class="col-sm-9">
                          <select id="type" class="form-control"  name="type[]" style="width:100%">
                            @if($types !=null)
                              @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->film_type}}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="button" id="add-input" class="btn btn-primary add-input">اضافة نوع اخر</button>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                       <div class="form-group">
                         <label class="control-label col-sm-3" for="email">صورة الفيلم:</label>
                         <div class="col-sm-9">
                           <input type="file" class="btn btn-primary" style="width:90%;" name="file" id="file"/>
                         </div>
                       </div>
                      </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="add-film" class="btn btn-default" style="width: 50%;color: red;
                        background-color: aqua;margin-top: 2%;">اضافة</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        <footer class="footer">
          <div class="link">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-google"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-linkedin"></i>
            <i class="fa fa-github xxxx"></i>
          </div>
          <div class="copyright">
            <p>All Right Reserved&copy<span>mohamed mahmoud 2017</span></p>
          </div>
        </footer>
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
         <script src="js/wow.min.js"></script>
         <script src="js/jquery.nicescroll.js"></script>
         <script src="js/jss.js"></script>
         <script src="js/js.js"></script>


    </body>
</html>
