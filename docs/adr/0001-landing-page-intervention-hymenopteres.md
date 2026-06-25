# ADR 0001 - Landing page pour interventions guepes et frelons

## Statut

Acceptee, mise a jour apres grilling du 2026-06-24.

## Contexte

Le site doit convertir des visiteurs du Brabant wallon qui ont repere un nid de guepes ou de frelons. Le besoin exprime est une landing page Symfony avec Tailwind Bundle, Tailwind CSS 4 et daisyUI 5, composee d'un hero sobre, d'un appel a l'intervention via WhatsApp et d'un formulaire de demande non urgente sous le hero.

## Questions de cadrage tranchees

- L'audience principale est francophone, en Brabant wallon, et cherche une intervention rapide, mais pas necessairement immediate.
- L'activite cible uniquement les guepes et frelons pour cette iteration.
- Le prestataire est presente comme un independant, pas comme une structure institutionnelle.
- L'action prioritaire du header et du hero est l'ouverture d'une conversation WhatsApp avec un message prerempli.
- La page doit distinguer une demande non urgente d'une situation dangereuse.
- Le formulaire est une interface de demande, sans traitement serveur ni envoi d'email dans cette iteration.
- Le formulaire demande une photo du nid, meme si le fichier n'est pas encore traite cote serveur.
- Les niveaux d'urgence retenus sont: Nid eloigne, Zone de passage, Proche habitation, Danger immediat.
- Le texte doit rester professionnel, concret et rassurant sans promettre un delai ou un resultat non confirme.
- Le numero WhatsApp est un placeholder a remplacer avant production.

## Decision

Construire une page unique a la racine `/` avec:

- un header sticky contenant la marque, des ancres de navigation et un bouton WhatsApp;
- un hero sobre oriente conversion avec rappel des nuisibles traites, zone Brabant wallon, bouton WhatsApp et lien vers le formulaire;
- une section formulaire identifiee par `#demande-intervention` pour les demandes non urgentes, incluant nom, telephone, commune, adresse, type de nuisible, emplacement du nid, niveau d'urgence, photo optionnelle et message;
- trois conseils pratiques sous forme de cartes daisyUI;
- un footer sobre avec zone d'intervention et mention de l'independant.

Cote frontend, migrer vers la configuration Tailwind CSS 4 CSS-first:

- installer `tailwindcss`, `@tailwindcss/cli` et `daisyui@latest` en dependances de developpement;
- configurer `symfonycasts_tailwind.binary` vers `node_modules/.bin/tailwindcss`;
- remplacer les directives Tailwind 3 par `@import "tailwindcss"` et `@plugin "daisyui"` dans `assets/styles/app.css`;
- supprimer `tailwind.config.js`, ignore par Tailwind CSS 4 dans ce mode.

## Consequences

- Le parcours le plus important reste accessible depuis le haut de page et depuis le hero.
- Les cas urgents sont orientes vers WhatsApp plutot que vers le formulaire.
- La page peut etre branchee plus tard sur un vrai endpoint Symfony, un FormType, un stockage fichier, un mailer ou un CRM sans changer la structure visuelle.
- Les informations variables a remplacer avant mise en production sont le nom commercial, le numero WhatsApp, les mentions legales et les conditions de traitement des photos.
