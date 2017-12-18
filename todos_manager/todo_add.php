<?php include '../view/header.php'; ?>
<main>
    <h1>Add To-Do Item</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_todo">

        <label>Due Date:</label>
        <input type="text" name="duedate" />
        <br>

        <label>Message:</label>
        <input type="text" name="message" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save" />
        <br>
    </form>
</main>
<?php include '../view/footer.php'; ?>