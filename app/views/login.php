<?php
if(isset($_SESSION['login'])){

echo $_SESSION['login'];
   header("Location:  /index.php?controller=main&action=GetTasks" ); /* Redirect browser to login page */
      exit;
  //  echo "<a href='index.php?controller=user&action=logout'  class='btn btn-medium logout'  >Logout</a>";//$_SESSION['login'];
}else{
?>

<form class="form-horizontal" id="login" action="index.php?controller=user&action=login" method="post">
    <div class="control-group">
        <label class="control-label" for="login">Login</label>

        <div class="controls">
            <input type='text' id='login' name="login" value="<?php if (isset($data['login'])) {
                echo($data['login']);
            } ?>"  >

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>

        <div class="controls">
            <input type='password' id='password' name="password" value="<?php if (isset($data['password'])) {
                echo($data['password']);
            } ?>"  >
            <span class="help-inline" id="password_helper"></span>
        </div>
    </div>


    <input type="hidden" name="test_id" value="1">
    <br>

    <div class="sending">
        <input type='submit' value="Login" class="btn btn-large" name="send_btn" id="send">   <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>/index.php?controller=user&action=register"  class="btn btn-large">register a new user</a>
    </div>
</form>

</div>

<?php }?>