<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function canChange(User $user): bool
    {
        if($user->id === $this->author_id) {
            return true;
        }

        if($user->is_admin) {
            return true;
        }

        return false;
    }
}
