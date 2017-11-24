<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
		protected $guarded = ['id'];
    protected $fillable = [
        'title', 'completed'
    ];

    const STORE_RULES = [
        'title' => 'required|min:5|max:255'
    ];
}
