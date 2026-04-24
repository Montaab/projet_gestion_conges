<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Importez la façade Auth

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function liste_utilisateur()
    {
        $users = User::all();

        return view('RH.liste_user', compact('users'));
    }
    public function ajouter_utilisateur()
    {
        return view('RH.ajoute_user');
    }
    public function modifier_utilisateur($id)
    {
        $users= User::find($id);

        return view('RH.modifier_user',compact('users'));
    }





    public function ajouter_utilisateur_traitement(Request $request){
        $request->validate([
           'soussigne' => 'required|string|min:2|max:255',
            'matricule' => 'required|string|min:5|max:5|unique:users,matricule',
            'role' => 'required|string',
            'grade' => 'required|string|min:8|max:20',

            'password' => 'required|string|min:8|max:8|confirmed',
            'daterecrutement' => 'required|date',
        ], [
            'matricule.unique' => 'Cette Matricule est déjà utilisé.',
        ]
    
    );
        
        $user = new User();
        $user->matricule = $request->matricule;
        $user->soussigne = $request->soussigne;
        $user->daterecrutement= $request->daterecrutement;
        $user->grade = $request->grade;
        

        $user->password = Hash::make($request->password); // Hash du mot de passe
        $user->role = $request->role;
        $user->save();
        
        return redirect('/liste_user')->with('status', 'Utilisateur ajouté avec succès.');
        
    }

    public function modifier_utilisateur_traitement(Request $request){
        $request->validate([
            'soussigne' => 'required|string|min:2|max:255',
            'matricule' => 'required|string|min:5|max:5|unique:users,matricule',
            'role' => 'required|string|min:8|max:20',
            'grade' => 'required|string|min:8|max:20',

            'password' => 'required|string|min:8|max:8|confirmed',
            'daterecrutement' => 'required|date',
        ], 
    
        );
        $user =  User::find($request->id);
        $user->matricule = $request->matricule;
        $user->soussigne = $request->soussigne;
        $user->daterecrutement= $request->daterecrutement;
        $user->grade = $request->grade;
        

        $user->password = Hash::make($request->password); // Hash du mot de passe
        $user->role = $request->role;
        $user->update();
        return redirect('/liste_utilisateur')->with('status', 'Utilisateur modifié avec succès.');



    }

    public function supprimer_utilisateur($id)
    {
        $users= User::find($id);
        $users->delete();
        return redirect('/liste_user')->with('status', 'Utilisateur supprimé avec succès.');

        
    }
}
