<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $table = 'groups';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'name',
        'permission',
    ];
    public $timestamps = true;
}
