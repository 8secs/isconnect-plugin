<?php
/**
 * Created by PhpStorm.
 * User=> andres
 * Date=> 26/03/17
 * Time=> 13=>00
 */

namespace Istheweb\Connect\Updates;


use Istheweb\Connect\Models\CompanySettings;
use October\Rain\Database\Updates\Seeder;

class SeedTables extends Seeder
{
    public function run()
    {
        CompanySettings::set([
            "name"=>"Istheweb",
            "slogan"=>"Simplemente la red",
            "address"=>"",
            "phone"=>"",
            "email"=>"soporte@istheweb.com",
            "company_name_nid"=>"XTR",
            "company_nid"=>"",
            "social"=>[],
            "is_year_invoice"=>"1",
            "reset_year_invoice"=>"1",
            "invoice_number"=>"20000000",
            "legal_invoice_text"=>"",
            "footer_invoice_text"=>"",
            "position_year_number"=>"before",
            "website"=>"https://istheweb.com"
        ]);
    }

}