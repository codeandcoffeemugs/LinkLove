<?php
  $args = array(
    'numberposts'     => 5,
    'offset'          => 0,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'post_type'       => 'post',
    'post_status'     => 'publish' 
  );
  $posts = array();
  foreach(get_posts($args) as $post) {
  	setup_postdata($post);
  	$p = array();
  	$p['title'] = apply_filters('the_title', $post->post_title);
  	$p['excerpt'] = get_the_excerpt();
  	$p['link'] = get_permalink($post);
  	$posts[] = $p;
	}
?>
(function() {
  var self = window.LinkLove = {
    init: function() {
      var html = '<div id="ll_feed_wrapper">';
      var posts = <?php echo json_encode($posts); ?>;
      for( var i = 0; i < posts.length; i++ ) {
        var p = posts[i];
        console.log('post info ',p);
        html += '<span style="color:#333;font-size:1.5em;display:block;" class="ll_post_title"><a href="' +p.link+ '">' +p.title+ '</a></span>';
        html += '<span class="ll_post_desc">' +p.excerpt+ '</span>';
      }
      html += '</div>';
      document.write(html);
    }
  }
})();