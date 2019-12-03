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
    <div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-5 col-md-3 col-lg-2">
        <div class="card">
          <article class="filter-group">
            <header class="card-header">
              <a href="#" data-toggle="collapse" data-target="#collapse_aside1">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Categories </h6>
              </a>
            </header>
            <div class="filter-content collapse show" id="collapse_aside1">
              <div class="card-body">
                <div v-for ="type in typesList" :key="type.tipo_id" class="checkbox">
                  <label>
                    <input type="checkbox" name="tipos" :value="type.tipo_id" v-model="checkedType" >{{type.tipo_nombre}}
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="tipos" value="Discount" v-model="checkedType" >Descuentos
                  </label>
                </div>
                <span>You have chosen: {{ checkedType }}</span>
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- filter-group  .// -->
        </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-10">
          <div class="row espacioProductos">
              <div  class=" tamanoShowProducto" v-for="(producto,index) in filterProducts" v-if="index < productoToShow" :key="products[index].producto_id" >
              <a class="pointerProduct" v-bind:href="'producto.php?name='+products[index].producto_nombre+'&id='+products[index].producto_id+'&identifier='+products[index].producto_identificador">
                    <div class="card product-card">
                        <img class="card-img" v-bind:src="'./assets/img/productos/'+products[index].producto_foto" v-bind:alt="products[index].producto_nombre+' - Caja Geek' ">
                        <div class="card-body">
                            <h2 class="card-title">
                            {{ products[index].producto_nombre }}
                            </h2>
                            <h4 class="card-subtitle mb-2 text-muted">
                                Identificador: {{ products[index].producto_identificador }}
                            </h4>
                            <p class="card-text">
                                
                            </p>
                            <div class="buy d-flex justify-content-between align-items-center">
                                <div class="price text-success">
                                    <h3 class="mt-4">
                                        Desde: {{products[index].producto_precio}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
              </div>
              </div>
              <div class="col-12 text-center espacioProductos">
              <img v-if="!effectGif" width="100px;" src="./assets/img/inicio/loading.gif" alt="Loading GIF - Caja Geek">
              <button @click="loadMore()" class="btn btn-danger" v-if="effectGif">Load more</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <span id="loading">Loading Please wait...</span>
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
        products : <?php echo $JSONproductosCategoria ; ?>,
        allProducts:<?php echo $JSONproductosCategoria ; ?>,
        typesList:[],
        checkedType:[], 
        productoToShow:10,
        offset:0,
        effectGif:true
    },
    mounted() {
      axios.post('module/get_allproducts.php',
        {solicitud:'tipos'}
        ).then(response => {
          this.typesList = response.data
        }).catch(e => {
          console.log(e);
      });
    },
    methods: {
    loadMore(){
      const cantidadProductos = this.products.length -this.productoToShow;
      const cantidadAMostrar = this.products.length - this.productoToShow;
      if(cantidadProductos<0)
        this.productoToShow = this.productoToShow + cantidadAMostrar;
        this.productoToShow += 10;
     },
    _isContains(json, value) {
        let contains = false;
        Object.keys(json).some(key => {
            contains = typeof json[key] === 'object' ? 
            _isContains(json[key], value) : json[key] === value;
            return contains;
        });
        return contains;
    }
  },
  computed: {
    filterProducts() {
      if(this._isContains(this.checkedType,'Discount')){
         return this.products.filter(f => f.producto_descuento > 0);
      }
      if (!this.checkedType.length)
        return this.products = this.allProducts;
        return this.products.filter(f => this.checkedType.includes(f.tipo_id));
    },
  }
});

</script>