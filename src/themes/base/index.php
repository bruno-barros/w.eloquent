<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Default</title>
<?php wp_head()?>
</head>
<body <?php body_class()?>>


<?php if(have_posts()):?>

	<?php while(have_posts()): the_post();?>

		<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
		<?php the_content()?>

	<?php endwhile;?>

<?php endif;?>

<?php wp_footer()?>
</body>
</html>