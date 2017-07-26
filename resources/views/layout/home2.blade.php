<html>
    <head>
        <meta charset="utf-8">
        <title>Ratatouille</title>
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="shortcut icon" href="../image/83.png"  />
        <link rel="stylesheet" href="../css/Normalize.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/stylee.css">


    </head>
    <body>
      <div class="slideshow">
          <div class="mySlides fadee">
            <img src="../image/{{$films->film_img}}" style="width:100%;height:670px">
          </div>
     </div>
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
            </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right wow fadeInRight" data-wow-duration="2s">
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
            <div class="searche" onclick="$('.search').toggleClass('activeee');"><i class="fa fa-search"></i></div>
            <form class="form-horizontal" action="/home" method="post">
              {!! csrf_field() !!}
            <div id="show" class="search wow bounceIn" data-wow-duration="2s">
              <input name="searchbyname"  type="search" placeholder="اكتب ما تريد البحث عنة">
              <button type="submit" name="search" class="btn btn-primary" style="height:50px;"> search</button>
            </div>
            </form>
            <!-- <div class="logo">
              <h1>cinama is you</h1>
            </div> -->
            <div class="fixfilm">
              @yield('content')
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
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.min.js"></script>
         <script src="../js/wow.min.js"></script>
         <script src="../js/jquery.nicescroll.js"></script>
         <script src="../js/jss.js"></script>
         <script src="../js/js.js"></script>

    </body>
</html>
