<?php

namespace FamilyTree365\LaravelGedcom\Models;

use Illuminate\Database\Eloquent\Model;

class MediaObjeectFile extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media_objects_file';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['gid', 'group', 'form', 'medi', 'type', 'created_at', 'updated_at'];
}
