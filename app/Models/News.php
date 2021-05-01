<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $source
 * @property int $status
 * @property int $category
 * @property string $publish_date
 * @property string $create_at
 * @property string $update_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News wherePublishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdateAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'source',
        'category',
        'status',
    ];


    /**
     * @param int $id
     * @return News[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getNewsByCategoryId(int $id){
        return static::query()
            ->where('category', $id)
            ->join('category', 'news.category', '=', 'category.id')
            ->select('news.id','title', 'name')
            ->get();
    }

    /**
     * @param int $cart
     * @return News[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getNewsById (int $cart){
        return static::query()
            ->where('news.id', '=', $cart)
            ->Join('category', 'news.category', '=', 'category.id')
            ->select('title', 'description', 'name')
            ->get();
    }

    public function category(){

        return $this->belongsTo(Category::class);

    }
}
