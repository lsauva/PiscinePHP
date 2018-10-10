<?php

class Color
{
    public static   $verbose = FALSE;

    public          $red = 0;
    public          $green = 0;
    public          $blue = 0;

    static function         doc()
    {
        readfile('./Color.doc.txt');
        # NOTE : readfile ou print(file_get_content) ??
        print(PHP_EOL);
    }

    static private function limit_color( $color )
	{
		if ($color > 255)
			return (255);
		else if ($color < 0)
			return (0);
		return ($color);
	}


    public function         __construct( array $kwargs ) 
    {
        if (array_key_exists('rgb', $kwargs))
        {
            $rgb = (int)$kwargs['rgb'];
            # red value is the rest of the division of rgb value by (256 * 256)
            # la valeur red est le reste de la division de rgb par (256 * 256)
            # we can shift the bits of rgb 16 times to the right (16 * divide by 2)
            # on peut appliquer un decalage binaire a rgb de 16 fois a droite (16 divisions par 2)
            $this->red = self::limit_color($rgb >> 16);
            $this->green = self::limit_color(($rgb >> 8) % 256);
            $this->blue = self::limit_color($rgb % 256);
        }
        if (array_key_exists('red', $kwargs))
			$this->red = self::limit_color((int)$kwargs['red']);
		if (array_key_exists('green', $kwargs))
			$this->green = self::limit_color((int)$kwargs['green']);
		if (array_key_exists('blue', $kwargs))
			$this->blue = self::limit_color((int)$kwargs['blue']);
		if (self::$verbose == TRUE)
			echo ($this.' constructed.'. "\n");
    }

    function                __destruct ()
	{
		if (self::$verbose == TRUE)
			echo ($this.' destructed.' . "\n");
    }

    function		        __toString()
	{
        return('Color( red: ' . sprintf("%3s", $this->red) .', green: ' . sprintf("%3s", $this->green) . ', blue: '. sprintf("%3s", $this->blue) .' )');

    }

    function		        add( Color $color )
	{
		return (new Color([
			'red' => self::limit_color($this->red + $color->red),
			'green' => self::limit_color($this->green + $color->green),
			'blue' => self::limit_color($this->blue + $color->blue)
		]));
	}
	function		        sub( Color $color )
	{
		return (new Color([
			'red' => self::limit_color($this->red - $color->red),
			'green' => self::limit_color($this->green - $color->green),
			'blue' => self::limit_color($this->blue - $color->blue)
		]));
	}
	function		        mult( $f )
	{
		return (new Color([
			'red' => self::limit_color($this->red * $f),
			'green' => self::limit_color($this->green * $f),
			'blue' => self::limit_color($this->blue * $f)
		]));
	}

}
?>
