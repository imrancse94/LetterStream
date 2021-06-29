<?php

namespace Imrancse\Letterstream;

use Imrancse\Letterstream\Utils\Curl;

class BaseClass{

    CONST STATUS_SUCCESS_CODE = 100;
    CONST STATUS_FAILED_CODE = 99;

    private $base_url = "https://secure.letterstream.com/apis/";

    public function sendApiSuccessResponse($data){
        return $this->toJson([
            'status'=>true,
            'data'=>$data
        ]);
    }

    public function sendApiFailedResponse($data){
        return $this->toJson([
            'status'=>false,
            'data'=>$data
        ]);
    }

    private function toJson($param){
        return json_encode($param);
    }

    public function parseJsonToArray($param){
        return json_decode($param,true);
    }

    public function httppost($data){
        return Curl::post($this->base_url,$data);
    }

    public function createHash($api_key,$unique_id){
        return  md5(base64_encode(substr($unique_id,-6).$api_key.substr($unique_id,0,6)));
    }
}
