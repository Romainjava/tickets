# Guide d'utilisation pour les super administrateurs

## Introduction

En tant que super administrateur, vous avez un contrôle total sur l'application. Vous êtes responsable de la configuration du système, de la gestion des utilisateurs, des projets, des clients et de la maintenance globale de l'application.

## Accès à l'interface d'administration

1. Connectez-vous à l'application avec vos identifiants de super administrateur.
2. Vous aurez accès à toutes les fonctionnalités de l'interface d'administration Filament.

## Gestion des utilisateurs

### Invitation d'utilisateurs
1. Naviguez vers la section "Utilisateurs" dans le menu latéral.
2. Cliquez sur "Inviter un utilisateur".
3. Remplissez les informations requises :
   - Nom
   - Adresse e-mail
4. Cliquez sur "Envoyer l'invitation".
5. Un e-mail d'invitation sera envoyé à l'utilisateur avec un lien pour définir son mot de passe.

### Gestion des rôles et permissions
1. Accédez à la section "Rôles et Permissions".
2. Vous pouvez créer, modifier ou supprimer des rôles.
3. Pour chaque rôle, définissez les permissions spécifiques.

## Gestion des projets

### Création d'un projet
1. Allez dans la section "Projets".
2. Cliquez sur "Créer un projet".
3. Remplissez les détails du projet :
   - Nom du projet
   - Client associé
   - Description
   - Type de statut (personnalisé ou global)
4. Assignez les utilisateurs au projet.
5. Définissez les paramètres spécifiques du projet (si nécessaire).

### Configuration des statuts de tickets pour un projet
1. Dans les détails du projet, accédez à la section "Statuts de tickets".
2. Vous pouvez créer des statuts personnalisés ou utiliser les statuts globaux.
3. Assurez-vous de définir un statut par défaut.

## Gestion des tickets

### Configuration globale des tickets
1. Accédez à la section "Configuration des tickets" dans les paramètres système.

2. Types de tickets :
   - Créez, modifiez ou supprimez des types de tickets (ex: Bug, Fonctionnalité, Tâche).
   - Définissez un type de ticket par défaut.

3. Priorités des tickets :
   - Gérez les niveaux de priorité (ex: Basse, Moyenne, Haute, Critique).
   - Attribuez des couleurs à chaque niveau de priorité.
   - Définissez une priorité par défaut.

4. Relations entre tickets :
   - Configurez les types de relations possibles entre les tickets dans `config/system.tickets.relations.list`.

### Gestion des épopées (Epics)
1. Accédez à la section "Épopées" dans le menu.
2. Créez des épopées pour organiser les tickets en groupes plus larges au sein des projets.

## Gestion des clients

1. Naviguez vers la section "Clients".
2. Vous pouvez ajouter, modifier ou supprimer des clients.
3. Pour chaque client, vous pouvez voir les projets associés.

## Paramètres système

### Configuration de l'authentification
1. Accédez aux paramètres d'authentification.
2. Désactivez l'option d'inscription publique.
3. Configurez les options de connexion (ex: OIDC, connexion sociale si activée).

### Personnalisation de l'interface
1. Modifiez le logo et les couleurs de l'application dans les paramètres de marque.
2. Personnalisez les éléments de navigation et le tableau de bord.

### Configuration des e-mails
1. Configurez les paramètres SMTP pour l'envoi d'e-mails.
2. Personnalisez les modèles d'e-mails pour les notifications.

## Surveillance et maintenance

### Tableau de bord d'administration
1. Consultez les statistiques globales de l'application.
2. Surveillez l'activité récente et les tendances d'utilisation.

### Gestion des logs
1. Accédez aux logs système pour diagnostiquer les problèmes.
2. Configurez les niveaux de logging si nécessaire.

### Sauvegardes
1. Assurez-vous que des sauvegardes régulières de la base de données sont configurées.
2. Testez périodiquement la restauration des sauvegardes.

### Mises à jour du système
1. Vérifiez régulièrement les mises à jour disponibles pour l'application.
2. Planifiez et effectuez les mises à jour en dehors des heures de pointe.

## Rapports et analyses

1. Générez des rapports sur l'utilisation du système, la performance des projets, etc.
2. Analysez les tendances pour optimiser l'utilisation de l'application.

## Remarques importantes

- En tant que super administrateur, vos actions ont un impact sur l'ensemble du système. Soyez prudent lors de la modification des paramètres globaux.
- Formez régulièrement les nouveaux administrateurs et utilisateurs sur l'utilisation appropriée de l'application.
- Effectuez des audits de sécurité réguliers et assurez-vous que tous les utilisateurs suivent les meilleures pratiques en matière de sécurité.
- Tenez-vous informé des nouvelles fonctionnalités et mises à jour de l'application pour tirer le meilleur parti du système.