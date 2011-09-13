<?php
$args = array(
	'numberposts' => 5,
	'offset'          => 0,
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'post_type'       => 'post',
	'post_status'     => 'publish' );
	$posts = get_posts($args);
	$posts = json_encode($posts);
?>
<script type="text/javascript">
(function() {
	var self = window.LinkLove = {
		init: function() {
			var html = '<div id="ll_feed_wrapper">';
			var content;
			var posts = <?php echo $posts; ?>;
			for( var i = 0; i < posts.length; i++ ) {
				var p = posts[i];
				console.log('post info ',p);
		        html += '<span style="color:#333;font-size:1.5em;display:block;" class="ll_post_title"><a href="' +p.guid+ '">' +p.post_title+ '</a></span>';
				content = p.post_content.substr(0, 100);
				html += '<span class="ll_post_desc">' +content+ '</span>';
			}
				html += '</div>';
				document.write(html);
		}
	}
})();			
</script>
<script>
LinkLove.init();
</script>