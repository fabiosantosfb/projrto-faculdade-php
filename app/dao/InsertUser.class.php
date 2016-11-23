<?php
require_once ('app/model/Conexao.class.php');

class Insert extends ConexaoDb {

  public function insert($table, $parameters) {
      $sql = sprinf(
        'insert into %s (%s) value (%s)', $table,
        implode(', ',array_keys($parameters)),
        ':' implode(', :',array_keys($parameters))
      );

      try {
        $statement = Parent::getInstance()->prepare($sql);
        $statement->execute($parameters);
      } catch(Exception $ex) {
          die($ex->getMessage());
      }

  }
}
