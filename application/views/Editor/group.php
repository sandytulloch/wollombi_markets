

<!-- <div class='container'> -->
	<h4><a href="<?= base_url();?>Editor/structure/<?=$structure['ID']?>"><?=$structure['Name']?></a> - > <?=$group['Type']?> <?=$group['Index']?></h4>
	<form class="form-horizontal" role="form" action='<?= base_url();?>Editor/save_group' method="post">
		<? $i = 0 ?>

		<? $columns = 2; ?>

		<?php foreach ($group as $key=>$value): ?>
			<?php if($i % $columns == 0): ?>
				<div class='row'>
			<?php endif; ?>

			<div class="form-group col-lg-<?=(12/$columns)?>">
			    <label for="<?=$key?>" class="col-lg-5 control-label"><?=$key?></label>
			    <div class="col-lg-7">
			    	<input type="text" class="form-control" name="<?=$key?>" id="<?=$key?>" value="<?=$value?>">
			    </div>
		  	</div>

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

	<h4>Components</h4>
	<ul>

		<?php foreach ($components as $component): ?>
			<?php //if(!$component['hidden']): ?>
				<li><a href="<?= base_url();?>Editor/component/<?=$component['ID']?>"><?=$component['Type']?> <?=$component['Index']?></a></li>
			<?php //endif; ?>
		<?php endforeach; ?>	

	</ul>
<!-- </div> -->