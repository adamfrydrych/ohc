<!-- Agistments table -->
<?php
  	$child_args = array(
		'posts_per_page' => 999,
		'post_type' => 'agistments',
		'post_status'=>'publish',
    'meta_query' => array(array('key' => '_wpcf_belongs_page_id', 'value' => get_the_ID()))
	);

	$child_posts = get_posts( $child_args );
  //$child_posts = types_child_posts("agistments");  
  if($child_posts) { ?>
<table class="table table-striped" border="0" align="left">
  <thead>
    <tr>
      <th>Type of Service</th>
      <th>Inclusions</th>
      <th>Rate per week</th>
      <th>Availability</th>
    </tr>
  </thead>
<tbody>  
<?php	foreach ( $child_posts as $child_post ) :
		
    $rpw = types_render_field( 'rate-per-week', array('id'=> $child_post->ID, 'output' => 'normal' ) ); // Rate per week
    $availability = types_render_field( 'availability', array('id'=> $child_post->ID, 'output' => 'normal' ) ); // Availability
?>
<tr>
  <td><a href="<?php echo get_permalink($child_post->ID); ?>"><?php echo $child_post->post_title; ?></a></td>
  <td><?php echo $child_post->post_excerpt; ?></td>
  <td>$<?php echo $rpw; ?></td>
  <td><?php echo $availability; ?></td>
</tr>
<?php
	endforeach;
	wp_reset_postdata(); ?>
</tbody>
</table>
<?php  } ?>
<!-- End of agistments table -->    
