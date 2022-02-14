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
        return $this->loadView("../Views/HomePage/Home.php", ["posts" => $posts]);
    }

    public function contactUs(){
        return $this->loadView("../Views/HomePage/contact.php");
    }

    public function sendEmail(){
        $yourName = $_POST['yourName'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

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
            $newMail->Subject = "Email from $yourName, $email";
            //content
            $mailContent = "<h1>Subject: $subject</h1>";
            $mailContent .= "Message: $message";
            $newMail->Body = $mailContent;

            //send email
            $newMail->send();
            echo '<script>
            window.alert("Sent successfully");
            window.location.href = "/contact";
            </script>';
        } catch (Exception $e) {
            echo "<script>window.alert('Message could not be sent. Mailer Error: ')</script> {$newMail->ErrorInfo}";
        }
    }

    public function showSingle($id) {
        $getList = new homeModel();
        $posts = $getList->getByID($id);
        return $this->loadView("../Views/HomePage/singleNews.php", ["posts" => $posts]);
    }
}