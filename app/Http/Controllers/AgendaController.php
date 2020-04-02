<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use function GuzzleHttp\Promise\all;

class AgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');

        //$variablesurl = $request->all();

        //$variablesurl  = $request->input();

        /*$variablesurl = [
            'tipo' => $tipo,
            'buscarpor' => $buscar
        ];*/

        //$variablesurl = $request->query();

        //$variablesurl = $request->only(['tipo', 'buscarpor']);

        //$variablesurl = $_GET;

        $agenda = Agenda::buscarpor($tipo, $buscar)->paginate(5);//todos los registros d

        return view('agenda.index', compact('agenda'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return dd($request);
        $agenda = new Agenda;
        //cuando instanciamos agenda, laravel sabe que tiene que leer de la migracion agenda
        $agenda->nombres = $request->nombres;
        $agenda->apellidos = $request->apellidos;
        $agenda->telefono = $request->telefono;
        $agenda->movil = $request->celular;
        $agenda->sexo = $request->sexo;
        $agenda->email = $request->email;
        $agenda->posicion = $request->posicion;
        $agenda->departamento = $request->departamento;
        $agenda->salario = $request->salario;
        $agenda->fechadenacimiento = $request->fechadenacimiento;
        //hemos instanciado un modelo y asignado todos los campos
        $agenda->save();
        //esto lo sube a la BBDD
        return redirect()->route('agenda.index')->with('datos', 'Registro guardado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->nombres = $request->nombres;
        $agenda->apellidos = $request->apellidos;
        $agenda->telefono = $request->telefono;
        $agenda->movil = $request->celular;
        $agenda->sexo = $request->sexo;
        $agenda->email = $request->email;
        $agenda->posicion = $request->posicion;
        $agenda->departamento = $request->departamento;
        $agenda->salario = $request->salario;
        $agenda->fechadenacimiento = $request->fechadenacimiento;
        //hemos instanciado un modelo y asignado todos los campos
        $agenda->save();
        //esto lo sube a la BBDD
        return redirect()->route('agenda.index')->with('datos', 'Registro actualizado correctamente.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        return redirect()->route('agenda.index')->with('datos', 'Registro eliminado correctamente.');

    }

    public function confirm($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.confirm', compact('agenda'));
    }
}
