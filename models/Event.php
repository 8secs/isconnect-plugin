<?php namespace Istheweb\Connect\Models;

use Model;
use Str;
use Html;
use ValidationException;

/**
 * Event Model
 */
class Event extends Model
{
    // VALIDACIONES
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'name' => 'required|max:180|min:3',
        'calendar' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    public $attributeNames = [
        'name' => 'istheweb.connect::lang.fields.name',
        'calendar' => 'istheweb.connect::lang.fields.calendar',
        'start_date' => 'istheweb.connect::lang.fields.start_date',
        'end_date' => 'istheweb.connect::lang.fields.end_date'
    ];

    // TRASLATABLE
    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['name'];

    // PROPIEDADES
    public $timestamps = false;
    public $table = 'istheweb_connect_events';
    protected $primaryKey = 'id';
    protected $dates = ['start_date','end_date'];
    protected $appends = ['summary'];
    protected $guarded = [];
    protected $jsonable = [];
    protected $fillable = [];
    protected $visible = [];

    // RELACIONES
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'calendar' => ['Istheweb\Connect\Models\Calendar']
    ];
    public $belongsToMany = [];

    // FUCIONES
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];

    // ADJUNTOS Y ARCHIVOS
    public $attachOne = [
        'featured' => ['System\Models\File'],
    ];
    public $attachMany = [
        'pictures' => ['System\Models\File'],
    ];

    public function getSummaryAttribute(){
        $more = '<!-- more -->';
        if (strpos($this->description, $more) !== false) {
            $parts = explode($more, $this->description);
            return array_get($parts, 0);
        }

        return Str::limit(Html::strip($this->description), 200);
    }

}