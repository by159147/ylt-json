<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

if (!function_exists('jsonData')) {
    /**
     * 返回
     * @param string $code
     * @param array|Model $data
     * @param int $stateCode
     * @param array $header
     * @param int $option
     * @return JsonResponse
     */
    function jsonData($code = '00',$data = [], $stateCode = 200, array $header = [], int $option = 0)
    {
        if (isAssoc($data)){
            $data = [$data];
        }
        return response()->json(getData($code,$data), $stateCode, $header, $option);
    }
}

if (!function_exists('jsonDataIs')){
    function jsonDataIs($data = [],$code = '98')
    {
        if (empty($data)){
            return jsonData($code);
        }else{
            return jsonData('00',$data);
        }
    }
}


if (!function_exists('jsonDataMsg')){
    /**
     * 自定义msg
     * @param array $data
     * @param string $msg
     * @return JsonResponse
     */
    function jsonDataMsg($data = [],$msg = '')
    {
        if (isAssoc($data)){
            $data = [$data];
        }
        return response()->json(['data'=>$data,'msg'=>$msg,'code'=>'100']);
    }
}




if (!function_exists('getData')){
    function getData($code,$data = []){
        return array_merge(getCode($code),['data'=>$data]);
    }
}

if (!function_exists('getCode')){
    function getCode($code){
        return ['msg'=>config('json-ylt.'.$code) ? :'错误','code'=>$code];
    }
}

if (!function_exists('errorLog')){
    /**
     * 记录错误日志
     * @param $e
     * @param string $msg
     * @return array
     */
    function errorLog($e,$msg=''){
        Log::error($msg,['msg'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()]);
        return ['msg'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
    }
}

if (!function_exists('is_assoc')){
    /**
     * 判断是否索引数组
     * @param $array
     * @return bool
     */
    function isAssoc($array) {
        if (is_array($array)){
            $array = $array->toArray();
        }
        return array_keys($array) !== range(0, count($array) - 1);
    }
}
