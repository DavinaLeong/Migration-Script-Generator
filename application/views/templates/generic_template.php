<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $descriptive_name
 * @var $version_number
 * @var $filename
 */
$newline = "\n";
$tab = "\t";
$emptyline = $tab . $newline;

echo "<?php defined('BASEPATH') OR exit('No direct script access allowed');" . $newline;
#region Migration Version
echo "/* Migration version: " . $newline;
echo " * " . $this->datetime_helper->now('d M Y, h:iA') . $newline;
echo " * " . $version_number . $newline;
echo " */" . $newline;
#endregion

#region Migration Class
echo "class Migration_" . $descriptive_name . " extends CI_Migration" . $newline;
echo "{" . $newline;
echo $tab . "// Public Functions ----------------------------------------------------------------" . $newline;
echo $tab . "public function up()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "\$this->load->model('Script_runner_model');" . $newline;
echo $tab . $tab . "echo \$this->Script_runner_model->run_script(\$this->_up_script())['output_str'];" . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo $tab . "public function down()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "\$this->load->model('Script_runner_model');" . $newline;
echo $tab . $tab . "echo \$this->Script_runner_model->run_script(\$this->_down_script())['output_str'];" . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo $tab . "// Private Functions ---------------------------------------------------------------" . $newline;
echo $tab . "private function _up_script()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "\$sql = \"" . $newline;
echo $tab . $tab . $emptyline;
echo $tab . $tab . "\";" . $newline;
echo $tab . $tab . "return \$sql;" . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo $tab . "private function _down_script()" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "\$sql = \"" . $newline;
echo $tab . $tab . $emptyline;
echo $tab . $tab . "\";" . $newline;
echo $tab . $tab . "return \$sql;" . $newline;
echo $tab . "}" . $newline;
echo $emptyline;
echo "} " . "// end " . $filename . " class";
#endregion