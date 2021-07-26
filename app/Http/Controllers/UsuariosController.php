<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DataTables;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use Alert;
use Mail;
use PDF;


class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios           = Usuarios::where('estatus',1)->get();
        $departamentos  = [
            1=>'RH',
            2=>'Soporte'
        ];
        $centros  = [
            1=>'Saladita',
            2=>'Escuinapan'
        ];
        return view('usuarios.index', compact('usuarios', 'departamentos', 'centros'));
    }

    public function datatable()
    {
        $usuarios = Usuarios::where('estatus',1)->get();

        return DataTables::of($usuarios)->editColumn('id', function($usuario){
            $respuesta = '';
                if(Auth::user()->tiene_permiso( Auth::user()->id , 3033 )){
                    $respuesta .= '<a href="'. url('usuarios/edit/'.Hashids::encode($usuario->id)) .'" class=" list-inline-item"> <i class="uil uil-pen font-size-18"></i></a>';
                }
                if(Auth::user()->tiene_permiso( Auth::user()->id , 3034 )){
                    $respuesta .= '<a href="'. url('usuarios/destroy/'.  Hashids::encode($usuario->id) ) .'" style="color:red;"  onclick="return confirm(`Eliminar usuario?`)" class="list-inline-item " title="eliminar"><i class="fa fa-trash font-size-18"></i> </a>';
                }

            return $respuesta;

        })->editColumn('departamento', function($usuario){
            return  ($usuario->departamento)?$usuario->departamentos->descripcion:'sn';

        })
        ->editColumn('estatus', function($usuario){
            return  ($usuario->estatus==1)?"Activo":'Inactivo';

        })->escapeColumns([])->make(TRUE);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:usuarios,email'
        ]);
        if ($validator->fails()) {
        Alert::warning('Usuario', 'Correo Ya Existe ');

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $usuario =Usuarios::create([
            'nombre'                    => $request['nombre'],
            'centro'                    => $request['centro_id'],
            'email'                     => $request['email'],
            'password'                  => Hash::make($request['password']),
            'departamento'              => ($request['departamento_id'])?1:0,
        ]);

        Alert::success('Usuario', 'Creado Correctamente ');
        return redirect('usuarios');
    }

    public function editar($hash)
    {

        $id                     = Hashids::decode($hash);
        $usuario                = Usuarios::find($id)[0];
        $departamentos  = [
            1=>'RH',
            2=>'Soporte'
        ];
        $centros  = [
            1=>'Saladita',
            2=>'Escuinapan'
        ];
        return view('usuarios.editar',compact('id','usuario','departamentos','centros'));

    }


    public function update(Request $req)
    {
        //dd($req->all());
        $usuario = Usuarios::find($req->id);

        if(!empty( trim($req->password) )){
            $usuario->password   = Hash::make($req->password);
            $usuario->save();
            }
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:usuarios,email,'. $usuario->id,
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        Usuarios::where('id',$req->id)->update(array(
            //'encargado_departamento'    => ($req['encargado_departamento'])? $req['encargado_departamento']:0,
            'nombre'                    => $req['nombre'],
            'centro'                    => $req['centro'],
            'departamento'              => $req['departamento'],
            'email'                     => $req['email'],
        ));
        //$permisos = $req->except('_method','_token','id','nombre','centro','departamento','email','password');
        //$usuario->borrar_permisos();
        //foreach($permisos as $permiso => $valor) {
        //     if ($valor != 0 ) {
        //          $usuario->crear_permiso($usuario->id,$permiso);
        //     }
        // }

        Alert::success('Usuario', 'Actualizado Correctamente ');

        return redirect('usuarios');
    }

    public function destroy($hash)
    {

        $id = Hashids::decode($hash);
        $usuario_log = Auth::user()->id;
        $usuario = Usuarios::find($id[0]);

        if($usuario_log == $usuario->id){
            Alert::warning('Usuario','En Sesión');
            return redirect('usuarios');
        }
            $usuario->estatus =0;
            $usuario->email = Str::random(12);
            $usuario->save();
            Alert::success('Usuario','Eliminado Correctamente');
            return redirect('usuarios');
    }

    public function reportepdf()
    {

        $usuarios = Usuarios::where('estatus',1)->get();

        $empresa  =  Transportistas::find( Auth::user()->transportistas_actual );
        $pdf = PDF::loadView('usuarios.reporte_pdf', compact('usuarios','empresa'))
        ->setOption("margin-bottom",'15')
        ->setOption("margin-left",'10')
        ->setOption("margin-right",'10')
        ->setOption("margin-top",'10')
        ->setOption("orientation",'Portrait')
        ->setOption("page-size",'Letter')
        ->setOption("footer-font-size",8)
        ->setOption("footer-right", "Pg. [page] de [toPage]")
        ->setOption("footer-left","www.databus21.mx");

        return $pdf->stream('usuarios.pdf');
    }


}
