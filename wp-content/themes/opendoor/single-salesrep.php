<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
	//Check first that child theme is used or Parent theme and then that file exist or not in child theme if exist this file in child theme then include that otherwise used parent theme file
	if ( get_stylesheet_directory() != get_template_directory() && 
	file_exists(get_stylesheet_directory().'/includes/variables.php') ) 
	{			
		include get_stylesheet_directory() . '/includes/variables.php';
																
	}
	else {
																			
		include get_template_directory() . '/includes/variables.php';
																
	}	
?>


	<div class="sixteen columns outercontainer bigheading">
	<div class="four columns alpha">
	&nbsp;
	</div>
	<div class="twelve columns omega">
    	<h2 id="title"><?php the_title(); ?></h2>
	</div>
	</div>	


<div class="sixteen columns outercontainer" id="content">
	<div class="four columns alpha" id="leftsidebar">
		<?php get_sidebar() ?>
	</div>
	
	<div class="twelve columns omega">	

		<div class="eight columns alpha">
				<?php $arr_sliderimages = get_gallery_images();
				if ($arr_sliderimages) { ?>
					<?php $resized = aq_resize($arr_sliderimages[0], 150, 190, true); ?>
					<img class="alignleft" width="150" height="190" alt="" src="<?php echo $resized ?>" />
				<?php } ?>
		
			<?php the_content(); ?>
		</div>
	
	
	
		<div class="four columns omega">
			<div class="detailpagecontactblock">

				
				<p>
					<?php if ($salesreptitle) { ?>
						<strong><?php echo $salesreptitle ?></strong><br />
					<?php } ?>
					
					<?php if ($salesrepemail) { ?>
						<a href="mailto:<?php echo $salesrepemail ?>"><?php echo get_option('wp_email_text') ?></a><br />
					<?php } ?>
					
					<?php if($salesrepphoneoffice) { ?>
							<?php echo get_option('wp_salesrepphone1') . ": " ?><a href="tel:+<?php echo $salesrepphoneoffice ?>"><?php echo $salesrepphoneoffice ?></a><br />
					<?php } ?>
					
					<?php if($salesrepphonemobile) { ?>
							<?php echo get_option('wp_salesrepphone2') . ": " ?><a href="tel:+<?php echo $salesrepphoneoffice ?>"><?php echo $salesrepphoneoffice ?></a><br />
					<?php } ?>
					
					<?php if($salesrepfax) { ?>
						<?php echo get_option('wp_salesrepfax') . ": " . $salesrepfax ?><br />
					<?php } ?>
				</p>
			</div>
		</div>


		

	</div>
	<?php endwhile; endif; ?>
		
</div>

<?php get_footer(); ?>