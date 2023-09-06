<?php

use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MedecinController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\OperationController;
use App\Http\Controllers\Api\ConsultationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('patients', PatientController::class);
Route::resource('consultations', ConsultationController::class);
Route::get('consultations/{criteria}/{value}',[ ConsultationController::class,'show']);
Route::get('consultations/dates/{criteria}/{value}/{dateDebut}/{dateFin}',[ ConsultationController::class,'getConsultationsByDate']);
Route::resource('medecins', MedecinController::class);
Route::resource('operations', OperationController::class);
Route::post('operations/{numeroConsultation}', [OperationController::class,'store']);
Route::post('/login/{role}', [LoginController::class,'login']);
Route::resource('employes', LoginController::class);