<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_example extends CI_Migration {
    public function up() {
        $this->load->dbforge();
        $this->dbforge->add_field([
            'id'=>['type'=>'VARCHAR','constraint'=>'40','null'=>FALSE],
            'ip_address'=>['type'= > 'VARCHAR','constraint'=>'45','null'=>FALSE],
            'TIMESTAMP'=>['type'=>'INT' 'constraint'=>'10','unsigned'=>TRUE,'null'=>TRUE,'default'=>'0'],
            'data'=>['type'=>'blob','null'=>'default']
        ]);
        $this->dbforge->add_key('TIMESTAMP', TRUE);
        $this->dbforge->create_table('ci_sessions');
        //user
        $this->dbforge->add_field([
            'user_id'=>['type'=>'INT','constraint'=>'5','unsigned'=>TRUE,'null'=>FALSE,'auto_increment'=>TRUE],
            'username'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],
            'name'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],
            'password_hash'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],
            'email'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],
            'access'=>['type'=>'VARCHAR','constraint'=>'64','null'=>TRUE],
            'status'=>['type'=>'VARCHAR','constraint'=>'256','null'=>TRUE],
            'last_updated'=>['type'=>'TIMESTAMP','null'=>TRUE]
        ]);
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('user');
        //user log
        $this->dbforge->add_field([
            'user_log_id'=>['type'=>'INT','constraint'=>'5','unsigned'=>TRUE,'null'=>FALSE,'auto_increment'=>TRUE],
            'user_id'=>['type'=>'INT','constraint'=>'5','unsigned'=>TRUE,'null'=>TRUE],
            'message'=>['type'=>'VARCHAR','constraint'=>'512','null'=>TRUE],
            'timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->dbforge->add_key('user_log_id', TRUE);
        $this->dbforge->create_table('user_log');
    }
    public function down() {
        $this->load->dbforge();
        $this->dbforge->drop_table('user');
        $this->load->dbforge();
		$this->dbforge->drop_table('user_log');
    }
} //end Migration_example class