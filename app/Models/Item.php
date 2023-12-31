<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    use HasFactory;
    protected $table = 'items';

    protected $fillable = [
        'user_id',
        'name_id',
        'name',
        'stock',
        'type',
        'detail',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
        // この商品は一つの種別に属している (逆の関係もTypeモデル内で定義する)
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
