<div class="navCategories col-12">
    <?= $categoria; ?>
</div>
<div id="navSelector" class="row no-gutters">
    <div class="col-12">
        <div class="col-12 np text-center">
            <h1>
                {{title}}
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <a href="producto.php?name=Datos%20del%20producto">
                    <div class="card">
                        <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
                        <div class="card-body">
                            <h4 class="card-title">
                                Titulo del producto
                            </h4>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Style: VA33TXRJ5
                            </h6>
                            <p class="card-text">
                                The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.
                            </p>
                            <div class="buy d-flex justify-content-between align-items-center">
                                <div class="price text-success">
                                    <h5 class="mt-4">
                                        $125
                                    </h5>
                                </div>
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
        products : []
    }
});
</script>