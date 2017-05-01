<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 16/12/16
 * Time: 14:07
 */

namespace istheweb\connect\models;

// LIBRERIAS
use Backend\Models\ExportModel;
use Istheweb\Connect\Models\Contact as ObjectModel;

class ContactExport extends ExportModel{

    // EXPORT METHOD
    public function exportData($columns, $sessionKey = null)
    {
        $records = ObjectModel::all();
        $records->each(function($record) use ($columns) {
            $record->addVisible($columns);
        });
        return $records->toArray();
    }

}