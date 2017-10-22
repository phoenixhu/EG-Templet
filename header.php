<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?php
            if (is_home()) {
                bloginfo('name'); echo " - "; bloginfo('description');
            } elseif (is_category()) {
                single_cat_title(); echo " - "; bloginfo('name');
            } elseif (is_single() || is_page()) {
                single_post_title();
            } elseif (is_search()) {
                echo "搜索结果"; echo " - "; bloginfo('name');
            } elseif (is_404()) {
                echo '页面未找到!';
            } else {
                wp_title('', true);
            }
        ?>
    </title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper" class="container_12 clearfix">
    <!-- Text Logo -->
    <h1 id="logo" class="grid_4"><a href="<?php echo get_bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h1>
    <!-- Navigation Menu -->
    <ul id="navigation" class="grid_8">
        <li><?php wp_nav_menu( array('sort_colum' => 'menu_order', 'container_id' => 'menu', 'menu_id' => 'navigation')); ?></li>
    </ul>
    <div class="hr grid_12 clearfix">&nbsp;</div>
    <!-- Caption Line -->
    <h2 class="grid_12 caption clearfix"><?php bloginfo('description'); ?></h2>
    <div class="hr grid_12 clearfix">&nbsp;</div>