  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
    require_once("/var/www/html/func/core/init.php");
file_put_contents("/var/www/pap_shell.sh", "  #!/bin/sh
  smfplay -d 20:0 /var/www/midi/" . $_GET['file']);
  shell_exec("/var/www/php_root");
