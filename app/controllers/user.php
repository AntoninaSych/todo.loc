<?php

/**
 * Quiz
 */
class Controller_user extends BaseControllers
{

    public function __construct()
    {
        $this->_view = new BaseViewes();
        $this->_model = new Model_Main();
    }


    public function action_register()
    {
        $data = array();
        $login = '';
        $data['message'] = "����� ����������";
        if (isset($_POST['login'])) {
            $data['login'] = $_POST['login'];
            $login = $_POST['login'];
            $data['message'] = $data['message'] . $data['login'];
        }
        if (isset($_POST['password'])) {
            $data['password'] = $_POST['password'];
            $password = $_POST['password'];
        }
        if (isset($_POST['repeat_pwd'])) {
            $data['repeat_pwd'] = $_POST['repeat_pwd'];
        }
        if (isset($_POST['email'])) {
            $data['email'] = $_POST['email'];

        }
        if (isset($_POST['login'])) {
            $login = trim($data['login']);
            $password = md5(trim($data['password']));
            $email = trim($data['email']);

            $result = $user_exists = $this->_model->checkUserByLogin($login);
            if ($result) {
                $data['message'] = false;//����� ������������ ��� ����������
                // $data['message']= "User with this name is already exists";
                $this->_view->render("template.php", "register.php", $data);
            } else {
                $data['message'] = true; // ������������ �� ������, ����� �������� ��������, ������������ ������ ������������ � ���������� ���������� �� �������� ������

                $result = $this->_model->regNewUser($login, $password, $email);
                if ($result) {
                    $data = "�� �������� ������������������ �� �����.";
                    $this->_view->render("template.php", "login.php", $data);
                } else {
                    //����� �������� �� ������ ������ ������������.
                    $this->_view->render("template.php", "register.php", $data);
                }
            }
        } else {
            $this->_view->render("template.php", "register.php", $data);
        }
    }

    public function action_login()
    {
        $data = array();

        $data['message'] = "����� ����������";
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $password = md5($password);
                $result = $this->_model->loginUser($login, $password);
                if ($result == true) {
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;

                    SetCookie("login", $login);
                    SetCookie("password", $password);
                }
            }
        }

        $this->_view->render("template.php", "login.php", $data);
    }

    public function action_logout()
    {
        $data = array();
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        SetCookie("login", "");
        SetCookie("password", "");
        $this->_view->render("template.php", "login.php", $data);
    }



}