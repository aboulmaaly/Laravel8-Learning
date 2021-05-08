<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    // public $timestamps = true;

    // protected $dateFormat = 'h:m:s';

    protected $fillable = ['name', 'founded', 'description'];

    // protected $hidden = ['password', 'remember_token'];

    // protected $visible = ['id', 'name', 'founded', 'description'];

    public function carmodels() 
    {
        return $this->hasMany(CarModel::class);
    }
}
