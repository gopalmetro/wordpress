<?php
/**
 * The template for displaying taxonomy pages
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php 
						$current_term = get_queried_object();
						$taxonomy = get_taxonomy($current_term->taxonomy);
						echo $taxonomy->label . ': ' . $current_term->name;
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while (have_posts()) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __('Previous page', 'twentyfifteen'),
				'next_text'          => __('Next page', 'twentyfifteen'),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentyfifteen') . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part('content', 'none');

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
