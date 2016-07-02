<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>
			<?php
					$image1 	= get_field('image_1');
					$image2 	= get_field('image_2');
					$image3 	= get_field('image_3');
					$image4 	= get_field('image_4');
					$image5 	= get_field('image_5');
					$image6 	= get_field('image_6');
					$image7 	= get_field('image_7');
					$image8 	= get_field('image_8');
					$image9 	= get_field('image_9');
					$image10 	= get_field('image_10');
					$imageArray = array($image1, $image2, $image3, $image4, $image5, $image6, $image7, $image8, $image9, $image10);
					$imageArray = array_filter($imageArray);
			?>

			<main class="content" id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


					<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

						<section class="content__inner">
							<div id="fullpage">
								<?php
									for($x = 0; $x < count($imageArray); $x++) {
										$z = $x+1;
										$vertical = get_field('image_'. $z .'_vertical');
										$cssClass = "project__image";
										$srcset2x = get_field('image_'. $z .'_2x');
										$srcset3x = get_field('image_'. $z .'_3x');
										$totalImages = count($imageArray);
										if ($vertical == TRUE) {
											$cssClass = "project__image--vertical";
										}
										if (!empty($imageArray[$x]) ) {
											echo "<div class='section'><img class='$cssClass' src='$imageArray[$x]'  srcset='$srcset2x 2x, $srcset3x 3x'></img/><p class='project__counter'>$z | $totalImages</p></div>";
										}
									}
								?>
								<div class='section'>
									<h2><?php the_title(); ?></h2>
									<p><?php the_content(); ?></p>
									
								</div>
								</div>

						</section>
						
					</article>

					<?php endwhile; ?>
				
				<?php else : ?>

						<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
							</footer>
						</article>

				<?php endif; ?>

			</main>

			<?php get_footer(); ?>
