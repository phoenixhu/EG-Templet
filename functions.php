<?php
//注册菜单
if( function_exists('register_nav_menus') ){
    register_nav_menus(
        array(
            'primary' => __( '主导航菜单' ),
        )
    );
}
//注册侧边栏
if ( function_exists('register_sidebar') ) {

    register_sidebar(array(

        'name'=>'首页侧边栏',

        'before_widget' => '<li id="%1$s" class="sidebar_li %2$s">',

        'after_widget' => '</li>',

        'before_title' => '<h3>',

        'after_title' => '</h3>',

    ));

}

// 注册留言
function aurelius_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <li class="comment" id="li-comment-<?php comment_ID(); ?>">
        <div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) {echo get_avatar($comment, 48); } ?>
            <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> </div>
        <div class="comment_content" id="comment-<?php comment_ID(); ?>">
            <div class="clearfix">
                <?php printf(('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
                <div class="comment-meta commentmetadata"> 发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>
                &nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>
            </div>
            <div class="comment_text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em> 你的评论正在审核，稍后会显示出来！</em><br />
                <?php endif; ?>
                <?php comment_text(); ?>
            </div>
        </div>
    </li>
<?php } ?>