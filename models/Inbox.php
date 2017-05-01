<?php namespace Istheweb\Connect\Models;

use Model;

/**
 * Inbox Model
 */
class Inbox extends Model
{

    // VALIDACIONES
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
    ];

    // PROPIEDADES
    public $timestamps = true;
    public $table = 'istheweb_connect_inboxes';
    protected $primaryKey = 'id';
    protected $dates = [];
    protected $guarded = [];
    protected $jsonable = [];
    protected $fillable = ['name','email','phone','company','subject','message'];
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