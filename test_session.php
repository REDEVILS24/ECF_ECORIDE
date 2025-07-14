<?php
session_start();
echo "User ID en session : " . ($_SESSION['user_id'] ?? 'AUCUN');
echo "<br>Email en session : " . ($_SESSION['user_email'] ?? 'AUCUN');
?>