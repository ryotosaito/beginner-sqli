<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    private function solvers() {
        return $this->belongsToMany('App\User');
    }
}
