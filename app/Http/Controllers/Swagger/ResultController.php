<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultCreateRequest;
use App\Models\Member;
use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *       path = "/api/results",
 *       summary = "Create result",
 *      tags = {"Results"},
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *              allOf = {
 *                  @OA\Schema(
 *                      @OA\Property(property = "email", type = "string", example = "anna@example.com",),
 *                      @OA\Property(property = "milliseconds", type = "integer",),
 *                ),
 *              }
 *            )
 *       ),
 *
 *       @OA\Response(
 *                  response = "200",
 *                  description = "Created",
 *                  @OA\JsonContent(
 *                      @OA\Property(property = "data", type = "object",
 *                           @OA\Property(property = "member_id", type = "integer",),
 *                           @OA\Property(property = "milliseconds", type = "integer",),
 *                           @OA\Property(property = "id", type = "integer",),
 *                     ),
 *                  ),
 *         ),
 * ),
 *
 * @OA\Get(
 *        path = "/api/rating",
 *        summary = "Show rating",
 *        tags = {"Results"},
 *       @OA\Parameter(
 *              name = "email",
 *              in = "query",
 *       ),
 *
 *        @OA\Response(
 *                   response = "200",
 *                   description = "Ok",
 *                   @OA\JsonContent(
 *                       @OA\Property(property = "data", type = "object",
 *                            @OA\Property(property = "top", type = "array", @OA\Items(
 *                                   @OA\Property(property = "email", type = "string", example = "an**@example.com",),
 *                                   @OA\Property(property = "place", type = "integer",),
 *                                   @OA\Property(property = "milliseconds", type = "integer",),
 *                            )),
 *                          @OA\Property(property = "self", type = "object",
 *                                    @OA\Property(property = "email", type = "string", example = "anna@example.com",),
 *                                    @OA\Property(property = "place", type = "integer",),
 *                                    @OA\Property(property = "milliseconds", type = "integer",),)
 *                      ),
 *                   ),
 *          ),
 *  ),
 */
class ResultController extends Controller
{

}
