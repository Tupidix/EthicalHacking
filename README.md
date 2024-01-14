Ryan Dorasamy, Leo Chollet, Omar Gonin
# Marche à suivre pour installation du projet : 
Pour Windows:
Vous aurez besoin de PHP, Git, Node.js, MongoDB et MongoDBcompass.

Choisissez la bonne version du ddl : https://github.com/mongodb/mongo-php-driver/releases/
et mettez le dans le dossier C:\PHP\ext de votre installation de PHP
Avant de cloner le projet nous allons modifier notre fichier php.ini
```
$ php.ini
```
Recherchez la liste des extensions et coller cette ligne
```
extension=php_mongodb.dll
```

Pour installer l'application exécutez ces lignes de commandes
```
$ git clone https://github.com/Tupidix/EthicalHacking.git
$ cd laravel
$ composer i
$ npm i
```
Dans le fichier .env, remplacer les lignes 11-16 par
```
DB_CONNECTION=mongodb
MONGODB_URI=mongodb://localhost:27017
MONGODB_NAME=Ethical-Hacking
```
Maintenant nous allons exécuter les migrations 
```
$ php artisan migrate:refresh
```
Et pour finir nous allons lancer l'application
```
$ npm run build
$ php artisan serve
```
<h1>Rapport Projet Ethical Hacking</h1>

<h2>Organisation</h2>
Nous avons d'abord du nous mettre d'accord sur un framework à utiliser. Alors que 2 d'entre nous étions initialement pourl'utilisation de vue.js, Ryan a mis en avant le fait que l'utilisation
de PHP Laravel nous faciliterais la tâche étant donné qu'il effectue diverses vérification et protocole de sécurité automatiquement. Nous nous sommes ensuite répartis les tâches.

<h2>Librairies utilisées</h2>
Nous avons utilisé Node.js (v20.7.0), Laravel (v10.x), Laravel Breeze (v1.27), Laravel-MongoDB (v4.1), PHP (v8.2), Tailwind CSS (v3.1)

<h2>Problèmes rencontrés</h2>

**Se replonger dans Laravel**\
Comme cela fait presque 1 an que nous n'avons pas utilisé de PHP et Laravel, nous avons dû nous rappeler de comment fonctionne ce code. Nous avons rencontrés quelques problème mineurs. Ils ont soit étés réglés en cherchant sur le web, soit en demandant à chatGPT soit en demandant de l'aide à d'autres élèves.

**Intégration de mangoBD**\
l'intégration de Laravel avec MongoDB a présenté quelques défis qui ont nécessité des ajustements spécifiques pour assurer une collaboration harmonieuse entre le framework et la base de données NoSQL. Laravel, par défaut, est orienté vers l'utilisation de bases de données relationnelles, tandis que MongoDB est une base de données NoSQL orientée document. Nous avons dû effectuer quelques modifications spécifiques pour permettre à Laravel de tirer pleinement parti des fonctionnalités offertes par MongoDB. 

<h2>Sécurités mises en place</h2>

### Authentification
Pour l'authentification nous avons décider d'utiliser Breeze. Breeze est un kit d'authentification léger conçu pour simplifier le processus d'implémentation de l'authentification dans les applications Laravel.
**Protection par mot de passe**
Breeze intègre les meilleures pratiques de sécurité pour le stockage des mots de passe, en utilisant des fonctions de hachage robustes comme bcrypt.

**Session sécurisée**
Breeze gère les sessions de manière sécurisée, minimisant les risques liés aux attaques de gestion de session.

**Rinitialisation sécurisée des mots de passe**
Nous avons utiliser la fonction de réinitalisation des mots de passe de breeze, minimisant les risque lié à la perte ou à l'oubli de mot de passe. 


### CSRF
Les attaques CSRF se produisent lorsqu'un attaquant exploite la confiance qu'un site accorde à un utilisateur authentifié. En exploitant cette confiance, l'attaquant peut induire l'utilisateur à effectuer involontairement des actions non autorisées, souvent sans que l'utilisateur en soit conscient. Les risques associés à ces attaques incluent la modification de données, la réalisation d'actions non autorisées au nom de l'utilisateur et la compromission de la session utilisateur.

