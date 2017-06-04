

<form class="form-horizontal" id="myform" action="index.php?controller=user&action=register" method="post">
    <div class="control-group">
        <label class="control-label" for="login">Login</label>

        <div class="controls">
            <input type='text' id='login' name="login" value="<?php if (isset($data['login'])) {
                echo($data['login']);
            } ?>" onKeyUp="check('login');">
            <?php
            if (isset($data)) {
                if ($data['message'] == false) {
                    echo "User with this name is already exists";
                }
            }
                echo "<span class='help-inline' id='login_helper'></span>";
            ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>

        <div class="controls">
            <input type='password' id='password' name="password" value="<?php if (isset($data['password'])) {
                echo($data['password']);
            } ?>" onKeyUp="check('password');">
            <span class="help-inline" id="password_helper"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="repeat_pwd">Repeat password</label>

        <div class="controls">
            <input type='password' id='repeat_pwd' name="repeat_pwd" value="<?php if (isset($data['repeat_pwd'])) {
                echo($data['repeat_pwd']);
            } ?>" onKeyUp="check('repeat_pwd');">
            <span class="help-inline" id="repeat_pwd_helper"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email</label>

        <div class="controls">
            <input type='email' id='email' name="email" value="<?php if (isset($data['email'])) {
                echo($data['email']);
            } ?>" onKeyUp="check('email');">
            <span class="help-inline" id="email_helper"></span>
        </div>
    </div>

    <input type="hidden" name="test_id" value="1">
    <br>

    <div class="sending">
        <input type='submit' value="Register new user" class="btn btn-large" name="send_btn" id="send">
    </div>
</form>

</div>
<script>
    $(document).ready(function () {
        try_to_send();
        $("#login").change(function () {
            try_to_send();
        });
        $("#password").change(function () {
            try_to_send();
        });
        $("#repeat_pwd").change(function () {
            try_to_send();
        });
        $("#email").change(function () {
            try_to_send();
        });
    })
</script>