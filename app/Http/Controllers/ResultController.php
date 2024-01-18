<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultCreateRequest;
use App\Models\Member;
use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     *Сохранение результата
     *
     * @param ResultCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ResultCreateRequest $request)
    {
        $email = $request->email;

        if(isset($email)){
            $member = Member::where('email', $email)->firstOrCreate([
                'email' => $email
            ]);
        }

        $result = Result::create([
            'member_id' => isset($member) ? $member->id : null,
            'milliseconds' => $request->milliseconds,
        ]);

        return response()->json(['data' => $result]);
    }

    /**
     * Вывод рейтинга
     * @param Request $request
     * @param ResultService $resultService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRating(Request $request, ResultService $resultService)
    {
        $top = $resultService->getTop();

        if($request->has('email') && $member = Member::where('email', $request->email)->first()){
            $self = $resultService->getSelfPlace($member);

            return response()->json(['data' =>
                [
                    'top' => $top,
                    'self' => $self,
                ]
            ]);
        }

        return response()->json(['data' =>
            [
                'top' => $top,
            ]
        ]);
    }
}
