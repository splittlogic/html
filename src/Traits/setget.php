<?php


/*
|--------------------------------------------------------------------------
| setget - Trait to set and retrieve (get) package variables
|--------------------------------------------------------------------------
|
| get()           - Return requested variable
| getSave()       - Return save value
| getSaveString() - Return save value string
| reset()         - Reset variables
| save()          - Set save value
| savejs()        - Save javascript to be added when called by blade
| set()           - Set given variable
| setAdd()        - Add to array of given variable
| setSingle()     - Set given variable - replace if already set
*/


namespace splittlogic\html\Traits;


trait setget
{


  public static $splittlogic = array();


  // Return requested variable
  public function get($name = null)
  {

    // Check if name is set
    if ($name)
    {

      // Check if variable exists
      if (isset(self::$splittlogic[$name]))
      {

        return self::$splittlogic[$name];

      // Variable is not set
      } else {

        return null;

      }

    } else {

      // Return all variables
      return self::$splittlogic;

    }

    return null;

  }


  // Return save value
  public function getSave($name = null, $string = null)
  {

    // Check if name is set
    if ($name)
    {

      // Check if variable exists
      if (isset(self::$splittlogic['save'][$name]))
      {

        // Check for string
        if (is_null($string))
        {

          return self::$splittlogic['save'][$name];

        } else {

          return $this->checkEOL(self::$splittlogic['save'][$name]);

        }



      // Save variable doesn't exists
      } else {

        return null;

      }

    // No name is set
    } else {

      return null;

    }

  }


  // Return save value string
  public function getSaveString($name = null, $separator = null)
  {

    // Check if name is set
    if ($name)
    {

      $return = null;

      // Check if value is null
      if (!empty($this->getSave($name)))
      {

        // Cycle through array
        foreach ($this->getSave($name) as $var)
        {

          $return .= $var . $separator;

        }

      }

      return $return;

    // No name is set
    } else {

      return null;

    }

  }


  // Reset variables
  public function reset($save = null)
  {

    // Check if save is set
    if (is_null($save))
    {

      // Check if save variables are set
      if (isset(self::$splittlogic['save']))
      {

        $saveVariable = self::$splittlogic['save'];
        self::$splittlogic = array();
        self::$splittlogic['save'] = $saveVariable;

      // Save variable isn't set
      } else {

        self::$splittlogic = array();

      }

    // Save is set to remove
    } else {

      // Reset save
      self::$splittlogic['save'][$save] = null;

    }

  }


  // Set save value
  public function save($name = null, $value = null)
  {

    // Check if save variable is set
    if (!isset(self::$splittlogic['save']))
    {

      self::$splittlogic['save'] = array();

    }

    self::$splittlogic['save'][$name][] = $value;

  }


  // Save javascript to be added when called by blade
  public function savejs($js = null)
  {

    // Check if javascript is set
    if (!is_null($js))
    {

      $this->save('javascript', $js);

    }

  }


  // Set given variable
  public function set($name = null, $value = null, $type = null)
  {

    // Check if name is set
    if ($name)
    {

      // Check for add type
      if ($type == 'add')
      {

        $this->setAdd($name, $value);

      // Set single variable
      } else {

        $this->setSingle($name, $value);

      }

    }

  }


  // Add to array of given variable
  public function setAdd($name = null, $value = null)
  {

    // Check if name is set
    if ($name)
    {

      // Check for value
      if ($value)
      {

        // Check if variable exists
        if (!isset(self::$splittlogic[$name]))
        {

          self::$splittlogic[$name] = array();

        }

        // Add value to variable
        self::$splittlogic[$name][] = $value;

      }

    }

  }


  // Set given variable - replace if already set
  public function setSingle($name = null,$value = null)
  {

    // Check if name is set
    if ($name)
    {

      // Check if value is an array
      if (is_array($value))
      {

        self::$splittlogic[$name] = null;
        self::$splittlogic[$name] = array();

      } else {

        self::$splittlogic[$name] = null;

      }

      // Set given variable
      self::$splittlogic[$name] = $value;

    }

  }


}
