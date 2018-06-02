<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $descriptive_name
 * @var $version_number
 * @var $filename
 * @var $html
 */
$now = $this->datetime_helper->now('d M Y, h:iA');
$newline = "\n";
$tab = "\t";
$emptyline = $tab.$newline;
$lt = $html ? "&lt;" : "<";
$gt = $html ? "&gt;" : ">";

echo $lt . "?php defined('BASEPATH') OR exit('No direct script access allowed');" . $newline;
#region Migration Version
echo "/**".$newline;
echo " * Migration version:".$newline;
echo " * $now".$newline;
echo " * $version_number".$newline;
echo " */".$newline;
#endregion

#region Migration Class
echo "class Migration_$descriptive_name extends CI_Migration {".$newline;
echo $emptyline;
echo $tab."public function up() {".$newline;
echo $emptyline;
echo $tab.$tab."//Sample dbforge usage. Delete if not needed.".$newline;
echo $tab.$tab."/* \$this->load->dbforge();".$newline;
echo $tab.$tab."\$this->dbforge->add_field([".$newline;
echo $tab.$tab."]);".$newline;
echo $tab.$tab."\$this->dbforge->add_key('dl_id', TRUE);".$newline;
echo $tab.$tab."\$this->dbforge->create_table('table_name'); */".$newline;
echo $emptyline;
echo $tab."}".$newline;
echo $emptyline;
echo $tab."public function down() {".$newline;
echo $emptyline;
echo $tab.$tab."//Sample dbforge usage. Delete if not needed.".$newline;
echo $tab.$tab."/* \$this->load->dbforge();".$newline;
echo $tab.$tab."\$this->dbforge->drop_table('table_name'); */".$newline;
echo $emptyline;
echo $tab."}".$newline;
echo $emptyline;
echo "} " . "// end " . $filename . " class";
#endregion