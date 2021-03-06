<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 16/12/16
 * Time: 13:56
 */

namespace Istheweb\Connect\Models;


use Backend\Models\ImportModel;
use Istheweb\Connect\Models\Company as ObjectModel;

class CompanyImport extends ImportModel
{

    // VALIDACIONES
    public $rules = [
        'name' => 'required|max:180|min:3',
        'email' => 'required|email|unique:istheweb_connect_contacts'
    ];

    // IMPORT METHOD
    public function importData($results, $sessionKey = null){
        foreach ($results as $row => $data) {

            try {
                $record = new ObjectModel;
                $record->fill($data);
                $record->save();

                $this->logCreated();
            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}