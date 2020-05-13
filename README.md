## how to run the project:
  - sesuaikan environment di file main.php
  - kosongkan database dan lakukan migration
  - eksekusi file migration.php dengan command `php migration.php`
  - eksekusi command `composer dump-autoload`
  - jalankan php serve dengan coomand `php -S localhost:8888 -t public` (port bisa disesuaikan).
 
 
 ## Endpoint yang tersedia
 - Untuk melakukan store ke 3rd party dan database.
    - [POST] {host}/disburse
 - Untuk get data dari database 
    - [GET]  {host}/disburse/{id_transaction}
 - untuk memperbarui data dari 3rd party
    - [GET]  {host}/disburse/{id_transaction}/refresh

