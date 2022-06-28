<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'parent_id', 'desc', 'thumb'];

    public function scopeOnlyParent($query)
    {
        return $query->whereNull("parent_id");
    }

    public function scopeSearch($query, $title)
    {
        return $query->where("title", "LIKE", "%{$title}%");
    }

    public function parent()
    {
        return $this->belongsTo(self::class, "parent_id")->where('parent_id', 0);
    }

    public function children()
    {
        return $this->hasMany(self::class, "parent_id");
    }

    public function descendants()
    {
        return $this->children()->with("descendants");
    }
}
