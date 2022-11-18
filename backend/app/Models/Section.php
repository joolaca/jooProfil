<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'parent_id',
        'slug',
        'name',
        'image',
        'title',
        'description',
    ];

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id');
    }

    public function subSections()
    {
        return $this->hasMany(Section::class, 'parent_id')
            ->orderBy('position');;
    }


    public static function getBaseSections(){
        return Section::where('parent_id',0)->get();
    }


    public static function getSubSectionUseSlug($slug){
        return Section::where('slug', $slug)->first();
    }

}
