<?php get_header(); ?>
    <div class="main">
        <h2 class="categoryTitle"><?php single_cat_title(); ?></h2>
        <ul class="postList">
            <?php while (have_posts()) : the_post();

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
                $date=get_the_date();
                $date_array=explode("/",$date);
                $month=$date_array[1];
                $day=$date_array[0];
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <div class="dateContainer">
                            <span class="month"><?php echo $month; ?></span>
                            <span class="segmentation">分割线</span>
                            <span class="day"><?php echo $day; ?></span>
                        </div>
                        <div class="thumbContainer">
                            <img src="<?php echo $thumb; ?>">
                        </div>
                        <div class="infoContainer">
                            <h2 class="title" title="<?php the_title(); ?>"><?php the_title(); ?></h2>
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <p class="excerpt" title="<?php echo get_the_excerpt(); ?>"><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <!-- 分页-->
        <?php
        global $wp_query;
        $total = $wp_query->max_num_pages;
        if ($total > 1) {
            if (!$current_page = get_query_var('paged')) {
                $current_page = 1;
            }
            //获取路径
            $permalink_structure = get_option('permalink_structure');
            $format = empty($permalink_structure) ? '&page=%#%' : '/page/%#%/';
            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => $format,
                'current' => $current_page,
                'total' => $total, 'mid_size' => 4,
                'type' => 'list',
                'prev_text'    => "Prev",
                'next_text'    => "Next",
            ));
        }
        ?>
<?php get_footer(); ?>