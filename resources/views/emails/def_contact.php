<html>
	<body>
		<h1>Contact form submited</h1>
		<table style="width:100%">
			<tr>
				<td style="width:180px">Organization Name:</td><td style="width:auto"><?php echo strip_tags($organization); ?></td>
			</tr>
			<tr>
				<td>Name:</td><td><?php echo $from_name; ?></td>
			</tr>
			<tr>
				<td>Email:</td><td><?php echo strip_tags($email); ?></td>
			</tr>
			<tr>
				<td>Website:</td><td><?php echo strip_tags($website); ?></td>
			</tr>
			<tr>
				<td>Project Length:</td><td><?php echo $projectLength; ?></td>
			</tr>
			<tr>
				<td>Estimated Budget:</td><td><?php echo $projectBudget; ?></td>
			</tr>
			<tr>
				<td>Interested Services:</td>
				<td>
			    <?php foreach ($servicesGroup as $service): ?> 
		          <?php echo $service; ?>,
			    <?php endforeach;?>
			    </td>
			</tr>
		</table>
		<hr/>
		<h2>Project Details</h2>
		<?php echo strip_tags(nl2br($description),'<p><br>'); ?>
	</body>
</html>