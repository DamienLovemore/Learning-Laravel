<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses{
    /**
     * Just returns a message to the JSO with a 200 HTTP status
     * @param mixed $message The message that will be returned in the JSON response
     * @return JsonResponse
     */
    protected function ok($message, $data): JsonResponse
    {
        return $this->success($message, $data);
    }

    /**
     * Returns a successful json response.
     * @param string $message The message that will be returned
     * @param int $status The HTTP code of the response
     * @return JsonResponse
     */
    protected function success(string $message, $data, int $status = 200): JsonResponse
    {
        return response()->json([
            "message" => $message,
            "data"    => $data,
            "status"  => $status
        ]);
    }

    /**
     * Returns an json response that indicates an error.
     * @param string $message The message that will be returned
     * @param int $status The HTTP code of the response
     * @return JsonResponse
     */
    protected function error(string $message, int $status): JsonResponse
    {
        return response()->json([
            "message" => $message,
            "status"  => $status
        ], $status);
    }
}
