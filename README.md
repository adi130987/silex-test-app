# Custom REST API test routes - Silex based

Simple app shell and some defined API routes, silex based, used to provide/receive data to/from a frontend app
(like the Angular or Polymer apps). Used for testing purposes with CORS requests enabled.

## Requires

* Apache2 and PHP >= 5.5.0


## Install (Ubuntu)

```bash
$ git clone repo silex-test-app
$ ln -s /path/to/silex-test-app /var/www/html/silex-test-app
$ cd silex-test-app
$ composer install
```

Setup virtual host by creating a file /etc/apache2/sites-available/silex-test-app
with this content:

```
<VirtualHost *:80>

   DocumentRoot "/var/www/html/silex-test-app/web"
   ServerName silex-test-app.local

   <Directory "/var/www/html/silex-test-app/web">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>

    ErrorLog "/var/log/apache2/silex-test-app_error.log"
    ServerSignature Off
    CustomLog "/var/log/apache2/silex-test-app_access.log" combined


</VirtualHost>

```

Make sure you have rewrite module enabled (is not run `a2enmod rewrite`)

```bash
$ cd /etc/apache2/sites-available
$ a2ensite silex-test-app
$ service apache2 reload
```

Add new virtual host in /etc/hosts file

```
# local virtual hosts
127.0.0.1   silex-test-app.local
```

Access the app at http://silex-test-app.local



Have fun!
