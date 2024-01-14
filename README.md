Ryan Dorasamy, Leo Chollet, Omar Gonin

<h1>Rapport Projet</h1>
<h2>Organisation</h2>
Nous avons d'abord du nous mettre d'accord sur un framework à utiliser. Alors que 2 d'entre nous étions initialement pourl'utilisation de vue.js, Ryan a mis en avant le fait que l'utilisation
de PHP Laravel nous faciliterais la tâche étant donné qu'il effectue diverses vérification et protocole de sécurité automatiquement. Nous nous sommes ensuite répartis les tâches.
<h2>Librairies utilisées</h2>
Nous avons utilisé Node.js v20.7.0, Laravel v10.x
<h2>Problèmes rencontrés</h2>
Comme cela fait presque 1 an que nous n'avons pas utilisé de PHP et Laravel, nous avons dû nous rappeler de comment fonctionne ce code. Nous avons rencontrés quelques problème mineurs
<h2>Sécurités mises en place</h2>
Comme dit précédemment, Laravel met en place diverses sécurité automatiquement. On y retrouve par exemple:...
– Votre approche pour identifier des faiblesses logicielles potentielles à la fin de votre projet.
<h2>Fonctionnalités</h2>
Le site permet de: Créer un compte, se connecter, se déconnecter. La page Chat permet de voir le message avec les rôles Lector, Editor et Admin. D'écrire des messages avec les rôles Editor et Admin.
Puis de supprimer un message avec le rôle Admin. La page Admin (modificateur de rôle) n'est accessible que avec le rôle Admin et permet de changer le rôle des autres utilisateurs. Il n'est pas
possible de modifier son propre rôle afin de ne pas se retirer le rôle admin à soit même par erreur et ne plus avoir accès à cette page.
-Comment mettre en place le projet pour le prof
