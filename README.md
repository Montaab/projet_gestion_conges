# GestionConges

## Description

**GestionConges** est une application web de gestion des congés développée avec Laravel. Elle permet aux employés de soumettre des demandes de congé, aux managers d'approuver ou rejeter ces demandes, et aux ressources humaines (RH) de gérer les utilisateurs et de superviser l'ensemble du processus.

L'application offre une interface moderne et intuitive basée sur le thème Kaiadmin Bootstrap 5, avec un système d'authentification robuste et une gestion fine des rôles et permissions.

## Fonctionnalités

### 👥 Gestion des Utilisateurs
- **CRUD complet** des utilisateurs (Créer, Lire, Modifier, Supprimer)
- **Rôles définis** : Employé, Manager, RH
- **Authentification sécurisée** avec Laravel Sanctum
- **Profils utilisateurs** avec matricule, grade, date de recrutement

###  Gestion des Demandes de Congé
- **Soumission de demandes** par les employés
- **Approbation/Rejet** par les managers
- **Suivi des statuts** : En cours, Accepté, Refusé
- **Types de congé** : Annuel, Maladie, Sans solde, Spécial
- **Export PDF** des demandes approuvées

###  Sécurité et Autorisation
- **Système de rôles** granulaire
- **Middleware d'authentification**
- **Protection CSRF** sur tous les formulaires
- **Validation des données** côté serveur

###  Interface Utilisateur
- **Thème Kaiadmin** moderne et responsive
- **Tableaux de bord** adaptés aux rôles
- **Navigation intuitive** avec menu latéral
- **Notifications** et messages de feedback

## Technologies Utilisées

- **Backend** : Laravel 10.x
- **Base de données** : MySQL
- **Frontend** : Bootstrap 5, FontAwesome
- **Authentification** : Laravel Sanctum
- **PDF** : DomPDF
- **Serveur** : PHP 8.1+

## Installation

### Prérequis
- PHP 8.1 ou supérieur
- Composer
- Node.js et NPM
- MySQL ou MariaDB
- Git

### Étapes d'installation

1. **Cloner le repository**
   ```bash
   git clone https://github.com/votre-username/projet_gestion_conges.git
   cd projet_gestion_conges
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configuration de l'environnement**
   ```bash
   cp .env.example .env
   ```
   Modifier le fichier `.env` avec vos paramètres de base de données :
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=gestionconges
   DB_USERNAME=votre_username
   DB_PASSWORD=votre_password
   ```

5. **Générer la clé d'application**
   ```bash
   php artisan key:generate
   ```

6. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```

7. **Créer un utilisateur administrateur (optionnel)**
   ```bash
   php artisan tinker
   ```
   ```php
   User::create([
       'soussigne' => 'Admin System',
       'matricule' => 'ADMIN001',
       'role' => 'rh',
       'grade' => 'Directeur',
       'daterecrutement' => '2020-01-01',
       'password' => Hash::make('password'),
   ]);
   ```

8. **Compiler les assets**
   ```bash
   npm run build
   # ou pour le développement
   npm run dev
   ```

9. **Démarrer le serveur**
   ```bash
   php artisan serve
   ```

L'application sera accessible sur `http://localhost:8000`

## Utilisation

### Connexion
- Accédez à `/login`
- Utilisez vos identifiants (matricule + mot de passe)

### Selon le rôle

####  Employé
- Consulter ses propres demandes de congé
- Soumettre une nouvelle demande
- Modifier ses demandes en cours

####  Manager
- Voir les demandes de ses subordonnés
- Approuver ou rejeter les demandes
- Consulter l'historique

####  RH
- Gérer tous les utilisateurs (CRUD)
- Superviser toutes les demandes
- Accéder aux statistiques globales

## Structure du Projet

```
gestionconges/
├── app/
│   ├── Http/Controllers/
│   │   ├── UserController.php
│   │   └── LeaveRequestController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── DemandeConge.php
│   └── Policies/
├── database/
│   └── migrations/
├── public/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── auth/
│   │   ├── RH/
│   │   └── demande/
│   └── js/
├── routes/
│   └── web.php
└── tests/
```

## API Routes

L'application utilise des routes web traditionnelles, mais peut être étendue avec une API RESTful :

- `GET /liste_user` - Liste des utilisateurs (RH)
- `GET /liste_demande` - Liste des demandes
- `POST /ajoute_conge/traitement` - Créer une demande
- `PUT /modifier_statut_demande/{id}` - Modifier le statut

## Tests

```bash
# Exécuter tous les tests
php artisan test

# Tests avec couverture
php artisan test --coverage
```

## Déploiement

### Préparation pour la production
1. Optimiser l'autoloader
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

2. Compiler les assets
   ```bash
   npm run build
   ```

3. Configurer le cache
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

4. Déployer sur un serveur web (Apache/Nginx) avec PHP-FPM

## Contribution

1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

### Standards de code
- Respecter PSR-12
- Utiliser des noms en anglais pour le code
- Ajouter des tests pour les nouvelles fonctionnalités
- Documenter les méthodes complexes

## Licence

Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.

## Support

Pour obtenir de l'aide :
- Ouvrir une issue sur GitHub
- Contacter l'équipe de développement

## Roadmap

- [ ] Ajouter des notifications par email
- [ ] Implémenter un calendrier visuel des congés
- [ ] Ajouter des statistiques et rapports
- [ ] API RESTful complète
- [ ] Application mobile compagnon
- [ ] Intégration avec Active Directory




## Contact

Pour toute question ou suggestion, contactez [montaab19@gamil.com].
