<?php
	Class Vector{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 0.0;
		static $verbose = false;

		function	__construct($args){
			if (isset($args['dest'])){
				$tmp1 = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
				$tmp1->setX($args['dest']->getX());
				$tmp1->setY($args['dest']->getY());
				$tmp1->setZ($args['dest']->getZ());
				if (isset($args['orig'])){
					// print_r($tmp1);
					// print_r($tmp2);
					$this->_x = $tmp1->getX() - $args['orig']->getX();
					$this->_y = $tmp1->getY() - $args['orig']->getY();
					$this->_z = $tmp1->getZ() - $args['orig']->getZ();
					$this->_w = 0;
				}
				else{
					$this->_x = $tmp1->getX();
					$this->_y = $tmp1->getY();
					$this->_z = $tmp1->getZ();
					$this->_w = 0;
				}
				if (Self::$verbose){
					echo $this . " constructed\n";
				}
			}
		}
		function __toString(){
			if (Self::$verbose)
				return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));

		}
		static function doc(){
			echo file_get_contents("Vector.doc.txt")."\n";
		}

		public function getX()
		{
			return $this->_x;
		}
		public function getY()
		{
			return $this->_y;
		}
		public function getZ()
		{
			return $this->_z;
		}
		public function getW()
		{
			return $this->_w;
		}
		public function __destruct(){
			if (Self::$verbose){
				echo $this." destructed.\n";
			}
		}
		public function magnitude(){
			return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		}
		public function normalize(){
			$dist = $this->magnitude();
			if ($dist == 1){
				return clone $this;
			}
			else{
				return new Vector(array('dest' => new Vertex(array(
					'x' => $this->_x / $dist, 
					'y' => $this->_y / $dist, 
					'z' => $this->_z / $dist))));
			}
		}
		public function add(Vector $rhs){
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x + $rhs->getX(), 
				'y' => $this->_y + $rhs->getY(), 
				'z' => $this->_z + $rhs->getZ()))));
		}
		public function sub(Vector $rhs){
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x - $rhs->getX(), 
				'y' => $this->_y - $rhs->getY(), 
				'z' => $this->_z - $rhs->getZ()))));
		}
		public function opposite(){
			return new Vector(array('dest' => new Vertex(array(
				'x' => -$this->_x, 
				'y' => -$this->_y , 
				'z' => -$this->_z))));
		}
		public function scalarProduct($k){
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * $k, 
				'y' => $this->_y * $k, 
				'z' => $this->_z * $k))));
		}
		public function dotProduct(Vector $rhs){
			return (float)(($this->_x * $rhs->getX()) + ($this->_y * $rhs->getY()) + ($this->_z * $rhs->getZ()));
		}

		public function cos(Vector $rhs){
			return ((($this->_x * $rhs->getX()) + ($this->_y * $rhs->getY()) + ($this->_z * $rhs->getZ())) / 
					sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * 
					(($rhs->getX() * $rhs->getX()) + ($rhs->getY() * $rhs->getY()) + ($rhs->getZ() * $rhs->getZ()))));
		}

		public function crossProduct(Vector $rhs){
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
				'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
				'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
			))));
		}
	}
?>