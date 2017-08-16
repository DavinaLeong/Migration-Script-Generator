<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* Migration version: 
 * 16 Aug 2017, 12:07PM
 * 20170816120709
 */
class Migration_Initial_setup extends CI_Migration
{
	// Public Functions ----------------------------------------------------------------
	public function up()
	{
		$this->load->model('Script_runner_model');
		$output = $this->Script_runner_model->run_script($this->_up_script())['output_str'];
	
		$this->load->model('User_model');
		$admin = array(
			'username' => 'admin',
			'name' => 'Default Admin',
			'password_hash' => password_hash('password', PASSWORD_DEFAULT),
			'email' => 'admin@example.com',
			'access' => 'A',
			'status' => 'Active'
		);
		$admin['user_id'] = $this->User_model->insert($admin);
	
		if(ENVIRONMENT !== 'testing')
		{
			echo "<code>" . $output . "</code><hr/>";
			echo $admin['user_id'] > 0 ? "<p>Default Admin account created.</p>" : "<p>Failed to create Default Admin account.</p>";
		}
	}
	
	public function down()
	{
		$this->load->model('Script_runner_model');
		echo $this->Script_runner_model->run_script($this->_down_script())['output_str'];
	}
	
	// Private Functions ---------------------------------------------------------------
	private function _up_script()
	{
		$sql = "
			CREATE TABLE `ci_sessions` (
				`id` VARCHAR(40) NOT NULL,
				`ip_address` VARCHAR(45) NOT NULL,
				`TIMESTAMP` INT(10) UNSIGNED NOT NULL DEFAULT '0',
				`data` blob NOT NULL,
				KEY `ci_sessions_TIMESTAMP` (`TIMESTAMP`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			
			CREATE TABLE `user` (
				`user_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
				`username` VARCHAR(512) DEFAULT NULL,
				`name` VARCHAR(512) DEFAULT NULL,
				`password_hash` VARCHAR(512) DEFAULT NULL,
				`email` VARCHAR(512) DEFAULT NULL,
				`access` VARCHAR(512) DEFAULT NULL,
				`status` VARCHAR(512) DEFAULT NULL,
				`last_updated` TIMESTAMP DEFAULT NULL,
				PRIMARY KEY (`user_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
			
			CREATE TABLE `user_log` (
				`ulid` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
				`user_id` INT(11) UNSIGNED DEFAULT NULL,
				`message` VARCHAR(512) DEFAULT NULL,
				`TIMESTAMP` TIMESTAMP DEFAULT NULL,
				PRIMARY KEY (`ulid`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		return $sql;
	}
	
	private function _down_script()
	{
		$sql = "
			DROP TABLE IF EXISTS `ci_sessions`;
			DROP TABLE IF EXISTS `user`;
			DROP TABLE IF EXISTS `user_log`;
		";
		return $sql;
	}
	
} // end 20170816120709_Initial_setup class