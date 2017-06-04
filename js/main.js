 function try_to_send(){
    var $error_checker=0;
    if($error_checker!==check_try('login')){$error_checker++};
    if($error_checker!==check_try('password')){$error_checker++};
    if($error_checker!==check_try('repeat_pwd')){$error_checker++};
    if($error_checker!==check_try('email')){$error_checker++};
    if($error_checker!==check_try('email')){$error_checker++};
    if($error_checker==0){
     $("#send").attr("disabled", false);
    }
     else{
       $("#send").attr("disabled", true);
   }
 }


 function check_try($name) {
     var $error=0;
     if (document.getElementById("" + $name + "").value == "") {
         $error=1;
     }
     if ($name == "repeat_pwd") {
         if (document.getElementById("" + $name + "").value != document.getElementById("password").value) {
             $error=1;
         }
     }
     if ($name == "email") {
         if (!isValidEmailAddress(document.getElementById("" + $name + "").value)) {
             $error=1;
         }
     }
     return $error;
 }

function check($name) {
    var $error=0;
    if (document.getElementById("" + $name + "").value == "") {
        $("#" + $name + "_helper").html("Error: " + $name + " cannot be blank!");
        $error=1;
    }
    else {

        $("#" + $name + "_helper").html("<span color='green'>ok</span>");
    }

    if ($name == "repeat_pwd") {
        if (document.getElementById("" + $name + "").value != document.getElementById("password").value) {
            $error=1;
            $("#" + $name + "_helper").html("Error: Passwords do not match!");
        } else {
            $("#" + $name + "_helper").html("<span color='green'>ok</span>");
        }
    }

    if ($name == "email") {
        if (!isValidEmailAddress(document.getElementById("" + $name + "").value)) {
            $("#" + $name + "_helper").html("Error: Invalid email address!");
            $error=1;
        } else {
            $("#" + $name + "_helper").html("<span color='green'>ok</span>");
        }
    }
    return $error;
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
//
//function send(action, number) {
//
//    myobj = new XMLHttpRequest();
//    myobj.onreadystatechange = function () {
//        if (myobj.readyState == 4 && myobj.status == 200) {
//            if (action == 'detailed') {
//                $("#results").html(myobj.responseText);
//            }
//        }
//    }
//    if (action == 'detailed') {
//        myobj.open("GET", "http://" + location.host + "/index.php?controller=main&action=results&detailed=" + number + "", true);
//    }
//    myobj.send();
//}
//
//function detail(detail) {
//    send('detailed', detail);
//
//}

//
//function try_to_send()
//{
//    username=document.getElementById("username").value;
//    surname=document.getElementById("surname").value;
//    date=document.getElementById("date").value;
//    var i=0;
//    if(username.length<3)
//    { i++;
//        $("#username_helper").html("Длина имени минимум 3 символа!");
//    }
//    if(surname.length<3)
//    { i++;
//        $("#surname_helper").html("Длина фамилии минимум 3 символа!");
//    }
//    if(date.length<3)
//    { i++;
//        $("#date_helper").html("Дата заполненна не корректно!");
//    }
//    if(i==0){ send('select',array);    }
//}