<?php
namespace App\Controllers;
use App\Models;
class Controller
{
    public $fileName = null;
    public $fileLayout = null;
    public $view = null;

    //tao ham load view
    public function loadView($fileName, $data = [])
    {
        if (!empty($data)) {
            extract($data);
        }
        //kiem tra xem duong dan file ton tai khong
        if (file_exists("../App/Views/$fileName")) {
            $this->fileName = $fileName;
            //doc doi noi cua $fileName gan vao mot bien
            ob_start();
            include "../App/Views/$fileName";
            $this->view = ob_get_contents();
            ob_get_clean();
            //kiem tra neu bien $this->fileLayout khong NULL thi include no
            if ($this->fileLayout != null) {
                include "../App/Views/$this->fileLayout";
            } else {
                echo $this->view;
            }
        }
    }
}
?>