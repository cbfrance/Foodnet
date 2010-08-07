<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt"';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>

	<h3 id="user-notes-title"><?php comments_number('No User Notes', 'One User Notes', '% User Notes' );?></h3>

	<dl class="commentlist">
	
	<?php $note_num = 1; //Gives each comment a number. ?>
	<?php foreach ($comments as $comment) : ?>
	
		<?php
			$grav_size = 40;
			$grav_email = md5($comment->comment_author_email);
			$grav_url = 'http://www.gravatar.com/avatar.php?gravatar_id='.$grav_email. '&default=' .urlencode($grav_default). '&size='.$grav_size;
		?>
		
		<dt id="comment-<?php comment_ID(); ?>">
			<img src="<?php echo $grav_url; ?>" alt="Author gravatar" />
				<span id="author-meta">
				<cite><?php comment_author_link(); ?></cite><br/>
				<span class="comment-meta"><?php echo $note_num; ?>. <a href="#comment-<?php comment_ID(); ?>" title=""><?php comment_date('M d, Y'); ?> at <?php comment_time(); ?></a> <?php edit_comment_link('Edit','&bull;&nbsp;',''); ?></span>
				</span>
		</dt>
		<dd>
			<?php comment_text(); ?>
		</dd>

	<?php
		/* Changes every other comment to a different class - TAKEN OUT FOR NOW */
		//$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
		$note_num++;
	?>

	<?php endforeach; /* end for each comment */ ?>

	</dl>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">User notes are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>


<h3 id="leave-user-note">Leave a Note</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p class="login-note">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>

<?php else : ?>

<p>
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
</p>

<p>
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
</p>

<p>
<label for="url"><small>Website</small></label><br/>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="26" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Add Note" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
