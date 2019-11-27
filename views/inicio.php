<div class="navCategories col-12">
    <?= $categoriaComponente; ?>
</div>
<div id="navSelector" class="row no-gutters">
    <div class="col-12">
        <div class="col-12 np text-center">
            <h1>
              
            </h1>
        </div>
    </div>
    <div class="container">
        <div id="load_data" class="row">
            
        </div>
        <div class="col-12 text-center">
              <span id="load_data_message">Loading Please wait...</span>
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



$(document).ready(function(){
	
	var limit = 5;
	var offset = 0;
	var action = 'inactive';
	function load_country_data(limit, offset)
	{
		$.ajax({
			url:"./module/get_allproducts.php",
			method:"POST",
			data:{limit:limit, offset:offset},
			cache:false,
			success:function(data)
			{
        console.log('Solicite');
				$('#load_data').append(data);
				if(data == '')
				{
					$('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
					action = 'active';
				}
				else
				{
					$('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
					action = "inactive";
				}
			}
		});
	}

	if(action == 'inactive')
	{
		action = 'active';
		load_country_data(limit, offset);
	}
	$(window).scroll(function(){
		if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
		{
			action = 'active';
			offset = offset + limit;
			setTimeout(function(){
				load_country_data(limit, offset);
			}, 1000);
		}
	});
	
});
</script>