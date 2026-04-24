@extends('welcome')
@section('content')

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Liste des utilisateurs</h5>


    <a href="/ajoute_user" class="btn btn-primary">
      <i class="ti ti-plus me-2"></i>Ajouter un utilisateur
    </a>
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Nom et prénom </th>
            <th>Matricule</th>
            <th>Grade</th>
            <th>Role</th>
            <th>Date de Recrutement</th>
            <th>Actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td><strong>{{ $user->soussigne }}</strong></td>
            <td>{{ $user->matricule }}</td>
            <td>{{ $user->grade }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->daterecrutement }}</td>
            <td>
              <div class="d-flex gap-2">
              <a href="/modifier_user/{{ $user->id }}" class="btn btn-sm btn-outline-primary">
                  <i class="ti ti-pencil"></i>
                </a>
                <a href="/supprimer_utilisateur/{{ $user->id }}" class="btn btn-sm btn-outline-danger">
                  <i class="ti ti-trash"></i>
                </a>
              </div>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection