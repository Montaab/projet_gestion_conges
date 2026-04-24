@extends('welcome')
@section('content')

<div class="card shadow-sm">
<div class="card-header bg-primary   " style="margin: 13px; ">
<h5 class="mb-0 text-white">Modifier un utilisateur</h5>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Utilisateur modifié avec succès.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="/modifier_user/traitement" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $users->id }}">

      <div class="row g-3">
        <!-- Nom -->
          <!-- Matricule -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" placeholder="Matricule" value="{{ $users->matricule }}">
              <label for="matricule"><i class="bi bi-hash"></i> Matricule</label>
              @error('matricule')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

        <!-- Prénom -->
        <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('soussigne') is-invalid @enderror" id="soussigne" name="soussigne" placeholder="Soussigné" value="{{ $users->soussigne}}">
              <label for="soussigne"><i class="bi bi-person-fill"></i>Nom et prénom</label>
              @error('soussigne')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Grade -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" placeholder="Grade" value="{{ $users->grade }}">
              <label for="grade"><i class="bi bi-award-fill"></i> Grade</label>
              @error('grade')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <!-- Date de recrutement -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="date" class="form-control @error('daterecrutement') is-invalid @enderror" id="daterecrutement" name="daterecrutement" value="{{$users->daterecrutement }}">
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

    
      <!-- Sélection du rôle -->
      <div class="col-md-6 mt-3">
        <label for="role" class="form-label fw-bold">Rôle</label>
        <select id="role" name="role" class="form-select">
          <option value="employe" {{ $users->role == 'Employe(e)' ? 'selected' : '' }}>Employe(e)</option>
          <option value="manager" {{ $users->role == 'Manager' ? 'selected' : '' }}>Manager</option>
          <option value="rh" {{ $users->role == 'RH' ? 'selected' : '' }}>RH</option>

        </select>
      </div>
    

      <div class="row mt-4">
        <div class="col-md-6">
          <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-check-circle me-2"></i> Modifier
          </button>
        </div>
        <div class="col-md-6">
          <a href="/liste_user" class="btn btn-outline-primary w-100">
            <i class="fas fa-arrow-left me-2"></i> Retourner
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
