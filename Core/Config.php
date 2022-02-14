<?php 
namespace Core;
class Config  
{
	protected $hostName; 
	protected $userName;
	protected $dbPassword;
	protected $dbName;

	public function __construct(){
		$this->hostName = 'localhost';
		$this->userName = 'root';
		$this->dbPassword = 'Tuan@8999';
		$this->dbName = 'newspaper';
	}
}
 ?>