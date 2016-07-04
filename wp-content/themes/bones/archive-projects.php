<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<main class="content" id="main" role="main" itemscope itemprop="mainContentOfPage">

				<section class="content__section bg--black">
					<p class="content__section-heading  text--white">Nòmade</p>
					<svg class="content__section-icon  icon">
						<use xlink:href="#icon-arrow--down"></use>
					</svg>
				</section>
				<section class="content__section bg--white">
					<p class="content__section-text">
						Nòmade is a constatly evolving collection of prints. Each of these represents a journey. Nomade explores the concept of transormation and the word development. It investigates cultures, landscapes and the relation between man and time. Nomade is not meant to answer any question. Nomade is a remix of arts.
					</p>
				</section>

				<section class="content__inner">
			        <?php
			        	$c = 0;
			        	$extra_class = '';
			        ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
			        	$c++;
			        	if( $c % 2 != 0) {
				  		// we're on an odd post
				   			$extra_class = 'project-block--right';
			         	} else {
			         		$extra_class = 'project-block--left'; 
			         	}
		         	?>

					<article  class="cf <?php echo $extra_class?>" id="post-<?php the_ID(); ?>" role="article">
						<div class="project-block__info<?php if( get_field('image_1_vertical') ) { echo "--50";
						} ?>">
							<h2 class="project-block__title">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="project-block__secondary-info">
								<h3 class="project-block__link">
									<a href="<?php the_permalink() ?>">View this collection
										<svg class="project-block__icon  icon">
											<use xlink:href="#icon-arrow--right"></use>
										</svg>
									</a>
								</h3><!--
								--><h3 class="project-block__link">
									<a href="<?php the_permalink() ?>">About the journey
										<svg class="project-block__icon  icon">
											<use xlink:href="#icon-arrow--right"></use>
										</svg>
									</a>
									</h3><!--
							--><a class="project-block__image-link--secondary" href="<?php the_permalink() ?>" rel="bookmark" 	 title="<?php the_title_attribute(); ?>">
									<img class="project-block__image" src="<?php if( get_field('image_2') ): ?><?php the_field('image_2')?><?php endif; ?>" srcset="<?php if( get_field('image_2_2x') ): ?><?php the_field('image_2_2x')?> 2x<?php endif; ?><?php if( get_field('image_2_3x') ): ?>, <?php the_field('image_2_3x')?> 3x<?php endif; ?>">
								</a>
							</div><!--
							--></div><!--
							--><div class="project-block__image-wrapper<?php if( get_field('image_1_vertical') ) { echo "--50";
							} ?>">
								<a class="project-block__image-link--primary  js-project-block__image-link--primary" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" data-src="<?php if( get_field('image_1') ): ?><?php the_field('image_1')?><?php endif; ?>">
								</a>
							</div>
					</article>

					<?php endwhile; ?>

							<?php bones_page_navi(); ?>

					<?php else : ?>

							<article id="post-not-found" class="hentry cf">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
								</footer>
							</article>

					<?php endif; ?>

				</section>

			</main>
			<?php get_footer(); ?>
