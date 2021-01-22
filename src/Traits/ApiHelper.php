<?php

namespace WwjPackages\JsonApi\Traits;

use Illuminate\Http\Response;

trait ApiHelper
{
    public function apply($bool = true, $msg = '', $data = array())
    {
        try {
            $result = [];
            $result['status'] = $bool ? 1 : 0;
            if (empty($msg)) {
                $result['msg'] = $bool ? '成功!' : '失败';
            } else {
                $result['msg'] = $msg;
            }
            //  $result['data'] = !empty($data) ? $data : '';
            //  return response()->json($result);
            return $this->content($data, $result);
        } catch (\Exception $exception) {
            throw new \Exception('System Error');
        }
    }

    public function content($content = null, $addition = [])
    {
        $res = array_merge(['data' => $content], $addition);

        return response($res, Response::HTTP_OK);
    }

    /* public function created()
     {
         return response(null, Response::HTTP_CREATED);
     }

     public function accepted()
     {
         return response(null, Response::HTTP_ACCEPTED);
     }

     public function noContent()
     {
         return response(null, Response::HTTP_NO_CONTENT);
     }*/

}