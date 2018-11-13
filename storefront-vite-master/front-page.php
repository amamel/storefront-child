<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<!-- CSS Grid -->
<div class="wrapper">
	<div class="topbar">Topbar</div>
	<div class="header">Header</div>
	<div class="nav">
		<ul class="menu">
			<li>Living</li>
			<li>Clothing</li>
		</ul>
	</div>
	<div class="brand">Brand</div>
	<div class="nav">
		<ul class="menu">
			<li>More</li>
		</ul>
	</div>
	<div class="content">Content</div>
	<div class="footer">Footer</div>
	<div class="newsletter">Newsletter</div>
	<div class="sitemap">Sitemap</div>
</div>

<section class="featured-headline">
    <div class="container">
    <?php if ( have_rows( 'content' ) ): ?>
	<?php while ( have_rows( 'content' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'component_featured' ) : ?>
			<?php if ( have_rows( 'featured' ) ) : ?>
                <?php while ( have_rows( 'featured' ) ) : the_row(); ?>
                    <h2 class="featured_title"><?php the_sub_field( 'featured_title' ); ?></h2>
                    <div class="feature_divider"></div>
					<p class="featured_text"><?php the_sub_field( 'featured_description' ); ?></p>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
        <?php endif; ?>
    </div>
</section>

<section class="featured-collections">
    <div class="container">  
		<?php elseif ( get_row_layout() == 'component_collections' ) : ?>
			<?php if ( have_rows( 'collections' ) ) : ?>
				<?php while ( have_rows( 'collections' ) ) : the_row(); ?>
					<?php $collection_image = get_sub_field( 'collection_image' ); ?>
                    <?php if ( $collection_image ) { ?>
                        <div class="product-wrap">
                            <a href="<?php the_sub_field( 'collection_page' ); ?>"><img class="featured-img-collection" src="<?php echo $collection_image['url']; ?>" alt="<?php echo $collection_image['alt']; ?>" /><span class="collection-caption"><?php the_sub_field( 'collection_name' ); ?></span></a>
                        </div>
					<?php } ?>
					<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
		<?php endif; ?>
	</div>
</section>

<section class="equalHWrap eqWrap">
		<?php elseif ( get_row_layout() == 'component_featured_half' ) : ?>
			<?php if ( have_rows( 'featured_half' ) ) : ?>
				<?php while ( have_rows( 'featured_half' ) ) : the_row(); ?>
					<?php $half_image = get_sub_field( 'half_image' ); ?>
					<?php if ( $half_image ) { ?>
						<div class="featured-half eq">
							<img src="<?php echo $half_image['url']; ?>" alt="<?php echo $half_image['alt']; ?>" />
						</div>
							<?php } ?>
						<div class="featured-half eq">
							<?php the_sub_field( 'half_copy' ); ?>
							<a class="button" href="#">Learn More</a>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php else: ?>
			<?php // no layouts found ?>
		<?php endif; ?>
</section>




<?php get_footer(); ?>