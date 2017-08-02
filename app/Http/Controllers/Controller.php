<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
/**
*         @SWG\Swagger(
*            basePath="",
*            host="scoreapi.app",
*            schemes={"http"},
*            @SWG\Info(
*               version="1.0",
*               title="Score API",
*               @SWG\Contact(
*                  name="Erik Justian",
*                  url="https://github.com/erikjustian"
*               ),
*               @SWG\Contact(
*                  name="Ronaldo",
*                  url="https://github.com/pine09"
*               ),
*               @SWG\Contact(
*                  name="Wilson Nicholas",
*                  url="https://github.com/wilzznic"
*               ),
*            ),
*            @SWG\Definition(
*               definition="Error",
*               required={"code", "message"},
*               @SWG\Property(
*                  property="code",
*                  type="integer",
*                  format="int32"
*               ),
*               @SWG\Property(
*                  property="message",
*                  type="string"
*               )
*            )
*      )
*/
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
