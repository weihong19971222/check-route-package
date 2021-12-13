<?php
namespace weihong\checkRoute;

use Symfony\Component\HttpFoundation\Response as FoundationResponse;

trait ApiResponse{

    /**
     * http狀態碼
     * @var int
     */
    protected $statusCode = FoundationResponse::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode(){
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode,$httpCode=null){
        $httpCode = $httpCode ?? $statusCode;
        $this->statusCode = $statusCode;
        return $this;
    }

    public function success($data=null,$message="成功"){
        if(is_null($data)){
            $status = [
                'success'   => true,
                'msg'       => $message
            ];
        }else{
            $status = [
                'success'   => true,
                'msg'       => $message,
                'data'      => $data
            ];
        }
        return response()->json($status);
    }

    /**
     * @param $status
     * @param array $data
     * @param null $code
     * @return mixed
     */
    public function status($status, array $data,$message, $code = null){

        if ($code){
            $this->setStatusCode($code);
        }
        $status = [
            'success'   => $status,
            'code'      => $this->statusCode,
            'msg'       => $message
        ];

        $data = array_merge($status,$data);
        return response()->json($data);

    }

    public function error($message){
        return response()->json(['success' => false,'msg'=>$message]);
    }
    /**
     * @param $message
     * @param string $status
     * @return mixed
     */
    // public function message($message, $status = "success"){

    //     return $this->status($status,[
    //         'message' => $message
    //     ]);
    // }

    /**
     * @param string $message
     * @return mixed
     */
    public function notFound($message = 'Not Found!'){
        return $this->error($message,Foundationresponse::HTTP_NOT_FOUND);
    }
}
