# ADR 0004 - Tagline du header administrable

## Statut

Acceptee.

## Contexte

Le header affichait le texte `Intervention locale` en dur sous le nom du site. Ce texte de positionnement doit pouvoir etre modifie depuis EasyAdmin.

## Decision

Ajouter le champ `headerTagline` a `SiteSettings` et l'exposer dans le CRUD EasyAdmin des reglages du site.

Valeur par defaut:

`Intervention en Brabant wallon`

Le header affiche ce champ sous le nom du site, avec fallback identique si les reglages ne sont pas disponibles.

## Consequences

- La phrase courte du header devient configurable sans changement de template.
- La tagline reste rattachee aux reglages globaux du site, car elle fait partie du branding principal.
