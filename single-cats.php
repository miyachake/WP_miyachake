<?php get_header(); ?>
<div class="keyvisual-cats"><span>ロビンとミシェル</span></div>

<div id="content">
<ul id="path"><?php
if(function_exists('bcn_display')){
bcn_display_list();
}
?></ul>
<div id="wrapper">
<section id="main">


<?php if (have_posts()) : // WordPress ループ
while (have_posts()) : the_post(); // 繰り返し処理開始 ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h1 id="ttl"><?php echo get_the_title(); ?></h1>
<div id="postinfo">
<p class="postdate"><span><?php the_category(', ') ?></span><?php echo get_the_date(); ?></p>
<p class="tags"><?php
    $tag = get_the_tags();
    if($tag && !is_wp_error($tag)){
    foreach($tag as $item) $echo[] = '<a href="'.get_tag_link($item->term_id).'">'.$item->name.'</a>';
    echo join($echo);
    }
?></p>
</div>

<div id="bodytext">
<?php the_content(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/p_empty.js"></script>
<div id="sns"><?php echo do_shortcode('[ssba]'); ?></div>
</div>
</div>
<?php endwhile; // 繰り返し処理終了
else : // ここから記事が見つからなかった場合の処理 ?>
<div class="post">
<h2>記事はありません</h2>
<p>お探しの記事は見つかりませんでした。</p>
</div>
<?php endif; // WordPress ループ終了 ?>

</section>
<?php related_posts(); ?>

</div>
<!--/wrapper-->

<?php get_sidebar(); ?>


</div>
<!--/content-->

<?php get_footer(); ?>
