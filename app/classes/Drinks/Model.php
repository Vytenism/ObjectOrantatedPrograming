<?php 

namespace App\Drinks;

class Model{
    
    private $db;
    private $table_name = 'drinks';
    /**
     * First call of event
     */
    public function __construct() {       
        $this->db = new \Core\FileDB(DB_FILE);
        $this->db->load();
        $this->db->createTable($this->table_name);
    }
    /**
     * 
     * @param \App\Drinks\Drink $drink
     * @return type
     */
    public function insert(Drink $drink){      
        return $this->db->insertRow($this->table_name, $drink->getData());
    }
    /**
     * Get array from DB under given conditions
     * @param type $conditions
     * @return type
     */
    public function get($conditions = []){
        $drinks = [];
        $rows = $this->db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data){
            $row_data['id'] = $row_id;
            $drinks[] = new Drink($row_data);
        }
        return $drinks;
    }
    /**
     * updates a row in DB
     * @param \App\Drinks\Drink $drink
     * @return type
     */
    public function update(Drink $drink){
        return $this->db->updateRow($this->table_name, $drink->getId(), $drink->getData());
    }
    /**
     * delete a row from DB
     * @param \App\Drinks\Drink $drink
     * @return type
     */
    public function delete(Drink $drink){
        return $this->db->deleteRow($this->table_name, $drink->getId());
    }
    /**
     * last call for this method
     */
        public function __destruct() {
        $this->db->save();
    }
}
