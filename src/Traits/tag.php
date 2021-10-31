<?php


/*
|--------------------------------------------------------------------------
| tag - Trait to create generic html tag element
|--------------------------------------------------------------------------
|
| Required Traits:
|   gets
|   setget
|
| tag()     - Create given html tag
| tagline() - Create given html tag line
*/


namespace splittlogic\html\Traits;


trait tag
{


  // Create given html tag
  public function tag($tag, $content = null)
  {

    // Get tag classes
    $classes = $this->getClasses();

    // Get tag attributes
    $attributes = $this->getAttributes();

    // Get non value attributes
    $nonValueAttributes = $this->getNonValueAttributes();

    // Check if content is set
    if (is_null($content))
    {

      $content = $this->get('content');

    }

    // Check that content is formatted correctly
    $checkedContent = $this->checkEOL($content);

    // Build element
    $html = array();
    $html[] = '<' . $tag . $classes . $attributes . $nonValueAttributes . '>';
    $html[] =   $checkedContent;
    $html[] = '</' . $tag . '>';

    // Check that html is formatted correctly
    $return = $this->checkEOL($html);

    // Reset variables
    $this->reset();

    // Return tag
    return $return;

  }


  // Create single html tag
  public function singletag($prefix = null, $suffix = null, $content = null)
  {

    // Check content
    if (is_null($content))
    {

      $content = $this->get('content');

      // Check for content spacing
      if (!empty($content))
      {

        $content = ' ' . $content;

      }

    } else {

      $content = ' ' . $content;

    }

    // Get tag classes
    $classes = $this->getClasses();

    // Get tag attributes
    $attributes = $this->getAttributes();

    // Get non value attributes
    $nonValueAttributes = $this->getNonValueAttributes();

    // Check if suffix is null for spacing
    if ($suffix)
    {
      $suffix = ' ' . $suffix;
    }

    // Build element
    $html = '<' . $prefix . $classes . $attributes . $content . $nonValueAttributes . $suffix . '>';

    // Check that html is formatted correctly
    $return = $this->checkEOL($html);

    // Reset variables
    $this->reset();

    // Return tag
    return $return;

  }


}
