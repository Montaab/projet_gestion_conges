@extends('welcome')

@section('content')

  <div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-primary text-white" style="margin: 13px;">
      <h5 class="mb-0">Ajouter un congé</h5>
    </div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Congé ajouté avec succès.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/ajoute_conge/traitement" method="POST">
        @csrf

        <div class="row g-3">
          <!-- UserID -->
         

          <!-- Matricule Manager -->
          <div class="col-lg-6">
            <div class="form-floating">
              <select id="matriculemanager" name="matriculemanager" class="form-select">
                <option value="">Sélectionner un manager</option>
                @foreach($managers as $manager)
                  <option value="{{ $manager->matricule }}">{{ $manager->soussigne }}</option>
                @endforeach
              </select>
              <label for="user_id"><i class="ti ti-user me-2"></i>Manager</label>
            </div>
          </div>

          <!-- Durée -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="number" class="form-control @error('duree') is-invalid @enderror" id="duree" name="duree" placeholder="Durée" value="{{ old('duree') }}">
              <label for="duree"><i class="bi bi-clock"></i> Durée (jours)</label>
              @error('duree')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Titre -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" placeholder="Titre" value="{{ old('titre') }}">
              <label for="titre"><i class="bi bi-tag"></i> Titre</label>
              @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Date de début -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control @error('datedebut') is-invalid @enderror" id="datedebut" name="datedebut" value="{{ old('datedebut') }}">
              <label for="datedebut"><i class="bi bi-calendar-date"></i> Date de début</label>
              @error('datedebut')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Date de fin -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ old('datefin') }}">
              <label for="datefin"><i class="bi bi-calendar-check"></i> Date de fin</label>
              @error('datefin')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Adresse -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" placeholder="Adresse" value="{{ old('adresse') }}">
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

       

        </div>

        <!-- Boutons -->
        <div class="row mt-4">
          <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-success w-100">
              <i class="bi bi-check-circle"></i> Ajouter
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
