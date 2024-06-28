<?php
$senha = 1;
$hash = password_hash(PASSWORD_ARGON2I, $senha);
echo "$hash";


?>