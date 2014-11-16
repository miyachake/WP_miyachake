<?php
/*
 Template Name: おすすめしたいマンガリスト
*/
	
get_header(); ?>

<div id="content">

<ul id="path">
<li class="home"><a href="<?php echo home_url(); ?>" class="site-home">miYachake note</a>&gt;</li>
<li><a href="<?php echo home_url('/'); ?>book/">本</a>&gt;</li>
<li>おすすめしたいマンガリスト</li>
</ul>

<div id="wrapper">
<section id="main">
<div id="txt-cloakroom">

<div class="wrap">

<h2 class="ttl-cloakroom"><span>書評まだ書けてないけど おすすめしたいマンガリスト</span></h2>

<div id="sns"><?php echo do_shortcode('[ssba]'); ?></div>

<p class="renew-cloakroom">更新日：<?php the_modified_time('Y.m.d'); ?></p>
<?php while(have_posts()): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>


</div>
<h2 id="commentform">あなたのおすすめマンガを教えてください！</h2>
<?php comments_template(); ?>

</div>
<!--/txt-cloakroom-->

</section>
</div>
<!--/wrapper-->
<?php get_sidebar(); ?>


</div>
<!--/content-->

<?php get_footer(); ?>
