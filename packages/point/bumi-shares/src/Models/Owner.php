<?php

namespace Point\BumiShares\Models;

use Illuminate\Database\Eloquent\Model;

use Point\Core\Traits\HistoryTrait;
use Point\Core\Traits\ByTrait;
use Point\Core\Traits\MasterTrait;

class Owner extends Model
{
    protected $table = 'bumi_shares_owner';
    public $timestamps = true;

    use HistoryTrait, ByTrait, MasterTrait;

    public function scopeSearch($q, $search)
    {
        return $q->where('name', 'like', '%'.$search.'%');
    }
}
