<?php

namespace App\Http\Controllers\Api;

use App\Models\Employe;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request,$role)
    {
        if ($role === 'patient') {
            // return response()->json(['message' => $patient->Email,'message2' => $request->email]);
            $patient = Patient::where('CIN',$request->cin)->first();
            if ($patient) {
                if ($patient->Email == $request->email){
                    return response()->json(['message' => 'connected']);
                } else {
                    return response()->json(['message' => 'Email incorrect']);
                }
            } else {
                return response()->json(['message' => 'Patient n\'existe pas']);
                
            }
        }
        $employe = Employe::find($request->matricule);
        if ($employe) {
            if($employe->code === $request->code) {
                return response()->json(['role' => $employe->typeEmploi,'message'=>'connected']);
            } else {
                return response()->json(['message'=>"Code d'accès invalide"]);
            }
        }
            return response()->json(['message' => "Employe n'existe pas"]);
    }
    public function index()
    {
        $employes = Employe::cursor();
        return response()->json(['employes' => $employes]);
    }

    public function addEmploye(Request $request) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employe = Employe::create($request->all());
        $matricule = $employe->Matricule;
        return response()->json(compact('matricule'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
