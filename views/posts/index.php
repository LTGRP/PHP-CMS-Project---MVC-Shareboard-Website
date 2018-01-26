<div>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>posts/add">
	New Post</a>
	<?php foreach($viewmodel as $item) : ?>
		<div id="share" class="well bg-light border rounded">
			<h3><?php echo $item['title']; ?></h3>
			<small><?php echo $item['create_date']; ?></small>
			<hr />
			<p><?php echo $item['body']; ?></p>
			<br />
			<a class="btn bg-light border rounded text-success" 
			href="<?php echo $item['link']; ?>" target="_blank">Read the article</a>
		</div>
	<?php endforeach; ?>
</div>