<?php

namespace Models\Core\App\Database\Shell;

use Exception;

define("ALLOW_DBQUERY_ACCESS", "TRUE");
class Create extends Query
{


  private $_table;

  private $_columns;

  private $_database;

  private $_sql;

  private $_action;


  public function table(string $table)
  {
    $this->_table = $table;
    $this->_setAction(1);
  }

  public function columns(array $columns)
  {
    $this->_columns = $columns;
  }

  public function database(string $database)
  {
    $this->_database = $database;
    $this->_setAction(0);
  }

  private function createDatabase()
  {
    if (isset($this->_database)) {
      $this->_sql = "CREATE DATABASE IF NOT EXISTS {$this->_database}";
      return true;
    }
    throw new Exception("Warning: Database name has  not been defined");
  }



  private function createTable()
  {
    if (isset($this->_table) && count($this->_columns)) {
      $this->_sql = "CREATE TABLE IF NOT EXISTS {$this->_table} (";
      $x = 1;
      foreach ($this->_columns as $column => $values) {
        $this->_sql .= "{$column} " . implode(" ", $values);
        if ($x < count($this->_columns)) {
          $this->_sql .= ", ";
        }
        $x++;
      }
      $this->_sql .= ");";
      return true;
    }
    throw new Exception("Warning: Database parameters are invalid or missing");
  }

  private function _setAction(int $action)
  {
    $this->_action = $action;
  }


  private function resolveAction()
  {
    if (isset($this->_action)) {
      switch ($this->_action) {
        case 0:
          return array(
            "action" => "CreateDatabase",
          );
        case 1:
          return array(
            "action" => "CreateTable",
          );
      }
    }
  }

  private function bindQuery()
  {
    $resolve = $this->ResolveAction();
    switch ($resolve["action"]) {
      case "CreateTable":
        if ($this->CreateTable()) {
          return true;
        }
        throw new Exception("Warning: An error occured while trying to create table");
      case "CreateDatabase":
        if ($this->CreateDatabase()) {
          return true;
        }
        throw new Exception("Warning: An error occured while trying to create database");
    }

  }

  public function execute()
  {
    if ($this->BindQuery()) {
      if (parent::RunSQL($this->_sql, 2)) {
        return true;
      }
    }
  }
}