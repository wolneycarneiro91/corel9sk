<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicaModeloSeeder extends Seeder
{
    public function run()
    {
        $db = new DB();
        $db::beginTransaction();
        try {
            $db::table('modelos')->insert([
                'name' => 'musicas',
            ]);
            $model_id               = $db::table('modelos')->where('name', 'musicas')->value('id');
            $administrador_role_id  = $db::table('roles')->where('name', 'Administrador')->value('id');
            $consultor_role_id      = $db::table('roles')->where('name', 'Consultor')->value('id');
            $cadastrar_id           = $db::table('permissions')->where('name', 'Cadastrar')->value('id');
            $consultar_id           = $db::table('permissions')->where('name', 'Consultar')->value('id');
            $editar_id              = $db::table('permissions')->where('name', 'Editar')->value('id');
            $excluir_id             = $db::table('permissions')->where('name', 'Excluir')->value('id');            
            //criar foreach
            $db::table('model_has_role_permissions')->insert([
                'model_id' =>  $model_id,
                'role_id' =>  $administrador_role_id,
                'permission_id' =>  $cadastrar_id,
            ]);
            $db::table('model_has_role_permissions')->insert([
                'model_id' =>  $model_id,
                'role_id' =>  $administrador_role_id,
                'permission_id' =>  $consultar_id,
            ]);
            $db::table('model_has_role_permissions')->insert([
                'model_id' =>  $model_id,
                'role_id' =>  $administrador_role_id,
                'permission_id' =>  $editar_id,
            ]);
            $db::table('model_has_role_permissions')->insert([
                'model_id' =>  $model_id,
                'role_id' =>  $administrador_role_id,
                'permission_id' =>  $excluir_id,
            ]);
            $db::table('model_has_role_permissions')->insert([
                'model_id' =>  $model_id,
                'role_id' =>  $consultor_role_id,
                'permission_id' =>  $consultar_id,
            ]);
            $db::commit();
        } catch (\Exception $e) {
            $db::rollback();
            exit('Erro ao rodar seed ' . $e);
        }
    }
}
