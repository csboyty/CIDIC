<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <title><?php wp_title("|",true,"right"); ?></title>
    <meta name="keywords" content="中意设计（湖南）创新中心 、cidic、CIDIC、中意工业设计湖南有限公司、中意、中意设计、工业设计、中意设计创新平台、
    中意湖南、设计创新、创意文化、信息创新、文化创新"/>
    <meta name="description" content="中心（公司）拥有丰富的国际合作经验以及雄厚的数字产品、智能产品、文化产品的设计、开发、制作能力。
    在国际合作方面构建以中意设计创新中心为核心的国际设计资源协作平台；
    从事数字产品、智能产品开发，拥有一支优秀的工业产品设计以及软硬件开发队伍。
    电话：0731-88988607 地址：湖南长沙岳麓大道233号湖南科技大厦一楼">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png"
          mce_href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png" type="image/x-png">
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/main.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery.ellipsis.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/baiduAnalytics.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/index.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1 class="logo">
            <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo("name"); ?></a>
        </h1>
        <?php wp_nav_menu(); ?>
     </div>