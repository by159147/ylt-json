<?php

use Illuminate\Http\JsonResponse;
if (!function_exists('json')) {
    /**
     * 返回
     * @param string $code
     * @param array|Model $data
     * @param int $stateCode
     * @param array $header
     * @param int $option
     * @return JsonResponse
     */
    function json($code = '00',$data = [], $stateCode = 200, array $header = [], int $option = 0)
    {
        return response()->json(getData($code,$data), $stateCode, $header, $option);
    }
}

if (!function_exists('getData')){
    function getData($code,$data = []){
        return array_merge(getCode($code),['data'=>$data]);
    }
}

if (!function_exists('getCode')){
    function getCode($code){

        $number =array_merge([
            '00'=>'操作成功',
            '01'=>'操作失败',
        ],config('json-ylt'));
        return ['msg'=>@$number[$code] ? :'错误','code'=>$code];
    }


}
