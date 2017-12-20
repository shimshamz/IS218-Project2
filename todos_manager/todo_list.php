<?php include '../view/header.php'; ?>
<main>
    <h2><?php echo "$fname $lname's To-Do List" ?></h2>

    <section class="display_list">
        <!-- display a table of incomplete todos -->
        <h2>Incomplete To-Do Items</h2>
        <a id="logout_button" class="tb_button" href="../logout.php">Log Out</a>
        <a id="new_button" class="tb_button" href="?action=add_todo_form">New</a>
        <table class="todo_table">
            <tr>
                <th class="dates">Created</th>
                <th class="dates">Due Date</th>
                <th class="message">Message</th>
                <th class="tb_button_column">&nbsp;</th>
                <th class="tb_button_column">&nbsp;</th>
                <th class="tb_button_column">&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) {
            	if ($todo['isdone'] == 1) {
            		continue;
            	}
            	else { ?>
		            <tr>
		                <td class="dates"><?php echo $todo['createddate']; ?></td>
		                <td class="dates"><?php echo $todo['duedate']; ?></td>
		                <td class="message"><?php echo $todo['message']; ?></td>
		                <td class="tb_button_column"><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="edit_todo_form">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $todo['id']; ?>">
                            <input type="hidden" name="todo_duedate"
                                   value="<?php echo $todo['duedate']; ?>">
                            <input type="hidden" name="todo_message"
                                   value="<?php echo $todo['message']; ?>">
		                    <input type="submit" value="Edit" class="tb_button">
		                </form></td>
		                <td class="tb_button_column"><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="delete_todo">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $todo['id']; ?>">
		                    <input type="hidden" name="todo_duedate"
		                           value="<?php echo $todo['duedate']; ?>">
		                    <input type="hidden" name="todo_message"
		                           value="<?php echo $todo['message']; ?>">
		                    <input type="submit" value="Delete" class="tb_button">
		                </form></td>
		                <td class="tb_button_column"><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="complete_todo">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $todo['id']; ?>">
		                    <input type="submit" value="Complete" class="tb_button">
		                </form></td>
		            </tr>
		    <?php }
            } ?>
        </table>     
    </section>
    <section class="display_list">
        <!-- display a table of complete todos -->
        <h2>Completed To-Do Items</h2>
        <table class="todo_table">
            <tr>
                <th class="dates">Created</th>
                <th class="dates">Due Date</th>
                <th class="message">Message</th>
                <th class="tb_button_column">&nbsp;</th>
                <th class="tb_button_column">&nbsp;</th>
                <th class="tb_button_column">&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) {
            	if ($todo['isdone'] == 0) {
            		continue;
            	}
            	else { ?>
		            <tr>
		                <td class="dates"><?php echo $todo['createddate']; ?></td>
		                <td class="dates"><?php echo $todo['duedate']; ?></td>
		                <td class="message"><?php echo $todo['message']; ?></td>
                        <td></td>
                        <td class="tb_button_column"><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_todo">
                            <input type="hidden" name="todo_id"
                                   value="<?php echo $todo['id']; ?>">
                            <input type="hidden" name="todo_duedate"
                                   value="<?php echo $todo['duedate']; ?>">
                            <input type="hidden" name="todo_message"
                                   value="<?php echo $todo['message']; ?>">
                            <input type="submit" value="Delete" class="tb_button">
                        </form></td>
                        <td class="tb_button_column"><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="redo_todo">
                            <input type="hidden" name="todo_id"
                                   value="<?php echo $todo['id']; ?>">
                            <input type="submit" value="Redo" class="tb_button">
                        </form></td>
		            </tr>
		    <?php }
            } ?>
        </table>     
    </section>
</main>
<?php include '../view/footer.php'; ?>