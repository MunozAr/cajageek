/* AJAX */

$('#select-tipo').change(function(){
  var idTipo = $(this).val();
  if(idTipo>0 && idTipo!= ''){
    $.ajax({
      data:  {tipo_id:idTipo},
      url:   '../modules/jx-list-categoria.php',
      type:  'post',
      beforeSend: function () {
              $("#select-categoria").html('<option value="" disabled selected>Cargando...</option>');
      },
      success:  function (response) {
              $("#select-categoria").html(response);
      }
    });
  }
});

$('#select-categoria').change(function(){
  var idCategoria = $(this).val();

  if(idCategoria>0 && idCategoria!= ''){
    $.ajax({
      data:  {categoria_id:idCategoria},
      url:   '../modules/jx-list-subcategoria.php',
      type:  'post',
      beforeSend: function () {
              $("#select-subcategoria").html('<option value="" disabled selected>Cargando...</option>');
      },
      success:  function (response) {
              $("#select-subcategoria").html(response);
      }
    });
  }
});

/**/




$(document).ready(function() {

  $("#menu-icon").click(function() {
    $("#chang-menu-icon").toggleClass("fa-bars");
    $("#chang-menu-icon").toggleClass("fa-times");

    $("#show-nav").toggleClass("hide-sidebar");
    $("#show-nav").toggleClass("left-sidebar");

    $("#left-container").toggleClass("less-width");
    $("#right-container").toggleClass("full-width");
  });


  // mask
  var h=0;
  $("#mask").click(function() {
    h=h+1;
    if(h>=2){
      $(".form-mask").css('display','none');
      $(".form-mask").css('height','0px');
      $("#mask").toggleClass("mask-close");
      h=0;
    }else if(h==1){
      $(".form-mask").css('display','block');
      $(".form-mask").css('height','auto');
      $("#mask").toggleClass("mask-close");
    }

  });


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


});


$(function() {
  $('#filter-1').change(function() {

      this.form.submit();
  });
});

$(function() {
  $('#filter-2').change(function() {

      this.form.submit();
  });
});


$(function() {
  $('.check_id').change(function() {

      cantidadSelect = $('input:checkbox:checked').size();

      if(cantidadSelect==0){
        $('#btn-check-1').prop('disabled',true);
        $('#btn-check-2').prop('disabled',true);
      }else{
        $('#btn-check-1').prop('disabled',false);
        $('#btn-check-2').prop('disabled',false);
      }


  });
});

$(function() {
    $('#check-all').change(function() {

        cantidadSelectAll = $('#check-all:checked').size();

        if(cantidadSelectAll==0){
          $('#btn-check-1').prop('disabled',true);
          $('#btn-check-2').prop('disabled',true);
        }else{
          $('#btn-check-1').prop('disabled',false);
          $('#btn-check-2').prop('disabled',false);
        }


        var checkboxes = $(this).closest('form').find(':checkbox');
        if($(this).is(':checked')) {
            checkboxes.prop('checked', true);
        }else{
            checkboxes.prop('checked', false);
        }
    });
});


function load_gif(){
  document.getElementById("sec-loading").innerHTML='<img src="app/img/loading.gif" style="width:50px;"><p>Cargando...</p>';
}


// Validaiones

function select_validate(valor){
  if(valor == ''){
    document.getElementById('btn-select').disabled=true;
  }else{
    document.getElementById('btn-select').disabled=false;
  }
}




$(document).on("scroll", function(){
    //sacamos el desplazamiento actual de la página
    var desplazamientoActual = $(document).scrollTop();

    //compruebo si debo mostrar el botón
    if(desplazamientoActual > 55){
      $('.form-options').css('position','fixed');
      $('.form-options').css('background-color','#fff');
      $('.form-options').css('top','88px');
      $('.form-options').css('z-index','9');

      $('.form-options').css('left','0');
      $('.form-options').css('box-shadow','rgb(0, 0, 0) 0px 0px 5px');

      $('.form-options label').css('display','none');
      $('.sec-form-options').css('padding-top','8px');
      $('.sec-form-options').css('padding-bottom','8px');
    }
    if(desplazamientoActual < 55){
      $('.form-options').css('position','relative');
      $('.form-options').css('background-color','transparent');
      $('.form-options').css('top','inherit');
      $('.form-options').css('z-index','inherit');

      $('.form-options').css('left','inherit');
      $('.form-options').css('box-shadow','none');

      $('.form-options label').css('display','block');
      $('.sec-form-options').css('padding-top','20px');
      $('.sec-form-options').css('padding-bottom','20px');
    }

});

