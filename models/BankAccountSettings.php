<?php namespace Istheweb\Connect\Models;

use Model;

/**
 * BankAccountSettings Model
 */
class BankAccountSettings extends Model
{

    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'istheweb_system_bank_accounts_settings';
    public $settingsFields = 'fields.yaml';

}