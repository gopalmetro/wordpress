<?php
/**
 * The template used for displaying portfolio page content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<!-- .entry-header -->
	
	
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<div class="entry-content">
		<?php
			// Portfolio taxonomy meta data arguments
			$args = array(
			    'post' => 0,
			    'before' => '<div class="meta portfolio-meta">',
			    'sep' => '</div><div class="meta portfolio-meta">',
			    'after' => '</div>',
			    'template' => '%s: %l.'
			); 
		?>
		<?php // Styles and displays the taxonomy list ?>
		<div class="wt-portfolio-taxonomies"><?php the_taxonomies( $args ); ?></div>
		
		<?php // Styles and displays the content ?>
		<div class="wt-portfolio-content"><?php the_content(); ?></div>						

		<?php
		    // Retrieves the portfolio data from the database
		    $portfolio_challenge_data = get_post_meta( get_the_ID(), 'wt_portfolio_challenge_wysiwyg_content', true);
		    $portfolio_solution_data = get_post_meta( get_the_ID(), 'wt_portfolio_solution_wysiwyg_content', true);
		 
		    // Checks and displays the portfolio data
		    if(!empty($portfolio_challenge_data)) {
			    echo '<div class="wt-challenge">';
			    echo '<h2 id="wt-challenge-post-header" class="wt-portfolio-single-header"> The Challenge </h2>'; 
		        echo '<div id="wt-challenge-post-content" class="wt-portfolio-single-content">' . $portfolio_challenge_data . '</div>';
		        echo '</div>';
		    }
		    if (!empty($portfolio_solution_data)) {
			    echo '<div class="wt-solution">';
			    echo '<h2 id="wt-solution-post-header" class="wt-portfolio-single-header"> The Solution </h2>';
			    echo '<div id="wt-challenge-post-content" class="wt-portfolio-single-content">' . $portfolio_solution_data . '</div>';
			    echo '</div>';
		    }
		?>	
			
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Pages', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php
		// Author bio.
		if (is_single() && get_the_author_meta('description')) :
			get_template_part('author-bio');
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
