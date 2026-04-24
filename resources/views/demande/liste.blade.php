@extends('welcome')

@section('content')

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Gestion des demandes de congé</h5>
  </div>

  <div class="card-body">
    <div class="row">
      @foreach($demandes as $demande)
      <div class="col-md-6 mb-4">  <!-- Augmenter la taille de la carte en la plaçant sur 6 colonnes -->
        <div class="card h-100"> <!-- h-100 pour que la carte occupe toute la hauteur disponible -->
          <div class="card-header">
            <strong>{{ $demande->titre }}</strong>
          </div>
          <div class="card-body">
            <p><strong>ID Utilisateur:</strong> {{ $demande->userid }}</p>
            <p><strong>Matricule Manager:</strong> {{ $demande->matriculemanager }}</p>
            <p><strong>Durée:</strong> {{ $demande->duree }} jours</p>
            <p><strong>Date de Début:</strong> {{ $demande->datedebut }}</p>
            <p><strong>Date de Fin:</strong> {{ $demande->datefin }}</p>
            <p><strong>Adresse:</strong> {{ $demande->adresse }}</p>
            <p><strong>Type de Congé:</strong> {{ $demande->typeConge }}</p>
            <p>
              <strong>Statut:</strong>
              <span class="badge 
                @if($demande->status == 'en cours') bg-warning 
                @elseif($demande->status == 'accepté') bg-success 
                @else bg-danger @endif">
                {{ $demande->status }}
              </span>
            </p>
            <p><strong>Remarque:</strong> {{ $demande->remarque ?? 'Aucune remarque' }}</p>
          </div>
          <div class="card-footer">
            @if(Auth::user()->role == "manager" )
            <form action="{{ route('modifier_statut_demande', $demande->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="d-flex gap-2">
                <!-- Dropdown for Status -->
                <select name="status" class="form-select" style="max-width: 180px;">
                  <option value="en cours" {{ $demande->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                  <option value="accepté" {{ $demande->status == 'accepté' ? 'selected' : '' }}>Accepté</option>
                  <option value="refusé" {{ $demande->status == 'refusé' ? 'selected' : '' }}>Refusé</option>
                </select>

                <!-- Input for Remarque -->
                <input type="text" name="remarque" class="form-control" placeholder="Ajouter une remarque..." value="{{ $demande->remarque }}" style="max-width: 220px;">

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success btn-sm">
                  <i class="ti ti-check"></i> Valider
                </button>
                <a href="{{ route('demande.export-pdf', $demande->id) }}" class="btn btn-primary btn-sm mt-2">
        <i class="ti ti-download"></i> Exporter en PDF
    </a>
              </div>
            </form>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
