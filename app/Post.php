<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

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

    public function scopeLatestFirst($query)
    {
        return $this->$query->orderBy('created_at', 'desc');
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $directory = config('cms.image.directory');
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->image);
        }

        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $directory = config('cms.image.directory');
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }

        return $imageUrl;
    }


   

    
}


