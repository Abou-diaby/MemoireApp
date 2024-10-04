<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client as TwilioClient;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $demands = Demand::all(); // Obtenir toutes les demandes
        return view('admin.dashboard', ['demands' => $demands]);
    }
    public function show($id)
{
    $demand = Demand::findOrFail($id);

    if (!$demand) {
        return redirect('/demands')->with('error', 'Demande non trouvée');
    }

    return view('admin.show', ['demand' => $demand]);
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email',
        'tel' => 'required|string|max:15',
        'matricule' => 'required|string|max:20',
        'class' => 'required|string|max:255',
        'parcours' => 'required|string|max:255',
        'session' => 'required|string|max:255',
        'theme' => 'required|string|max:255',
        'problematique' => 'required|string',
        'objectif_general' => 'required|string',
        'objectifs_specifiques' => 'required|string',
        'resultats_attendus' => 'required|string',
        'remarks' => 'nullable|string',
    ]);

    $demand = Demand::findOrFail($id);
    $demand->name = $request->name;
    $demand->lastname = $request->lastname;
    $demand->email = $request->email;
    $demand->tel = $request->tel;
    $demand->matricule = $request->matricule;
    $demand->class = $request->class;
    $demand->parcours = $request->parcours;
    $demand->session = $request->session;
    $demand->theme = $request->theme;
    $demand->problematique = $request->problematique;
    $demand->objectif_general = $request->objectif_general;
    $demand->objectifs_specifiques = $request->objectifs_specifiques;
    $demand->resultats_attendus = $request->resultats_attendus;
    $demand->remarks = $request->remarks;

    $demand->save();

    return redirect()->route('admin.show', $demand->id)->with('success', 'Demande mise à jour avec succès');
}
    public function accept(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $demand->response = 'accepté';
        $demand->save();

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $twilio = app(TwilioClient::class, [$sid, $token]);

        $message = $twilio->messages
                            ->create('+225' . $demand->tel,[
                                'from' => env('TWILIO_PHONE_NUMBER'),
                                'body' => 'Votre demande a été traitée'
                            ]);

        return redirect()->route('admin.dashboard')->with('success', 'Demande acceptée avec succès.');
    }

    public function reject(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $demand->response = 'rejeté';
        $demand->remarks = $request->input('remarks');
        $demand->save();

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $twilio = app(TwilioClient::class, [$sid, $token]);

        $message = $twilio->messages
                            ->create('+225' . $demand->tel,[
                                'from' => env('TWILIO_PHONE_NUMBER'),
                                'body' => 'Votre demande a été traitée'
                            ]);

        return redirect()->route('admin.dashboard')->with('success', 'Demande rejetée avec succès.');
    }
}

