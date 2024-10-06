<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters){
        $query->when(
            $filters['search'] ?? false, 
            fn($query, $search)=>
            $query->where('title', 'like', '%' . request('search') . '%')
        );
        $query->when(
            $filters['category'] ?? false, 
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false, 
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }


    // public static function find($slug): array{
    //     // return Arr::first(static::all(), function($post) use($slug){
    //     //     return $post['slug'] == $slug;
    //     // });

    //     // return Arr::first(static::all(),  fn($post) => $post['slug'] == $slug);

    //     $post = Arr::first(static::all(),  fn($post) => $post['slug'] == $slug);
    //     if($post == null){
    //         abort(404);
    //     } 
    //     return $post;
    // }
}
