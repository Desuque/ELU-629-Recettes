Avant de démarrer, il faut copier le dossier ELU-629-Recettes dans votre serveur web. 

1. Configuration de la base de données: 

À l'intérieur du dossier BD, il y a deux fichiers. Ici, on présente deux possibilités pour configurer la base de données:
..1.Le contenu du fichier "codeSQL" doit être copié et collé dans une base de données qu'il faut appeler "recette".
..2.Le fichier "recette.sql" peut être importé dans une base de données appellée "recette". 


2. Dans le dossier "include", on trouve le fichier "setup.php", où on configure la connexion à la base de données. Il faut mettre les paramètres correspondant à la 
localisation de la base de données, le nom d'utilisateur, le mot de passe et le nom de la base de données (ce dernière si on utilise une base de données différente). 

3. Une fois cela a été fait, on peut accéder à la page web depuis un navigateur en écrivant l'adresse du dossier "ELU-629-Recettes/". On peut maintenant visualiser 
la page d'accueil, où on trouve aussi les dernières recettes publiées. On trouve un ménu permettant de s'inscrire ou de se logger. 

4. Maintenant il ne reste qu'à tester la page web: 
Pour tester la page web, il y a 4 utilisateurs. 

..... Utilisateur   Mot de passe
..... admin         pass          
..... antoine       pass          
..... camille       pass          
..... jacques       pass          

L'utilisateur admin est l'administrateur de la page. Il peut créer des recettes, mais il est aussi modérateur. Dans l'exemple, si on initialise une session
admin, il y a une recette en attente de validation qui peut être visualisée dans l'option "administration". On peut aussi les status des différents utilisateurs. 
Dans cet exemple, l'utilisateur "admin" est l'auteur de la recette "églefin lardé". Il ne peut pas commenter sa propre recette, mais comme il a les droits de 
modérateur, il peut modifier les autres commentaires ou les effacer. 

Les autres utilisateurs ne sont pas administrateurs (initialement, car un administrateur peut les rendre administrateurs aussi dans l'option administration). 
Ils peuvent publier des recettes, visualiser et commenter les recettes dont ils ne sont pas les auteurs et modifier ou effacer leurs propres 
commentaires. Dans l'exemple proposé, la recette qui est en attente de validation a été publiée par l'utilisateur "antoine". 


