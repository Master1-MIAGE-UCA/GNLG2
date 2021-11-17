<?php

namespace FamilyTree365\LaravelGedcom\Models;

use Illuminate\Database\Eloquent\Model;

class SourceRepo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'source_repo';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group', 'gid', 'repo_id', 'caln', 'created_at', 'updated_at'];
}
