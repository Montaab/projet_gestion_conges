@extends('welcome')

@section('content')

  <div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-primary text-white" style="margin: 13px;">
      <h5 class="mb-0">Ajouter un utilisateur</h5>
    </div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Utilisateur ajouté avec succès.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/ajoute_user/traitement" method="POST">
        @csrf

        <div class="row g-3">
          <!-- Matricule -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" placeholder="Matricule" value="{{ old('matricule') }}">
              <label for="matricule"><i class="bi bi-hash"></i> Matricule</label>
              @error('matricule')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Soussigné -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('soussigne') is-invalid @enderror" id="soussigne" name="soussigne" placeholder="Soussigné" value="{{ old('soussigne') }}">
              <label for="soussigne"><i class="bi bi-person-fill"></i> Nom et prénom</label>
              @error('soussigne')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Grade -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" placeholder="Grade" value="{{ old('grade') }}">
              <label for="grade"><i class="bi bi-award-fill"></i> Grade</label>
              @error('grade')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Date de recrutement -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control @error('daterecrutement') is-invalid @enderror" id="daterecrutement" name="daterecrutement" value="{{ old('daterecrutement') }}">
              <label for="daterecrutement"><i class="bi bi-calendar-check"></i> Date de recrutement</label>
              @error('daterecrutement')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Mot de passe -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe">
              <label for="password"><i class="bi bi-lock-fill"></i> Mot de passe</label>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Confirmation mot de passe -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmer mot de passe">
              <label for="password_confirmation"><i class="bi bi-lock"></i> Confirmer le mot de passe</label>
              @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Rôle -->
          <div class="col-md-6">
            <div class="form-floating">
              <select id="role" name="role" class="form-select @error('role') is-invalid @enderror">
                <option value="">Sélectionner un rôle</option>
                <option value="employe" {{ old('role') == 'employe' ? 'selected' : '' }}>Employe(e)</option>
                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="rh" {{ old('role') == 'rh' ? 'selected' : '' }}>RH</option>
              </select>
              <label for="role"><i class="bi bi-person-badge"></i> Rôle</label>
              @error('role')
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
            <a href="/liste_user" class="btn btn-outline-primary w-100">
              <i class="bi bi-arrow-left"></i> Retourner
            </a>
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
