<?php

get_header();
$services_id=3;
$headline_id=10;

?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/welcome.css" rel="stylesheet" type="text/css">
    <div class="main">
        <div class="hotPost">
            <div class="infoContainer" id="hotPostInfo">
                <h2 class="title" title="">The title</h2>
                <p class="excerpt" title="">The excerpt</p>
            </div>
            <div class="hotPostListContainer" id="hotPostListContainer">
                <a class="prevBtn navBtn disable">前一个</a>
                <ul class="hotPostList" id="hotPostList">
                <?php
                $query = new WP_Query(array(
                    "tag_id"=>$headline_id,"posts_per_page"=>5,"orderby"=>'date',"order"=>'DESC'
                ));

                if ( $query->have_posts() ) {
                    $count=0;
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $count++;
                        $post_id=get_the_ID();

                        if($background=get_post_meta($post_id,"zy_background",true)){
                            $background=json_decode($background,true);
                            $background_src=$background["filepath"];
                        }else{
                            $background_src="";
                        }

                        ?>
                    <li id="hotPost<?php echo $count; ?>">
                        <a href="<?php the_permalink(); ?>">
                            <div class="info">
                                <h3 class="title" title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                                <p class="excerpt" title="<?php echo get_the_excerpt(); ?>"><?php echo get_the_excerpt(); ?></p>
                            </div>
                            <img class="thumb" src="<?php echo $background_src; ?>">
                        </a>
                    </li>
                    <?php
                    }
                }

                wp_reset_postdata();

                ?>
                </ul>
                <a class="nextBtn navBtn hidden">后一个</a>
            </div>
        </div>

        <ul class="categoryList" id="categoryList">
            <?php
            $services_categories = get_categories(array(
                "parent"=>$services_id,
                "orderby"=>"id",
                "hide_empty"=>0
            ));

            foreach($services_categories as $key =>$category){
                ?>
                <li>
                    <a href="#category<?php echo $key; ?>">
                        <h2 class="title"><?php echo $category->name; ?></h2>
                        <img class="thumb" src="<?php echo z_taxonomy_image_url($category->term_id); ?>">
                        <p class="excerpt" title="<?php echo $category->category_description; ?>">
                            <?php echo $category->category_description; ?>
                        </p>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>

        <div class="categorySection hidden" id="category0">
            <h3 class="title"><?php echo $services_categories[0]->name; ?></h3>
            <ul class="cPostList">
                <?php
                $posts_zero=get_posts(array(
                    "category"=>$services_categories[0]->cat_ID,
                    'posts_per_page'=> 3
                ));

                foreach($posts_zero as $post){
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
                        <a href="<?php echo get_permalink($post_id); ?>">
                            <img class="thumb" src="<?php echo $thumb;?>">
                            <h3 class="title"><?php echo $post->post_title; ?></h3>
                        </a>
                    </li>

                <?php
                }
                ?>
            </ul>
            <a href="<?php echo get_category_link($services_categories[0]->cat_ID); ?>" class="detail">More</a>
        </div>
        <div class="categorySection hidden" id="category1">
            <h3 class="title"><?php echo $services_categories[1]->name; ?></h3>
            <ul class="pPostList">
                <?php
                $posts_zero=get_posts(array(
                    "category"=>$services_categories[1]->cat_ID,
                    'posts_per_page'=> 4
                ));

                foreach($posts_zero as $post){
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
                        <a href="<?php echo get_permalink($post_id); ?>">
                            <img class="thumb" src="<?php echo $thumb;?>">
                            <h3 class="title"><?php echo $post->post_title; ?></h3>
                        </a>
                    </li>

                <?php
                }
                ?>
            </ul>
            <a href="<?php echo get_category_link($services_categories[1]->cat_ID); ?>" class="detail">More</a>
        </div>
        <div class="categorySection hidden" id="category2">
            <h3 class="title"><?php echo $services_categories[2]->name; ?></h3>
            <ul class="cPostList">
                <?php
                $posts_zero=get_posts(array(
                    "category"=>$services_categories[2]->cat_ID,
                    'posts_per_page'=> 4
                ));

                foreach($posts_zero as $post){
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
                        <a href="<?php echo get_permalink($post_id); ?>">
                            <img class="thumb" src="<?php echo $thumb;?>">
                            <h3 class="title"><?php echo $post->post_title; ?></h3>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <a href="<?php echo get_category_link($services_categories[2]->cat_ID); ?>" class="detail">More</a>
        </div>

        <span class="goToTop hidden" id="goToTop">Top</span>


        <div class="welcomeContainer" id="welcomeContainer">
            <div class="logoContainer">
                <h1 class="logoImg"><?php echo get_bloginfo("name"); ?></h1>
                <ul class="sites" id="sites">
                    <li><a href="<?php echo get_blog_details(2)->siteurl;?>">中文</a></li>
                    <li><a href="<?php echo get_blog_details(1)->siteurl;?>">EN</a></li>
                </ul>
                <span class="arrowTop">三角形</span>
            </div>
            <div class="bottomContainer">
                <ul class="cooperation">
                    <li>
                        <p>乔治亚罗设计中国总代理</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/frontend/welcome/giugiaro.png">
                    </li>
                    <li>
                        <p>湖南省工业设计创新平台</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/frontend/welcome/hnid.png">
                    </li>
                    <li>
                        <p>湖南大学设计产学研基地</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/frontend/welcome/hnudesign.png">
                    </li>
                </ul>
            </div>
        </div>
<?php get_footer(); ?>