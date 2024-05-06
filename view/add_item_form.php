<?php include 'view/header.php' ?>
    <h2>Add Item</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_item">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Title:</label>
        <input type="text" name="title" />
        <br>

        <label>Description</label>
        <input type="text" name="description" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Item"/>
        <br>
    </form>
    <p><a href="index.php?action=list_items">View To Do List</a></p>
<?php include 'view/footer.php' ?>