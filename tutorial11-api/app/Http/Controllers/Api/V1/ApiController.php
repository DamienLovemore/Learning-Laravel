<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends Controller
{
    use ApiResponses;
    use AuthorizesRequests;//Now controller by default does not come with the Authorize method in Laravel12

    protected $policy_class;

    //Verifies if the query string "include" have that specific relationship
    public function include(string $relationship): bool
    {
        $param = request()->get("include");

        if(empty($param))
            return false;

        //Converte para caracteres minúsculos reconhecendo acentos brasileiros
        mb_internal_encoding("UTF-8");
        $param          = mb_convert_case($param, MB_CASE_LOWER);
        $relationship   = mb_convert_case($relationship, MB_CASE_LOWER);

        $include_values = explode(",", $param);

        return in_array($relationship, $include_values);
    }

    public function isAble($ability, $target_model)
    {
        return $this->authorize($ability, [$target_model, $this->policy_class]);
    }
}
