<?php

class Simple_model extends CI_Model {
  
   
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();

    $this->create_table();
  }


  function get_last_item()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get($this->my_conf->table_name, 1);
    
    // print_r($query->result());
    $result = $query->result()[0];

    return $result->session_id;
  }
  
  
  function insert_item($item)
  {
    $this->session_id = $item;
    
    $data = array('session_id' => $item);
    $this->db->insert($this->my_conf->table_name, $data);
  }


  function get_row_count()
  {
    return $this->db->count_all($this->my_conf->table_name);
  }


  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    
    /* Specify the table schema */
    $fields = array(
                    'id' => array(
                                  'type' => 'INT',
                                  'constraint' => 5,
                                  'unsigned' => TRUE,
                                  'auto_increment' => TRUE
                              ),
                    'session_id' => array(
                                  'type' => 'VARCHAR',
                                  'constraint' => '100'
                              ),
                    'date TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */
    $this->dbforge->add_key('id', TRUE);
    
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table($this->my_conf->table_name, TRUE);
    
  }


}