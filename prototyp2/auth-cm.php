<?php                                
if (!isset($_SESSION['rolle']) || $_SESSION['rolle'] == 'user') {
        echo "Sie haben nicht die n&ouml;tigen Zugriffsrechte f&uuml;r diesen bereich!";
exit;
}
?>