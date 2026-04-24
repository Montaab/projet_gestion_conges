<?php

namespace App\Http\Controllers;
use App\Models\DemandeConge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Importez la façade Auth
use Barryvdh\DomPDF\Facade\Pdf;

class LeaveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function liste_demande()
    {
        $user = auth()->user(); // Récupérer l'utilisateur authentifié
    
        // Vérifier si l'utilisateur est un manager ou un employé
        if ($user->role === 'manager') {
            // Le manager voit les demandes de ses employés
            $demandes = DemandeConge::where('matriculemanager', $user->matricule)->get();
        } else if ($user->role === 'employe') {
            // L'employé voit seulement ses propres demandes
            $demandes = DemandeConge::where('userid', $user->id)->get();
        } else {
            // Pour les autres cas (par exemple un super-admin, ou un cas par défaut)
            $demandes = DemandeConge::with('user')->get(); // Charge la relation 'user' avec chaque demande
        }
    
        return view('demande.liste_demande', compact('demandes'));
    }
    


    public function liste_demande1()
    {
        $user = auth()->user(); // Récupérer l'utilisateur authentifié

   // Vérifier si l'utilisateur est un manager ou un employé
   if ($user->role === 'manager') {
    // Le manager voit les demandes de ses employés
    $demandes = DemandeConge::where('matriculemanager', $user->matricule)->get();
} else if ($user->role === 'employe') {
    // L'employé voit seulement ses propres demandes
    $demandes = DemandeConge::where('userid', $user->id)->get();
} else {
    // Pour les autres cas (par exemple un super-admin, ou un cas par défaut)
    $demandes = DemandeConge::with('user')->get(); // Charge la relation 'user' avec chaque demande
}

    // Passer la variable $demandes à la vue

        return view('demande.liste', compact('demandes'));
    }

    public function ajouter_demande()
    {
        $managers = User::where('role', 'manager')->get();
        return view('demande.ajoute_demande',compact('managers'));
    }
    public function modifier_demande($id)
    {
        $demande= DemandeConge::find($id);

        return view('demande.modifier_demande', compact('demande'));
    }


    
    public function ajouter_conge_traitement(Request $request)
    {
        // Validation des données
        $request->validate([
            'userid' => 'nullable|string',
            'matriculemanager' => 'required|string|min:1|max:255',
            'duree' => 'required|integer|min:1',
            'titre' => 'required|string|min:3|max:255',
            'datedebut' => 'required|date',
            'datefin' => 'required|date',
            'adresse' => 'required|string|min:3|max:255',
            'typeConge' => 'required|string',
            'status' => 'nullable|string',
            'remarque' => 'nullable|string|max:255',

        ], );

        // Création d'une nouvelle demande de congé
        $demandeConge = new demandeconges();
        $demandeConge->userid = Auth::user()->id;
        $demandeConge->matriculemanager = $request->matriculemanager;
        $demandeConge->duree = $request->duree;
        $demandeConge->titre = $request->titre;
        $demandeConge->datedebut = $request->datedebut;
        $demandeConge->datefin = $request->datefin;
        $demandeConge->adresse = $request->adresse;
        $demandeConge->typeConge = $request->typeConge;
        $demandeConge->status = $request->status ?? 'en cours';
        $demandeConge->remarque = $request->remarque ?? 'Aucune remarque';



        // Sauvegarde de la demande de congé
        $demandeConge->save();

        // Redirection après avoir ajouté la demande de congé
        return redirect('/liste_demande')->with('status', 'Demande de congé ajoutée avec succès.');
    }
    public function modifier_conge_traitement(Request $request)
    {
        // Validation des données
        $request->validate([
            'userid' => 'nullable|string',
            'matriculemanager' => 'required|string|min:1|max:255',
            'duree' => 'required|integer|min:1',
            'titre' => 'required|string|min:3|max:255',
            'datedebut' => 'required|date',
            'datefin' => 'required|date',
            'adresse' => 'required|string|min:3|max:255',
            'typeConge' => 'required|string',
            'status' => 'required|string',
        ], );

        // Création d'une nouvelle demande de congé
        $demandeConge =  DemandeConge::find($request->id);

        $demandeConge->matriculemanager = $request->matriculemanager;
        $demandeConge->duree = $request->duree;
        $demandeConge->titre = $request->titre;
        $demandeConge->datedebut = $request->datedebut;
        $demandeConge->datefin = $request->datefin;
        $demandeConge->adresse = $request->adresse;
        $demandeConge->typeConge = $request->typeConge;
        $demandeConge->status = $request->status;

        // Sauvegarde de la demande de congé
        $demandeConge->update();

        // Redirection après avoir ajouté la demande de congé
        return redirect('/liste_demande')->with('status', 'Demande de congé ajoutée avec succès.');
    }



    public function supprimer_demande($id)
    {
        $demandes= DemandeConge::find($id);
        $demandes->delete();
        return redirect('/liste_demande')->with('status', 'Demande de congé supprimé avec succès.');

        
    }


    public function modifierStatutDemande(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|in:en cours,accepté,refusé',
        'remarque' => 'nullable|string|max:255',
    ]);

    $demande = DemandeConge::findOrFail($id);
    $demande->status = $request->status;
    $demande->remarque = $request->remarque;
    $demande->save();

    return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
}

public function exportPdf($id)
{
    $demande = DemandeConge::findOrFail($id);
    $pdf = Pdf::loadView('demande.pdf', compact('demande'));
    return $pdf->download('demande_' . $demande->id . '.pdf');
}

}
