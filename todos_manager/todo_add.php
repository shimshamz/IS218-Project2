<?php include '../view/header.php'; ?>
<main>
    <section class="new_edit_form">
    <h2>Add To-Do Item</h2>
    <form action="index.php" method="post" id="new_form">
        <input type="hidden" name="action" value="add_todo">
        <div class="form-group">
            <label>Due Date:</label>
            <input type="text" class="form-control" name="duedate" autocomplete=off>
        </div>
        <div class="form-group">
            <label>Message:</label>
            <textarea form="new_form" class="form-control" name="message" autocomplete=off></textarea>
        </div>
        <input type="submit" value="Save" class="button">
        <a class="tb_button" href="?action=list_todos">Back</a>
    </form>
    </section>
</main>
<?php include '../view/footer.php'; ?>