<!-- <h2><?php echo $title; ?></h2> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
            	<?php $first = '1';
            	foreach ($struct as $structure_item):
      					if($first):
      						// echo '<li class="active"><a href="'.site_url('news/'.$structure_item['ID']).'">'.$structure_item['Name'].'<span class="sr-only"> (current)</span></a></li>';
      						echo '<li class="active"><a href="#" data="'.$structure_item['ID'].'">'.$structure_item['Name'].'</a></li>';
      						$first = '';
      						$name = $structure_item['Name'];
                  $id = $structure_item['ID'];
                  $category = $structure_item['Category'];
      						$location = $structure_item['wkt'];
      					else:
      						// echo '<li><a href="'.site_url('news/'.$structure_item['ID']).'">'.$structure_item['Name'].'</a></li>';
      						echo '<li><a href="#" data="'.$structure_item['ID'].'">'.$structure_item['Name'].'</a></li>';
      					endif;
				      endforeach; ?>
			      </ul>
		    </div>
	  </div>
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <?php echo '<h1 class="struct-name">'.$name.'</h1>'; ?>

  <div class="row structure_info photo">
    <div class="col-xs-12 col-sm-6">
      <?php
	      echo '<span class="struct-name">Name: '.$name.'</span><br>';
        echo '<span class="struct-id">ID: '.$id.'</span><br>';
        echo '<span class="struct-cat">Category: '.$category.'</span><br>';
	      echo '<span class="struct-ref">Location: '.$location.'</span><br>';
      ?>
    </div>
    <div class="col-xs-12 col-sm-6">
      <!--<img src="../../SLRStops/upload/AR_DN/Other Facilities 1/Furniture 1/379f5e8f-ff28-7a03-6510-8679f5d5f3cc.jpg" class="img-responsive" alt="File Location of Photo Not Found"> -->
    </div>
  </div>
  <!-- <div class="row map">
    <div class="col-xs-24 col-sm-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.767706566835!2d151.205!3d-33.869876981567295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDUyJzEyLjAiUyAxNTHCsDEyJzE4LjAiRQ!5e0!3m2!1sen!2sau!4v1448508751487" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div> -->
</div>