# Guide d'utilisation pour les super administrateurs

## Gestion globale de l'application

En tant que super administrateur, vous avez accès à toutes les fonctionnalités de l'application, y compris la gestion des utilisateurs, des projets, des clients et des paramètres système.

## Configuration du système

1. Gestion des statuts de tickets
   - Vous pouvez créer des statuts personnalisés pour chaque projet ou utiliser des statuts globaux.
   - Assurez-vous de définir un statut par défaut pour chaque projet ou pour le système global.

2. Types de tickets
   - Configurez les différents types de tickets disponibles (ex: bug, fonctionnalité, tâche).
   - Définissez un type de ticket par défaut.

3. Priorités des tickets
   - Créez et gérez les niveaux de priorité des tickets.
   - Attribuez des couleurs aux priorités pour une meilleure visualisation.
   - Définissez une priorité par défaut.

## Gestion des projets et des clients

1. Création de projets
   - Créez des projets et associez-les à des clients.
   - Définissez le type de statut pour chaque projet (personnalisé ou global).

2. Gestion des utilisateurs
   - Ajoutez des utilisateurs à l'application.
   - Attribuez des rôles aux utilisateurs (propriétaire, membre de l'équipe).
   - Associez des utilisateurs aux projets appropriés.

## Personnalisation avancée

1. Relations entre tickets
   - Configurez les types de relations possibles entre les tickets dans le fichier de configuration `config/system.tickets.relations.list`.

2. Épopées (Epics)
   - Gérez les épopées pour organiser les tickets en groupes plus larges au sein des projets.

## Surveillance et maintenance

1. Utilisez les filtres avancés sur la page des tickets pour avoir une vue d'ensemble de tous les tickets du système.
2. Surveillez les performances de l'application et optimisez si nécessaire.
3. Assurez-vous que les sauvegardes régulières de la base de données sont effectuées.

## Remarques importantes

- En tant que super administrateur, vous avez la responsabilité de maintenir la cohérence et l'intégrité des données dans l'ensemble du système.
- Soyez prudent lors de la modification des paramètres globaux, car cela peut affecter tous les utilisateurs et projets.
- Formez les nouveaux administrateurs et utilisateurs sur l'utilisation appropriée de l'application.