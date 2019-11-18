<div class="mask">
  <div class="link-mask btn-g" id="mask">
      <i class="fa fa-chevron-up" aria-hidden="true" id="chang-icon-mask"></i>
      Cambiar tema
  </div>
  <div class="form-mask">
	<div class="col-xs-12 all-border-xs">
		<form action="<?= URL; ?>" method="post" class="">
			<div class="space-form">
			  <select class="form-control" name="tema_op">
			    <?php echo param_theme(); ?>
			  </select>		
			</div>
			<div class="space-form">
				<button type="submit" class="btn form-control btn-g" name="update-theme" value='op-mask'>CAMBIAR</button>
			</div>
		</form>	
	</div>
  </div>    
</div>
