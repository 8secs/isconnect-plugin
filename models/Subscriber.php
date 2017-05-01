<?php namespace Istheweb\Connect\Models;

use Model;

/**
 * Subscriber Model
 */
class Subscriber extends Model
{
    // VALIDACIONES
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'name' => 'required|max:180|min:3',
        'email' => 'required|email'
    ];

    public $attributeNames = [
        'name' => 'istheweb.connect::lang.fields.name',
        'email' => 'istheweb.connect::lang.fields.email'
    ];

    // PROPIEDADES
    public $timestamps = true;
    public $table = 'istheweb_connect_subscribers';
    protected $primaryKey = 'id';
    protected $dates = [];
    protected $guarded = [];
    protected $jsonable = [];
    protected $fillable = [];
    protected $visible = [];

    // RELACIONES
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];

    // FUCIONES
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];

    // ADJUNTOS Y ARCHIVOS
    public $attachOne = [];
    public $attachMany = [];

}