<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use phpDocumentor\Reflection\Types\Null_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Photo Update System
     */
    public function fileUpload($request,$field_name,$path,$data=NULL){

        if($request->hasFile($field_name)){
            $file = $request -> file($field_name);
            $unique_name = md5(time().rand()) . "." . $file ->getClientOriginalExtension();
            $file -> move(public_path($path),$unique_name);


            if(file_exists($path . $data) && $data != NULL){
                unlink($path . $data);
            }
            return $unique_name;
        }else{
            return $unique_name = $data;
        }

    }

    /**
     * make slug
     */
    public function makeSlug($title){

        $lowerdata = strtolower($title);

        return str_replace(" ","-",$lowerdata);

    }

    /**
     * array to JSON Convert
     */
    public function jsonEncode(array $arr){
        return json_encode($arr);
    }

    /**
     * JSON to array Convert
     */
    public function jsonDecode(string $str,$type = false){
        return json_decode($str,$type);
    }

}
