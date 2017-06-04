<div class="cols-6">
    <?php
//    echo "<a href='index.php?controller=main&action=add' class='btn btn-success'> Add new Task</a><br><br>";
    // print_r($data);
    echo "<a href='' class='btn btn-success'> Add new Task</a><br><br>";
    if ($data['user'] == true) {
    //  print_r($data['task']);

    ?>



    <div class="panel panel-default">
        <table class="table table-striped table-bordered">
            <tr>
                <td>
                    <form action="index.php?controller=main&action=add" method="post">
                        <div class="form-group">
                            <label class="control-label" for="title">Title</label>
                            <input type="text" name="title" id="" style="width:75%;">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="comment">Description</label>
                            <textarea class="form-control" rows="8" name="description" id="description"
                                      style="width:75%;"> </textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="last_modify">Last Modify</label>
                            <input type="date" id="date" name="last_modify" disabled>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="created">Created</label>
                            <input type="date" id="date" name="created"  disabled>
                        </div>
                        <input type="hidden" name="add" id="add" value="1">

                        <input type="submit" value="Add" class="btn btn-large" name="send_btn">
                    </form>

                </td>
            </tr>
        </table>
    </div>

</div>
<?php
} else {
    header("Location: 'http://'" . $_SERVER['SERVER_NAME'] . "/index.php?controller=user&action=login"); /* Redirect browser to login page */
    exit;
}
?>
</div>