# PJ01-D02-Dev
sudo apt-get update
# docker image build
docker-compose build image.test

# modify the demo.app.conf  (replace test with phpinfo)
cd nginx/
cd app_conf/
nano demo.app.conf 
 root /var/www/html/phpinfo;
fastcgi_pass 172.16.100.101:9000;

# git clone and replace the directory
cd code/
sudo rm -r app
git clone https://github.com/minhlaingoo/PJ-01-D01-Devlopment-Version-.git
mv PJ-01-D01-Devlopment-Version-/ app

# copy and edit .env
cp .env.example .env
edit the .env

DB_CONNECTION=mariadb
DB_HOST=mariadb.test
DB_PORT=3306
DB_DATABASE=pancake
DB_USERNAME=root
DB_PASSWORD=password

# edit nginx phpinfo
iprogen@devsvr06:~/PJ-01-Docker/nginx$ nano app_conf/
iprogen@devsvr06:~/PJ-01-Docker/nginx$ cd app_conf/
iprogen@devsvr06:~/PJ-01-Docker/nginx/app_conf$ nano demo.app.conf 

        root /var/www/html/app/public;
        #root /var/www/html/phpinfo;

# composer install
iprogen@devsvr06://home/iprogen/PJ-01-Docker/code/app$ docker exec -it app.test bash
root@9e2d61b679aa:/var/www/html# cd app
root@9e2d61b679aa:/var/www/html/app# ls -al
composer install

# npm install
iprogen@devsvr06://home/iprogen/PJ-01-Docker/code/app$ docker exec -it php-node.test bash
root@11cd06bb6ccb:/var/www/html# ls -al
root@11cd06bb6ccb:/var/www/html/app# npm install

root@11cd06bb6ccb:/var/www/html/app# npm run build
> build
> vite build
exit


# Database 
#Test docker database
docker exec -it mariadb.test mariadb -u root -p

GRANT ALL PRIVILEGES ON pancake.* TO 'root'@'172.16.100.101' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
SHOW GRANTS FOR 'root'@'172.16.100.101';

iprogen@devsvr06:~/PJ-01-Docker/code/app$ docker exec -it app.test bash
root@5cec86cb46d4:/var/www/html# cd app
apt-get update
apt-get install mariadb-client -y

root@5cec86cb46d4:/var/www/html/app# mariadb -h mariadb.test -u root -p

iprogen@devsvr06:~/PJ-01-Docker/code/app$ docker exec -it mariadb.test mariadb -u root -p
Enter password: 
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 5
Server version: 11.7.2-MariaDB-ubu2404 mariadb.org binary distribution

MariaDB [(none)]> SHOW GRANTS FOR 'root'@'172.16.100.101';
ERROR 1141 (42000): There is no such grant defined for user 'root' on host '172.16.100.101'
MariaDB [(none)]> GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password' WITH GRANT OPTION;
Query OK, 0 rows affected (0.007 sec)

MariaDB [(none)]> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.001 sec)

MariaDB [(none)]> exit
Bye

DB_CONNECTION=mariadb
DB_HOST=mariadb.test
DB_PORT=3306
DB_DATABASE=pancake
DB_USERNAME=root
DB_PASSWORD=password

docker exec -it mariadb.test mariadb -u root -p
SHOW DATABASES;
CREATE DATABASE pancake;


# artisan key:generate
iprogen@devsvr06://home/iprogen/PJ-01-Docker/code/app$ docker exec -it app.test bash
root@9e2d61b679aa:/var/www/html# cd app/ 
root@9e2d61b679aa:/var/www/html/app# php artisan key:generate

   INFO  Application key set successfully.  

root@9e2d61b679aa:/var/www/html/app# php artisan migrate 

# artisan migrate
root@242dda23e064:/var/www/html/app# php artisan migrate  

   INFO  Preparing database.  

  Creating migration table ................................................................................... 77.41ms DONE

   INFO  Running migrations.  

  0001_01_01_000000_create_users_table ...................................................................... 361.76ms DONE
  0001_01_01_000001_create_cache_table ....................................................................... 76.08ms DONE
  0001_01_01_000002_create_jobs_table ....................................................................... 286.81ms DONE
  2023_03_24_082420_create_roles_table ...................................................................... 125.29ms DONE
  2023_03_24_082442_create_role_permissions_table ............................................................ 34.20ms DONE
  2023_03_24_082705_create_permissions_table ................................................................. 41.97ms DONE
  2023_03_24_082724_create_features_table .................................................................... 34.85ms DONE
  2024_01_13_182916_create_activity_logs_table ............................................................... 48.04ms DONE
  2025_03_13_104247_add_role_id_to_users_table .............................................................. 283.36ms DONE
  2025_03_26_090247_create_devices_table ..................................................................... 40.85ms DONE

root@242dda23e064:/var/www/html/app# 
# artisan seed
root@242dda23e064:/var/www/html/app# php artisan db:seed

   INFO  Seeding database.  

  Database\Seeders\DefaultRolePermissionSeeder .................................................................... RUNNING  
  Database\Seeders\DefaultRolePermissionSeeder ....

Email: pancake@admin.com
Password: password

# artisan link
iprogen@devsvr06:~/PJ-01-Docker$ docker exec -it app.test bash
root@242dda23e064:/var/www/html# cd app/
root@242dda23e064:/var/www/html/app# php artisan storage:link

   INFO  The [public/storage] link has been connected to [storage/app/public].  


# npm install (as shown above)
