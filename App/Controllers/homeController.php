<?php
namespace App\Controllers;
use App\Models\homeModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class homeController extends Controller {
    public function index(){
        $getList = new homeModel();
        $posts = $getList->getAll();
        return $this->loadView("../Views/HomePage/Home3.php", ["posts" => $posts]);
    }

    public function contactUs(){
        return $this->loadView("../Views/HomePage/contact.php");
    }

    public function sendEmail(){
        $yourName = htmlspecialchars($_POST['yourName']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        $newMail = new PHPMailer(true);
        try{
            $newMail->IsSMTP();
            $newMail->Mailer= "smtp";
            $newMail->SMTPDebug  = 1;
            $newMail->SMTPAuth   = TRUE;
            $newMail->SMTPSecure = "tls";
            $newMail->Port       = 587;
            $newMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $newMail->Host       = "smtp.gmail.com";
            $newMail->Username   = "luuthaituan08091999@gmail.com";
            $newMail->Password   = "ltuan89T@.com";
            $newMail->setFrom($email, $yourName);
            $newMail->addAddress('thaituanhp89@hotmail.com', 'Luu Thai Tuan');
            $newMail->isHTML(true);
            $newMail->Subject = "Email from: $email, $yourName";

            //content
            $mailContent = "<h1>Subject: $subject</h1>";
            $mailContent .= "<p>Message: $message</p>";
            $newMail->Body = $mailContent;

            //send email
            $newMail->send();
            echo('<script language="JavaScript">
            window.alert("Thank you for your feedback");
            window.location.href = "/contact";
            </script>');
        } catch (Exception $e) {
            echo '<script language="JavaScript">
            window.alert("Message could not be sent");
            window.location.href = "/contact";
            </script>';
        }
    }

    public function showSingle($id) {
        $getList = new homeModel();
        $posts = $getList->getByID($id);
        return $this->loadView("../Views/HomePage/singleNews.php", ["posts" => $posts]);
    }
}