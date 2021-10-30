<?php


/*
|--------------------------------------------------------------------------
| check - Trait to verify variables
|--------------------------------------------------------------------------
|
| Required Traits:
|   settings
|
| checkEOL()     - Verify content is formatted correctly
*/


namespace splittlogic\html\Traits;


trait check
{


  // Verify content is formatted correctly
  public function checkEOL($content = null)
  {

    // Check for eol
    if ($this->getSave('eol') == true)
    {

      $break = PHP_EOL;

    } else {

      $break = '';

    }

    // Check if content is set
    if ($content)
    {

      // Check if content is an array
      if (is_array($content))
      {

        // Check if empty
        if (!empty($content))
        {

          // Cycle through content to make string
          $contents = $content;
          $content = null;
          foreach ($contents as $c)
          {

            $content .= $c . $break;

          }

        }

      // Content is a string
      } else {

        $content = $content . $break;

      }

    }

    return $content;

  }


}
