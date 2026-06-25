# ADR 0003 - Logo et favicon administrables

## Statut

Acceptee.

## Contexte

Le header utilisait un logo texte `GF` code en dur et le favicon etait defini directement dans le template de base. L'independant doit pouvoir gerer un logo de header et un favicon depuis EasyAdmin.

## Questions de cadrage tranchees

- Le logo du header est une image uploadee.
- Le favicon est un fichier distinct du logo.
- Les deux fichiers sont stockes dans `SiteSettings`, car il n'y a qu'une identite visuelle active pour le site.
- Le logo dispose d'un texte alternatif configurable via `logoAlt`.
- Le logo accepte SVG, PNG, JPG et WebP.
- Le favicon accepte ICO, PNG et SVG.
- Le logo du header est affiche avec une hauteur fixe de 44 px et une largeur automatique.
- EasyAdmin doit afficher un apercu des fichiers actuels.

## Decision

Ajouter a `SiteSettings`:

- `logoFilename`;
- `faviconFilename`;
- `logoAlt`.

Les uploads sont stockes dans:

- `public/uploads/brand/logo`;
- `public/uploads/brand/favicon`.

Le header affiche l'image du logo si elle est configuree, sinon le fallback texte `GF`. Le favicon utilise le fichier configure si present, sinon le favicon inline de fallback.

## Consequences

- Le branding principal peut etre modifie sans redeploiement.
- Le fallback conserve un rendu correct tant qu'aucun fichier n'est charge.
- Les fichiers uploades doivent etre sauvegardes avec les donnees applicatives en production.
