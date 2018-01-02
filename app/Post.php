<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug', 'excerpt', 'body', 'published_at', 'category_id', 'image'];
    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function dateFormatted($showTimes = false)
    {
        $format ="d/m/Y";
        if ($showTimes) $format = $format . " H:i:s ";
        return $this->created_at->format($format);
    }

    public function publicationLabel()
    {
        if (! $this->published_at)
        {
            return ' <span class="label label-warning">Draft</span>';
        }
        elseif ($this->published_at && $this->published_at->isFuture())
        {
            return ' <span class="label label-info">Schedule</span>';
        }
        else
        {
            return ' <span class="label label-success">Published</span>';
        }
        
    }


    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? :NULL;
    }

    public function getDateAttribute($value)
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirts($query)
    {
        return $this->$query->orderBy('created_at', 'desc');
    }


   

    
}


