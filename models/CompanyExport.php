<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 16/12/16
 * Time: 13:56
 */

namespace Istheweb\Connect\Models;

use Backend\Models\ExportModel;
use Istheweb\Connect\Models\Company as ObjectModel;

class CompanyExport extends ExportModel
{
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