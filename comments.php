<!-- Comment's List -->
<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('该页面不能直接被打开!');
?>
<h3>Comments</h3>
<div class="hr dotted clearfix">&nbsp;</div>
<ol class="commentlist">
    <?php
        if (!empty($post->post_password) && $COOKIE['wp-postpass' . COOKIEHASH] != $post->post_password) { ?>
            <li class="decmt-box">
                <p><a href="#addcomment"> 请输入密码再查看评论内容.</a></p>
            </li>
            <?php
        } else if (!comments_open() ) {
            ?>
            <li class="decmt-box">
                <p><a href="#addcomment"> 评论功能已经关闭!</a></p>
            </li>
            <?php
        } else if (!have_comments() ) {
            ?>
            <li class="decmt-box">
                <p><a href="#addcomment"> 还没有任何评论，你来说两句吧 </a></p>
            </li>
            <?php
        } else {
            wp_list_comments('type=comment&callback=aurelius_comment');
        }
    ?>
</ol>
<div class="hr clearfix">&nbsp;</div>
<!-- Comment Form -->
<?php if (comments_open() ) : ?>
    <?php if (get_option('comment_registration') && !$user_ID ) : ?>
        <p><?php printf(('你需要先 <a href="%s"> 登录 </a> 才能发表评论.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
    <?php else : ?>
        <?php $defaults = array(
            'comment_notes_before' => '',
            'label_submit'         => __('提交评论'),
            'comment_notes_after' =>''
        );
        comment_form($defaults);
    endif;
else :  ?>
    <p><?php _e('对不起评论已经关闭.'); ?></p>
<?php endif; ?>