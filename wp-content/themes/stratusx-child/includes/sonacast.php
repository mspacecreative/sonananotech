<style>
	.sonacast-container {
		margin: auto;
		display: flex;
		flex: 1;
		flex-wrap: wrap;
		flex-direction: row;
	}
	.sonacast-episode {
		flex-basis: 32%;
		margin-bottom: 2%;
		margin-right: 2%;
		position: relative;
		box-shadow: 0 0 15px #c9c9c9;
	}
	.sonacast-episode:nth-child(3n) {
		margin-right: 0;
	}
	.sonacast-episode iframe {
		width: 100%;
		display: block;
	}
	.sonacast-episode span {
		font-weight: bold;
		position: absolute;
		top: 0;
		left: 0;
		font-size: 15px;
		padding: 10px 15px;
		border-radius: 0 0 15px 0;
		background-color: #000;
		color: #fff;
	}
	audio {
		width: 100%;
	}
	audio:focus {
		outline: none;
	}
	.sonacast-episode h3 {
		line-height: 1.25em;
		font-size: 20px;
		margin-bottom: 10px;
	}
	.sonacast-episode .inner {
		padding: 45px 25px 25px;
	}
	.synopsis-button {
		display: inline-block;
		margin: 0 0 15px;
		border: none;
		font-size: 14px;
		outline: none;
		font-weight: bold;
		padding: 0;
	}
	.sonacast-episode p, .sonacast-episode li {
		font-size: 14px;
	}
	.sonacast-episode ul {
		padding: 0 0 0 16px;
	}
	.synopsis-content {
		display: none;
		margin-top: 10px;
	}
	@media (max-width: 980px) {
		.sonacast-episode {
			flex-basis: 49%;
			margin-right: 2%;
		}
		.sonacast-episode:nth-child(3n) {
			margin-right: 2%;
		}
		.sonacast-episode:nth-child(2n) {
			margin-right: 0;
		}
	}
	@media (max-width: 450px) {
		.sonacast-episode {
			flex-basis: 100%;
		}
		.sonacast-episode, .sonacast-episode:nth-child(3n) {
			margin-right: 0;
		}
		.sonacast-episode {
			margin-bottom: 5%;
		}
	}
</style>

<div id="sonacast-container" class="sonacast-container">
<?php $outs = array(); if( have_rows('episodes') ): ?>

	<?php while ( have_rows('episodes') ) : the_row(); ob_start(); ?>

    <div class="sonacast-episode">
		<div class="inner">
			<span style="font-weight: bold;"><?php esc_html_e('EP'); ?><?php echo get_row_index(); ?></span>
			<h3><?php the_sub_field('title'); ?></h3>
				
			<?php if ( get_sub_field('synopsis') ): ?>
			<div class="synopsis-content">
				<?php the_sub_field('synopsis'); ?>
			</div>
				
			<button class="synopsis-button">
				<?php esc_html_e('Read Synopsis…'); ?>
			</button>
			<?php endif; ?>
				
			<audio class="audio-file" controls>
				<source src="<?php the_sub_field('episode') ?>">
			</audio>
		</div>
	</div>
	
	<?php $outs[] = ob_get_clean(); endwhile; ?>

<?php endif;
$outs = array_reverse($outs);
echo implode($outs); ?>
</div>
	
<script>
	(function ($) {
		$('.synopsis-button').click(function () {
			$(this).prev().slideToggle();
			$(this).toggleClass('open');
			
			if ( $(this).hasClass('open') ) {
				$(this).html('Hide Synopsis');
			} else {
				$(this).html('Read Synopsis…');
			}
		});
	})(jQuery);
</script>