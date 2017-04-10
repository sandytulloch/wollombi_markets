<!-- Extra comment -->

<!-- <div class='container'> -->
	<h4><a href="<?= base_url();?>Editor/structure/<?=$structure['ID']?>"><?=$structure['Name']?></a> - > <a href="<?= base_url();?>Editor/group/<?=$group['ID']?>"><?=$group['Type']?> <?=$group['Index']?></a> - > <?=$component['Type']?> <?=$component['Index']?></h4>
	<form class="form-horizontal" role="form" action='<?= base_url();?>Editor/save_component' method="post">
		<? $i = 0 ?>

		<? $columns = 3; ?>

		<?php foreach ($component as $key=>$value): ?>
			<?php if($i % $columns == 0): ?>
				<div class='row'>
			<?php endif; ?>
			<?php if($key == 'Quantity'): ?>
				<div class="form-group col-lg-<?=(12/$columns)?>">
				    <label for="<?=$key?>" class="col-lg-5 control-label"><?=$key?></label>
				    <div class="col-lg-7">
				    	<div class='input-group'>
				    		<input type="text" class="form-control" name="<?=$key?>" id="<?=$key?>" value="<?=$value?>">
				    		<div class="input-group-addon"><?=$component['QuantitySpecificMeasurement']?></div>
				    	</div>
				    </div>
			  	</div>
		  	<?php elseif($key !='QuantitySpecificMeasurement'): ?>
				<div class="form-group col-lg-<?=(12/$columns)?>">
				    <label for="<?=$key?>" class="col-lg-5 control-label"><?=$key?></label>
				    <div class="col-lg-7">
				    	<input type="text" class="form-control" name="<?=$key?>" id="<?=$key?>" value="<?=$value?>">
				    </div>
			  	</div>
			<?php endif; ?>
			<?php if($i % $columns == ($columns-1)): ?>
				</div>
			<?php endif; ?>
		  	<? $i++ ?>	
		<?php endforeach; ?>

		<div class='row'>
			<div class='col-lg-12 text-right'>
				<button type="submit" class="btn btn-success">Save</button> <a href="<?= base_url();?>Editor" class="btn btn-danger">Cancel</a>
			</div>
		</div>
	</form>

	<div class='row'>
		<div class='col-xs-6'>
			<h4>Photos</h4>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			  <?$i = 0?>
			  <?php foreach ($photos as $photo): ?>
			  	<li data-target="#myCarousel" data-slide-to="<?=$i?>"<?php if(!$i): ?> class="active"<?php endif; ?>></li>
			  	<? $i++?>
			  <?php endforeach; ?>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">

			  <?$i = 0?>
			  <?php foreach ($photos as $photo): ?>
			  	<div class="item scaledCarouselImg <?php if(!$i): ?>active<?php endif; ?>">
			      <img src="<?=base_url().'/../'.$photo['ServerLocation']?>" alt="<?=$photo['ID']?>" onclick='showImage("<?=base_url().'/../'.$photo['ServerLocation']?>")'>
			    </div>
			  	<? $i++?>
			  <?php endforeach; ?>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<div class='col-xs-6'>
			<h4>Defects</h4>
			<ul>

				<?php foreach ($defects as $defect): ?>
					<li><a href="<?= base_url();?>Editor/defect/<?=$defect['ID']?>"><?=$defect['Type']?></a></li>
				<?php endforeach; ?>	

			</ul>
		</div>
	</div>




	<div id="photoModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Photo</h4>
		</div>
		<div class='modal-body'>
			<div class='row'>
				<div class='col-lg-12 text-center'>
					<img id= 'photoContainer' src='' height='400'/>
				</div>
			</div>
			
			
		</div>
		<div class='modal-footer'>
			<button type="button" class="btn btn-default" data-dismiss="modal" data-target="#newGroupModal">Close</button>
		</div>
    </div>
  </div>
</div>

<script>
	
function showImage(ServerLocation){
	$("#photoModal").modal('show');
	$("#photoContainer").attr('src', ServerLocation);
	$(photoContainer).height($(window).height() * 0.75);
}

</script>
<!-- </div> -->