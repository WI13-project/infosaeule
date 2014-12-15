<?php
if (!isset($_SESSION['rolle']) || ($_SESSION['rolle'] == 'user') || ($_SESSION['rolle'] == 'cm')){
	echo "Sie haben nicht die n&ouml;tigen Zugriffsrechte f&uuml;r diesen Bereich!";
exit;
}
?>