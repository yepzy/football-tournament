<?php

 /**
 * 
 */
class TeamSource
{
  private $id;
  private $name;
  
  function __construct__($id,$name)
  {
    $this->id               = $id;
    $this->name             = $name;
  }
// ********** GET  ********************
  function getName()
  {
    return $this->name;
  }
  
// ********* SET ******************
  function setName($name)
  {
    $this->name = $name;
  }
  
// ********* toString ******************
  function __toString()
  {
    return $this->name;
  }
// ********* dataBase ******************
}
