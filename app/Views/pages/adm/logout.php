<?php
session_start();
session_destroy();

// opcional: limpar também localStorage (via JS depois)
header("Location: ./loginAdm.php");
exit;