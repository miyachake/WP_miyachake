<?php
/* the_excerpt() [...]を消す */
function my_excerpt_more($more) {
  return ' ...';
}
add_filter('excerpt_more', 'my_excerpt_more');
function my_trim_excerpt($text, $raw_excerpt){
  global $post;
  $e = explode(' ...', $text);
  if($raw_excerpt || false !== strpos($post->post_content, '<!--more') || '' === $e[1])
    $text .= '<a class="excerpt-more" href="' . get_permalink() . '">続きを読む</a>';
  return $text;
}
add_filter('wp_trim_excerpt', 'my_trim_excerpt', 10, 2);
/* the_excerpt() の文字数調整 */
function change_excerpt_mblength($length) {
return 80;
}
add_filter('excerpt_mblength', 'change_excerpt_mblength');


/* wordpressのバージョンを消す */
remove_action('wp_head','wp_generator');

//中サイズ画像をトリミングする
update_option( 'medium_crop',true );
//大サイズ画像をトリミングする
update_option( 'large_crop',true );
/* アイキャッチ画像 */
add_theme_support( 'post-thumbnails' );


/* サイドバーウィジット */
register_sidebar( array(
'name' => 'サイドバーウィジット-1',
'id' => 'sidebar-1',
'description' => 'サイドバーのウィジットエリアです。',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
) );

// 複数のカスタム投稿をトップページの一覧に表示用
/*function chample_latest_posts( $wp_query ) {
    if ( is_home() && ! isset( $wp_query->query_vars['suppress_filters'] ) ) {
        $wp_query->query_vars['post_type'] = array( 'post','book','cats','web');
    }
}
add_action( 'parse_query', 'chample_latest_posts' );*/


//BOOKページのアーカイブ　画像表示
function getPostImage($mypost){
	if(empty($mypost)){ return(null); }
	if(ereg('<img([ ]+)([^>]*)src\=["|\']([^"|^\']+)["|\']([^>]*)>',$mypost->post_content,$img_array)){
	// imgタグで直接画像にアクセスしているものがある
		$dummy=ereg('<img([ ]+)([^>]*)alt\=["|\']([^"|^\']+)["|\']([^>]*)>',$mypost->post_content,$alt_array);
		$resultArray["url"] = $img_array[3];
		$resultArray["alt"] = $alt_array[3];
	}else{
	// 直接imgタグにてアクセスされていない場合は紐づけられた画像を取得
		$files = get_children(array('post_parent' => $mypost->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image'));
		if(is_array($files) && count($files) != 0){
			$files=array_reverse($files);
			$file=array_shift($files);
			$resultArray["url"] = wp_get_attachment_url($file->ID);
			$resultArray["alt"] = $file->post_title;
		}else{
			return(null);
		}
	}
	return($resultArray);
}


//プラグイン[WP-AddQuicktag]をカスタム投稿でも表示させる
add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );
function my_addquicktag_post_types( $post_types ) {
    $post_types[] = 'book';
    return $post_types;
}

//カスタムメニューのカスタム投稿の下層ページにもカレントいれる
function make_menu_current( $classes, $item ) {
    if ( $item->title == 'book' && ( 'book' == get_post_type() ) ) {
        $classes[] = 'current-menu-item';
    }
    $classes = array_unique( $classes );
    return $classes;
}
add_filter( 'nav_menu_css_class', 'make_menu_current', 10, 2 );


//キャプションを上書き
function my_img_caption_shortcode($output, $attr, $content){
  extract(shortcode_atts(array(
    'id'    => '',
    'align'    => 'alignnone',
    'width'    => '',
    'caption' => ''
  ), $attr));
 
  if ( 1 > (int) $width || empty($caption) )
    return $content;
 
  if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
 
  return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '">' 
  . do_shortcode( $content ) 
  . '<figcaption class="wp-caption-text">' . $caption . '</figcaption>'. '</figure>';
}
add_filter('img_caption_shortcode', 'my_img_caption_shortcode', 10, 3);


?>
