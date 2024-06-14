# Mediatek86
J'ai travaillé sur une base de données et un site web qui rassemblent des vidéos éducatives de YouTube, les catégorisent et les affichent pour les étudiants intéressés par l'apprentissage de la programmation. Il est mon projet de fin de BTS avec le CNED.

## Installation 
- Vérifier que Netbeans et XAMPP sont installés sur l'ordinateur.
- Ouvrir une fenêtre de commandes en mode admin, se positionner dans le dossier du projet et taper "composer install" pour reconstituer le dossier vendor.<br>
- Dans phpMyAdmin, se connecter à MySQL en root sans mot de passe et créer la BDD 'mediatekformation'.<br>
- Récupérer le fichier mediatekformation.sql en racine du projet et l'utiliser pour remplir la BDD (si vous voulez mettre un login/pwd d'accès, il faut créer un utilisateur, lui donner les droits sur la BDD et il faut le préciser dans le fichier ".env" en racine du projet).<br>
- De préférence, ouvrir l'application dans un IDE professionnel. L'adresse pour la lancer est : http://localhost/mediatek86/public/index.php<br>
