<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $descriptive_name
 * @var $version_number
 * @var $filename
 * @var $html
 * @var $table_name
 * @var $schema_name
 */
$now = $this->datetime_helper->now('d M Y, h:iA');
$newline = "\n";
$tab = "\t";
$emptyline = $tab.$newline;
$lt = $html ? "&lt;" : "<";
$gt = $html ? "&gt;" : ">";

echo "'use strict';".$newline;
#region Migration Version
echo "/**".$newline;
echo " * Migration version:".$newline;
echo " * $now".$newline;
echo " * $version_number".$newline;
echo " */".$newline;
#endregion

#region Migration Class
echo "module.exports = {" . $newline;
echo $emptyline;
echo $tab."up: (queryInterface, Sequelize) => {" . $newline;
echo $tab.$tab."return queryInterface.createTable('$table_name', schemas.$schema_name);" . $newline;
echo $tab."}," . $newline;
echo $emptyline;
echo $tab."down: (queryInterface, Sequelize) => {" . $newline;
echo $tab.$tab."return queryInterface.dropTable('$table_name');" . $newline;
echo $tab."}" . $newline;
echo $emptyline;  
echo "};" . $newline;
#endregion