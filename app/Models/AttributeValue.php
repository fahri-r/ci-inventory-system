<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
