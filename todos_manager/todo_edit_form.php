<?php include '../view/header.php'; ?>
<main>
    <h1>Edit To-Do Item</h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="save_todo">

        <label>Due Date:</label>
        <input type="text" name="duedate" value="<?php echo $duedate ?>" />
        <br>

        <label>Message:</label>
        <input type="text" name="message" value="<?php echo $message ?>" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save" />
        <br>
    </form>
</main>
<?php include '../view/footer.php'; ?>