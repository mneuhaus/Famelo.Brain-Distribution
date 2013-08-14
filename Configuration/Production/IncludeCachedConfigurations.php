<?php
if (FLOW_PATH_ROOT !== '/Users/mneuhaus/Sites/Flow/Brain/' || !file_exists('/Users/mneuhaus/Sites/Flow/Brain/Data/Temporary/Production/Configuration/ProductionConfigurations.php')) {
	unlink(__FILE__);
	return array();
}
return require '/Users/mneuhaus/Sites/Flow/Brain/Data/Temporary/Production/Configuration/ProductionConfigurations.php';
?>