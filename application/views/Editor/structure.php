

<!-- <div class='container'> -->
	<h4><?=$structure['Name']?></h4>
	<form class="form-horizontal" role="form" action='<?= base_url();?>Editor/save_structure' method="post">
		<? $i = 0 ?>

		<? $columns = 3; ?>

		<?php foreach ($structure as $key=>$value): ?>
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
	<a type="button" class="btn btn-default" target='_blank' href="http://sysv01.opus.co.nz/webapps/SiteInspections/IWLR/pdfOutputBridges3.php?id=<?=$structure['ID']?>"}>View Report</a>
	<h4>Groups</h4>
	<ul>

		<?php foreach ($groups as $group): ?>
			<li><a href="<?= base_url();?>Editor/group/<?=$group['ID']?>"><?=$group['Type']?> <?=$group['Index']?></a></li>
		<?php endforeach; ?>	

	</ul>
<!-- </div> -->