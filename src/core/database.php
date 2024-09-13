<?php

namespace Mvc\Project\core;

class database {
    public $table_name;
    private $sql;
    private $database_connection;
    public function __construct($table_name)
    {
        $this->database_connection = mysqli_connect($_ENV["DATABASE_HOST"], $_ENV["DATABASE_ROOT"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);
        $this->table_name = $table_name;
    }

    public function insert($data) {
        $columns="";
        $values="";
        foreach($data as $column => $value):
            $columns .= " `$column`,";
            $values .= " '$value',";
        endforeach;
        $columns = rtrim($columns, ",");
        $values = rtrim($values, ",");
        $this->sql = "INSERT INTO `$this->table_name` ($columns) VALUES ($values) ";
        return $this;
    }

    public function select($columns="*") {
        $this->sql = "SELECT $columns FROM $this->table_name";
        return $this;
    }

    public function update($data) {
        $rows = "";
        foreach($data as $column => $value):
            $rows .= "`$column`='$value',";
        endforeach;
        $rows = rtrim($rows, ",");
        $this->sql = "UPDATE $this->table_name SET $rows ";
        return $this;
    }

    public function delete() {
        $this->sql = "DELETE FROM `$this->table_name` ";
        return $this;
    }

    public function excute() {
        mysqli_query($this->database_connection, $this->sql);
        return mysqli_affected_rows($this->database_connection);
    }

    public function all() {
        $query = mysqli_query($this->database_connection, $this->sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function get() {
        $query = mysqli_query($this->database_connection, $this->sql);
        return mysqli_fetch_assoc($query);
    }

    public function where($column, $operator, $value) {
        $this->sql .= " WHERE `$column` $operator '$value' ";
        return $this;
    }

    public function andWhere($column, $operator, $value) {
        $this->sql .= " AND `$column` $operator '$value' ";
        return $this;
    }

    public function orWhere($column, $operator, $value) {
        $this->sql .= " OR `$column` $operator '$value' ";
        return $this;
    }

    public function innerJoin($table, $primaryKey, $foreignKey) {
        $this->sql .= " INNER JOIN `$table` ON $primaryKey = $foreignKey ";
        return $this;
    }

    public function leftJoin($table, $primaryKey, $foreignKey) {
        $this->sql .= " LEFT JOIN `$table` ON $primaryKey = $foreignKey ";
        return $this;
    }

    public function rightJoin($table, $primaryKey, $foreignKey) {
        $this->sql .= " RIGHT JOIN `$table` ON $primaryKey = $foreignKey ";
        return $this;
    }
}