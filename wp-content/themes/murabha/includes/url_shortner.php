<?php
//URL Shortner by google...
function googl_shortlink( $url, $post_id = false ) {
global $post;
if ( ! $post_id && $post ) $post_id = $post->ID;
elseif ( $post_id ) $post = get_post( $post_id );

if ( $post && $post->post_status != 'publish' )
return "";

$shortlink = $url;

if ( ( is_singular() || $post ) && ! is_front_page() ) {
$shortlink = get_post_meta( $post_id, '_googl_shortlink', true );
if ( $shortlink )
return $shortlink;

$permalink = get_permalink( $post_id );
$shortlink = googl_shorten( $permalink );

if ( $shortlink !== $url ) {
add_post_meta( $post_id, '_googl_shortlink', $shortlink, true );
return $shortlink;
}
else {
return $url;
}
} elseif ( is_front_page() ) {
$shortlink = (string) get_option( '_googl_shortlink_home' );
if ( $shortlink )
return $shortlink;

$googl_shortlink = googl_shorten( home_url( '/' ) );
if ( $googl_shortlink !== $shortlink ) {
update_option( '_googl_shortlink_home', $googl_shortlink );
return $googl_shortlink;
} else {
return home_url( '/' );
}
}
}
add_filter( 'get_shortlink', 'googl_shortlink', 9, 2 );

function googl_shorten( $url ) {
$result = wp_remote_post( add_query_arg( 'key', apply_filters( 'googl_api_key', 'AIzaSyB666LsnGszAwnjQYBS_w_XTPdltROOs28' ), 'https://www.googleapis.com/urlshortener/v1/url' ), array(
'body' => json_encode( array( 'longUrl' => esc_url_raw( $url ) ) ),
'headers' => array( 'Content-Type' => 'application/json' ),
) );

// Return the URL if the request got an error.
if ( is_wp_error( $result ) )
return $url;

$result = json_decode( $result['body'] );
$shortlink = $result->id;
if ( $shortlink )
return $shortlink;

return $url;
}

function googl_post_columns( $columns ) {
$columns['shortlink'] = 'الرابط المختصر';
return $columns;
}
add_filter( 'manage_posts_columns', 'googl_post_columns',16,1 );
add_filter( 'manage_pages_columns', 'googl_post_columns' );
//add_filter('manage_posts_columns', 'posts_column_views');
//add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

function googl_custom_columns( $column ) {
global $shorturl;
if ( 'shortlink' == $column ) {
$shorturl = wp_get_shortlink();
$shorturl_caption = str_replace( 'http://', '', $shorturl );
$shorturl_info = str_replace( 'goo.gl/', 'goo.gl/info/', $shorturl );
printf( '<a target="_blank" href="%s">%s</a> (<a target="_blank" href="%s">معلومات</a>)', esc_url( $shorturl ), esc_html( $shorturl_caption ), esc_url( $shorturl_info ) );
}
}

add_action( 'manage_posts_custom_column', 'googl_custom_columns',16,1 );
add_action( 'manage_pages_custom_column', 'googl_custom_columns',16,1 );
function googl_save_post( $post_ID, $post ) {
// Don't act on auto drafts and revisions.
if ( 'auto-draft' == $post->post_status || 'revision' == $post->post_type )
return;

delete_post_meta( $post_ID, '_googl_shortlink' );
}
add_action( 'save_post', 'googl_save_post', 10, 2 );
