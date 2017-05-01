<?php namespace Istheweb\Connect\Models;

use istheweb\connect\classes\slack\ApiClient;
use istheweb\connect\classes\slack\Channel;
use Maknz\Slack\Facades\Slack;
use Model;

/**
 * Calendar Model
 */
class Calendar extends Model
{
    // VALIDACIONES
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'name' => 'required|max:180|min:3',
    ];

    public $attributeNames = [
        'name' => 'istheweb.connect::lang.fields.name',
    ];

    // TRASLATABLE
    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['name'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'istheweb_connect_calendars';

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
        'events' => ['Istheweb\Connect\Models\Event'],
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function afterCreate()
    {
        //Slack::send('Hello Calendar');
        $loop = \React\EventLoop\Factory::create();

        $client = new \Slack\RealTimeClient($loop);
        $client->setToken('xoxp-139821881159-139821881239-138483383489-6e1123867657bf563f1f40298b5d69f7');

        /*
        $client->getChannelById('C436FBWPP')->then(function (\Slack\Channel $channel) use ($client) {
            $client->send('Hello from PHP!', $channel);
        });*/

        // disconnect after first message
        $client->on('message', function ($data) use ($client) {
            print_r(dump("Someone typed a message: ".$data['text']."\n"));
            $client->disconnect();
        });

        $client->connect()->then(function () {
            print_r(dump("Connected!\n"));
        });

        $loop->run();

    }

}