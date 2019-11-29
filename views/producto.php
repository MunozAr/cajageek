
<div class="container">

<hr>
	<div class="row">
		<aside class="col-12 col-sm-12 col-md-12 col-lg-7 border-right">

<div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <?= $foto; ?>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
    <?= $foto; ?>
    </div>
  </div>

		</aside>
		<aside class="col-12 col-sm-12 col-md-12 col-lg-5">
<article class="card-body p-5">
	<h3 class="title mb-3"><?= $nameProducto; ?></h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-warning"> 
		<span class="currency">S/. </span><span class="num"><?= $preciosProducto[0] ?></span>
	</span> 
	<span>/por unidad</span> 
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Descripción</dt>
  <dd><p><?= $descripcionDetalle; ?></p></dd>
</dl>
<dl class="param param-feature">
  <dt>Modelo</dt>
  <dd><?= $identificadorProducto; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="product-colors">
  <?= $tituloColores; ?>
  <dd>
	<?= $color; ?>
  </dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Delivery</dt>
  <dd>San Miguel</dd>
</dl>  <!-- item-property-hor .// -->

<hr>
	<div class="row">
		<div class="col-sm-5">
			<dl class="param param-inline">
			  <dt>Cantidad: </dt>
			  <dd>
			  	<select id="selectCantidad" class="form-control form-control-sm" style="width:135px;" required>
            <option selected disabled> Elija la cantidad </option>
			  		<option> 1 </option>
			  		<option> 2 </option>
			  		<option> 3 </option>
					  <option> 4 </option>
			  	</select>
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
		<div class="col-sm-7">
			<dl class="product-sizes">
				<?= $tituloTamano; ?>
				  <dd>
				  	<?= $tamano; ?>
				  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
	</div> <!-- row.// -->
	<hr>
	<button id="btnComprar" class="btn btn-lg btn-outline-primary text-uppercase"> Comprar </button>
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->



</div>
<!--container.//-->

<script>
	

 
  $(function(){
    let datos={
        color:'None',
        tamano:'',
        precio:'',
        modelo:'',
        cantidad:'',
      };
      <?= $scriptColor; ?>
	    <?= $scriptTamano; ?>
    

      $("select#selectCantidad").change(function(){
        datos.cantidad = $(this).children("option:selected").val();
        console.log(datos.cantidad);
    });

    $('#btnComprar').click(function(){
      var enviar = true;
      datos.modelo = 'http://localhost/xampp/cajageek/assets/img/detalle/'+'<?= $fotosProducto[0]; ?>';
      
      if(datos.tamano == ''){
        enviar = false;
        console.log('Tamano out');
        return
      }
      if(datos.cantidad == ''){
        enviar = false;
        console.log('Cantidad out');
        return;
      }

      if(enviar){
        textUrl = 'https://wa.me/5211234567890?text=Color:'+datos.color+' Tamaño:'+datos.tamano+' Precio:'+datos.precio+' Producto:'+datos.modelo+' Cantidad:'+datos.cantidad;
        window.open(textUrl,'Comprar');
      }
      
      
    });
  });
</script>
<script>
    var galleryThumbsProductDetails = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTopProductDetails = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbsProductDetails
      }
    });
  </script>