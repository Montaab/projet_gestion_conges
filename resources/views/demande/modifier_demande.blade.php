@extends('welcome')

@section('content')

  <div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-primary text-white" style="margin: 13px;">
      <h5 class="mb-0">Modifier un congé</h5>
    </div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Congé Modifié avec succès.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/modifier_conge/traitement" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $demande->id }}">

        <div class="row g-3">
          <!-- UserID -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('userid') is-invalid @enderror" id="userid" name="userid" placeholder="ID Utilisateur" value="{{ old('userid') }}">
              <label for="userid"><i class="bi bi-person-fill"></i> ID Utilisateur</label>
              @error('userid')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Matricule Manager -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('matriculemanager') is-invalid @enderror" id="matriculemanager" name="matriculemanager" placeholder="Matricule Manager" value="{{ $demande->matriculemanager }}">
              <label for="matriculemanager"><i class="bi bi-person-circle"></i> Matricule Manager</label>
              @error('matriculemanager')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Durée -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="number" class="form-control @error('duree') is-invalid @enderror" id="duree" name="duree" placeholder="Durée" value="{{ $demande->duree }}">
              <label for="duree"><i class="bi bi-clock"></i> Durée (jours)</label>
              @error('duree')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Titre -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" placeholder="Titre" value="{{ $demande->titre }}">
              <label for="titre"><i class="bi bi-tag"></i> Titre</label>
              @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Date de début -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control @error('datedebut') is-invalid @enderror" id="datedebut" name="datedebut" value="{{ $demande->datedebut }}">
              <label for="datedebut"><i class="bi bi-calendar-date"></i> Date de début</label>
              @error('datedebut')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Date de fin -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ $demande->datefin }}">
              <label for="datefin"><i class="bi bi-calendar-check"></i> Date de fin</label>
              @error('datefin')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Adresse -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" placeholder="Adresse" value="{{ $demande->adresse }}">
              <label for="adresse"><i class="bi bi-house-door"></i> Adresse</label>
              @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Type de congé -->
          <div class="col-md-6">
            <div class="form-floating">
              <select id="typeConge" name="typeConge" class="form-select @error('typeConge') is-invalid @enderror">
                <option value="congé de Repos" {{ old('typeConge') == 'vacances' ? 'selected' : '' }}>congé de Repos</option>
                <option value="congé exceptionnel" {{ old('typeConge') == 'maladie' ? 'selected' : '' }}>congé exceptionnel</option>
              </select>
              <label for="typeConge"><i class="bi bi-calendar-event"></i> Type de congé</label>
              @error('typeConge')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Statut -->
          <div class="col-md-6">
            <div class="form-floating">
              <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="en cours" {{ old('status') == 'actif' ? 'selected' : '' }}>en cours</option>
                <option value="réfuser" {{ old('status') == 'inactif' ? 'selected' : '' }}>réfuser</option>
                <option value="accepter" {{ old('status') == 'inactif' ? 'selected' : '' }}>accepter</option>
  
            </select>
              <label for="status"><i class="bi bi-toggle-on"></i> Statut</label>
              @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

        </div>

        <!-- Boutons -->
        <div class="row mt-4">
          <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-success w-100">
              <i class="bi bi-check-circle"></i> Modifier
            </button>
          </div>
          <div class="col-md-6 text-center">
            <a href="/liste_demande" class="btn btn-outline-primary w-100">
              <i class="bi bi-arrow-left"></i> Retourner
            </a>
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
