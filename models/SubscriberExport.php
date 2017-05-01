<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 16/12/16
 * Time: 14:14
 */

namespace istheweb\connect\models;

// LIBRERIAS
use Backend\Models\ExportModel;
use Istheweb\Connect\Models\Subscriber as ObjectModel;

// EXPORT
class SubscriberExport extends ExportModel{
    public function exportData($columns, $sessionKey = null)
    {
        $records = ObjectModel::all();
        $records->each(function($record) use ($columns) {
            $record->addVisible($columns);
        });
        return $records->toArray();
    }
}