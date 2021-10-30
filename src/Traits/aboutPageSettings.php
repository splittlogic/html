<?php


/*
|--------------------------------------------------------------------------
| about - Trait to display how-to of html package
|--------------------------------------------------------------------------
|
| Required Traits:
|   settings
|
| check()     - Verify content is formatted correctly
*/


namespace splittlogic\html\Traits;


use Illuminate\Support\Str;


trait aboutPageSettings
{


  // About Card
  public function aboutCard($header = null, $title = null, $content = null, $headerBG = null, $headerText = null)
  {

    // Check for title BG
    if (!is_null($headerBG))
    {

      $this->class('bg-' . $headerBG);

    }

    if (!is_null($headerText))
    {

      $this->class('text-' . $headerText);

    }

    $header = $this->class('card-header')
      ->div($header);

    $title = $this->class('card-title')
      ->h5($title);

    $body = $this->class('card-body')
      ->class('bg-dark')
      ->div($title . $content);

    return $this->class('card')
      ->div($header . $body);

  }


  // About CSS
  public function aboutCSS()
  {

    // Set file path
    $path = base_path('vendor/splittlogic/html/src/about/');

    // Get css code
    if (file_exists($path . 'bootstrap.min.css'))
    {
      $lines = file($path . 'bootstrap.min.css');
      $this->style($lines);
    }

  }


  // About JS
  public function aboutJS()
  {

    // Set file path
    $path = base_path('vendor/splittlogic/html/src/about/');

    // Get JS code
    if (file_exists($path . 'bootstrap.bundle.min.js'))
    {
      $lines = file($path . 'bootstrap.bundle.min.js');
      $this->script($lines);
    }

  }


  // About Search List
  public function aboutSearch()
  {

    // Get Element array
    $elems = $this->aboutElementArray();

    // Get Settings array
    $atts = $this->aboutSettingsArray();

    // Create elements list
    foreach ($elems as $elem)
    {

      $this->value($elem['htmlchar'] . ' - ' . $elem['descchar']);
      $this->option();

    }

    // Create settings list
    foreach ($atts as $att)
    {

      $this->value($att['set'] . ' - ' . $att['descchar']);
      $this->option();

    }

    // Create datalist
    $this->id('searchTerms');
    return $this->datalist();

  }


  // About Search Results
  public function aboutSearchResults($search)
  {

    // Get Element array
    $elems = $this->aboutElementArray();

    // Get Settings array
    $atts = $this->aboutSettingsArray();

    // Build element results
    $elres = array();
    foreach ($elems as $elem)
    {

      if (Str::contains($elem['html'] . ' - ' . $elem['desc'], $search))
      {

        $elres[] = $elem;

      }

    }

    // Build settings results
    $setres = array();
    foreach ($atts as $key => $att)
    {

      if (Str::contains($att['set'] . ' - ' . $att['desc'], $search))
      {

        $att['trueSet'] = $key;

        $setres[] = $att;

      }

    }

    // Check the counts for return
    if (count($elres) == 0 && count($setres) == 0)
    {

      // Create alert message
      $message = 'No search results were found.  Please use menu links to navigate this guide.';
      $return = $this->class('alert')
        ->class('alert-danger')
        ->class('text-center')
        ->attribute(['role' => 'alert'])
        ->div($message);

      // Create center link
      $link = $this->a('Splittlogic HTML Home', route('splittlogic.html'));
      $return .= $this->class('text-center')
        ->h1($link);

      return $return;

    } else if (count($elres) == 1 && count($setres) == 0) {

      return redirect()->route('splittlogic.html.element', $elres[0]['elem']);

    } else if (count($elres) == 0 && count($setres) == 1) {

      return redirect()->route('splittlogic.html.setting', $setres[0]['trueSet']);

    } else {

      // Create alert message
      $message = 'There are ' . (count($elres) + count($setres)) . ' result(s)' ;
      $return = $this->class('alert')
        ->class('alert-success')
        ->class('text-center')
        ->attribute(['role' => 'alert'])
        ->div($message);

      // Table classes
      $classes = array(
        'table',
        'table-striped',
        'table-hover'
      );

      // Check for elements
      if (count($elres) > 0)
      {

        // Create title header
        $return .= $this->class('text-center')
          ->h1('Elements');

        // Table header
        $header = array();
        $header['elem'] = 'Element';
        $header['descchar'] = 'Description';
        $header['htmlchar'] = 'HTML Tag';
        $header['func'] = 'Function';
        $header['link'] = 'Link';

        // Create array into a table
        $return .= $this->arrayToTable($elres,$classes,$header,true);

      }

      // Check for settings
      if (count($setres) > 0)
      {

        // Create title header
        $return .= $this->class('text-center')
          ->h1('Settings');

        // Table header
        $header = array();
        $header['set'] = 'Attribute';
        $header['elements'] = 'Elements';
        $header['func'] = 'Function';
        $header['descchar'] = 'Description';
        $header['link'] = 'Link';

        // Create array into a table
        $return .= $this->arrayToTable($setres,$classes,$header,true);

      }

      return $return;

    }

    return $search;

  }


}
