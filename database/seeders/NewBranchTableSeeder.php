<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\Shared\Models\Branch;

class NewBranchTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
        $arrayOfRegions =
                [
                    'ABA Region',
'ABAKALIKI Region',
'ABEOKUTA Region',
'ADO-EKITI Region',
'AGEGE Region',
'AKURE Region',
'APAPA Region',
'ASABA Region',
'AWKA Region',
'BAUCHI Region',
'BENIN Region',
'CALABAR Region',
'DAMATURU Region',
'DUTSE Region',
'ENUGU Region',
'GOMBE Region',
'GUSAU Region',
'GWAGWALADA Region',
'HEADQUARTERS Region',
'IBADAN Region',
'IKEJA Region',
'IKORODU Region',
'ILORIN Region',
'ISLAND Region',
'JAHI Region',
'JALINGO Region',
'JOS Region',
'KADUNA Region',
'KAGINI Region',
'KANO Region',
'KATSINA Region',
'KEBBI Region',
'LAFIA Region',
'LEKKI Region',
'LOKOJA Region',
'MAIDUGURI Region',
'MAINLAND Region',
'MAKURDI Region',
'MARARABA Region',
'MINNA Region',
'NNEWI Region',
'ONITSHA Region',
'ONNE Region',
'OSOGBO Region',
'OTA Region',
'OWERRI Region',
'PORT HARCOURT Region',
'SAPELE Region',
'SATELLITE Region',
'SOKOTO Region',
'TRANS-AMADI Region',
'UMUAHIA Region',
'UYO Region',
'WARRI Region',
'YENAGOA Region',
'YOLA Region',
'ZARIA Region',
                ];

            $regions = collect($arrayOfRegions)->map(function ($region) {
                return ['branch_name' => $region, 'created_at' => now(), 'updated_at' => now()];
            });

            Branch::insert($regions->toArray());
        
    }
}
