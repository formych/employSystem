<?php
    class Employ
	{
	    private $id;
	    private $name;
	    private $pwd;
	    private $grade;
	    private $salary;
	    private $email;
		
		function getId()
		{
		    return $this->id;
		}
		
		function setId($id)
		{
		    $this->$id = $id;
		}
		
		function getName()
		{
		    return $this->name;
		}
		
		function setName($name)
		{
		    $this->$name = $name;
		}
		
		function getPwd()
		{
		    return $this->pwd;
		}
		
		function setPwd($pwd)
		{
		    $this->$pwd = $pwd;
		}
		
		function getGrade()
		{
		    return $this->grade;
		}
		
		function setGrade($grade)
		{
		    $this->$grade = $grade;
		}
		
		function getSalary()
		{
		    return $this->salary;
		}
		
		function setSalary($id)
		{
		    $this->$salary = $salary;
		}
		
		function getEmail()
		{
		    return $this->email;
		}
		
		function setEmail($id)
		{
		    $this->$email = $email;
		}		
			
	}




?>