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

    /**
     * @param $user_id integer
     * @return bool
     */
    public function is_solved_by($user_id) {
        return $this->solvers()->where('id', '=', $user_id)->exists();
    }
}
