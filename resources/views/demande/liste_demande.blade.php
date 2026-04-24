@extends('welcome')

@section('content')

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Liste des demandes de congé</h5>
    @if(Auth::user()->role == "employe")

    <a href="/ajoute_demande" class="btn btn-primary">
      <i class="ti ti-plus me-2"></i>Ajouter une demande de congé
    </a>
    @endif
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Nom de l'employé</th>
            <th>Matricule d'employe</th>
            <th>Matricule Manager</th>
            <th>Durée</th>
            <th>Titre</th>
            <th>Date de Début</th>
            <th>Date de Fin</th>
            <th>Adresse</th>
            <th>Type de Congé</th>
            <th>Statut</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($demandes as $demande)
          <tr>
            <td><strong>{{ $demande->user->soussigne }}</strong></td>
            <td><strong>{{ $demande->user->matricule }}</strong></td>
            <td>{{ $demande->matriculemanager }}</td>
            <td>{{ $demande->duree }} jours</td>
            <td>{{ $demande->titre }}</td>
            <td>{{ $demande->datedebut }}</td>
            <td>{{ $demande->datefin }}</td>
            <td>{{ $demande->adresse }}</td>
            <td>{{ $demande->typeConge }}</td>
            <td>
              @if($demande->status == 'accepté')
                <span class="badge bg-success">{{ $demande->status }}</span>
              @elseif($demande->status == 'en cours')
                <span class="badge bg-warning">{{ $demande->status }}</span>
              @else
                <span class="badge bg-danger">{{ $demande->status }}</span>
              @endif
            </td>
            

            <td>
            @if(Auth::user()->role == "employe")
              <div class="d-flex gap-2">
                <a href="/modifier_demande/{{ $demande->id }}" class="btn btn-sm btn-outline-primary">
                  <i class="ti ti-pencil"></i>
                </a>
                <a href="/supprimer_demande/{{ $demande->id }}" class="btn btn-sm btn-outline-danger">
                  <i class="ti ti-trash"></i>
                </a>
              </div>
              @endif

              @if(Auth::user()->role == "manager" || Auth::user()->role == "rh")
  <a href="/liste_demande1/{{ $demande->id }}" class="btn btn-primary">
    <i class="ti ti-plus me-2"></i> Voir plus
  </a>
@endif

            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
