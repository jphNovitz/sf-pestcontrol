# Glossaire

## Demande non urgente

Demande d'intervention pour un nid repere sans danger immediat pour les personnes. Elle peut etre transmise par formulaire avec des informations de contexte.

## Intervention urgente

Situation ou des personnes sont en danger immediat, par exemple nid dans une zone de passage indispensable, allergie connue, attaque en cours ou proximite directe avec des enfants. La landing page invite a contacter via WhatsApp plutot qu'a remplir le formulaire.

## Guepes

Insectes sociaux pouvant installer un nid dans une toiture, un caisson, un mur creux, un abri de jardin ou en pleine terre. Le site evite d'inciter le visiteur a detruire le nid lui-meme.

## Frelon asiatique

Espece invasive dont les nids peuvent etre situes en hauteur ou dans des haies. Le message doit pousser a garder ses distances et a transmettre une photo ou une localisation precise quand c'est possible.

## Niveau d'urgence

Qualification demandee au visiteur pour aider a prioriser la reponse. Les valeurs retenues sont Nid eloigne, Zone de passage, Proche habitation et Danger immediat.

## Photo du nid

Image prise a distance raisonnable pour faciliter le diagnostic avant intervention. Dans l'iteration actuelle, le champ existe en front mais aucun traitement serveur n'est branche.

## WhatsApp d'intervention

Canal de contact prioritaire pour demander une intervention ou signaler un danger immediat. Le numero utilise dans l'interface est un placeholder tant que le vrai numero n'est pas fourni.

## Zone d'intervention

Perimetre geographique couvert par l'independant. La version actuelle cible le Brabant wallon.

## Conversion

Action attendue du visiteur: appeler pour une situation pressante ou envoyer une demande non urgente via le formulaire.

## Reglages du site

Entite administrable qui contient les textes principaux de la landing, le numero WhatsApp, le message WhatsApp prerempli, l'email de reception et les messages du formulaire.

## Conseil landing

Texte court affiche sous le formulaire pour orienter le visiteur avant l'intervention. Les conseils sont ordonnables, activables et gerables librement dans EasyAdmin.

## Demande d'intervention

Enregistrement cree par le formulaire public. Il contient les coordonnees, l'adresse, le type de nuisible, l'emplacement du nid, l'urgence, le message, la photo eventuelle et un statut de suivi.

## Statut de demande

Etat interne d'une demande d'intervention dans EasyAdmin. Les valeurs retenues sont Nouvelle, Contacte, Planifiee, Terminee et Annulee.

## Administrateur

Utilisateur de l'entite `User` existante disposant du role `ROLE_ADMIN`. Il est cree ou mis a jour par la commande Symfony `app:create-admin-user`.

## Logo header

Image affichee dans le header a la place du fallback texte `GF`. Elle est configuree dans les reglages du site et stockee dans `public/uploads/brand/logo`.

## Favicon

Icone du site affichee par le navigateur. Elle est configuree separement du logo header et stockee dans `public/uploads/brand/favicon`.

## Texte alternatif du logo

Texte associe a l'image du logo pour l'accessibilite. Il est configurable separement du nom du site afin de rester precis si le visuel ou le nom commercial evolue.

## Tagline du header

Phrase courte affichee sous le nom du site dans le header. Elle precise le positionnement ou la zone de service, par exemple `Intervention en Brabant wallon`, et se configure dans les reglages du site.

## Header mobile compact

Variation responsive du header pour petit ecran. Elle conserve le logo, le nom, la tagline et une action WhatsApp sous forme d'icone carree, tout en masquant la navigation secondaire et le bouton formulaire.
