<?php
/**
 * The home.php template.
 *
 * The template to display the home.php content.
 *
 * @package WordPress
 * @subpackage Shop Isle
 */
get_header(); ?>

	<!-- Wrapper start -->
<h1 class="test">TEST</h1>
	<div class="main">


	<!-- Header section start -->
<?php

$page_for_posts_id = get_option( 'page_for_posts' );
if ( ! empty( $page_for_posts_id ) ) {
	$thumb_tmp = get_the_post_thumbnail_url( $page_for_posts_id );
}

$shop_isle_header_image = get_header_image();
if ( ! empty( $thumb_tmp ) ) {
	echo '<section class="module bg-dark" data-background="' . esc_url( $thumb_tmp ) . '">';
} elseif ( ! empty( $shop_isle_header_image ) ) {
	echo '<section class="module bg-dark" data-background="' . esc_url( $shop_isle_header_image ) . '">';
} else {
	echo '<section class="module bg-dark">';
}
?>
		<!-- class="flex-center site-header"
			
			 <div class="container">
			<h1 class="hero-title">Folie i szkła ochronne</h1>
				<h2 class="hero-subtitle">Wysokiej jakości folie i szkła ochronne dla Twoich urządzeń</h2>
				<a href="<?php //echo home_url().'/sklep'; ?>"><button class="btn waves-effect red lighten-2 center-align">Kup teraz</button></a>
		</div>--><!-- .container --> 

<?php
echo '</section><!-- .module -->';
?>

<?php 
/******* Products Slider Section *********/
?>

<?php
$products_slider = get_template_directory() . '/inc/sections/shop_isle_products_slider_section.php';
require_once( $products_slider );

/******  Banners Section *******/
$banners_section = get_template_directory() . '/inc/sections/shop_isle_banners_section.php';
require_once( $banners_section );

/******* Products Section *********/
$latest_products = get_template_directory() . '/inc/sections/shop_isle_products_section.php';
require_once( $latest_products );

/******* Video Section *********/
$video = get_template_directory() . '/inc/sections/shop_isle_video_section.php';
require_once( $video );
?>
<div id="featured" class="carousel slide ">
    <div class="carousel-inner ">
        <?php
        $args          = array(
            'post_type' => 'product',
        'numberposts'     => 6,
        'posts_per_page' => 6
        );
        $featured_loop = new WP_Query( $args );//global $product;
        if ( $featured_loop->have_posts() ):
            while ( $featured_loop->have_posts() ) : $featured_loop->the_post(); ?>
                                        <div class=
                                      <?php
                                        echo '"';
                                        echo 'item '; 
                                        if ($i == 1) {
                                          echo 'active';
                                        }

                                        echo '"';

                                        ?>>
                    <div class="col-xs-12">                        
                            <i class="tag"></i>
                            <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php echo woocommerce_get_product_thumbnail(); ?>
                            </a>
                        <div class="panel-body text-center">
                            <h6><?php the_title(); ?> </h6>
                        </div>
                    </div>
                </div>

            <?php  $i++; endwhile; ?>
            <a class="left carousel-control" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
    <a class="right carousel-control" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
            <?php wp_reset_postdata(); endif; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
	<!-- Header section end -->
	<!-- Recent promotions section -->
	<!-- <h1 class="module-title font-alt product-hide-title">Aktualne promocje</h1>
	<section class="container">
		<?php //echo do_shortcode('[products limit="4" columns="4" orderby="popularity" on_sale="true" ]'); ?>
	</section>
	<!-- Recent bestsellers -->
	<!-- <h1 class="module-title font-alt product-hide-title">Najczęściej wybierane</h1>
	<section class="container">
		<div class="prod-img-wrap">
			<?php //echo do_shortcode('[products limit="4" columns="4" orderby="popularity" ]'); ?>
		</div>
	</section> -->



	<!-- Blog standard start -->
<?php
$shop_isle_posts_per_page = get_option( 'posts_per_page' ); /* number of latest posts to show */

if ( ! empty( $shop_isle_posts_per_page ) && ($shop_isle_posts_per_page > 0) ) :

	$shop_isle_query = new WP_Query(
		array(
			'post_type' => 'post',
			'posts_per_page' => $shop_isle_posts_per_page,
			'paged' => ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ),
		)
	);



	if ( have_posts() ) {

		?>
		<section class="module">
			<div class="container">										

				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-8" id="shop-isle-blog-container">
						<?php

						while ( $shop_isle_query->have_posts() ) {
							$shop_isle_query->the_post();

							?>
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

								<?php
								if ( has_post_thumbnail() ) {
									echo '<div class="post-thumbnail">';
									echo '<a href="' . esc_url( get_permalink() ) . '">';
									echo get_the_post_thumbnail( $post->ID, 'shop_isle_blog_image_size' );
									echo '</a>';
									echo '</div>';
								}
								?>

								<div class="post-header font-alt">
									<h2 class="post-title entry-title"><a href="
									<?php
										echo esc_url( get_permalink() );
										?>
										"><?php the_title(); ?></a></h2>
									<div class="post-meta">
										<?php
										shop_isle_posted_on();
										?>

									</div>
								</div>

								<div class="post-entry entry-content">
									<?php
									$shop_isleismore = strpos( $post->post_content, '<!--more-->' );
									if ( $shop_isleismore ) :
										the_content();
									else :
										the_excerpt();
									endif;
									?>
								</div>

								<?php
								if ( ! $shop_isleismore ) {
									echo '<div class="post-more">';
										echo '<a href="' . esc_url( get_permalink() ) . '" class="more-link">' . esc_html__( 'Read more','shop-isle' ) . '</a>';
									echo '</div>';
								}
								?>

							</div>
							<?php

						}// End while().

						?>
						<!-- Pagination start-->
						<div class="pagination font-alt">
							<?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'shop-isle' ), $shop_isle_query->max_num_pages ); ?>
							<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'shop-isle' ), $shop_isle_query->max_num_pages ); ?>
						</div>
						<!-- Pagination end -->
					</div>
					<!-- Content column end -->

					<!-- Sidebar column start -->
					<div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

						<?php do_action( 'shop_isle_sidebar' ); ?>

					</div>
					<!-- Sidebar column end -->

				</div><!-- .row -->

			</div>
		</section>
		<!-- Blog standard end -->

		<?php
	}// End if().

endif;

?>

<?php get_footer(); ?>
