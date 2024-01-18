<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public $timestamps = false;

    public function bestResult(){
        return $this->hasMany(Result::class)->orderBy('milliseconds', 'ASC')->first()->milliseconds;
    }
}
