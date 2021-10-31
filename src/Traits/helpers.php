<?php


/*
|--------------------------------------------------------------------------
| helpers - Trait to add helper functions
|--------------------------------------------------------------------------
|
| Required Traits:
|   settings
|
| arrayToTable()  - Create an HTML table from an array
| htmlchar()      - Return given special characters to HTML entities
*/


namespace splittlogic\html\Traits;


trait helpers
{


  // Create an HTML table from an array
  public function arrayToTable($array = null, $classes = null, $header = null, $footer = null)
  {

    // Declare return
    $return = '';

    // Check if array is set
    if ($array)
    {

      // Check if array is an array
      if (is_array($array))
      {

        // Check for headers
        if (is_null($header))
        {

          foreach ($array as $arr)
          {

            // Check arr is an array
            if (is_array($arr))
            {

              foreach ($arr as $a)
              {

                // Create row cell
                $this->td($a);

              }

              // Create table row
              $this->tr();

            }

          }

        // Header is set
        } else {

          // Create header row cells
          foreach ($header as $key => $head)
          {

            $this->th($head);

          }

          // Create header row and thead
          $tr = $this->tr();
          $this->thead();

          foreach ($array as $arr)
          {

            foreach ($header as $key => $head)
            {

              // Check that array key exists
              if (isset($arr[$key]))
              {

                // Create table row cell
                $this->td($arr[$key]);

              }

            }

            // Create table row
            $this->tr();

          }

          // Create tbody
          $this->tbody();

          // Check for footer
          if (!is_null($footer))
          {

            $this->tfoot($tr);

          }

        }

        // Check for classes
        if ($classes)
        {

          // Check for array
          if (is_array($classes))
          {

            foreach ($classes as $class)
            {

              $this->class($class);

            }

          // Not an array
          } else {

            $this->class($classes);

          }

        }

        // Create table
        $return = $this->table();

      }

    }

    return $return;

  }


  // Return given special characters to HTML entities
  public function htmlchar($chars = null)
  {

    // Check if chars is set
    if ($chars)
    {

      $chars = htmlspecialchars($chars);

    }

    return $chars;

  }


}
