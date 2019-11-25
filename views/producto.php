
<div class="container">

<hr>

	
<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">

<div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(./assets/img/ejemplo.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./assets/img/ejemplo.jpg)"></div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(./assets/img/ejemplo.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./assets/img/ejemplo.jpg)"></div>
    </div>
  </div>

		</aside>
		<aside class="col-sm-7">
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
			  	<select class="form-control form-control-sm" style="width:70px;">
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
	<a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
	<a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->


</div>
<!--container.//-->

<script>
	<?= $scriptColor; ?>
	<?= $scriptTamano; ?>
</script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
  </script>