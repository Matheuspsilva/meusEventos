<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'slug', 'start_event', 'banner'];

    protected $dates = ['start_event'];

    //Accessors

    public function getOwnerNameAttribute($key)
    {
        return !$this->owner ? 'Organizador não encontrado' : $this->owner->name;
    }

    //Mutators
    public function setTitleAttribute($value){

        $this->attributes['title'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }

    public function setStartEventAttribute($value){
        $this->attributes['start_event'] = (\DateTime::createFromFormat('d/m/Y H:i', $value))->format('Y-m-d H:i');
    }


    //Relations
    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class);
    }

    /**
    *  Methods
    */

    public function getEventsHome($byCategory = null)
    {
        $events = $byCategory
            ? $byCategory
            : $this->orderBy('start_event', 'DESC');

        $events->when($search = request()->query('search'), function ($queryBuilder) use($search){
            return $queryBuilder->where('title', 'LIKE', '%' . $search . '%');
        });

        // $events->whereRaw('DATE(start_event) >= DATE(NOW())');

        $events->whereDate('start_event', '>=', now());

        return $events;

    }

}
