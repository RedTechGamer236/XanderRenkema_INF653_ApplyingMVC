<?php include 'header.php' ?>
<div class='table-responsive'>
    <h2>Category List</h2>
    <?php if(!empty($categories)) : ?>
        <table class="table">
            <tr>
                <th>Name</th>
            </tr>
            <?php foreach ($categories as $category) : ?>
				<tr>
					<td><?= htmlspecialchars($category['categoryName'])?></td>
					<td><form action="." method="post">
						<input type="hidden" name="action" value="delete_category">
						<input type="hidden" name="category_id" value="<?= $category['categoryID'] ?>">
						<button type="submit">Remove</button>
					</form></td>
				</tr>
			<?php endforeach; ?>
        </table>
    <?php else : ?>
		<p>No categories available.</p>
	<?php endif; ?>
</div>
<div>
	<h2>Add Category</h2>
	<form action='index.php' method='post' id='add_form'>
		<input type='hidden' name='action' value='add_category'>

		<label>Name:</label>
		<input type="text" name="category_name" />
		<br>
				
		<input type="submit" value="Add Category" />
		<br>
	</form>
</div>
<div>
	<p><a href="index.php?action=list_items">View To Do List</a></p>
</div>