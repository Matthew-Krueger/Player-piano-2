  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
file_put_contents("/var/www/php_shell.sh", "  #!/bin/sh
  smfplay -d 20:0 /var/www/midi/" . $_GET['file']);
