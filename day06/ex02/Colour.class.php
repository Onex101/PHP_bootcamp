<?php
	class	Colour{
		public $red;
		public $green;
		public $blue;
		static $verbose = false;

		public function __construct($colour){
			if (isset($colour['rgb'])){
				$this->red =  ($colour['rgb'] >> 16) & 0xFF;
				$this->green = ($colour['rgb'] >> 8) & 0xFF;;
				$this->blue = $colour['rgb'] & 0xFF;;
			}
			else if (isset($colour['red']) && isset($colour['green']) && isset($colour['blue'])){
				$this->red = $colour['red'];
				$this->green = $colour['green'];
				$this->blue = $colour['blue'];
			}
			if (Self::$verbose){
				echo $this." constructed.\n";
			}
		}
		public function add($colour)
		{
			return (new Colour(array('red' => $this->red + $colour->red,
									'green' => $this->green + $colour->green,
									'blue' => $this->blue + $colour->blue)));
		}
		public function sub($Colour)
		{
			return (new Colour(array('red' => $this->red - $colour->red,
									'green' => $this->green - $colour->green,
									'blue' => $this->blue - $colour->blue)));
		}
		public function mult($mult)
		{
			return (new Colour(array('red' => $this->red * $mult,
										'green' => $this->green * $mult,
										'blue' => $this->blue * $mult)));
		}
		function __toString()
		{
			return (sprintf("Colour( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
		}

		static function doc(){
			echo file_get_contents("Colour.doc.txt")."\n";
		}

		public function __destruct(){
			if (Self::$verbose){
				echo $this." destructed.\n";
			}
		}
	}
?>