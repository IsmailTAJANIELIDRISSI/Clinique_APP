<?php

namespace App\Http\Controllers\Api;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::all();
        return response()->json(['consultations' => $consultations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $consultation = Consultation::where('Date',$request->Date)->first();
        // if ($consultation) {
        //     return response()->json(['message' => 'Désolé, la date que vous avez sélectionnée est déjà réservée. Veuillez choisir une autre date']);
        // }
        $consultation = Consultation::create($request->all());

        return response()->json(['message' => 'success','consultation' => $consultation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($criteria,$value)
    {
        // return [$criteria,$value];
        if ($criteria == "patient") {
            $consultations = Consultation::where('Numero',(int)$value)->get();
        } elseif ($criteria == "medecin") {
            $consultations = Consultation::where('Matricule',(int)$value)->get();
        } else {
            $consultations = Consultation::where('Date',$value)->get();

        }
        return response()->json(compact('consultations'));
    }

    public function getConsultationsByDate($criteria,$value,$dateDebut,$dateFin) {
        if ($criteria == "patient") {
            $consultations = Consultation::where('Numero',(int)$value)->whereBetween('Date',[$dateDebut,$dateFin])->get();
        } else {
            $consultations = Consultation::where('Matricule',(int)$value)->whereBetween('Date',[$dateDebut,$dateFin])->get();
        }

        return response()->json(compact('consultations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $numero)
    {
        $consultation = Consultation::find($numero);
        $newc = $consultation->update($request->all());
        return response()->json(compact('newc'));
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
