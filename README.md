Ryan Dorasamy, Leo Chollet, Omar Gonin

<h1>Rapport Projet</h1>
<h1>Organisation</h1>
Nous avons d'abord du nous mettre d'accord sur un framework à utiliser. Alors que 2 d'entre nous étions initialement pourl'utilisation de vue.js, Ryan a mis en avant le fait que l'utilisation
de PHP Laravel nous faciliterais la tâche étant donné qu'il effectue diverses vérification et protocole de sécurité automatiquement. Nous nous sommes ensuite répartis les tâches.
<h1>Librairies utilisées</h1>
Nous avons utilisé Node.js v20.7.0, Laravel v10.x
<h1>Problèmes rencontrés</h1>
Comme cela fait presque 1 an que nous n'avons pas utilisé de PHP et Laravel, nous avons dû nous rappeler de comment fonctionne ce code. Nous avons rencontrés quelques problème mineurs
<h1>Sécurités mises en place</h1>
Comme dit précédemment, Laravel met en place diverses sécurité automatiquement. On y retrouve par exemple:...
– Votre approche pour identifier des faiblesses logicielles potentielles à la fin de votre projet.
<h1>Fonctionnalités</h1>
Le site permet de: Créer un compte, se connecter, se déconnecter. La page Chat permet de voir le message avec les rôles Lector, Editor et Admin. D'écrire des messages avec les rôles Editor et Admin.
Puis de supprimer un message avec le rôle Admin. La page Admin (modificateur de rôle) n'est accessible que avec le rôle Admin et permet de changer le rôle des autres utilisateurs. Il n'est pas
possible de modifier son propre rôle afin de ne pas se retirer le rôle admin à soit même par erreur et ne plus avoir accès à cette page.
-Comment mettre en place le projet pour le prof
