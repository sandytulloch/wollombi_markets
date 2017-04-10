<h4>Structures</h4>

<?

$fields = array('Structure_ref', 'Name', 'Address_1', 'Category', 'Maintainer');

?>

<table id='structuresTable' class='table'>
	<thead>
		<tr>
			<?php //foreach ($structures[0] as $key=>$value): ?>
			<?php foreach ($fields as $field): ?>
			<th><?=$field?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tfoot>
<!-- 		<tr>
			<?php //foreach ($structures[0] as $key=>$value): ?>
			<?php foreach ($fields as $field): ?>
			<th><?=$field?></th>
			<?php endforeach; ?>
		</tr> -->
	</tfoot>
	<tbody>
		<?php foreach ($structures as $index=>$structure): ?>
			<tr data-url="<?php echo base_url().'Editor/structure/'. $structure['ID'] ?>">
					<?php //foreach ($structure as $key=>$value): ?>
					<?php foreach ($fields as $field): ?>
						<td><?=$structure[$field]?></td>
					<?php endforeach; ?>
			</tr>

		<?php endforeach; ?>
	</tbody>


</table>

<script>
	$(document).ready(function() {
		var model = new ViewModel();
		ko.applyBindings(model);

		model.init();
	})
</script>

