<?php

namespace Imrancse\Letterstream;

use Imrancse\Letterstream\BaseClass;
use Imrancse\Letterstream\FileAdapter;

class Letterstream extends BaseClass{

    private $data = [];

    public function __construct($api_id,$api_key, $unique_id){

        $this->data = array(
            'a' => $api_id, 
            'h' => $this->createHash($api_key,$unique_id), 
            't'=> $unique_id,
            'responseformat'=>'json'
        );
    }

    public function setAttachment($file, $data){
        if($file['tmp_name'] ) {
            if (function_exists('curl_file_create')) { // php 5.5+
                $this->data['single_file'] = curl_file_create($file['tmp_name']);
            } else {
                $this->data['single_file'] = '@'.$file['tmp_name'];
            }

            $this->data['job'] = $data['job'];
            $this->data['pages'] = $data['pages'];
            $this->data['from'] = $data['from'];
            $this->data['to[]'] = $this->data['t'].':'.$data['to'];
            $this->data['mailtype'] = $data['mailtype'];
            $this->data['paper'] = $data['paper'];
            $this->data['ink'] = $data['ink'];
            $this->data['returnenv'] = $data['returnenv'];
            $this->data['coversheet'] = $data['coversheet'];
            $this->data['preauth'] = $data['preauth'];
            $this->data['debug'] = 3;
        }
       
        return new FileAdapter($this->data);
    }
    
}
