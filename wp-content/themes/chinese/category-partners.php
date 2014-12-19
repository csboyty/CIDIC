<?php
    get_header();

    global $wp_query;
    //通过跟踪single_category_title获取到
    $current_category=$wp_query->get_queried_object();
    $child_categories = get_categories(array(
        "parent"=>$current_category->term_id,
        "orderby"=>"id",
        "hide_empty"=>0
    ));
?>
<div class="main">
    <div class="partnerContainer">
        <h2 class="categoryTitle"><?php echo $child_categories[0]->name; ?></h2>
        <ul class="partnerList partnerBig">
            <?php
            $posts=get_posts(array('posts_per_page' => -1,"category"=>$child_categories[0]->cat_ID));
            //print_r($posts);
            foreach($posts as $post){
                $post_id=$post->ID;
                $thumb="";
                if(has_post_thumbnail($post_id)){
                    $thumbnail_id=get_post_thumbnail_id($post_id);
                    if(wp_get_attachment_metadata($thumbnail_id)){

                        //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                        $thumb= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                        $thumb=$thumb[0];
                    }else{
                        $thumb_post=get_post($thumbnail_id);
                        $thumb=$thumb_post->guid;
                    }
                }
                ?>
                <li>
                    <a href="<?php echo get_permalink($post->ID); ?>">
                        <img class="thumb" src="<?php echo $thumb; ?>">
                    </a>
                </li>
            <?php
            }
            wp_reset_postdata();
            ?>
        </ul>
        <hr><br><br><br>
        <h2 class="categoryTitle"><?php single_cat_title(); ?></h2>
        <ul class="partnerList">
            <?php
            //print_r($wp_query->query_vars);
            $args = array_merge($wp_query->query_vars,array('nopaging'=>true,
                "category__not_in"=>array($child_categories[0]->cat_ID)));
            query_posts($args);
            while (have_posts()) : the_post();

                $post_id=get_the_ID();
                $thumb="";
                if(has_post_thumbnail($post_id)){
                    $thumbnail_id=get_post_thumbnail_id($post_id);
                    if(wp_get_attachment_metadata($thumbnail_id)){

                        //如果存在保存媒体文件信息的metadata，那么系统是可以获取出缩略图的
                        $thumb= wp_get_attachment_image_src($thumbnail_id,"post-thumbnail");
                        $thumb=$thumb[0];
                    }else{
                        $thumb_post=get_post($thumbnail_id);
                        $thumb=$thumb_post->guid;
                    }
                }
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <img class="thumb" src="<?php echo $thumb; ?>">
                    </a>
                </li>
            <?php
            endwhile;
            wp_reset_query();
            ?>
        </ul>
    </div>


<?php get_footer(); ?>