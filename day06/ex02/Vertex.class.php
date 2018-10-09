<?php
	include "Colour.class.php";
	class	Vertex{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1.0;
		private $_colour;
		static $verbose = false;

		function	__construct($args){
			$this->_colour = new Colour(array('red'=>255, 'green'=>255, 'blue'=>255));
			$this->_x = $args['x'];
			$this->_y = $args['y'];
			$this->_z = $args['z'];
			if (isset($argc['w']))
				$this->_w = $argc['w'];
			if (isset($args['colour']))
				$this->_colour = $args['colour'];
			if (Self::$verbose){
				echo $this . " constructed\n";
			}
		}
		function __toString(){
			if (Self::$verbose)
				return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, ", $this->_x, $this->_y, $this->_z, $this->_w) . $this->_colour);
			else
				return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
		}
		static function doc(){
			echo file_get_contents("Vertex.doc.txt")."\n";
		}
		public function __destruct(){
			if (Self::$verbose){
				echo $this." destructed.\n";
			}
		}
		public function getX()
		{
			return $this->_x;
		}
		public function setX($x)
		{
			$this->_x = $x;
		}
		public function getY()
		{
			return $this->_y;
		}
		public function setY($y)
		{
			$this->_y = $y;
		}
		public function getZ()
		{
			return $this->_z;
		}
		public function setZ($z)
		{
			$this->_z = $z;
		}
		public function getW()
		{
			return $this->_w;
		}
		public function setW($w)
		{
			$this->_w = $w;
		}
		public function getColour()
		{
			return $this->_colour;
		}
		public function setColour($colour)
		{
			$this->_colour = $colour;
		}
	}

?>