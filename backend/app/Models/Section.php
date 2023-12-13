<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Section
 *
 * @property Section subSections
 * @property Section parent
 * @property int id
 * @property int parent_id
 * @property string slug
 * @property string name
 * @property string image
 * @property string title
 * @property string description
 * @property string lang
 * @property int position
 */
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
        'lang',
        'position',
    ];

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id');
    }

    public function subSections(): HasMany
    {
        return $this->hasMany(Section::class, 'parent_id')
            ->orderBy('position');
    }


    public static function getBaseSections(){
        return Section::where('parent_id',0)->get();
    }

}
