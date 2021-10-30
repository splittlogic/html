<?php


/*
|--------------------------------------------------------------------------
| get - Trait to get/return variables
|--------------------------------------------------------------------------
|
| Required Traits:
|   setget
|
| getAttributes()         - Return string of attributes
| getBodyAttributes()     - Return string of body attributes
| getClasses()            - Return classes as string or array
| getNonValueAttributes() - Return string of Non Value Attributes
*/


namespace splittlogic\html\Traits;


trait gets
{


  // Return string of attributes
  private function getAttributes()
  {

    // Declare return
    $return = '';

    // Check if attributes are empty
    if (is_null($this->get('attributes')))
    {

      return null;

    } else {

      // Check if attributes is an array
      if (is_array($this->get('attributes')))
      {

        // Cycle through all attributes
        foreach ($this->get('attributes') as $attribute)
        {

          // Get key and value of attribute
          foreach ($attribute as $att => $value)
          {

            // Set attribute
            $return .= ' ' . $att . '="' . $value . '"';

          }

        }

      }

      // Return attributes
      return $return;

    }

  }


  // Return string of body attributes
  public function getBodyAttributes()
  {

    // Check if body attributes are set
    if (is_null($this->getSave('bodyAttributes')))
    {

      $return = null;

    // Body attributes are set
    } else {

      $return = $this->getSaveString('bodyAttributes');

    }

    $this->reset('bodyAttributes');

    return $return;

  }


  // Return classes as string or array
  private function getClasses($array = null)
  {

    // Check if classes are empty
    if (is_null($this->get('classes')))
    {

      return null;

    // Classes are set
    } else {

      // Check if to return array
      if (is_null($array))
      {

        // Declare return string
        $return = '';

        // Set space check
        $spaceCheck = 0;

        // Cycle through all classes
        foreach ($this->get('classes') as $class)
        {

          // Check if space is needed
          if ($spaceCheck == 0)
          {

            $return .= $class;

          // Space is needed
          } else {

            $return .= ' ' . $class;

          }

          // Increase spacecounter
          $spaceCheck++;

        }

        // Return classes string
        return ' class="' . $return . '"';

      // Return array
      } else {

        return $this->get('classes');

      }

    }

  }


  // Return string of javascript
  public function getjs()
  {

    // Check if javascript is set
    if (is_null($this->getSave('javascript')))
    {

      $return = null;

    // Body attributes are set
    } else {

      $return = '<script>' . PHP_EOL
        . $this->getSaveString('javascript') . PHP_EOL
        . '</script>';

    }

    $this->reset('javascript');

    return $return;

  }


  // Return string of Non Value Attributes
  private function getNonValueAttributes()
  {

    // Check if Non Value Attributes are null
    if (is_null($this->get('nonValueAttributes')))
    {

      return null;

    // Non Value Attributes is set
    } else {

      // Declare return
      $return = '';

      foreach ($this->get('nonValueAttributes') as $attribute)
      {

        $return .= ' ' . $attribute;

      }

      return $return;

    }

  }


}
