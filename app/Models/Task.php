<?php

namespace App\Models;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeFilter(Builder $query, $filter)
    {
        if ($filter->status_id != null) {
            $query->where('status_id', $filter->status_id);
        }
    }
}
