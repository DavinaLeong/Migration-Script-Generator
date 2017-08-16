<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* Migration version: 
 * 16 Aug 2017, 12:54PM
 * 20170816125417
 */
class Migration_Sample_name extends CI_Migration
{
	// Public Functions ----------------------------------------------------------------
	public function up()
	{
		$this->load->model('Script_runner_model');
		$output = $this->Script_runner_model->run_script($this->_up_script())['output_str'];
		if(ENVIRONMENT !== 'testing')
		{
		    echo "<code>" . $output . "</code><hr/>";
		}
	}
	
	public function down()
	{
		$this->load->model('Script_runner_model');
		$output = $this->Script_runner_model->run_script($this->_down_script())['output_str'];
		if(ENVIRONMENT !== 'testing')
		{
		    echo "<code>" . $output . "</code><hr/>";
		}
	}
	
	// Private Functions ---------------------------------------------------------------
	private function _up_script()
	{
		$sql = "
			
		";
		return $sql;
	}
	
	private function _down_script()
	{
		$sql = "
			
		";
		return $sql;
	}
	
} // end 20170816125417_sample_name class