<?php include 'view/header.php' ?>
	<form action='index.php' method="post">
		<input type="hidden" name="action" value="list_items">
		<label>Category:</label>
		<select name="category_id">
			<option value="0">View All Categories</option>
			<?php if(!empty($categories)) : ?>
				<?php foreach ($categories as $category) : ?>
					<option value=<?= htmlspecialchars($category['categoryID'])?> <?php if(isset($_POST['category']) && $_POST['category'] == $category['categoryID'])
		  			echo 'selected'; ?>><?= htmlspecialchars($category['categoryName'])?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
		<input type="submit" value="Submit">
	</form>
	
	<div class="table_responsive">
		<?php if (!empty($items)) : ?>
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
				</tr>
				<?php foreach ($items as $item) : ?>
				<tr>
					<td><?php echo $item['Title']; ?></td>
					<td><?php echo $item['Description']; ?></td>
					<td><?= htmlspecialchars(get_category_name($item['categoryID']))?></td>
					<td>
						<form action="." method="post">
							<input type="hidden" name="action" value="delete_item">
							<input type="hidden" name="item_id" value="<?= $item['ItemNum'] ?>">
							<input type="submit" value="Remove">
						</form>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		<?php else : ?>
			<p>No to do items exist yet.</p>
		<?php endif; ?>
		<p><a href="?action=show_add_form">Click here</a> to add a new item to the list.</p>
		<p><a href="?action=list_categories">View/Edit Categories</a></p>
	</div>

<?php include 'view/footer.php' ?>