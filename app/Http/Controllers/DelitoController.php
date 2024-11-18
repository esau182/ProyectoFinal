<?php

namespace App\Http\Controllers;

use App\Models\Delito;
use App\Models\Coordenada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class DelitoController extends Controller
{
    /**
     * Display a listing of the resource.
    */

    public function index()
    {
        Gate::authorize('viewAnything', Auth::user());
        $delitos= Auth::user()->delito;  
        return view('delito.index', compact('delitos'));
    }

    public function mostrarTodosLosDelitos()
    {
        Gate::authorize('viewAnything', Auth::user());
        $delitos = Delito::with('user')->get();
        return view('moderador.VistaMod', compact('delitos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('createDelito', Auth::user());
        return view('delito.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), [
            'tipoDelito' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'latitud' => 'required|regex:/^-?\d{1,3}\.\d+$/',
            'longitud' => 'required|regex:/^-?\d{1,3}\.\d+$/',
            'latitudR' => 'required|regex:/^-?\d{1,3}\.\d+$/',
            'longitudR' => 'required|regex:/^-?\d{1,3}\.\d+$/',
        ]);

        if ($validator->fails()) {
            Toastify()->error('Error al ingresar informacion en la denuncia');
            return back();
        }

        if(Auth::user())
        {
            $delito = new Delito();

            $delito->user_id = Auth::id();
            $delito->tipoDelito = $request->tipoDelito;
            $delito->descripcion = $request->descripcion;
            $delito->fecha = $request->fecha;
            $delito->latitud = $request->latitud;
            $delito->longitud = $request->longitud;

            

            // inicia consulta para buscar si ya se registro la cordenada
            // Buscar si ya existe una coordenada reportada con la misma latitud y longitud
            $coordenadaExistente = Coordenada::where('latitud', $request->latitudR)
                ->where('longitud', $request->longitudR)
                ->first();

            if ($coordenadaExistente) {
                // Si existe, restar 0.1 a la penalización (pero evitar que sea menor a 0)
                $coordenadaExistente->penalizacion = max(0, $coordenadaExistente->penalizacion - 0.1);
                $coordenadaExistente->save();
                $delito->coordenada_id = $coordenadaExistente->id;
            } else {
                // Si no existe, crearla y asignar penalización inicial de 0.6
                $coordenada = new Coordenada();
                $coordenada->latitud=$request->latitudR;
                $coordenada->longitud=$request->longitudR;
                $coordenada->penalizacion = 0.6;
                $coordenada->save();
                $delito->coordenada_id = $coordenada->id;

            }

            $delito->save();

            return redirect()->action([DelitoController::class, 'index']);
        }
        
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Delito $delito)
    {
        //return view('delito.bienvenida');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delito $delito)
    {
        Gate::authorize('editDelito', $delito);
        return view('delito.editar',compact('delito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delito $delito)
    {
        $validator = Validator::make($request->all(), [
            'tipoDelito' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'latitud' => 'required|regex:/^-?\d{1,3}\.\d+$/',
            'longitud' => 'required|regex:/^-?\d{1,3}\.\d+$/',
            'latitudR' => 'required|regex:/^-?\d{1,3}\.\d+$/',
            'longitudR' => 'required|regex:/^-?\d{1,3}\.\d+$/',
        ]);

        if ($validator->fails()) {
            Toastify()->error('Error al ingresar informacion en la denuncia');
            return back();
        }

        if(Auth::user())
        {
            $coordenadaAnterior = Coordenada::findOrFail($delito->coordenada_id);

            $delito->tipoDelito = $request->tipoDelito;
            $delito->descripcion = $request->descripcion;
            $delito->fecha = $request->fecha;
            $delito->latitud = $request->latitud;
            $delito->longitud = $request->longitud;

            // inicia consulta para buscar si ya se registro la cordenada
            // Buscar si ya existe una coordenada reportada con la misma latitud y longitud
            $coordenadaExistente = coordenada::where('latitud', $request->latitudR)
                ->where('longitud', $request->longitudR)
                ->first();

            
            if ($coordenadaExistente) {
                if ($coordenadaExistente!=$coordenadaAnterior){
                    // Si existe y es diferente al anterior, restar 0.1 a la penalización (pero evitar que sea menor a 0)
                    $coordenadaExistente->penalizacion = max(0, $coordenadaExistente->penalizacion - 0.1);
                    $coordenadaExistente->save();
                    $delito->coordenada_id=$coordenadaExistente->id;
                    if($coordenadaAnterior->penalizacion == 0.6) {
                        $coordenadaAnterior->delete();
                    }
                    else {                     
                        $coordenadaAnterior->penalizacion = $coordenadaAnterior->penalizacion + 0.1;
                        $coordenadaAnterior->save();
                    }
                }
            } else {
                // Si no existe, crearla y asignar penalización inicial de 0.6
                $coordenada = new coordenada();
                $coordenada->latitud=$request->latitudR;
                $coordenada->longitud=$request->longitudR;
                $coordenada->penalizacion = 0.6;
                $coordenada->save();
                $delito->coordenada_id=$coordenada->id;
                if($coordenadaAnterior->penalizacion == 0.6) {
                    $coordenadaAnterior->delete();
                }
                else {                     
                    $coordenadaAnterior->penalizacion = $coordenadaAnterior->penalizacion + 0.1;
                    $coordenadaAnterior->save();
                }
            }

            $delito->save();

            return redirect()->action([DelitoController::class, 'index']);
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delito $delito)
    {
        Gate::authorize('destroyDelito', $delito);
        $coordenadaAnterior = Coordenada::findOrFail($delito->coordenada_id);
        if($coordenadaAnterior->penalizacion == 0.6) {
            $coordenadaAnterior->delete();
        }
        else {                     
            $coordenadaAnterior->penalizacion = $coordenadaAnterior->penalizacion + 0.1;
            $coordenadaAnterior->save();
        }
        $delito->delete();
        toastify()->success('Delito eliminado');
        return back();
    }
}
