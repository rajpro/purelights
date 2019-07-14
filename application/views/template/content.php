<?php if (!isset($pagetype['wrapped_content'])):?>

<div class="main-panel">
	<div class="content-wrapper">
		<?php echo $this->parser->parse($page, $data, TRUE); ?>
	</div>

<?php else: ?>

	<?php echo $this->parser->parse($page, $data, TRUE); ?>

<?php endif; ?>