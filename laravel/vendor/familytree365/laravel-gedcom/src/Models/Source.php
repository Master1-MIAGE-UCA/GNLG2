<?php

namespace FamilyTree365\LaravelGedcom\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = ['sour', 'titl', 'auth', 'data', 'text', 'publ', 'abbr', 'name', 'description', 'repository_id', 'author_id', 'publication_id', 'type_id', 'is_active', 'group', 'gid', 'quay', 'page'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function repositories()
    {
        return $this->belongsTo(Repository::class);
    }

    public function citations()
    {
        return $this->hasMany(Citation::class);
    }

    public function getCitationListAttribute()
    {
        return $this->citations()->pluck('citation.id');
    }
}
