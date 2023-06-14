## A Propos du Projet

Le projet taoula-laravel est un projet d'articulation de fin de semestre d'un groupe d'étudiants de deuxième années en ingénierie des médias à la HEIG-VD, le groupe est composé de 7 personnes, Nathan Gretillat, Vitor Pinto Da Silva, Andrea Ferrer, Alexandre Aubert, Maxime Gutknecht, Omar Gonin, Lionel Sandoz et Leo Chollet.

Le Projet d'articulation est un projet de fin de 4ème semestre à La HEIG-VD dans la filière d'ingéniérie des médias, le but de ce projet est de rassembler toutes les compétences acquises jusqu'ici et de produire une application web pour un mandant. Les compétences liées au projets sont les suivantes :

- Modelisation de bases de données
- Developpement Back-end (Laravel)
- Developpement Front-end (View JS)
- Gestion de Projet
- Design UX/UI
- Communication professionnelle

## Sujet

Le projet se nomme "Couleur 3 Interact" Nous avons du imaginer comment rendre la radio couleur 3 plus interactive.
Dans cette idée là, nous avons imaginé une application web sur laquelle les utilisateurs peuvent répondre à des sondages, des défis, des concours etc. lancés par les animateurs. Les utilisateurs peuvent aussi accéder au live en direct de la radio, peuvent voir les titres qui sont passés à la radio et les liker afin d'obtenir un rewind sur ces musiques préférées à la fin du mois. Nous avons aussi une fonction qui n'est pas complétement implémentée qui est une "Gamification" de l'application, chaque action de partage, de like, d'inscriptions et de participations rapporte des jetons couleur 3 qui peuvent ensuite être convertis en cadeaux dans l'application.

Pour cela l'application est divisée en 2 parties :

- l'interface animateur (Permet à l'animateur de lancer des interactions comme des questions, concours, défis et sondages...)
- l'interface utilisateur (permet aux utilisateurs depuis leur smartphone d'intéragir avec la radio)

## Technologies utilisées

Comme cité plus haut, nous avions quelques technologies imposées comme :

- L'utilisation de Laraval pour le Back-end
- L'utilisation de View JS pour le Front-end
- L'hébergement de notre application sur le serveur pingouin de la HEIG-VD
- MySQL pour la base de donnée

## Comment utiliser ce projet pour vous

1. Récupérez le projet sur votre ordinateur avec la commande > git clone <url du projet>
    
2. Copiez le fichier .env.example , ensuite collez-le dans le même dossier et renommez-le en
.env /!\ NE SUPPRIMER PAS LE FICHIER .env.example
    
3. pour que le projet fonctionne, vous devez executez plusieurs commandes dans le terminal :
    
- >npm install pour installer les dépandances
- >composer install pour installer les dépendances
- >php artisan key:generate pour générer la clé de l'application
- >php artisan migrate pour créer les tables dans la base de données
- >php artisan db:seed pour remplir les tables avec des données
    
4. Vous pouvez maintenant lancer le projet avec la commande > php artisan serve
    
5. Ouvrez un deuxième terminal et lancez la commande > npm run dev


## Remerciements

Nous souhaitons remercier les personnes qui ont aidé et nous ont cadré dans la réalisation de ce projet :

Gabor Maksay (HEIG-VD)

Antoine Multone (Couleur3)

Cyril Jacquet (RTS)

Claude Philipona (HEIG-VD)


