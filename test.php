<?php 
class Myclass
{
	public $prop1 = "I'm a class property!";

	public function _construct()
	{
		echo 'The class "',_CLASS_,'" was initiated!<br/>';
	}

	public function _destruct()
	{
		echo 'The class "',_CLASS_, '" was destroyed.<br/>';
	}

	public function setProperty($newval)
	{
		$this->prop1 = $newval;
	}

	public function getProperty()
	{
		return $this->prop1."<br/>";
	}
}

$obj = new Myclass;

echo $obj->getProperty();
unset($obj);
echo "End of file.<br/>";
?>