<?php

namespace splittlogic\html;

class html
{


	use Traits\check;
	use Traits\elements;
	use Traits\gets;
	use Traits\helpers;
	use Traits\setget;
	use Traits\settings;
	use Traits\tag;

	// About html package - How-To Guide
	use Traits\aboutElements;
	use Traits\aboutIntro;
	use Traits\aboutGlobals;
	use Traits\aboutPageSettings;
	use Traits\aboutSettings;


	// Run class as static
	public static function make()
	{

		$x = new html;
		return $x;

	}


}
