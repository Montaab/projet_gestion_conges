<!DOCTYPE html>
<html>
<head>
    <title>Demande de Congé - {{ $demande->titre }}</title>
</head>
<body>
    <h1>{{ $demande->titre }}</h1>
    <p><strong>ID Utilisateur:</strong> {{ $demande->userid }}</p>
    <p><strong>Matricule Manager:</strong> {{ $demande->matriculemanager }}</p>
    <p><strong>Durée:</strong> {{ $demande->duree }} jours</p>
    <p><strong>Date de Début:</strong> {{ $demande->datedebut }}</p>
    <p><strong>Date de Fin:</strong> {{ $demande->datefin }}</p>
    <p><strong>Adresse:</strong> {{ $demande->adresse }}</p>
    <p><strong>Type de Congé:</strong> {{ $demande->typeConge }}</p>
    <p><strong>Statut:</strong> {{ $demande->status }}</p>
    <p><strong>Remarque:</strong> {{ $demande->remarque ?? 'Aucune remarque' }}</p>
</body>
</html>