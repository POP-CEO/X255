<?php
namespace System;

use PDO;
use PDOException;

class Database
{
/**
* Application Object 
* 
* @var \System\Application
*/ 
private $app;
/**
 * PDO Connection
 * 
 * @var PDo
 */
private static $Connection;
/**
 * Construct Function 
 * 
 * @param \System\Application $app 
 */
/**
 * Table Name
 * 
 * @var sring 
 */    
private $table;
/**
 * Dindings Container
 * 
 * @var sring 
 */    
private $binding=[];    
/**
 * Data Container
 * 
 * @var Array
 */
private $data=[];
/**
 * Where 
 * 
 * @var Array
 */
private $wheres=[];  
/**
 * Get the Last Insert Id 
 *
 * @var int
 */

private $selects=[];
private $limit=[];
private $offset=[];
private $joins=[];
private $orderBy=[];
private $row=0;
private $lastId;
/**
 * Mysql Local host
 *
 * @var string
 */
protected $host="localhost";
/**
 * Mysql User name
 *
 * @var string
 */
protected $user="root";
/**
 * Mysql Password
 *
 * @var string
 */
protected $pass="";
/**
 * Mysql Databases name 
 *
 * @var string
 */
protected $db="blog";

public function __construct(Application $app) {
    $this->app=$app;
    if(!$this->isConnected()){
        $this->connect();
    }
}
    
   private function isConnected()
{
    
return static::$Connection instanceof PDO;
}
    
    private function connect()
    {

    try 
          {
            self::$Connection=new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
            self::$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$Connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
            self::$Connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
          }

catch(PDOException $e)
{
  die($e->getMessage());
}
}
/**
 * Get DataBase Connection Object PDo object
 * 
 * @return PDO
 */
   public function connection()
   {
       return static::$Connection;
   }
   
   
public function select($select)
{
    $this->selects[]=$select;
    return $this;
}

public function join($joins)
{
    $this->joins[]=$joins;
    return $this;
}
public function limit($limit,$offset=0)
{
    $this->limit[]=$limit;
    $this->offset[]=$offset;
    return $this;
}
public function orderBy($orderBy,$sort='ASC')
{
 $this->orderBy=[$orderBy,$sort];   
 return $this;
}

public function fetchs($table=null)
{
    if($table){
        $this->table($table);
    }
    
    $sql=$this->fetch_St();
    $result=$this->query($sql,$this->binding)->fetch();
    $this->reset();
    return $result;
}

public function delete($table=null)
{
if($table){
    $this->table($table);
}

$sql='DELETE FROM'.'`'.$this->table.'`';;
if($this->wheres){
    $sql.='WHERE'.' '.implode('', $this->wheres);
}
$this->query($sql,$this->binding);
$this->lastId=$this->connection()->lastInsertId();
$this->reset();
return $this;
}
public function fetchAll($table=null)
{
    if($table){
        $this->table($table);
    }
    
    $sql=$this->fetch_St();
    $query=$this->query($sql,$this->binding);
    $results=$query->fetchAll();
    $this->row=$query->rowCount();
    $this->reset();
    return $results;
}
public function rows()
{
    return $this->row;
}
public function fetch_St()
{
    $sql='SELECT ';
    if($this->selects){
        $sql.= implode(',', $this->selects);
    } else {
    $sql.='*';    
    }
    $sql.='FROM '.' '.$this->table.' ';
        if($this->joins){
        $sql.= implode(' ', $this->joins);
    }
        if($this->wheres){
        $sql.='WHERE '.implode(' ', $this->wheres).' ';
    }
        if($this->limit){
        $sql.='LIMIT '. implode(' ', $this->limit);
    }
        if($this->offset){
        $sql.='OFFSET '.implode(' ', $this->offset);
    }
       if($this->orderBy){
        $sql.=' ORDER BY '.' '. implode(' ', $this->orderBy);
    }
   return $sql; 
}

/**
 * Set the Table Name
 * 
 * @return $this
 */
public function table($table)
{
    $this->table=$table;
    return $this;
}

/**
 * Set the Table Name
 * 
 * @return $this
 */
public function from($table)
{
    return $this->table($table);
}

public function lastId()
{
    return $this->lastId;
}
/**
 * Set the data that will be  stor in databases
 *
 * @param mixed $key
 * @param mixed $value
 * @return $this
 */
public function data($key,$value=null)
{
if(is_array($key)){
    $this->data=array_merge($this->data,$key);
 
}else{
    $this->data[$key]=$value;
}
return $this;
}
/**
 * nsert Into dataBases
 *
 * @param string $table
 * @return void
 */
public function insert($table=null)
{
if($table){
    $this->table($table);
}

$sql='INSERT INTO'.'`'.$this->table.'`'.'SET';
foreach ($this->data as $key=>$value){
    $sql .=' `'. $key .'`=? , ';
    $this->addToBindings($value);

}
$sql=rtrim($sql,', ');
$this->query($sql,$this->binding);
$this->lastId=$this->connection()->lastInsertId();
$this->reset();
return $this;
}
/**
 * update Into dataBases
 *
 * @param string $table
 * @return void
 */
public function update($table=null)
{
if($table){
    $this->table($table);
}

$sql='UPDATE'.'`'.$this->table.'`'.'SET';
foreach ($this->data as $key=>$value){
    $sql .=' `'. $key .'`=? , ';
    $this->addToBindings($value);

}
$sql=rtrim($sql,', ');
if($this->wheres){
    $sql.='WHERE'.' '.implode('', $this->wheres);
}
$this->query($sql,$this->binding);
$this->lastId=$this->connection()->lastInsertId();
$this->reset();
return $this;
}
/**
 * Add The Given value to bindings
 *
 * @param mixed $value
 * 
 * @return void
 */
private function addToBindings($value)
{
    if(is_array($value)){
        $this->binding= array_merge($this->binding,$value);
    }else{
       $this->binding[]=$value; 
    }
    
    
}

/**
 * Add New Where Clause
 * 
 * @return  $this
 */
public function where()
{
  $bindings= func_get_args();
  $sql= array_shift($bindings);
  $this->addToBindings($bindings);
  $this->wheres[]=$sql;
  return $this;
}

/**
 * Execute the given sql statement
 *
 * 
 * @return \PDO Statement
 */
public function query(...$bindings)
{
$sql=array_shift($bindings);
 if(count($bindings)==1 AND is_array($bindings[0])){
     $bindings=$bindings[0];
     }
try{     
 $query=$this->connection()->prepare($sql);
 
   foreach ($bindings AS $key => $value){
       $query->bindValue($key+1,$value);
   }
   $query->execute();
   return $query;
   }catch(PDOException $e){
       die($e->getMessage());
   }
}

private function reset()
{
$this->data=[];
$this->binding=[];
$this->limit=null;
$this->offset=null;
$this->joins=[];
$this->selects=[];
$this->wheres=[];
$this->table=null;
$this->orderBy=[];
}

}