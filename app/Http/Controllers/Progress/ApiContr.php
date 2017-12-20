<?php
namespace App\Http\Controllers\Progress;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ApiContr
 * @package App\AppSwx\Http\ApiControllers
 */
class ApiContr extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var
     */
    protected $status_code;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @param $status_code
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this;
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->responseError($message);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message)
    {
        return $this->response(
            [
                'status' => 'failed',
                'info'   => [
                    'status_code' => $this->getStatusCode(),
                    'message'     => $message,
                ],
            ]
        );
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($message)
    {
        return $this->response(
            [
                'status' => 'succeed',
                'info'   => [
                    'status_code' => $this->getStatusCode(),
                    'message'     => $message,
                ],
            ]
        );
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data)
    {
        return Response::json($data);
    }
}