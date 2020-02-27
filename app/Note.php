<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    public $timestamps = true;
    protected $fillable = ['seqid', 'category_id', 'default_job_id', 'name', 'note', 'done'];

    public function Notes_category()
    {
        return $this->belongsTo('App\Notes_category', 'category_id', 'id');
    }

    public function Default_Job()
    {
        return $this->belongsTo('App\Default_Jobs', 'default_job_id', 'id');
    }

    public function Calendar_Event()
    {
        return $this->hasOne('App\Calendar_Event', 'job_id', 'id');
    }

    // public function Budget()
    // {
    //     return $this->hasOne('App\Budget', 'job_id', 'id');
    // }
}
