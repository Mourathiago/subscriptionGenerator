<?php
require_once('db.class.php');
class functions extends db
{
	public function select($table, $select = '*', $where = '1')
    {
        $sql = "SELECT $select FROM $table WHERE $where";
        $query = db::prepare($sql);
        $query -> execute();

        return $query -> fetchAll();
    }

    public function insert($table, $data)
    {
        $field=array_keys($data);
        $value=array_values($data);
        $sql = "INSERT INTO $table (";
        foreach($field as $values){ $sql.="$values,"; }
        $sql=substr_replace($sql,")",-1,1);
        $sql.=" VALUES(";
        foreach($value as $values){ $sql.='"'.$values.'",'; }
        $sql=substr_replace($sql,")",-1,1);
        $query = db::prepare($sql);
        return $query -> execute();
    }

    public function update($table, $data, $where = '1')
    {
        $field=array_keys($data);
        $value=array_values($data);
        $sql="UPDATE $tabela SET ";
        for($i=0;$i<count($data);$i++)
        {
            $sql.=$arrcampos[$i].'="'.$arrvalores[$i].'",';
        }
        $sql=substr_replace($sql," ",-1,1);
        $sql.="WHERE $where";
        $query = db::prepare($sql);
        return $query -> execute();
    }

    public function delete($table, $where = '1')
    {
        $sql="DELETE FROM $tabela WHERE $clausula"; 
        $query = db::prepare($sql);
        return $query -> execute();
    }
}