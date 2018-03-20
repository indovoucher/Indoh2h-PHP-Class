# Indoh2h-PHP-Class


Ini adalah PHP Class untuk parsing API Indoh2h ke dalam environment pemograman PHP

Contoh Penggunaannya sebagai berikut :

```php
<?php 

include "indoh2h.php"; 
$h2h = new Indoh2h("indovoucher","876sg8765ds53siug98h2nn"); // (YOUR_USERNAME, YOUR_APIKEY)

$balance = $h2h->check_balance();
print_r($balance);

?>
```

