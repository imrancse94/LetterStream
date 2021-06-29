<?php

require __DIR__.'/../../vendor/autoload.php';

use Imrancse\Letterstream\Letterstream;

class SampleConfig {
    
    public static function letterstream(){
        $api_id = '28d88sjx';
        $api_key = '288x8ddd8e884ueudxxw';
        $unique_id = time();
        return new Letterstream($api_id,$api_key,$unique_id);
    }
}
