
## Créer son environnement local :
### Étape 1
Téléchargez **XAMPP Server** : [https://www.apachefriends.org/fr/index.html](https://www.apachefriends.org/fr/index.html)

### Étape 2
Dans le dossier C:\xampp\htdocs, **clonez** ce dépôt git. (git clone)

### Étape 3
Lancez XAMPP Control Panel et appuyez sur *Start* pour le serveur **Apache** et **MySQL**.

### Étape 4
Ajoutez la base de données. Cliquez sur *Admin* à côté de **MySQL** sur XAMPP. Vous arriverez sur PHPMyAdmin. Maintenant, cliquez sur *Nouvelle base de données*, appelez-la "bdd_memoteam".

### Étape 5
Une fois créée, appuyez sur *Importer*, puis ajoutez le fichier **bdd_memoteam.sql** dans le dossier "includes". Ensuite, cliquez sur *Exécuter*. La base est maintenant créée sur le serveur.

### Étape 6
Toujours dans PHPMyAdmin, allez dans l'onglet *Privilèges*. Ici, appuyez sur le bouton *Ajouter un compte d'utilisateur*.
- Saisissez le **nom d'utilisateur** (celui que vous voulez).
- Saisissez dans *Nom d'hôte* => **localhost** (n'oubliez pas d'enlever le *%*).
- Saisissez un **mot de passe** (pas celui que vous utilisez ailleurs, un fictif).
- Cochez tous les *privilèges globaux*, puis cliquez sur ***Exécuter***.

### Étape 7
Allez sur **VSCode**. Dans le dossier "includes", faites une copie du fichier **db_config.php.dist**. Renommez-le en ***db_config.php***. Remplacez les # par les informations demandées. Une fois fait, c'est bon, la base de données est connectée. Vous pouvez accéder au site en tapant dans votre navigateur préféré ***localhost/Memoteam***.
