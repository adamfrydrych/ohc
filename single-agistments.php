<?php
/**
 * The template for displaying all single posts for post_type agistments
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main"> 
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content"> 
<?php 

      // Rate per week
      echo("Rate per week: <strong>$" . types_render_field( 'rate-per-week', array( 'output' => 'normal' ) ) . "</strong> | "); 
      // Availability
      echo("Availability: <strong>" . types_render_field( 'availability', array( 'output' => 'normal' ) ) . "</strong>");

			the_excerpt();
			the_content();

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php      
      // End of single post content

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
