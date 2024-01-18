<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

class ResultService
{
    /**
     * Получение списка первых 10 участников в рейтинге
     * @return array
     */
    public function getTop()
    {
        $results = Result::selectRaw('min(milliseconds) as min_milliseconds, member_id')
            ->whereNotNull('member_id')
            ->groupBy('member_id')
            ->orderBy('min_milliseconds', 'ASC')
            ->limit(10)
            ->get();

        $array = [];

        $place = 1;
        foreach ($results as $result) {
            $array[] = [
                "email" => $this->getReducedEmail($result->member->email),
                "place" => $place,
                "milliseconds" => $result->min_milliseconds
            ];
            $place++;
        }
        return $array;
    }

    /**
     * Получение данных о переданном в запросе участнике
     *
     * @param Member $member
     * @return array
     */
    public function getSelfPlace(Member $member)
    {
        $bestMemberResult = $member->bestResult();
        $results = Result::selectRaw('min(milliseconds) as min_milliseconds, member_id')
            ->whereNotNull('member_id')
            ->groupBy('member_id')
            ->having(DB::raw('min(milliseconds)'), '<', $bestMemberResult)
            ->get();
        $place = $results->count() + 1;

        return [
            "email"=> $member->email,
            "place"=> $place,
            "milliseconds"=>$member->bestResult()
        ];
    }

    /**
     * Получение сокращенного вида email для вывода в рейтинге
     *
     * @param $email
     * @return string
     */
    public function getReducedEmail($email)
    {
        $em   = explode("@",$email);
        $name = implode('@', array_slice($em, 0, count($em)-1));
        $len  = floor(strlen($name)/2);

        return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);
    }
}
