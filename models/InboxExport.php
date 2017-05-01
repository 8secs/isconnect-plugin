<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 16/12/16
 * Time: 14:11
 */

namespace istheweb\connect\models;

use Backend\Models\ExportModel;
use Istheweb\Connect\Models\Inbox as ObjectModel;

// EXPORT
class InboxExport extends ExportModel{
    public function exportData($columns, $sessionKey = null)
    {
        $records = ObjectModel::all();
        $records->each(function($record) use ($columns) {
            $record->addVisible($columns);
        });
        return $records->toArray();
    }
}