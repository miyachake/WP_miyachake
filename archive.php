<?php get_header(); ?>

<div id="content" class="catelist">

<ul id="path"><?php
if(function_exists('bcn_display')){
bcn_display_list();
}
?></ul>

<div id="wrapper">
<section>

<?php

				if (have_posts()) :
					while (have_posts()) : the_post();
					?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    
    <dl class="linkblock">
        <dt><a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('medium'); ?>
        </a></dt>
        <dd>
        <p class="postdate"><span><?php the_category(', ') ?></span><?php echo get_the_date(); ?></p>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
        </dd>
    </dl>
</article>


<?php
endwhile;
else :
?>
						<div class="post">
							<h2>まだ記事はないようです。めんごめんご</h2>
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
