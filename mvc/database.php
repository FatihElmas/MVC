<?php

class Database {
    protected $mysql;
    private $db;


    public function __construct($host, $db, $username, $pass, $exception) {
        try {
            $this->mysql = new PDO("mysql:host=$host;dbname=$db;charset=utf8", "$username", "$pass");
            $this->mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $db;
        } catch(PDOException $e) {
            if (is_callable($exception)) {
                call_user_func_array($exception);
            } else {
                echo $e->getMessage();
            }
        }
    }

    public function getDB() {
        return $this->mysql;
    }
    /**
     * Usage
     *    -> createTable('tableName', ['id INTEGER', 'string varchar(20)'...])
     */
    public function createTable($table, $columns) {
        $columns = implode(",\n", $columns);
        $query = "CREATE TABLE IF NOT EXISTS $table ($columns)";
        $this->mysql->exec($query);
    }

    /**
     * Usage
     *    -> insert('tableName', ['column' => 'object'])
     */
    public function insert($table, $values = array())
    {
        foreach ($values as $field => $v)
            $ins[] = ':' . $field;

        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($values));
        $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

        $sth = $this->mysql->prepare($sql);
        foreach ($values as $f => $v)
        {
            $sth->bindValue(':' . $f, $v);
        }
        $sth->execute();
    }
    /**
     * Usage
     *    -> delete('tableName', ['column' => 'object'])
     */
    public function delete($table, $data)  {
        for ($i=0; $i < count($data); $i++) { 
            $key = array_keys($data)[$i];
            $val = array_values($data)[$i];
            if (is_string($val)) {
                $val = "'$val'";
            }
            $sql = "DELETE FROM $table WHERE $key=$val";
            $this->mysql->prepare($sql)->execute();
        }
            
    }
}