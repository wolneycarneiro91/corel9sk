<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    public function run()
    {
        $db = new DB();
        try {
            $db::beginTransaction();
            $db::table('users')->insert([
                'name' => 'administrador',
                'email' => 'administrador@adm.pmc.com.br',
                'password' => bcrypt('#$Admin789'),
                'role_id' => 1
            ]);
            $db::table('users')->insert([
                'name' => 'consultor',
                'email' => 'consultor@cns.pmc.com.br',
                'password' => bcrypt('#$Consult789'),
                'role_id' => 2
            ]);
            $db::commit();
        } catch (\Exception $e) {
            $db::rollback();
            exit('Erro ao rodar seed ' . $e);
        }
    }
}
