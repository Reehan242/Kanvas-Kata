<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public static function filterContent($content)
    {
        $badWords = ['anjing', 'kontol', 'tolol', 'goblok', 'bangsat', 'babi', 'bajingan', 'memek', 'tempek', 'idiot', 'fuck', 'ngewe','nigga'];
        $pattern = '/\b(' . implode('|', $badWords) . ')\b/i';
        return preg_replace($pattern, str_repeat('*', 5), $content);
    }

}
