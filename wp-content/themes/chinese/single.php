<?php
get_header();
?>
    <div class="main">

    <?php while (have_posts()) : the_post(); ?>

        <div class="content">
            <?php
            $post_id=get_the_ID();
            if($post_id!=7&&$post_id!=9&&$post_id!=11){
                ?>
                <h2 class="singleTitle"><?php the_title(); ?></h2>
            <?php
            }?>

            <?php the_content(); ?>
        </div>
    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>