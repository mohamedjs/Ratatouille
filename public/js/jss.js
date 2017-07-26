  new WOW().init();
  $(document).ready(

    function() {
     $("body").niceScroll({
        cursorcolor:"#80004B",cursorwidth:"8px",scrollspeed:"100",cursorminheight:10,
        cursorborderradius:"10px",bouncescroll:true,hidecursordelay:"700",cursorheight:10,background:"#fff",
        cursoropacitymin:"1",horizrailenabled:true,zindex:9999
     });
   $("#bs-example-navbar-collapse-2").niceScroll({cursorcolor:"#000",cursorwidth:"8px",scrollspeed:"100",cursorminheight:10,
   cursorborderradius:"10px",bouncescroll:true,hidecursordelay:"700",cursorheight:10,background:"#fff",
   cursoropacitymin:"1",horizrailenabled:true,zindex:9999});
   $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });
  var tempelet="";
   $(".add-input").click(function(e){
   e.preventDefault();
   $.ajax({
           type: "POST",
           url: '/gettype',
           data : {
             "id":this.value
            },
           success : function(data){
             data = data.types;
             console.log(data.length);

                tempelet ='<div class="col-lg-6 col-md-6 col-sm-12">'+
                '<div class="form-group">'+
                '<label class="control-label col-sm-2" for="email">نوع الفيلم:</label>'+
                '<div class="col-sm-10">'+
                '<select id="type" class="form-control"  name="type[]" style="width:100%">';
                for (var i = 0; i < data.length; i++){
              tempelet =tempelet + '<option value="'+data[i].id+'">'+data[i].film_type+'</option>';
                  }
              tempelet=tempelet + '</select></div></div></div>';

             }

       }, "json");
       $(this).before(tempelet);
   });
   $('#add-cat').click(function(e) {
     e.preventDefault();
     var x=$('#film-cat').val();
     console.log(x);
     $.ajax({
       type: "post" ,
       cache: false,
       url : "/getcat" ,
       data : {
         name:$('#film-cat').val()
        },
       success : function(data){
         console.log(data.cat);
         $('#cattype').html("") ;
         $('#cat_ul').html("") ;
         var lio='<li><a class="activee" href="/"><i class="fa fa-home fa-2x"></i></a></li>';
         $('#cat_ul').append(lio)
         data =data.cat;
         for (var i = 0; i < data.length; i++) {
           var option = '<option value="'+data[i].id_ca+'">'+data[i].film_ca+'</option>' ;
           var li='<li>'+
              '<a href="/film/'+data[i].id_ca+'">'+data[i].film_ca+'</a>'+
                  '</li>'
           $('#cattype').append(option);
           $('#cat_ul').append(li);
         }
       }
     }, "json");
    }) ;

    $('#add-type').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: "post" ,
        url : "/gettype" ,
        data : {
          name:$('#film-type').val()
         },
        success : function(data){
          console.log(data.types);
          $('#type').html("") ;
          data =data.types;
          for (var i = 0; i < data.length; i++) {
            var option = '<option value="'+data[i].id+'">'+data[i].film_type+'</option>' ;
            $('#type').append(option)
          }
        }
      }, "json");
     }) ;

     $('#add-film').click(function() {
       $.ajax({
         type: "post" ,
         url : "/getfilm" ,
         data : {
           "id":this.value
          },
         success : function(data){
           console.log(data.films);
           $('#type').html("") ;
           data =data.films;
           for (var i = 0; i < data.length; i++) {
             var option = '<option value="'+data[i].id+'">'+data[i].film_name+'</option>' ;
             $('#film_type').append(option)
           }
         }
       });
      }) ;
      $('#cattype').change(function(e) {
        e.preventDefault();
        console.log($('#cattype').val());
        $.ajax({
          type: "post" ,
          url : "/change" ,
          data : {
            id:$('#cattype').val()
           },
          success : function(data){
            $('#film_type').html("") ;
            var lio='<option value=" ">Null</option>';
            $('#film_type').append(lio);
            console.log(data.films);
            data =data.films;
            for (var i = 0; i < data.length; i++) {
              var option = '<option value="'+data[i].id+'">'+data[i].film_name+'</option>' ;

              $('#film_type').append(option);
        }
      }
      });
       }) ;
   $('#filmo').change(function() {
     $.ajax({
       type: "post" ,
       url : "/getcat" ,
       data : {
         "id":this.value
        },
       success : function(data){
         console.log(data.cat);
         $('#cattype').html("") ;
         data =data.cat;
         for (var i = 0; i < data.length; i++) {
           var option = '<option value="'+data[i].id_ca+'">'+data[i].film_ca+'</option>' ;
           $('#cattype').append(option)
         }
       }
     });
    }) ;

    });
