<?php get_header(); ?>

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

<div id="bodytext">
<div class="wrap">
<?php the_content(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/p_empty.js"></script>
</div>

<div id="bookinfo">
<p class="renew">更新日：<?php the_modified_time('Y.m.d'); ?></p>
<table class="書籍情報">
  <tr>
    <th scope="row"><p>タイトル</p></th>
    <td><?php echo post_custom('wpcf-ttl'); ?></td>
  </tr>
  <tr>
    <th scope="row"><p>著者</p></th>
    <td><?php echo post_custom('wpcf-author'); ?></td>
  </tr>
  <?php if(post_custom('wpcf-original_author')):?>
  <tr>
    <th scope="row"><p>原作</p></th>
    <td><?php echo post_custom('wpcf-original_author'); ?></td>
  </tr>
  <?php endif;?>
  <tr>
    <th scope="row"><p>出版社</p></th>
    <td><?php echo post_custom('wpcf-publisher'); ?></td>
  </tr>
  <tr>
    <th scope="row"><p>掲載雑誌</p></th>
    <td><?php echo post_custom('wpcf-magazine'); ?></td>
  </tr>
  <tr>
    <th scope="row"><p>キーワード</p></th>
    <td><?php echo post_custom('wpcf-keyword'); ?></td>
  </tr>
</table>
</div>
<div id="sns"><?php echo do_shortcode('[ssba]'); ?></div>

</div><!--bodytext-->
</div>
<?php endwhile; // 繰り返し処理終了
else : // ここから記事が見つからなかった場合の処理 ?>
<div class="post">
<h2>記事はありません</h2>
<p>お探しの記事は見つかりませんでした。</p>
</div>

<?php endif; // WordPress ループ終了 ?>


</section>

<div id="book-other">
<h2>次はこの本どうですか？</h2>
<ul>
  <?php $args = array(
    'numberposts' => 5, //表示する記事の数
    'post_type' => 'book', //投稿タイプ名
    'post__not_in' => array($post->ID)
  );
  $customPosts = get_posts($args);
  if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
  ?>
  <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></li>
  <?php endforeach; ?>
  <?php else : //記事が無い場合 ?>
  <p>Sorry, no posts matched your criteria.</p>
  <?php endif;
  wp_reset_postdata(); //クエリのリセット ?>
</ul>
</div>


</div>
<!--/wrapper-->

<?php get_sidebar(); ?>


</div>
<!--/content-->

<?php get_footer(); ?>
