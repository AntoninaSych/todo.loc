<div class="cols-6">
    <?php
    echo "<a href='index.php?controller=main&action=add' class='btn btn-success'> Add new Task</a><br><br>";
    if ($data['user'] == true) {
    ?>
    <?php
    if (isset($data['message'])) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong><?php echo  $data['message'];?>
        </div>

        <?php
    }

    ?>

    <div class="panel panel-default">


        <table class="table table-striped table-bordered">
            <?php

            $counter = count($data['tasks']);
            $y = 0;
            for ($i = 0; $i < $counter; $i++):?>
                <?php
                $y++;
                echo "<tr><td>" . $y . "</td><td>" . $data['tasks'][$i]['title'] . "</td>

            <td>";
     ?>  <a href="index.php?controller=main&action=detailed&id=<?php echo $data['tasks'][$i]['id'];?>""  class='btn btn-primary'> View detailed</a>
             <a href="index.php?controller=main&action=edit&id=<?php echo $data['tasks'][$i]['id'];?>"  class='btn btn-warning'> Edit</a>
             <a href="index.php?controller=main&action=remove&id=<?php echo $data['tasks'][$i]['id'];?>"  class='btn btn-danger'> Remove</a>   </td>
         <?php echo"   </tr>";

                ?>
            <?php endfor ?>
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