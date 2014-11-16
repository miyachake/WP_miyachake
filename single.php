<?php
$post = $wp_query->post;
if ( in_category('cats') ) {
include(TEMPLATEPATH.'/single-cats.php');
} else {
include(TEMPLATEPATH.'/single-other.php');
}
?>
