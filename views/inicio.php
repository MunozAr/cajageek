<div class="navCategories col-12">
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria1">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 1</h1>
                        </a>
                    </div>
                </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                            <a href="inicio.php?categoria=categoria2">
                                <img src="assets/img/inicio/pruebacategoria.png" alt="">
                                <h1>Categoria 2</h1>
                            </a>
                        </div>
                    </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria3">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 3</h1>
                        </a>
                    </div>
                </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria4">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 4</h1>
                        </a>
                    </div>
                </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria5">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 5</h1>
                        </a>
                    </div>
                </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria6">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 6</h1>
                        </a>
                    </div>
                </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria7">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 7</h1>
                        </a>
                    </div>
                </div>
                <div class="categoriaDetalle col-12">
                    <div class="col-12">
                        <a href="inicio.php?categoria=categoria8">
                            <img src="assets/img/inicio/pruebacategoria.png" alt="">
                            <h1>Categoria 8</h1>
                        </a>
                    </div>
                </div>
            </div>
<div id="navSelector" class="row no-gutters">
    <div class="col-12">
            <div class="col-12 np text-center">
                <h1>
                    {{title}}
                </h1>
            </div>
            <div class="col-12 np text-center">
                <h3>
                    {{description}}
                </h3>
            </div>
    </div>
    <div class="container">
        <div class="row">
            
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <a href="producto.php?name=Datos%20del%20producto">
                    <div class="card">
                        <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
                        <div class="card-body">
                        <h4 class="card-title">
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                        <p class="card-text">
                            The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.</p>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success"><h5 class="mt-4">$125</h5></div>
                        </div>
                        </div>
                    </div>
            </a>
                </div>
            
        </div>
    </div>
</div>


<script>
$('.navCategories').slick({
  centerMode: true,
  centerPadding: '5px',
  slidesToShow: 6,
  responsive: [
    {
    breakpoint: 1240,
    settings: {
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 4
    }
  }, 
  {
    breakpoint: 1024,
    settings: {
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 3
    }
  },
  {
    breakpoint: 480,
    settings: {
      centerMode: true,
      centerPadding: '20px',
      slidesToShow: 1
    }
  }
]
});


var navSelector = new Vue({
    el: '#navSelector',
    data:{
        title: '<?php echo $categoryName; ?>',
        description:'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        products : []
    }
});
</script>