##### Implémentation du tag @csrf dans notre application**
Laravel propose une solution intégrée pour se prémunir contre les attaques CSRF en utilisant le middleware CSRF. Ce middleware génère des jetons CSRF uniques pour chaque utilisateur et les associe à chaque formulaire présenté sur le site. Le tag `@csrf` dans Blade joue un rôle crucial dans cette stratégie de sécurité.
Laravel génère automatiquement un champ de formulaire CSRF contenant un jeton unique. Ce jeton est ensuite vérifié lors de la soumission du formulaire, assurant ainsi que la requête est légitime et qu'elle provient d'une source autorisée. En l'absence d'un jeton CSRF valide, Laravel rejettera la requête, empêchant ainsi une attaque CSRF réussie.
Dans notre application Laravel, nous avons systématiquement utilisé le tag `@csrf` pour chaque formulaire qui interagit avec des données sensibles ou effectue des actions critiques. Cette approche a renforcé significativement la sécurité de notre application en réduisant considérablement le risque d'exploitation des vulnérabilités CSRF.

### Protection contre les injecitons SQL
Pour se protéger contre les injection SQL nous avons décider d'utiliser Eloquent, l'ORM par défaut de Laravel. Eloquent utilise des requêtes préparées par défaut, ce qui signifie que les valeurs fournies par les utilisateurs sont automatiquement échappées, réduisant ainsi le risque d'injections SQL. Lors de l'utilisation des méthodes Eloquent telles que where, orWhere, ou update, les données sont liées de manière sécurisée, empêchant les attaques par injection SQL.

### Stcokage de mot de passe 
La sécurité des mots de passe est un composant cruciale de toute applicaiton. C'est pour cela que nous avons utilisé l'algorithme d'encryption bcrypt qui offre plusieurs fonctionnalités. Il permet notamment de spécifier un coût ajustable, représentant le nombre d'itérations effectuées lors du hachage. 

**Cost**\
Un coût plus élevé augmente le temps nécessaire pour générer le hachage, rendant les attaques par force brute plus difficiles et coûteuses.

**Salt**\
Bcrypt génère automatiquement un sel unique pour chaque mot de passe haché.

**Résistance aux attaques**\
L'algorithme Bcrypt est conçu pour résister aux attaques par dictionnaire en introduisant une complexité supplémentaire dans le processus de hachage. Il est égalemment conçu pour résister aux attaques par Rainbow Tables.

### Choix de la base de donnée 
Pour ce travail nous avons décider d'utiliser mangoDB, une base de donnée NosSQL populaire orientée document. MangoDb contient plusieurs fonctionnalité qui améliore la sécurité générale de notre projet comme : 

**Chiffrement des données en Repos**\
MongoDB prend en charge le chiffrement des données au repos, offrant une couche de sécurité supplémentaire en cas d'accès physique non autorisé à l'emplacement de stockage.

**Connxions SSL et TLS**\
MongoDB prend en charge les connexions sécurisées via SSL/TLS, garantissant que les données transitent de manière chiffrée entre l'application et la base de données.

**Contrôle sur adresse IP**\
Des règles de pare-feu peuvent être définies pour autoriser l'accès à la base de données uniquement à partir d'adresses IP spécifiques, renforçant ainsi la sécurité.

### Confidentialité des fichiers sensible
Pour garantir la protection de données telles que les informations d'authentification, les clés d'API, et d'autres fichiers sensibles, nous avons mis en place un .gitignore.


<h2>Fonctionnalités</h2>
Le site permet de: Créer un compte, se connecter, se déconnecter. La page Chat permet de voir le message avec les rôles Lector, Editor et Admin. D'écrire des messages avec les rôles Editor et Admin.
Puis de supprimer un message avec le rôle Admin. La page Admin (modificateur de rôle) n'est accessible qu'avec le rôle Admin et permet de changer le rôle des autres utilisateurs. Il n'est pas
possible de modifier son propre rôle afin de ne pas se retirer le rôle admin à soit même par erreur et ne plus avoir accès à cette page.

<h2>Pour toutes questions</h2>
Contactez-nous si la marche à suivre n'a pas suffit à faire fonctionner le projet à l'adresse ryan.dorasamy@heig-vd.ch
