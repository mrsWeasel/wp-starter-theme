<?php

			$pattern = get_shortcode_regex();
			preg_match('/'.$pattern.'/s', $post->post_content, $matches);
			if (is_array($matches) && $matches[2] == 'soundcloud') {
				$shortcode = $matches[0];
				echo do_shortcode($shortcode);
			}