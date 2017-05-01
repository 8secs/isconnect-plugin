<?php namespace Istheweb\Connect\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Companies Back-end Controller
 */
class Companies extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend\Behaviors\ImportExportController',
        'Istheweb\Connect\Behaviors\DeleteList',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_migration.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Istheweb.Connect', 'connect', 'companies');
    }
}