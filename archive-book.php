<?php get_header(); ?>

<div id="content">

<ul id="path"><?php
if(function_exists('bcn_display')){
bcn_display_list();
}
?></ul>

<div id="wrapper">
<section id="archive-book">
<p class="btn-cloakroom"><a href="<?php bloginfo('url'); ?>/cloakroom/">書評まだ書けてないけど おすすめしたいマンガリスト</a></p>
<?php

				if (have_posts()) :
					while (have_posts()) : the_post();
					?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    
    <dl class="linkblock">
        <dt><a href="<?php the_permalink(); ?>">
<? $postImage = getPostImage($post);
if($postImage == null){
	// 画像が無い場合の処理：No Image画像をセットするなどを記述
	echo '<img src="' . get_bloginfo('template_directory') . '/images/default2.png' . '" width="102" height="160" alt="thumbnail" />';
}else{
	// 画像がある場合の処理
	// 例では、imgタグのセット方法をご紹介しておきます
	echo '<img alt="' . $postImage["alt"] . '" src="' . $postImage["url"] . '" width="102" />';
} ?>
</a></dt>
        <dd>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        </dd>
    </dl>
</article>


<?php
endwhile;
else :
?>
						<div class="post">
							<h2>記事はありません</h2>
							<p>お探しの記事は見つかりませんでした。</p>
						</div>
				<?php
				endif;
				?>

<!--pager-->
<div class="pager">
	<?php global $wp_rewrite;
	$paginate_base = get_pagenum_link(1);
	if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
		$paginate_format = '';
		$paginate_base = add_query_arg('paged','%#%');
	}
	else{
		$paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
		user_trailingslashit('page/%#%/','paged');;
		$paginate_base .= '%_%';
	}
	echo paginate_links(array(
		'base' => $paginate_base,
		'format' => $paginate_format,
		'total' => $wp_query->max_num_pages,
		'mid_size' => 4,
		'current' => ($paged ? $paged : 1),
		'prev_text' => '«',
		'next_text' => '»',
	)); ?>
</div>
<!--/pager-->
</section>
</div>
<!--/wrapper-->

<?php get_sidebar(); ?>

</div>
<!--/content-->



<?php get_footer(); ?>
