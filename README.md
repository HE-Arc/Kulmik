# Kulmik
1. Objectif principal (ok)

Application qui liste le contenu du frigo.

2. Objectif secondaire (ko)

Application qui permet de générer des recettes qui utilisent les aliments en voie d'expiration.


## Configuration 
+ Windows
+ PHPStorm/Atom
+ Laragon: Nginx, MysQl

## Mise en place du projet

1. Création du projet

* Ouvrir le terminal de Laragon ou Powershell

```
cd [chemin]
laravel new kulmik
```

2. Configuration de la base de données

* Ouvrir HeidiSQL (`Database`) depuis Laragon
* Créer une nouvelle base de donnée (ici `kulmik`)

3. Migration

* Depuis le terminal de Laragon

```
php artisan migrate
```

* Si la table existe déjà:

```
php artisant migrate::rollback
php artisan migrate:reset 	//rollback
php artisan migrate:refresh     //rollback and remigrate
composer dump-autoload
```

4. Authentification

```
php artisan make:auth
```

5. Création d'une nouvelle table

```
php artisan make:migration create_[name]_table
```

6. Création d'un model avec Eloquent

```
php artisan make:model Task
```

* Intéraction avec l'application depuis le terminal

```
php artisan tinker
>>> App\Task::all() => shows all
>>> App\Task::where('d', '>', 2)->get();
>>> App\Task::pluck('body'); //returns body of all task
>>> App\Task::pluck('body')->first();
>>> App\Task::find(1); = App\Task::first();
>>> $task->isComplete(); => false
 ```
 
 * Création d'un model et d'une table
 
 ```
 php artisan make:model Task -m
 ```
 
 7. Population d'une table (Tinker)
 
 ```
$task = new App\Task;
$task->body = 'go to the store';
$task->complete = false; => better : in migration => $table->boolean('complete')->default(false);
$task->save()
 ```
 
 8. Génération d'un Controller
 
 ```
 php artisan make:controller [insert name]Controller
 ```
 
 9. Binding des routes avec les Model
 
 ```
 //web.php
Route::get('/tasks/{task}', 'TasksController@show');
//TasksController.php
public function show(Task $task){ return view('tasks.show', compact('task')); }
// -> same as Task::find(wildcard)
 ```
 
 10. Layouts et Structure
 
 La méthode suivante évite de devoir modifier tous les `<link href="" ...>` un par un:
 
 * Création d'un fichier dans: `resources/views/layout.blade.php`
 * Utilisation de wapper html: permet d'appeler des bouts de codes html depuis d'autres fichiers
 
 -> L'application garde donc la même tête, le contenu est le seul à changer véritablement
 
 ```
 <body>
     @yield('content')
 </body>
 ```
 
Création d'un Model + Controller
 
 ```
 php artisan:model Task -mc //m:migration, c:controller
                        -r  //r:resourceful
 ```

* Controller => [insert name]Controller : `TasksController`
* Eloquent   => [insert name] : `Tasks`
* migration  => `create_tasks_table`

11. Data __REST__
```
GET     /posts
GET     /posts/create       //creation
POST    /posts
GET     /posts/{id}/edit    //edition
PATCH   /posts/{id}         //modification
DELETE  /posts/{id}         //deletion
CSRF - cross site request forgery
```
https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF)

* Management de la base de données :
```
php artisan migrate:fresh        -> drop+migrates tables
php artisan db:seed              -> populates db with seeds
php artisan migrate:fresh --seed -> does both
php artisan make:seeder []       -> creates seeder class
```

12. Sonstiges

Formattage de date: 

* https://stackoverflow.com/questions/40038521/change-the-date-format-in-laravel-view-page

___

## Déploiement

1. Connexion au serveur distant

```
ssh -p 2207 poweruser@srvz-webapp.he-arc.ch
```

2. Demander la clé __SSH__ sur Github (si besoin)

```
curl https://api.github.com/users/<USER_NAME>/keys
```

3. Entrer la clé reçu dans le fichier `authorized_keys` avec *nano* ou *vim* (selon motivation ou si vous êtes __groovytron__):

```
nano /home/poweruser/.ssh/authorized_keys
```

4. Redemarrer le service __SSH__:

```
sudo service ssh restart
```

5. Connexion __SFTP__ avec *WInSCP*:
* Adresse : 	`srvz-webapp.he-arc.ch`
* User:		`poweruser`
* Mdp :

** Cliquez sur "Avancé"
** Authentification
** Fichier de clé privée : parcourir, entrer le fichier et convertir en lisible pour *WinSCP*

5. Clonage le projet dans le dossier `www`

6. Suivre les indications du lien depuis la rubrique *Nginx*:
	
* https://github.com/HE-Arc/webapp-server/blob/master/files/laravel/README.md
