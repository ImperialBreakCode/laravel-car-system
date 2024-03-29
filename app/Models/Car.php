<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'cars';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function scopeSearch($query, $search){
        return $query->where('year_of_manufacturing','LIKE','%'. $search .'%')
            ->orWhereHas('manufacturerModel', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'. $search .'%');
            })
            ->orWhereHas('manufacturer', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'. $search .'%');
            });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function manufacturerModel()
    {
        return $this->belongsTo(ManufacturerModel::class, 'model_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            Storage::delete(Str::replaceFirst('storage/', 'public/', $obj->image));
        });
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        // destination path relative to the disk above
        $destination_path = "cars";

        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            Storage::delete(Str::replaceFirst('storage/', 'public/', $this->{$attribute_name}));

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        } elseif ($value instanceof \Illuminate\Http\UploadedFile) {
            $disk = "public";
            $fileName = md5($value->getClientOriginalName() . random_int(1, 9999) . time()) . '.' . $value->getClientOriginalExtension();
            Storage::putFileAs("public/" . $destination_path, $value, $fileName, $disk);
            $this->attributes[$attribute_name] =  'storage/cars/' . $fileName;
        } else {
            $this->attributes[$attribute_name] = 'storage/cars/' . $value;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
