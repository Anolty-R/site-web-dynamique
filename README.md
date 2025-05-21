# 🗃️ Mise en place de la base de données et configuration Apache2

Ce guide décrit les étapes pour créer une base de données MySQL simple et configurer un serveur Apache2 pour héberger un site PHP localement.

---

## 🧱 Création de la base de données MySQL

### 🔧 Connexion à MySQL

```bash
sudo mysql -u root -p
```

```sql
CREATE DATABASE SAE;
USE SAE;

CREATE TABLE PAGE (
  CLE INT PRIMARY KEY,
  MESSAGE TEXT
);

INSERT INTO PAGE (CLE, MESSAGE) VALUES (1, 'Bonjour depuis la base SAE !');

CREATE USER 'SAE'@'localhost' IDENTIFIED BY 'SAE2.03';
GRANT ALL PRIVILEGES ON SAE.* TO 'SAE'@'localhost';
FLUSH PRIVILEGES;
```

## 🌐 Configuration du serveur Apache2
### 📁 Création du dossier du site

```bash
sudo mkdir -p /var/www/site-test
sudo chown -R www-data:www-data /var/www/site-test
```

### 📝 Configuration du Virtual Host
Créez le fichier de configuration du site :

```bash
sudo nano /etc/apache2/sites-available/site-test.conf
```

Ajoutez-y le contenu suivant :

```apache
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/site-test
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

## ✅ Activation du site Apache
Désactivez le site par défaut et activez votre nouveau site :

```bash
sudo a2dissite 000-default.conf
sudo a2ensite site-test.conf
sudo systemctl reload apache2
```

## 📄 Déploiement du fichier index.php
Copiez votre fichier index.php dans le répertoire du site :

```bash
sudo cp ~/Téléchargements/index.php /var/www/site-test/
sudo chown www-data:www-data /var/www/site-test/index.php
```
## 🌍 Test
Rendez-vous sur http://localhost pour vérifier que votre site fonctionne correctement.

*📝 Note : Ce projet a été réalisé dans le cadre d’un apprentissage de base autour du développement web et de la configuration serveur local.*
