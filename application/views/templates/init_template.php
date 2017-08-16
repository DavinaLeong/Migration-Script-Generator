<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $descriptive_name
 * @var $version_number
 * @var $filename
 * @var $html
 */
$newline = "\n";
$tab = "\t";
$emptyline = $tab . $newline;
$lt = $html ? '&lt;' : '<';
$gt = $html ? '&gt;' : '>';

echo $lt . '?php defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');' . $newline;
#region Migration Version
echo '/* Migration version: ' . $newline;
echo ' * ' . $this->datetime_helper->now('d M Y, h:iA') . $newline;
echo ' * ' . $version_number . $newline;
echo ' */' . $newline;
#endregion

#region Migration Class
echo 'class Migration_' . $descriptive_name . ' extends CI_Migration' . $newline;
echo '{' . $newline;
echo $tab . '// Public Functions ----------------------------------------------------------------' . $newline;
echo $tab . 'public function up()' . $newline;
echo $tab . '{' . $newline;
echo $tab . $tab . '$this-' . $gt . 'load-' . $gt . 'model(\'Script_runner_model\');' . $newline;
echo $tab . $tab . '$output = $this-' . $gt . 'Script_runner_model-' . $gt . 'run_script($this-' . $gt . '_up_script())[\'output_str\'];' . $newline;
echo $emptyline;
echo $tab . $tab . '$this-' . $gt . 'load-' . $gt . 'model(\'User_model\');' . $newline;
echo $tab . $tab . '$admin = array(' . $newline;
echo $tab . $tab . $tab . '\'username\' =' . $gt . ' \'admin\',' . $newline;
echo $tab . $tab . $tab . '\'name\' =' . $gt . ' \'Default Admin\',' . $newline;
echo $tab . $tab . $tab . '\'password_hash\' =' . $gt . ' password_hash(\'password\', PASSWORD_DEFAULT),' . $newline;
echo $tab . $tab . $tab . '\'email\' =' . $gt . ' \'admin@example.com\',' . $newline;
echo $tab . $tab . $tab . '\'access\' =' . $gt . ' \'A\',' . $newline;
echo $tab . $tab . $tab . '\'status\' =' . $gt . ' \'Active\'' . $newline;
echo $tab . $tab . ');' . $newline;
echo $tab . $tab . '$admin[\'user_id\'] = $this-' . $gt . 'User_model-' . $gt . 'insert($admin);' . $newline;
echo $emptyline;
echo $tab . $tab . 'if(ENVIRONMENT !== \'testing\')' . $newline;
echo $tab . $tab . '{' . $newline;
echo $tab . $tab . $tab . 'echo "' . $lt . 'code' . $gt . '" . $output . "' . $lt . '/code' . $gt . '' . $lt . 'hr/' . $gt . '";' . $newline;
echo $tab . $tab . $tab . 'echo $admin[\'user_id\'] ' . $gt . ' 0 ? "' . $lt . 'p' . $gt . 'Default Admin account created.' . $lt . '/p' . $gt . '" : "' . $lt . 'p' . $gt . 'Failed to create Default Admin account.' . $lt . '/p' . $gt . '";' . $newline;
echo $tab . $tab . '}' . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo $tab . "public function down()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . '$this-' . $gt . 'load-' . $gt . 'model(\'Script_runner_model\');' . $newline;
echo $tab . $tab . 'echo $this-' . $gt . 'Script_runner_model-' . $gt . 'run_script($this-' . $gt . '_down_script())[\'output_str\'];' . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo $tab . "// Private Functions ---------------------------------------------------------------" . $newline;
echo $tab . "private function _up_script()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "\$sql = \"" . $newline;
echo $tab . $tab . $tab . 'CREATE TABLE `ci_sessions` (' . $newline;
echo $tab . $tab . $tab . $tab . '`id` VARCHAR(40) NOT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`ip_address` VARCHAR(45) NOT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`TIMESTAMP` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',' . $newline;
echo $tab . $tab . $tab . $tab . '`data` blob NOT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . 'KEY `ci_sessions_TIMESTAMP` (`TIMESTAMP`)' . $newline;
echo $tab . $tab . $tab . ') ENGINE=InnoDB DEFAULT CHARSET=utf8;' . $newline;
echo $tab . $tab . $tab . $newline;
echo $tab . $tab . $tab . 'CREATE TABLE `user` (' . $newline;
echo $tab . $tab . $tab . $tab . '`user_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,' . $newline;
echo $tab . $tab . $tab . $tab . '`username` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`name` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`password_hash` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`email` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`access` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`status` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`last_updated` TIMESTAMP DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . 'PRIMARY KEY (`user_id`)' . $newline;
echo $tab . $tab . $tab . ') ENGINE=InnoDB DEFAULT CHARSET=utf8;' . $newline;
echo $tab . $tab . $tab . $newline;
echo $tab . $tab . $tab . 'CREATE TABLE `user_log` (' . $newline;
echo $tab . $tab . $tab . $tab . '`ulid` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,' . $newline;
echo $tab . $tab . $tab . $tab . '`user_id` INT(11) UNSIGNED DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`message` VARCHAR(512) DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . '`TIMESTAMP` TIMESTAMP DEFAULT NULL,' . $newline;
echo $tab . $tab . $tab . $tab . 'PRIMARY KEY (`ulid`)' . $newline;
echo $tab . $tab . $tab . ') ENGINE=MyISAM DEFAULT CHARSET=utf8;' . $newline;
echo $tab . $tab . "\";" . $newline;
echo $tab . $tab . "return \$sql;" . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo $tab . "private function _down_script()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "\$sql = \"" . $newline;
echo $tab . $tab . $tab . 'DROP TABLE IF EXISTS `ci_sessions`;' . $newline;
echo $tab . $tab . $tab . 'DROP TABLE IF EXISTS `user`;' . $newline;
echo $tab . $tab . $tab . 'DROP TABLE IF EXISTS `user_log`;' . $newline;
echo $tab . $tab . "\";" . $newline;
echo $tab . $tab . "return \$sql;" . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo "} " . "// end " . $filename . " class";
#endregion