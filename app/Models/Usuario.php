<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_app_usuarios';

    protected $primaryKey = 'usuario_id';

    public $timestamps = false;

    protected $fillable = [
        'usuario,nombre_completo,activo,usuario_creador,fecha_creacion,usuario_modificador,fecha_modificacion'
    ];

    public function crud_usuarios(Request $request, $evento) {
        $db = DB::select("exec pr_crud_app_usuarios ?,?,?,?,?,?,?",
                        [
                            $evento,
                            $request->input('usuario_id'),
                            $request->input('usuario'),
                            $request->input('nombre_completo'),
                            $request->input('email'),
                            $request->input('activo') == true ? 'S' : 'N',
                            $request->input('usuario1')
                        ]);
        return $db;
    }

    public function getLoginUsuario($usuario) {
        $result = DB::select("exec pr_get_login_usuario ?", array($usuario));

        return $result;
    }
}
