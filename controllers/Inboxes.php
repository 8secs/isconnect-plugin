<?php namespace Istheweb\Connect\Controllers;

use BackendMenu;
use Lang;
use Flash;
use Backend\Classes\Controller;
use Istheweb\Connect\Models\Company;
use Istheweb\Connect\Models\Contact;
use Istheweb\Connect\Models\Inbox;

/**
 * Inboxes Back-end Controller
 */
class Inboxes extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Istheweb.Connect.Behaviors.DeleteList',
        'Backend\Behaviors\ImportExportController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_migration.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Istheweb.Connect', 'connect', 'inboxes');
    }

    // METODOS
    public function listInjectRowClass($record, $definition = null){
        if ($record->status != 0)
            return 'safe disabled';
    }

    public function index_onArchive(){
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $itemId) {
                if (!$item = Inbox::find($itemId))
                    continue;

                $item->status = 1;
                $item->save();
            }

            Flash::success(Lang::get('istheweb.connect::lang.archive_msj'));
        } else {
            Flash::error(Lang::get('istheweb.connect::lang.archive_error'));
        }

        return $this->listRefresh();
    }

    public function index_onConvertContact(){
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $itemId) {
                if (!$item = Inbox::find($itemId))
                    continue;

                $contact = new Contact();
                $contact->name = $item->name;
                $contact->email = $item->email;
                $contact->phone = $item->phone;

                if($item->company){
                    $company = new Company();
                    $company->name = $item->company;
                    $company->save();

                    $contact->company_id = $company->id;
                }

                $contact->save();

                $item->status = 1;
                $item->save();
            }

            Flash::success(Lang::get('istheweb.connect::lang.inbox.convert_msj'));
        } else {
            Flash::error(Lang::get('istheweb.connect::lang.inbox.convert_error'));
        }

        return $this->listRefresh();
    }

    public function index_onConvertCompany(){
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $itemId) {
                if (!$item = Inbox::find($itemId))
                    continue;

                if($item->company){
                    $company = new Company();
                    $company->name = $item->company;
                    $company->email = $item->email;
                    $company->phone = $item->phone;
                    $company->save();
                }else{
                    Flash::error(Lang::get('istheweb.connect::lang.inbox.convert_error'));
                }

                $item->status = 1;
                $item->save();
            }

            Flash::success(Lang::get('istheweb.connect::lang.inbox.convert_msj'));
        } else {
            Flash::error(Lang::get('istheweb.connect::lang.inbox.convert_error'));
        }

        return $this->listRefresh();
    }
}