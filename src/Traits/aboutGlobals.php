<?php


/*
|--------------------------------------------------------------------------
| about - Trait to display how-to of html package
|--------------------------------------------------------------------------
|
| Required Traits:
|   helpers
|   settings
|
| check()     - Verify content is formatted correctly
*/


namespace splittlogic\html\Traits;


trait aboutGlobals
{


  // About Globals Table
  public function aboutGlobalsTable()
  {

    // Table classes
    $classes = array(
      'table',
      'table-striped',
      'table-hover'
    );

    // Table header
    $header = array();
    $header['set'] = 'Attribute';
    $header['func'] = 'Function';
    $header['descchar'] = 'Description';
    $header['link'] = 'Link';

    // Get Gobals array
    $data = $this->aboutGlobalsArray();

    // Create array into a table
    return $this->arrayToTable($data,$classes,$header,true);

  }


  // About Globals Data Array
  public function aboutGlobalsArray()
  {

    // List Globals
    $globs = [
      'accesskey',
      'class',
      'contenteditable',
      'data-*',
      'dir',
      'draggable',
      'hidden',
      'id',
      'lang',
      'spellcheck',
      'style',
      'tabindex',
      'atitle',
      'translate'
    ];

    // Get Settings array
    $atts = $this->aboutSettingsArray();

    // Build Data return array
    $data = array();

    foreach ($globs as $glob)
    {

      // Check if attribute exists
      if (isset($atts[$glob]))
      {

        $data[$glob] = $atts[$glob];

      }

    }

    return $data;

  }


}
