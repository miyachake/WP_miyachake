<!DOCTYPE HTML>
<html lang="ja"><head>
<meta charset="UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="author" content="みやちゃけ" />
<meta name="copyright" content="みやちゃけノート" />
<meta name="robots" content="index,follow" />
<meta property="og:image" content="" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php if (wp_is_mobile()) :?>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/phone.css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/viewport.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/spn_common.js"></script>
<?php else: ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>"/>
<script type="text/javascript" src="http://ie6alert-js.googlecode.com/hg/ie6alert.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/trackingbox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/linkblock.js"></script>
<script type="text/javascript">
 ie6Alert();
</script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/ga.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php wp_head(); ?>
</head>

<body>
<header class="<?php echo attribute_escape( $post->post_name ); ?>" id="header">
  <div class="inner">
    <nav>
      <p id="logo"><a href="<?php echo home_url('/'); ?>"><span>みやちゃけノート</span></a></p>
      <div class="serchform"><?php get_search_form(); ?></div>
						<div class="spn-btn-toggle"><span>メニュー</span></div>
      <?php
$custom = array(
    'container'       => 'div', 
    'container_class' => '',
    'container_id'    => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'menu_class'      => 'menu',
    'menu_id'         => '',
);
wp_nav_menu($custom); 
?>
      
    </nav>
  </div>
</header>
