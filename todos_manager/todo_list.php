<?php include '../view/header.php'; ?>
<main>
    <h2><?php echo "$fname $lname\'s To-Do List" ?></h2>
    <p><a href="?action=add_todo_form">New</a></p> 

    <section>
        <!-- display a table of incomplete todos -->
        <h2>Incomplete To-Do Items</h2>
        <table>
            <tr>
                <th>Created</th>
                <th>Due Date</th>
                <th>Message</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) {
            	if ($todo['isdone'] == 1) {
            		continue;
            	}
            	else { ?>
		            <tr>
		                <td><?php echo $todo['createddate']; ?></td>
		                <td><?php echo $todo['duedate']; ?></td>
		                <td><?php echo $todo['message']; ?></td>
		                <td><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="edit_todo_form">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $todo['id']; ?>">
		                    <input type="submit" value="Edit">
		                </form></td>
		                <td><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="delete_todo">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $todo['id']; ?>">
		                    <input type="hidden" name="todo_duedate"
		                           value="<?php echo $todo['duedate']; ?>">
		                    <input type="hidden" name="todo_message"
		                           value="<?php echo $todo['message']; ?>">
		                    <input type="submit" value="Delete">
		                </form></td>
		                <td><form action="." method="post">
		                    <input type="hidden" name="action"
		                           value="complete_todo">
		                    <input type="hidden" name="todo_id"
		                           value="<?php echo $todo['id']; ?>">
		                    <input type="submit" value="Complete">
		                </form></td>
		            </tr>
		    <?php }
            } ?>
        </table>     
    </section>
    <section>
        <!-- display a table of complete todos -->
        <h2>Completed To-Do Items</h2>
        <table>
            <tr>
                <th>Created</th>
                <th>Due Date</th>
                <th>Description</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) {
            	if ($todo['isdone'] == 0) {
            		continue;
            	}
            	else { ?>
		            <tr>
		                <td><?php echo $todo['createddate']; ?></td>
		                <td><?php echo $todo['duedate']; ?></td>
		                <td><?php echo $todo['message']; ?></td>
		            </tr>
		    <?php }
            } ?>
        </table>     
    </section>
</main>
<?php include '../view/footer.php'; ?>