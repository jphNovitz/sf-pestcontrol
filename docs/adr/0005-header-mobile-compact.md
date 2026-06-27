# ADR 0005 - Header mobile compact

## Statut

Acceptee.

## Contexte

Le header mobile etait trop haut, le logo semblait tasse a gauche et le bouton WhatsApp prenait trop de largeur. La landing doit garder une action rapide visible sans encombrer le premier ecran mobile.

## Decision

Sur mobile:

- conserver une seule ligne de header;
- garder le logo a hauteur fixe de 44 px;
- afficher le nom du site et la tagline empiles avec troncature si necessaire;
- masquer la navigation centrale;
- masquer le bouton `Demander une intervention`;
- afficher WhatsApp comme bouton carre de 44 px avec icone SVG seule.

Sur desktop:

- conserver la navigation `Services` et `Conseils`;
- conserver le bouton `Demander une intervention`;
- afficher le bouton WhatsApp avec icone et texte.

## Consequences

- Le header mobile reste plus compact et stable.
- L'action urgente reste visible sans occuper trop d'espace horizontal.
- Le formulaire reste accessible via le contenu de page et via le bouton desktop.
