<?php
get_header();
?>
    <div class="main">

    <?php while (have_posts()) : the_post(); ?>
        <div class="content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>