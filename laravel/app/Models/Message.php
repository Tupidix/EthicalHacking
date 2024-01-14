<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected  $connection = 'mongodb';
    protected  $collection = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'message',
        'userEmail'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
