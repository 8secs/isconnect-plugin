<?php namespace Istheweb\Connect\Controllers;

use BackendMenu;
use Istheweb\Connect\Models\Calendar;
use Istheweb\Connect\Models\Event;
use Lang;
use Flash;
use Backend\Classes\Controller;

/**
 * Events Back-end Controller
 */
class Events extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Istheweb.Connect.Behaviors.DeleteList'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Istheweb.Connect', 'connect', 'events');
    }

    public function index(){
        $this->vars['calendars'] = Calendar::all();

        $this->addCss('/plugins/istheweb/connect/assets/css/timeline.css');
        $this->addCss('/plugins/istheweb/connect/assets/css/calendar.css');

        $this->addJs('/plugins/istheweb/connect/assets/js/moment.min.js');
        $this->addJs('/plugins/istheweb/connect/assets/js/jquery-ui.min.js');
        $this->addJs('/plugins/istheweb/connect/assets/js/timeline.min.js');

        $this->pageTitle = Lang::get('istheweb.connect::lang.menu.events');

        $this->asExtension('ListController')->index();
    }

    public function listView(){
        $this->asExtension('ListController')->index();

        return $this->makePartial('list');
    }

    public function onChangeDate(){
        $start = strtotime("-1 month", strtotime(post('start_date')));
        $end = strtotime("+1 month", strtotime(post('end_date')));
        $events = Event::whereBetween('end_date', [
            date('Y-m-d H:i:s', $start),
            date('Y-m-d H:i:s', $end)
        ])->get();

        return [
            'start_date' =>  date('Y-m-d H:i:s',$start),
            'end_date' => date('Y-m-d H:i:s',$end),
            'items'=> $events
        ];
    }
}