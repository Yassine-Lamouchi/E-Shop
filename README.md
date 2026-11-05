# 🛒 E-Shop (Mobiles, Ordinateurs & Accessoires)

Application web simple de commerce électronique (E-Commerce) développée en **PHP** et **MySQL / MariaDB**, permettant la consultation d'un catalogue de produits high-tech (smartphones, ordinateurs portables, périphériques et accessoires) ainsi que leur gestion complète via un espace d'administration.

> 👤 **Projet réalisé par :** Yassine Lamouchi - LSI2 Groupe 2.2

---

## 📋 Table des Matières

1. [Fonctionnalités](#-fonctionnalités)
2. [Distribution des Fichiers (Architecture)](#-distribution-des-fichiers-architecture)
3. [Prérequis](#-prérequis)
4. [Guide d'Installation et Exécution](#-guide-dinstallation-et-exécution)
5. [Configuration de la Base de Données](#-configuration-de-la-base-de-données)
6. [Structure de la Base de Données](#-structure-de-la-base-de-données)
7. [URLs et Navigation](#-urls-et-navigation)
8. [Sécurité et Bonnes Pratiques Appliquées](#-sécurité-et-bonnes-pratiques-appliquées)
9. [Auteur](#-auteur)

---

## ✨ Fonctionnalités

### 🛍️ Espace Public (Boutique)

- **Catalogue de produits (`index.php`)** : Affichage tabulaire avec image miniature, nom du produit, catégorie associée, prix en dinars (DT), état du stock (pastille verte "En stock" ou rouge "En rupture de stock").
- **Fiche produit détaillée (`produit.php`)** : Visualisation détaillée du produit avec grande image, description complète, catégorie, prix et quantité en stock.

### 🛠️ Espace Administration (Gestion)

- **Gestion des Produits (`admin/produit/`)** :
  - Liste de tous les produits avec état de stock et catégorie.
  - Ajout d'un nouveau produit avec choix de la catégorie, prix, stock, image et description.
  - Modification d'un produit existant.
  - Suppression d'un produit avec confirmation JavaScript.
- **Gestion des Catégories (`admin/categorie/`)** :
  - Liste des catégories avec comptage dynamique du total.
  - Ajout d'une nouvelle catégorie.
  - Modification du nom d'une catégorie.
  - Suppression d'une catégorie (avec mise à `NULL` automatique des clés étrangères).

---

## 📁 Distribution des Fichiers (Architecture)

```text
E-Shop/
│
├── admin/                           # Espace d'administration
│   ├── categorie/                   # Module de gestion des catégories
│   │   ├── admin_categorie.php      # Liste et suppression des catégories
│   │   ├── ajouter_categorie.php    # Formulaire d'ajout d'une catégorie
│   │   └── modifier_categorie.php   # Formulaire d'édition d'une catégorie
│   │
│   └── produit/                     # Module de gestion des produits
│       ├── admin_produit.php        # Liste et suppression des produits
│       ├── ajouter_produit.php      # Formulaire d'ajout d'un produit
│       └── modifier_produit.php     # Formulaire d'édition d'un produit
│
├── config/                          # Configuration et données initiales
│   ├── boutique_db.sql              # Script SQL d'export (tables + données de démo)
│   └── db.php                       # Connexion PDO à la base de données MySQL
│
├── images/                          # Fichiers médias des produits (1.jpg à 10.jpg + default.jpg)
│   ├── 1.jpg                        # iPhone 15 Pro Max
│   ├── 2.jpg                        # Samsung Galaxy S24 Ultra
│   ├── 3.jpg                        # MacBook Air M3
│   ├── 4.jpg                        # Dell XPS 13
│   ├── 5.jpg                        # Clavier Logitech MX Keys
│   ├── 6.jpg                        # Souris Logitech MX Master 3S
│   ├── 7.jpg                        # Casque Sony WH-1000XM5
│   ├── 8.jpg                        # Google Pixel 8
│   ├── 9.jpg                        # Écran LG 27 pouces
│   ├── 10.jpg                       # Disque Dur Externe TwinMOS 1To
│   └── default.jpg                  # Image de secours par défaut
│
├── includes/                        # Éléments d'interface partagés
│   ├── header.php                   # En-tête globale avec barre de navigation dynamique
│   └── footer.php                   # Pied de page global avec liens rapides
│
├── index.php                        # Page d'accueil publique (catalogue des produits)
├── produit.php                      # Page de détail d'un produit
└── README.md                        # Documentation du projet
```

---

## 💻 Prérequis

Pour exécuter ce projet localement, assurez-vous d'avoir installé un environnement serveur local :

- **Serveur web local** : [XAMPP](https://www.apachefriends.org/)
- **PHP** : Version 7.4 ou 8.x (avec extensions `pdo` et `pdo_mysql` activées)
- **MySQL / MariaDB** : Version 5.7+ ou 10.4+
- **Navigateur Web** : Chrome, Firefox, Edge, etc.

---

## 🚀 Guide d'Installation et Exécution

### Étape 1 : Placer le projet dans le répertoire web

Copiez ou déplacez le dossier `E-Shop` dans le dossier racine de votre serveur web local :

- **Sous XAMPP (Windows)** : `C:\xampp\htdocs\E-Shop`
- **Sous WampServer** : `C:\wamp64\www\E-Shop`
- **Sous Laragon** : `C:\laragon\www\E-Shop`

---

### Étape 2 : Démarrer Apache et MySQL

Ouvrez le panneau de contrôle de votre serveur (ex: **XAMPP Control Panel**) et cliquez sur **Start** pour :

- **Apache**
- **MySQL**

---

### Étape 3 : Importer la Base de Données dans phpMyAdmin

1. Ouvrez votre navigateur et accédez à **phpMyAdmin** :
   ```
   http://localhost/phpmyadmin/
   ```
2. Cliquez sur l'onglet **Importer** (Import) dans le menu principal supérieur.
3. Cliquez sur **Choisir un fichier** (Browse) et sélectionnez le fichier :
   ```
   E-Shop/config/boutique_db.sql
   ```
4. Cliquez sur le bouton **Importer** / **Exécuter** (Go) en bas de la page.
5. Le script crée automatiquement la base de données `boutique_db` et installe les deux tables (`categories` et `produits`) avec 10 produits de démonstration.

> [!NOTE]
> Le script SQL contient déjà l'instruction `CREATE DATABASE IF NOT EXISTS boutique_db; USE boutique_db;`, vous pouvez donc l'importer directement sans créer la base au préalable.

---

### Étape 4 : Vérifier la Configuration de Connexion (`config/db.php`)

Le fichier `config/db.php` contient les identifiants de connexion :

```php
$host = "localhost";
$dbname = "boutique_db";
$user = "root";
$pass = ""; // Laissez vide sous XAMPP par défaut
```

- **XAMPP** : `$user = "root";` et `$pass = "";` (valeurs par défaut déjà configurées).
- **WAMP** : `$user = "root";` et `$pass = "";` (ou mot de passe défini lors de l'installation).
- **MAMP** : `$user = "root";` et `$pass = "root";` avec le port MySQL 8889 si applicable.

---

### Étape 5 : Lancer l'Application dans le Navigateur

Une fois les services démarrés et la base importée, ouvrez votre navigateur :

- **Boutique publique** :
  ```
  http://localhost/E-Shop/index.php
  ```
- **Espace Administration Produits** :
  ```
  http://localhost/E-Shop/admin/produit/admin_produit.php
  ```
- **Espace Administration Catégories** :
  ```
  http://localhost/E-Shop/admin/categorie/admin_categorie.php
  ```

---

## 🔗 Portabilité et Liens Relatifs

Tous les liens de l'en-tête (`header.php`) et du pied de page (`footer.php`) ont été configurés de manière **100% relative et dynamique** :

- Ils détectent automatiquement la profondeur du dossier d'où la page est appelée (`index.php` à la racine vs `admin/produit/` en sous-dossier).
- **Aucune URL absolue en dur** (`http://localhost/...`) n'est utilisée.
- Vous pouvez renommer le dossier du projet ou le placer dans n'importe quel sous-répertoire d'un serveur local sans casser la navigation.

---

## 🗄️ Structure de la Base de Données

### Table `categories`

| Colonne   | Type                                 | Description                                        |
| --------- | ------------------------------------ | -------------------------------------------------- |
| `id_cat`  | `INT(11)` AUTO_INCREMENT PRIMARY KEY | Identifiant unique de la catégorie                 |
| `nom_cat` | `VARCHAR(50)`                        | Libellé (Smartphones, Ordinateurs, Accessoires...) |

### Table `produits`

| Colonne          | Type                                 | Description                               |
| ---------------- | ------------------------------------ | ----------------------------------------- |
| `id`             | `INT(11)` AUTO_INCREMENT PRIMARY KEY | Identifiant unique du produit             |
| `nom`            | `VARCHAR(100)`                       | Nom commercial du produit                 |
| `description`    | `TEXT`                               | Fiche technique détaillée                 |
| `prix`           | `DECIMAL(10,2)`                      | Prix en Dinars Tunisiens (DT)             |
| `quantite_stock` | `INT(11)`                            | Stock disponible en magasin               |
| `id_categorie`   | `INT(11)`                            | Clé étrangère vers `categories(id_cat)`   |
| `image`          | `VARCHAR(255)`                       | Nom du fichier image situé dans `images/` |
| `date_creation`  | `TIMESTAMP`                          | Horodatage de création                    |

---

## 🛡️ Sécurité et Bonnes Pratiques Appliquées

- **Requêtes Préparées (PDO)** : Prévention des injections SQL lors de la recherche, de l'insertion, de la modification et de la suppression.
- **Protection XSS** : Échappement des sorties via `htmlspecialchars()`.
- **Gestion Propre des Redirections** : Exécution de `header("Location: ...")` avant l'envoi de contenu HTML afin d'éviter l'erreur `Headers already sent`.

---
