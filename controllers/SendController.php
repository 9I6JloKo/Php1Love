<?php
class SendController
{
    public static function registration()
    {
        $data = ModelRegistration::register();
        $message = $data[1];
        include_once 'view/registration.php';
    }
    public static function EditProfile() {
        $response = ModelUser::editProfile();
        if($response == true) {
            $_SESSION['error'] = "<p style='color:green;font-weight:900;margin-left:20px'>Данные успешно изменены!</p>";
        } else {
            $_SESSION['error'] = "<p style='color:red;font-weight:900;margin-left:20px'>Заполните все обязательные поля!</p>";
        }
    }
    public static function Login()
    {
        $test = ModelUser::checkUser();
        if ($test[0]) {
            $_SESSION['error'] = "<p style='color:green;font-weight:900;margin-left:20px'>Успешный вход!</p>";
            header('Location: .');
        } else {
            $_SESSION['error'] = "<p style='color:red;font-weight:900;margin-left:20px'>Ошибка ввода данных!</p>";
            $email = $test[1];
            header('Location: .');
        }
    }
    public static function Logout(){
        ModelUser::UserLogout();
        $_SESSION['error'] = "<p style='color:black;font-weight:900;margin-left:20px'>Вы вышли жестко!</p>";
        if(header('Location: .')){
            session_destroy();
        }
        // if(header('Location:'.$_SERVER['HTTP_REFERER'])){
        //     session_destroy();
        // }
    }
    public static function CreateObj(){
        $obj = ModelAd::createAdv();
        header('Location: .');
    }
}
?>