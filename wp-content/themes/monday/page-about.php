<?php while (have_posts()) : the_post(); ?>
 
	<?php 
	if ( has_post_thumbnail() ) {
		the_post_thumbnail('full', ['class' => 'img-responsive']);
	} 
	?>

	<div class="mainwhite" align="center">

		<div class="maincontent">

			<div class="container">

				<div class="row">

					<div class="col-md-12">
						<?php get_template_part('templates/page', 'header'); ?>

						<div class="nav-container">

							<ul class="hidden hidden-xs nav nav-tabs sub-nav">
								<li role="presentation" class="active">
									<a href="<?php bloginfo('url'); ?>/about">Overview</a>
								</li>
								<li role="presentation">
									<?php $args = array(
										'numberposts'   => 1,
										'category'    => 7,
									);
									$posts_array = get_posts( $args );
									foreach ($posts_array as $post) : setup_postdata( $post ); ?>
										<a href="<?php the_permalink() ?>">Case Studies</a>
									<?php endforeach; wp_reset_postdata(); ?>
								</li>
							</ul>

						</div>

						<?php get_template_part('templates/content', 'page'); ?>
					</div>

				</div>

			</div>

		</div>

		<?php
		  get_template_part('templates/footer');
		  wp_footer();
		?>

	</div>

<?php endwhile; ?>
