<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerChangelog extends Model
{
    public function getChangelog()
    {
        return $this->hasMany(ServerChangelogData::class, 'changelog_id', 'id');
    }

    public function getNotes()
    {
        return $this->hasMany(ServerChangelogNote::class, 'note_id', 'id');
    }
}
