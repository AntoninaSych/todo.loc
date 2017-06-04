<div class="cols-6">
    <?php
    // print_r($data);
    echo "<a href='' class='btn btn-success'> Add new Task</a><br><br>";
    if ($data['user'] == true) {
//    print_r($data['task']);

    ?>


    <div class="panel panel-default">
        <table class="table table-striped table-bordered">
            <tr>
                <td>Id</td>
                <td>         <?php echo $data['task'][0]['id'] ?></td>
            </tr>
            <tr>
                <td>Title</td>
                <td> <?php echo $data['task'][0]['title'] ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td>  <?php echo $data['task'][0]['description'] ?></td>
            </tr>
            <tr>
                <td>Last modified</td>
                <td>      <?php echo $data['task'][0]['last_modify'] ?></td>
            </tr>
            <tr>
                <td>Date created</td>
                <td>        <?php echo $data['task'][0]['date_create'] ?></td>
            </tr>

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