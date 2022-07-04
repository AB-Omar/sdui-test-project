<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];


    /**
     * The boot method.
    */
    // public static function boot() {

    //     parent::boot();
    
    //     self::creating(function ($model) {
    
    //         $model->user_id = auth()->user()->id;
    
    //     });
    // }

    public function scopeofUser($query){

        return $query->where('user_id', auth()->user()->id);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


}
