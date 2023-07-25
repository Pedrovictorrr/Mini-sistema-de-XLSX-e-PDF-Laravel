No php.ini adicionar "extension=oci8.so"

export LD_LIBRARY_PATH=/opt/oracle/instantclient_11_2:$LD_LIBRARY_PATH

composer require yajra/laravel-oci8
Caso de erro relacionado ao EXTENSIO -> Dentro da pasta vendor/yayra/src/Oci8/Oci8ServiceProvider.php comentar a linha 88 ("$db->setSessionVars($sessionVars);")

php artisan vendor:publish --tag=oracle

# Mini-sistema-de-XLSX-e-PDF-Laravel
# Mini-sistema-de-XLSX-e-PDF-Laravel
