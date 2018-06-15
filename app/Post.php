<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//extending our own Model class for the guarded property
Use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);//App\Comment string of class path
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);//App\Post::with('tags')->get() all posts with tags in one query (join)
        //$post->tags()->attach($tag) or dettach($tag)
    }

    public function addComment($body, $user_id)
    {
        $this->comments()->create(compact('body', 'user_id'));//autoincrements id and adds post_id of $this, or we cna
        // just
        // Comment::create([])
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at)')
            ->get();
    }

    public function scopeFilter($query,$filters)
    {
        if ($month = $filters['month'] ?? false) {//Null coalescing operator ?? isset(month)?month:false
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year'])) {
            $year = $filters['year'];
            $query->whereYear('created_at', $year);
        }

        //return $query;
    }


}
