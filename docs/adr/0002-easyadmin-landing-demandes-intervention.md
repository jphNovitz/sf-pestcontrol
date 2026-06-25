# ADR 0002 - Administration de la landing et des demandes

## Statut

Acceptee.

## Contexte

La landing page ne doit plus rester entierement statique. L'independant doit pouvoir modifier les informations principales de la page et consulter les demandes d'intervention issues du formulaire.

## Questions de cadrage tranchees

- EasyAdmin doit gerer a la fois le contenu de la landing et les demandes d'intervention.
- Les zones d'intervention sont une entite separee et servent de liste affichable, sans filtrage automatique des demandes hors zone.
- Les conseils de la landing sont gerables librement, avec ordre d'affichage et activation.
- Les statuts d'une demande sont: Nouvelle, Contacte, Planifiee, Terminee, Annulee.
- Une demande d'intervention doit etre enregistree en base et envoyee par email.
- La photo du nid doit etre stockee sur le serveur et jointe a l'email.
- L'email de reception est un placeholder configurable dans EasyAdmin.
- L'acces admin utilise l'entite `User` existante avec `ROLE_ADMIN`.
- Une commande Symfony cree ou met a jour un utilisateur admin en base.
- La route admin retenue est `/admin`.

## Decision

Installer EasyAdmin et ajouter:

- `SiteSettings` pour les textes et contacts globaux de la landing;
- `InterventionZone` pour les zones affichees;
- `LandingAdvice` pour les conseils affichables;
- `InterventionRequest` pour les demandes issues du formulaire;
- des CRUD EasyAdmin pour ces entites et pour `User`;
- un formulaire Symfony public pour creer une demande;
- un service applicatif qui stocke la photo, persiste la demande puis envoie l'email;
- la commande `app:create-admin-user <email> <password>` pour creer l'acces administrateur.

En environnement local, la base est alignee sur SQLite car la migration historique du projet est SQLite et le PHP local ne fournit pas `pdo_pgsql`. Mailpit est expose sur les ports fixes `1025` et `8025` pour tester l'envoi email.

## Consequences

- Le contenu de la landing est modifiable sans redeployer.
- Les demandes peuvent etre consultees et qualifiees dans EasyAdmin.
- Le formulaire public n'est plus une maquette: il cree une demande et tente un envoi email.
- La production devra remplacer les placeholders par un vrai numero WhatsApp, une vraie adresse Gmail de reception et un `MAILER_DSN` SMTP valide.
- Si PostgreSQL est souhaite en production ou en dev, il faudra fournir l'extension PHP `pdo_pgsql` et remplacer les migrations SQLite historiques.
