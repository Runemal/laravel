<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'id',
        'name',
    ];

    public function getAllNewsCategories(){
        return static::query()
            ->select( 'id', 'name')
            ->get();
    }

    public function news(){

        return $this->hasMany(News::class);

    }
}
