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

    protected $fillable = ['name', 'founded', 'description', 'image_path'];

    // protected $hidden = ['password', 'remember_token'];

    // protected $visible = ['id', 'name', 'founded', 'description'];

    public function carmodels() 
    {
        return $this->hasMany(CarModel::class);
    }

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    public function engines()
    {
        return $this->hasManyThrough(
                        Engine::class, 
                        CarModel::class,
                        'car_id', // Foreign key on CarModel table
                        'model_id', // Foreign key on Engine table
                    );
    }

    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id',
        );
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
