<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demand;
use Illuminate\Support\Facades\Auth;



class DemandController extends Controller
{
    // Afficher le formulaire pour créer une nouvelle demande
    public function create()
    {
        return view('demands.create'); // Vue pour le formulaire de demande
    }

    // Enregistrer une nouvelle demande
    public function store(Request $request)
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
        ]);

        $themeUsageCount = Demand::where('theme', $request->theme)->count();
         if ($themeUsageCount >= 2) {
        return redirect()->back()->with('error', 'Le thème est déjà utilisé par deux étudiants.');
        }

        $user = Auth::user();
        Demand::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'tel' => $request->tel,
        'matricule' => $request->matricule,
        'class' => $request->class,
        'parcours' => $request->parcours,
        'session' => $request->session,
        'theme' => $request->theme,
        'problematique' => $request->problematique,
        'objectif_general' => $request->objectif_general,
        'objectifs_specifiques' => $request->objectifs_specifiques,
        'resultats_attendus' => $request->resultats_attendus,
        'response' => 'En attente',
        'date' => now(),
        'user_id' =>$user->id,
        ]);

        return redirect('home.dashboard')->with('success', 'Demande créée avec succès');
    }

    // Afficher les détails d'une demande
    public function show($id)
{
    $demand = Demand::findOrFail($id);

    if (!$demand) {
        return redirect('/demands')->with('error', 'Demande non trouvée');
    }

    return view('demands.show', ['demand' => $demand]);
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

    $demand->save();

    return redirect('/demands/' . $demand->id)->with('success', 'Demande mise à jour avec succès');
}
    public function destroy(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $demand->delete();

        return redirect('/login')->with('success', 'Demande supprimée avec succès');
    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
{
    $user = Auth::user();
    if (!$user) {
        return redirect('/login')->with('error', 'Veuillez vous connecter.');
    }

    // Récupérez les demandes de cet utilisateur
    $demands = Demand::where('user_id', $user->id)->get();
    return view('home.dashboard', ['demands' => $demands]);
}


}
