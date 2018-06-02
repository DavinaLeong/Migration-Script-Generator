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

echo $lt ."?php defined('BASEPATH') OR exit('No direct script access allowed');".$newline;
#region Migration Version
echo "/**".$newline;
echo " * Migration version: ".$newline;
echo " * $now".$newline;
echo " * $version_number".$newline;
echo " */".$newline;
#endregion

#region Migration Class
echo "class Migration_$descriptive_name extends CI_Migration {".$newline;
echo $emptyline;
echo $tab."public function up() {".$newline;
echo $tab.$tab."\$this->load->dbforge();".$newline;
echo $emptyline;
echo $tab.$tab."//ci_sessions".$newline;
echo $tab.$tab."\$this->dbforge->add_field([".$newline;
echo $tab.$tab.$tab."'id'=>['type'=>'VARCHAR','constraint'=>'40','null'=>FALSE],".$newline;
echo $tab.$tab.$tab."'ip_address'=>['type'= > 'VARCHAR','constraint'=>'45','null'=>FALSE],".$newline;
echo $tab.$tab.$tab."'TIMESTAMP'=>['type'=>'INT' 'constraint'=>'10','unsigned'=>TRUE,'null'=>TRUE,'default'=>'0'],".$newline;
echo $tab.$tab.$tab."'data'=>['type'=>'blob','null'=>'default']".$newline;
echo $tab.$tab."]);".$newline;
echo $tab.$tab."\$this->dbforge->add_key('TIMESTAMP', TRUE);".$newline;
echo $tab.$tab."\$this->dbforge->create_table('ci_sessions');".$newline;
echo $emptyline;
echo $tab.$tab."//user".$newline;
echo $tab.$tab."\$this->dbforge->add_field([".$newline;
echo $tab.$tab.$tab."'user_id'=>['type'=>'INT','constraint'=>'5','unsigned'=>TRUE,'null'=>FALSE,'auto_increment'=>TRUE],".$newline;
echo $tab.$tab.$tab."'username'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'name'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'password_hash'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'email'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'access'=>['type'=>'VARCHAR','constraint'=>'64','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'status'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'last_updated'=>['type'=>'TIMESTAMP','null'=>TRUE]".$newline;
echo $tab.$tab."]);".$newline;
echo $tab.$tab."\$this->dbforge->add_key('user_id', TRUE);".$newline;
echo $tab.$tab."\$this->dbforge->create_table('user');".$newline;
echo $emptyline;
echo $tab.$tab."//user log".$newline;
echo $tab.$tab."\$this->dbforge->add_field([".$newline;
echo $tab.$tab.$tab."'user_log_id'=>['type'=>'INT','constraint'=>'5','unsigned'=>TRUE,'null'=>FALSE,'auto_increment'=>TRUE],".$newline;
echo $tab.$tab.$tab."'user_id'=>['type'=>'INT','constraint'=>'5','unsigned'=>TRUE,'null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'message'=>['type'=>'VARCHAR','constraint'=>'512','null'=>TRUE],".$newline;
echo $tab.$tab.$tab."'timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'".$newline;
echo $tab.$tab."]);".$newline;
echo $tab.$tab."\$this->dbforge->add_key('user_log_id', TRUE);".$newline;
echo $tab.$tab."\$this->dbforge->create_table('user_log');".$newline;
echo$tab."}".$newline;
echo $emptyline;
echo$tab."public function down() {".$newline;
echo $tab.$tab."\$this->load->dbforge();".$newline;
echo $tab.$tab."\$this->dbforge->drop_table('user');".$newline;
echo $tab.$tab."\$this->load->dbforge();".$newline;
echo $tab.$tab."\$this->dbforge->drop_table('user_log');".$newline;
echo$tab."}".$newline;
echo $emptyline;
echo "}//end $filename class";
#endregion