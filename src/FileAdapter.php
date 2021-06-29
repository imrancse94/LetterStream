<?php

namespace Imrancse\Letterstream;

use Imrancse\Letterstream\BaseClass;

class FileAdapter extends BaseClass{

    private $data = [];

    public function __construct($data){
        $this->data = $data;
    }

    public function send(){
        $response = $this->httppost($this->data);
        return $this->sendApiSuccessResponse($this->parseJsonToArray($response));
    }
}