//Vistas rapidas
$(document).ready(function() {

  //Para vista de listado de módulo(horizontal-inferior)
  $('#btn-view-des').click(function(){
    $('.view-desactivados').css('bottom','0px');
  });
  $('#close-view-des').click(function(){
    $('.view-desactivados').css('bottom','-500px');
  });


  //Para agregar datos de módulo(vertical-derecha)
  $('#callFormRight').click(function(){
    $('.section-usuario-form').css('right','0px');
  });

  $('#closeFormRight').click(function(){
    $('.section-usuario-form').css('right','-100%');
  });


  //Para agregar datos de módulo(vertical-derecha)-Productos
  $('#callFormRight-2').click(function(){
    $('.section-usuario-form-2').css('right','0px');
  });

  $('#closeFormRight-2').click(function(){
    $('.section-usuario-form-2').css('right','-100%');
  });


  $('button[type=submit]').submit(function(){
    alert('dsaa');
    $('.carga').html('<div class="bg-redirect"><div class="red-logo">Agencia HDC</div><div class="text-center"><h3><div class="load-animate-1"></div>Cargando ...</h3></div></div>');
  });



});








//Checkbox cheked

$(function() {
  $('.check_id').change(function() {

      cantidadSelect = $('input:checkbox:checked').size();

      if(cantidadSelect==0){
        $('#btn-check-1').prop('disabled',true);
        $('#btn-check-2').prop('disabled',true);
      }else{
        $('#btn-check-1').prop('disabled',false);
        $('#btn-check-2').prop('disabled',false);
      }


  });
});

$(function() {
$('#check-all').change(function() {

    cantidadSelectAll = $('#check-all:checked').size();

    if(cantidadSelectAll==0){
      $('#btn-check-1').prop('disabled',true);
      $('#btn-check-2').prop('disabled',true);
    }else{
      $('#btn-check-1').prop('disabled',false);
      $('#btn-check-2').prop('disabled',false);
    }


    var checkboxes = $(this).closest('form').find(':checkbox');
    if($(this).is(':checked')) {
        checkboxes.prop('checked', true);
    } else {
        checkboxes.prop('checked', false);
    }
});
});





//Validaciones de input y botones
$(document).ready(function(){
  //Buscador
  $('#input-search').change(function(){
    if($('#input-search').val() == ''){
      $('#btn-search').prop('disabled',true);
    }else if($('#input-search').val() != ''){
      $('#btn-search').prop('disabled',false);
    }
  });

  $('#buscador').click(function(){
    $('.buscador').css('z-index','99999');
    $('.buscador').css('opacity','1');
  });

  $('#close-search').click(function(){
    $('.buscador').css('z-index','-5');
    $('.buscador').css('opacity','0');
  });

  /* opciones del menu */

  $('#opciones').click(function(){
    $('.opciones').css('z-index','99999');
    $('.opciones').css('opacity','1');
  });

  $('#close-opciones').click(function(){
    $('.opciones').css('z-index','-5');
    $('.opciones').css('opacity','0');
  });

});



/* js input file */
/*
$("#blog_imagen").fileinput({
    language:'es',
    showUpload:false,
    allowedFileExtensions: ["jpg", "png"],
    maxFileCount: 1,
    maxFileSize:1000
});
$("#blog_icon").fileinput({
    language:'es',
    showUpload:false,
    allowedFileExtensions: ["jpg", "png"],
    maxFileCount: 1,
    maxFileSize:1000
});*/



/*
/* filtro productos 
$(document).ready(function(){
  $('.producto_categoria_select').change(function(){
    //alert('jeje');
  })


});

$(document).ready(function(){
 $('#summernote1').summernote({
   height: 100,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
 });

});
*/

 $(document).ready(function(){
  $('#categoriaDetalle').summernote({
    height: 100,                 // set editor height
   minHeight: null,             // set minimum height of editor
   maxHeight: null,             // set maximum height of editor
   focus: true                  // set focus to editable area after initializing summernote
  });

  $('#tipoDetalle').summernote({
    height: 100,                 // set editor height
   minHeight: null,             // set minimum height of editor
   maxHeight: null,             // set maximum height of editor
   focus: true                  // set focus to editable area after initializing summernote
  });

});
