<div class="navCategories col-12">
    <?= $categoriaComponente; ?>
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
            <?= $estructuraTiposPorCategoria; ?>
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