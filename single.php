<?php
/**
 **********************************************
 * single.php
 **********************************************
 *
 * The single post.
 *
 * @author
 * @copyright
 * @link
 * @todo
 * @license
 * @since
 * @version
**/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="jumbotron">
    <div class="container">

    <h1>Blog Post</h1>
    <p><?php the_title(); ?></p>

    </div>
</div>

<div class="container">   
    <div class="row">
	<div class="col-md-9 text-justify">

        <div class="page-header"> 

            <?php
                $thumbnail_id = get_post_thumbnail_id(); 
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);                
            ?>

            <?php if( has_post_thumbnail() ): ?>
            <p class="featured-image">
                <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>">
            </p>
            <?php endif; ?>

            <p class="post-meta">
                By  <span class="vcard author">
                        <span class="fn"><?php the_author_posts_link(); ?></span> 
                    </span>
                on  <span class="date updated"><?php echo the_time('l, F jS, Y');?></span>
                in <?php the_category( ', ' ); ?>.
                <a href="<?php comments_link(); ?>" class="comments-number"><?php comments_number(); ?></a>
            </p>
        </div>

        <?php the_content(); ?>

        <hr>

        <?php comments_template(); ?>

		<?php endwhile; else: ?>
          
        <div class="page-header">
            <h1>Oh no!</h1>
        </div>

        <p>No content is appearing for this page!</p>

        <?php endif; ?>

        </div>
      
    <?php get_sidebar( 'blog' ); ?>

    </div>
</div>	

<?php get_footer(); ?>

