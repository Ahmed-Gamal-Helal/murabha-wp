<?php
add_post_type_support('page', 'excerpt');
//-----------------------------------------------------
function get_excerpt($count){ 
  $permalink = get_permalink($post->ID); 
  $excerpt = get_the_content(); 
  $excerpt = strip_tags($excerpt); 
  $excerpt = substr($excerpt, 0, $count); 
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'...';

  return $excerpt; 
} 