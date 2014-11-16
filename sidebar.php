<aside>
<div class="fix-box">

<div class="author">
<dl>
<dt><img src="<?php echo get_template_directory_uri(); ?>/images/img_auther.png" width="104" height="134" /></dt>
<dd><h3>みやちゃけ</h3>
	<p>大阪在住のWebデザイナー。コーダー寄りだけどイラストも描きます。WordPressもちまちま。<br />
猫と漫画が大好きです。楽して生きたい派。</p>
<ul>
	<li><a href="http://twitter.com/driclogy" target="_blank"><span>twitter</span></a></li>
	<li><a href="http://pixiv.me/driclo" target="_blank"><span>pixiv</span></a></li>
</ul>
</dd>
</dl>
</div>

<p class="bn-aside bn-cloakroom"><a href="<?php bloginfo('url'); ?>/cloakroom/"><span>書評まだかけてないけどおすすめしたいマンガリスト</span></a></p>
<div id="latest-article" class="menu-smb">
<h2>新着記事</h2>
<ul class="blog">
<?php query_posts('showposts=5');
if (have_posts()) : while (have_posts()) : the_post(); ?>
<li>
<dl><dt><a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail(array(60,60)); ?></a></dt>
<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
</dl></li>
<?php endwhile; endif; wp_reset_query(); ?>
</ul>
</div>

<div class="adbox">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ad-aside300 -->
<ins class="adsbygoogle"
     style="display:block;width:300px;height:250px;"
     data-ad-client="ca-pub-2692395898085430"
     data-ad-slot="5914636907"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>


<div class="menu-txt">
<h2>カテゴリー</h2>
<ul class="side_category">
    <?php wp_list_categories('orderby=count&order=desc&show_count=1&title_li='); ?>
   </ul>
</div>

<div class="menu-smb">
<h2><a href="<?php bloginfo('url'); ?>/book/">新着BOOK紹介</a></h2>
<ul>
<?php
$args = array(
'post_type' => 'book',
'taxonomy' => 'cate-book',
'posts_per_page' => 10,
'numberposts' => '-1',
);
$my_posts = get_posts($args);
foreach ( $my_posts as $post ) {
setup_postdata($post); ?>
<li>
<dl><dt><a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail(array(60,60)); ?></a></dt>
<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
</dl></li>
<?php
}
?>
</ul>
</div>

<div class="menu-txt">
<h2>blogroll</h2>
<ul>
<?php wp_list_bookmarks('title_li=&show_name=1&categorize=0&orderby=rand'); ?>
</ul>
</div>

</div>
</aside>
