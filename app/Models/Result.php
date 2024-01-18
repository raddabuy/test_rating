<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'milliseconds'];

    public $timestamps = false;

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
