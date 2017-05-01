<?php namespace Istheweb\Connect\Models;

use Model;

/**
 * Company Model
 */
class Company extends Model
{

    // VALIDACIONES
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'istheweb_connect_companies';

    public $rules = [
        'name' => 'required|max:180|min:3',
        'email' => 'email'
    ];

    public $attributeNames = [
        'name' => 'istheweb.connect::lang.fields.name',
        'email' => 'istheweb.connect::lang.fields.email'
    ];

    // PROPIEDADES
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'contacts' => ['Istheweb\Connect\Models\Contact'],
    ];
    public $hasManyThrough = [
        /*'budgets' => [
            'Istheweb\IsCorporate\Models\Budget',
            'through' => 'Istheweb\IsCorporate\Models\Client'
        ],*/
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}