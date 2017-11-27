<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $guarded = ['id'];
    protected $fillable = 
    [
        'title', 'completed', 'priority'
    ];

    const OPTIONS = 
    [
        "Top priority",
        "Priority level 2",
        "Priority level 3",
        "Priority level 4",
        "Priority level 5"
    ];
}
