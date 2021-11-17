<?php

namespace FamilyTree365\LaravelGedcom\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = ['repo', 'name', 'addr_id', 'rin', 'phon', 'email', 'fax', 'www', 'name', 'description', 'type_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
