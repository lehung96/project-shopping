<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemission extends Model
{
    protected $guarded = [];
    public function pemissionsChildrent()
    {
        return $this->hasMany(Pemission::class, 'parent_id');
    }
}
