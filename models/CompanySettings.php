<?php namespace Istheweb\Connect\Models;

use October\Rain\Database\Model as BaseModel;

/**
 * CompanySettings Model
 */
class CompanySettings extends BaseModel
{

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'istheweb_system_company_settings';
    public $settingsFields = 'fields.yaml';
    public $attachOne = [
        'logo' => ['System\Models\File'],
    ];

    public function getLogoBase64(){
        $type = pathinfo($this->logo->path, PATHINFO_EXTENSION);
        $data = file_get_contents(base_path().$this->logo->path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    public function getIconBase64($icon){
        $type = pathinfo('/plugins/istheweb/connect/assets/img/'.$icon.'.png', PATHINFO_EXTENSION);
        $data = file_get_contents(base_path().'/plugins/istheweb/connect/assets/img/'.$icon.'.png');
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

}