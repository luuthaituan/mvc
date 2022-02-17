<?php
namespace App\HTTP;
class HttpResponse {
    public $_success;
    public $_messages = array();
    public $_data;
    public $_httpStatusCode;
    public $_toCache = false;
    public $_responseData = array();

    public function setSuccess($success)
    {
        $this->_success = $success;
    }

    public function addMessage($message)
    {
        $this->_messages[] = $message;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function setHttpStatusCode($httpStatusCode)
    {
        $this->_httpStatusCode = $httpStatusCode;
    }

    public function toCache($toCache)
    {
        $this->_toCache = $toCache;
    }

//    public function cors(){
//
//    }

    public function send(){
        if (!is_numeric($this->_httpStatusCode) || ($this->_success !== false && $this->_success !== true)) {
            http_response_code(500);
            $this->_responseData['statusCode'] = 500;
            $this->_responseData['success'] = false;
            $this->addMessage("Response creation error");
            $this->_responseData['messages'] = $this->_messages;
        } else {
            http_response_code($this->_httpStatusCode);
            $this->_responseData['statusCode'] = $this->_httpStatusCode;
            $this->_responseData['success'] = $this->_success;
            $this->_responseData['messages'] = $this->_messages;
            $this->_responseData['data'] = $this->_data;
        }
        echo json_encode($this->_responseData);
    }
}