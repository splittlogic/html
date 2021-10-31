<?php


/*
|--------------------------------------------------------------------------
| elements - Trait to create html elements
|--------------------------------------------------------------------------
|
| Required Traits:
|   setget
|   settings
|   tag
|
| a()           - Create anchor element
| abbr()        - Create abbreviation element
| address()     - Create address element
| area()        - Create area element & save for map call
| article()     - Create article element
| aside()       - Create aside element
| audio()       - Create audio element
| b()           - Create bold element
| base()        - Create base element & save for when head tag is called
| bdi()         - Create bdi element
| bdo()         - Create bdo element
| blockquote()  - Create blockquote element
| body()        - Create body element & save body attributes
| br()          - Create line break element
| button()      - Create button element
| canvas()      - Create canvas element
| caption()     - Create caption element
| checkbox()    - Create checkbox input element
| cite()        - Create cite element
| code()        - Create code element
| col()         - Create col element
| colgroup()    - Create colgroup element
| comment()     - Create comment element
| css()         - Create a link element for a css file & save for when head tag is called
| data()        - Create data element
| datalist()    - Create datalist element from given content or saved option(s)
| dd()          - Create definition description element & save for dl call
| del()         - Create deleted element
| details()     - Create details element
| dfn()         - Create defined element
| dialog()      - Create dialog element
| div()         - Create divison (generic block) of content element
| dl()          - Create definition list element from given content or saved dl(s)
| dt()          - Create definition term element & save for dl call
| em()          - Create emphasis element
| embed()       - Create embedding element
| fieldset()    - Create fieldset element
| figcaption()  - Create figcaption element
| figure()      - Create figure element
| footer()      - Create footer element
| form()        - Create form element
| h1()          - Create h1 element
| h2()          - Create h2 element
| h3()          - Create h3 element
| h4()          - Create h4 element
| h5()          - Create h5 element
| h6()          - Create h6 element
| head()        - Create head element from given content or saved head elements
| header()      - Create header element
| hgroup()      - Create hgroup element
| hr()          - Create horizontal rule element
| i()           - Create italic element
| iframe()      - Create iframe element
| img()         - Create image element
| input()       - Create input element
| ins()         - Create inserted element
| js()          - Create script element for a js file & save for when head tag is called
| kbd()         - Create kbd element
| label()       - Create label element
| legend()      - Create legend element
| li()          - Create li element
| link()        - Create link element & save for when head tag is called
| main()        - Create main content element
| map()         - Create map element from given content or saved area(s)
| mark()        - Create mark / highlight element
| meta()        - Create meta element & save for when head tag is called
| meter()       - Create meter element
| nav()         - Create navigation links element
| noframes()    - Create noframes element
| noscript()    - Create noscript element
| object()      - Create object element from given content or saved param(s)
| ol()          - Create ordered list element from given content or saved li(s)
| optgroup()    - Create option group element from given content or saved option(s)
| option()      - Create option element & save for other element calls
| output()      - Create output element
| p()           - Create paragraph element
| param()       - Create parameter element & save for object tag call
| picture()     - Create picture element
| pre()         - Create preformatted element
| progress()    - Create progress bar element
| q()           - Create short quotation
| radio()       - Create radio input element
| rp()          - Create ruby parentheses element
| rt()          - Create ruby text element
| rtc()         - Create ruby text container element
| ruby()        - Create ruby element
| s()           - Create strikethrough text element
| samp()        - Create sample output element
| script()      - Create script element & save for when head tag is called
| section()     - Create section element
| select()      - Create select dropdown element from given content or saved option(s)
| small()       - Create small print element
| source()      - Create source element
| span()        - Create span element
| strong()      - Create strong importance element
| style()       - Create style element & save for head call
| sub()         - Create subscript text element
| summary()     - Create summary element
| sup()         - Create superscript text element
| table()       - Create table element from given content or saved content
| tbody()       - Create table body rows container element & save for table call
| tcaption()    - Create caption element to be saved for table element
| td()          - Create table cell element & save for tr call
| textarea()    - Create textarea element
| tfoot()       - Create table footer row container element & save for table call
| th()          - Create table header cell element & save for tr call
| thead()       - Create table header row container element & save for table call
| time()        - Create time element
| title()       - Create title element
| tr()          - Create table row element & save for thead, tbody, or table call
| track()       - Create track element
| u()           - Create underlined text element
| ul()          - Create unordered list element from given content or saved li(s)
| var()         - Create variable text element
| video()       - Create video element
| wbr()         - Create word break opportunity element
*/


namespace splittlogic\html\Traits;


trait elements
{


  // Create anchor element
  public function a($content = null, $href = null)
  {

    // Check if href is set
    if ($href)
    {

      $this->href($href);

    }

    // Create element
    return $this->tag('a', $content);

  }


  // Create abbreviation element
  public function abbr($content = null, $title = null)
  {

    // Check if title is set
    if ($title)
    {

      $this->atitle($title);

    }

    // Create element
    return $this->tag('abbr', $content);

  }


  // Create address element
  public function address($content = null)
  {

    return $this->tag('address', $content);

  }


  // Create area element & save for map call
  public function area($title = null, $shape = null, $coords = null, $href = null, $target = null)
  {

    // Check if title is set
    if ($title)
    {

      $this->atitle($title);

    }

    // Check if shape is set
    if ($shape)
    {

      $this->shape($shape);

    }

    // Check if coords is set
    if ($coords)
    {

      $this->coords($coords);

    }

    // Check if href is set
    if ($href)
    {

      $this->href($href);

    }

    // Check if target is set
    if ($target)
    {

      $this->target($target);

    }

    // Create element
    $area = $this->singletag('area');

    // Save area
    $this->save('area', $area);

    return $area;

  }


  // Create article element
  public function article($content = null)
  {

    return $this->tag('article', $content);

  }


  // Create aside element
  public function aside($content = null)
  {

    return $this->tag('aside', $content);

  }


  // Create audio element
  public function audio($src = null)
  {

    // Check for src
    if ($src)
    {

      $this->src($src);

    }

    return $this->tag('audio');

  }


  // Create b element
  public function b($content = null)
  {

    return $this->tag('b', $content);

  }


  // Create base element & save for when head tag is called
  public function base($href = null)
  {

    // Check if href is set
    if ($href)
    {

      $this->href($href);

    }

    // Create element
    $base = $this->singletag('base');

    // Save base
    $this->save('head', $base);

    return $base;

  }


  // Create bdi element
  public function bdi($content = null)
  {

    return $this->tag('bdi', $content);

  }


  // Create bdo element
  public function bdo($content = null)
  {

    return $this->tag('bdo', $content);

  }


  // Create blockquote element
  public function blockquote($content = null, $cite = null)
  {

    // Check if cite is null
    if ($cite)
    {

      $this->acite($cite);

    }

    // Create blockquote element
    return $this->tag('blockquote', $content);

  }


  // Create body element & save body attributes
  public function body($content = null)
  {

    // Save body attributes
      // Get tag classes
      $classes = $this->getClasses();

      // Get tag attributes
      $attributes = $this->getAttributes();

      // Get non value attributes
      $nonValueAttributes = $this->getNonValueAttributes();

    $this->save('bodyAttributes', $classes . $attributes . $nonValueAttributes);

    // Create body element
    return $this->tag('body', $content);

  }


  // Create line break element
  public function br()
  {

    return $this->singletag('br');

  }


  // Create button element
  public function button($content = null)
  {

    return $this->tag('button', $content);

  }


  // Create canvas element
  public function canvas($content = null)
  {

    return $this->tag('canvas', $content);

  }


  // Create caption element
  public function caption($content = null)
  {

    return $this->tag('caption', $content);

  }


  // Create checkbox input element
  public function checkbox($id = null, $value = null)
  {

    // Check for id
    if (!is_null($id))
    {

      $this->id($id);

    }

    // Check for value
    if (!is_null($value))
    {

      $this->value($value);

    }

    // Set type
    $this->type('checkbox');

    // Return element
    return $this->input();

  }


  // Create cite element
  public function cite($content = null)
  {

    return $this->tag('cite', $content);

  }


  // Create code element
  public function code($content = null)
  {

    return $this->tag('code', $content);

  }


  // Create col element
  public function col($content = null)
  {

    return $this->tag('col', $content);

  }


  // Create colgroup element
  public function colgroup($content = null)
  {

    return $this->tag('colgroup', $content);

  }


  // Create comment element
  public function comment($content = null)
  {

    return $this->singletag('<!-- ', ' -->', $content);

  }


  // Create a link element for a css file
  public function css($file = null)
  {

    return $this->link($file, 'stylesheet', 'text/css');

  }


  // Create data element
  public function data($content = null)
  {

    return $this->tag('data', $content);

  }


  // Create datalist element from given content or saved option(s)
  public function datalist($id = null, $content = null)
  {

      // Check if id is set
      if ($id)
      {

        $this->id($id);

      }

      // Check for content
      if (is_null($content))
      {

        // Check for saved option(s)
        if (!is_null($this->getSave('option')))
        {

          // Set content
          $content = $this->getSave('option');

        }

      }

      // Reset options
      $this->reset('option');

      // Create element
      return $this->tag('datalist', $content);

  }


  // Create definition description element & save for dl call
  public function dd($content = null)
  {

    // Create element
    $dd = $this->tag('dd', $content);

    // Save element
    $this->save('dl', $dd);

    // Return element
    return $dd;

  }


  // Create deleted element
  public function del($content = null, $cite = null, $datetime = null)
  {

    // Check for a citation
    if ($cite)
    {

      $this->acite($cite);

    }

    // Check for a date/time
    if ($datetime)
    {

      $this->datetime($datetime);

    }

    // Create element
    return $this->tag('del', $content);

  }


  // Create details element
  public function details($content = null, $open = null)
  {

    // Check if open is set
    if ($open)
    {

      $this->aopen($open);

    }

    // Create element
    return $this->tag('details', $content);

  }


  // Create defined element
  public function dfn($content = null)
  {

    return $this->tag('dfn', $content);

  }


  // Create dialog element
  public function dialog($content = null, $open = null)
  {

    // Check for open
    if (!is_null($open))
    {

      $this->open();

    }

    // Create element
    return $this->tag('dialog', $content);

  }


  // Create divison (generic block) of content element
  public function div($content = null)
  {

    return $this->tag('div', $content);

  }


  // Create definition list element from given content or saved dl(s)
  public function dl($content = null)
  {

    // Check for content
    if (is_null($content))
    {

      // Check for saved dl(s)
      if (!is_null($this->getSave('dl')))
      {

        // Set content
        $content = $this->getSave('dl');

      }

    }

    // Reset dls
    $this->reset('dl');

    // Return element
    return $this->tag('dl', $content);

  }


  // Create definition term element & save for dl call
  public function dt($content = null)
  {

    // Create element
    $dt = $this->tag('dt', $content);

    // Save element
    $this->save('dl', $dt);

    // Return element
    return $dt;

  }


  // Create emphasis element
  public function em($content = null)
  {

    return $this->tag('em', $content);

  }


  // Create embedding element
  public function embed($content = null, $src = null, $type = null, $height = null, $width = null)
  {

    // Check for source
    if ($src)
    {

      $this->src($src);

    }

    // Check for type
    if ($type)
    {

      $this->type($type);

    }

    // Check for height
    if ($height)
    {

      $this->height($height);

    }

    // Check for width
    if ($width)
    {

      $this->width($width);

    }

    // Create element
    return $this->singletag('embed', $content);

  }


  // Create fieldset element
  public function fieldset($content = null, $disabled = null)
  {

    // Check for disabled
    if (!is_null($disabled))
    {

      $this->disabled();

    }

    // Create element
    return $this->tag('fieldset', $content);

  }


  // Create figcaption element
  public function figcaption($content = null)
  {

    return $this->tag('figcaption', $content);

  }


  // Create figure element
  public function figure($content = null)
  {

    return $this->tag('figure', $content);

  }


  // Create footer element
  public function footer($content = null)
  {

    return $this->tag('footer', $content);

  }


  // Create form element
  public function form($content = null, $action = null, $method = null, $name = null, $autocomplete = null, $target = null, $enctype = null, $novalidate = null)
  {

    // Check for action
    if ($action)
    {

      $this->action($action);

    }

    // Check for method
    if ($method)
    {

      $this->method($method);

    }

    // Check for name
    if ($name)
    {

      $this->name($name);

    }

    // Check for autocomplete
    if ($autocomplete)
    {

      $this->autocomplete($autocomplete);

    }

    // Check for target
    if ($target)
    {

      $this->target($target);

    }

    // Check for enctype
    if ($enctype)
    {

      $this->enctype($enctype);

    }

    // Check for novalidate
    if (!is_null($novalidate))
    {

      $this->novalidate();

    }

    // Create element
    return $this->tag('form', $content);

  }


  // Create h1 element
  public function h1($content = null)
  {

    return $this->tag('h1', $content);

  }


  // Create h2 element
  public function h2($content = null)
  {

    return $this->tag('h2', $content);

  }


  // Create h3 element
  public function h3($content = null)
  {

    return $this->tag('h3', $content);

  }


  // Create h4 element
  public function h4($content = null)
  {

    return $this->tag('h4', $content);

  }


  // Create h5 element
  public function h5($content = null)
  {

    return $this->tag('h5', $content);

  }


  // Create h6 element
  public function h6($content = null)
  {

    return $this->tag('h6', $content);

  }


  // Create head element from given content or saved head elements
  public function head($content = null)
  {

    // Check if content is set
    if (is_null($content))
    {

      // Check if head is saved
      if (!is_null($this->getSave('head')))
      {

        // Set content
        $content = $this->getSave('head');

      }

    }

    // Create element
    $head = $this->tag('head', $content);

    // Reset head
    $this->reset('head');

    // Return element
    return $head;

  }


  // Create header element
  public function header($content = null)
  {

    return $this->tag('header', $content);

  }


  // Create heading group element
  public function hgroup($content = null)
  {

    return $this->tag('hgroup', $content);

  }


  // Create horizontal rule element
  public function hr()
  {

    return $this->singletag('hr');

  }


  // Create italic element
  public function i($content = null)
  {

    return $this->tag('i', $content);

  }


  // Create iframe element
  public function iframe($content = null, $src = null, $height = null, $width = null, $allowfullscreen = null)
  {

    // Check for source
    if ($src)
    {

      $this->src($src);

    }

    // Check for height
    if ($height)
    {

      $this->height($height);

    }

    // Check for width
    if ($width)
    {

      $this->width($width);

    }

    // Check for allowfullscreen
    if (!is_null($allowfullscreen))
    {

      $this->allowfullscreen();

    }

    // Create element
    return $this->tag('iframe', $content);

  }


  // Create image element
  public function img($src = null, $alt = null, $height = null, $width = null, $srcset = null, $sizes = null)
  {

    // Check if src is set
    if ($src)
    {

      $this->src($src);

    }

    // Check if alt is set
    if ($alt)
    {

      $this->alt($alt);

    }

    // Check if height is set
    if ($height)
    {

      $this->height($height);

    }

    // Check if width is set
    if ($width)
    {

      $this->width($width);

    }

    // Check if srcset is set
    if ($srcset)
    {

      $this->srcset($srcset);

    }

    // Check if sizes is set
    if ($sizes)
    {

      $this->sizes($sizes);

    }

    // Create element
    return $this->tag('img');

  }


  // Create input element
  public function input($type = null, $name = null, $placeholder = null, $required = null, $disabled = null)
  {

    // Check if type is set
    if ($type)
    {

      $this->type($type);

    }

    // Check if name is set
    if ($name)
    {

      $this->name($name);

    }

    // Check if placeholder is set
    if ($placeholder)
    {

      $this->placeholder($placeholder);

    }

    // Check if required is set
    if (!is_null($required))
    {

      $this->required();

    }

    // Check if disabled is set
    if (!is_null($disabled))
    {

      $this->disabled();

    }

    // Create element
    return $this->singletag('input');

  }


  // Create inserted element
  public function ins($content = null, $cite = null, $datetime = null)
  {

    // Check if citation is set
    if ($cite)
    {

      $this->acite($cite);

    }

    // Check if datetime is set
    if ($datetime)
    {

      $this->datetime($datetime);

    }

    // Create element
    return $this->tag('ins', $content);

  }


  // Create a script element for a js file
  public function js($js = null, $async = null)
  {

    return $this->script(null, $js, 'text/javascript', $async);

  }


  // Create kbd element
  public function kbd($content = null)
  {

    return $this->tag('kbd', $content);

  }


  // Create label element
  public function label($content = null, $for = null)
  {

    // Check if for is set
    if ($for)
    {

      $this->for($for);

    }

    // Create element
    return $this->tag('label', $content);

  }


  // Create legend element
  public function legend($content = null)
  {

    return $this->tag('legend', $content);

  }


  // Create list item element & save for li call
  public function li($content = null)
  {

    // Create element
    $li = $this->tag('li', $content);

    // Save li
    $this->save('li', $li);

    return $li;

  }


  // Create link element
  public function link($href = null, $rel = null, $type = null)
  {

    // Check if href is set
    if ($href)
    {

      $this->href($href);

    }

    // Check if rel is set
    if ($rel)
    {

      $this->rel($rel);

    }

    // Check if type is set
    if ($type)
    {

      $this->type($type);

    }

    // Create element
    $link = $this->singletag('link');

    // Save link
    $this->save('head', $link);

    return $link;

  }


  // Create main content element
  public function main($content = null)
  {

    return $this->tag('main', $content);

  }


  // Create map element from given content or saved area(s)
  public function map($name = null, $content = null)
  {

    // Check if name is set
    if ($name)
    {

      $this->name($name);

    }

    // Check if content is set
    if (is_null($content))
    {

      // Check for saved area(s)
      if (!is_null($this->getSave('area')))
      {

        // Set content
        $content = $this->getSave('area');

      }

    }

    // Reset areas
    $this->reset('area');

    // Create element
    return $this->tag('map', $content);

  }


  // Create marked / highlight element
  public function mark($content = null)
  {

    return $this->tag('mark', $content);

  }


  // Create meta element & save for when head tag is called
  public function meta($charset = null, $http = null, $name = null, $content = null)
  {

    // Check if charset is set
    if ($charset)
    {

      $this->charset($charset);

    }

    // Check if http is set
    if ($http)
    {

      $this->httpequiv($http);

    }

    // Check if name is set
    if ($name)
    {

      $this->name($name);

    }

    // Check if content is set
    if ($content)
    {

      $this->acontent($content);

    }

    // Create element
    $meta = $this->singletag('meta');

    // Save meta
    $this->save('head', $meta);

    return $meta;

  }


  // Create meter element
  public function meter($content = null, $value = null, $max = null, $min = null, $low = null, $high = null)
  {

    // Check if value is set
    if ($value)
    {

      $this->value($value);

    }

    // Check if max is set
    if ($max)
    {

      $this->max($max);

    }

    // Check if min is set
    if ($min)
    {

      $this->min($min);

    }

    // Check if low is set
    if ($low)
    {

      $this->low($low);

    }

    // Check if high is set
    if ($high)
    {

      $this->high($high);

    }

    // Create element
    return $this->tag('meter', $content);

  }


  // Create navigation links element
  public function nav($content = null)
  {

    return $this->tag('nav', $content);

  }


  // Create noframes element
  public function noframes($content = null)
  {

    return $this->tag('noframes', $content);

  }


  // Create noscript element
  public function noscript($content = null)
  {

    return $this->tag('noscript', $content);

  }


  // Create object element from given content or saved param(s)
  public function object($content = null, $name = null, $value = null, $height = null, $width = null)
  {

    // Check if name is set
    if ($name)
    {

      $this->name($name);

    }

    // Check if value is set
    if ($value)
    {

      $this->value($value);

    }

    // Check if height is set
    if ($height)
    {

      $this->height($height);

    }

    // Check if width is set
    if ($width)
    {

      $this->width($width);

    }

    // Check for content
    if (is_null($content))
    {

      // Check for save param(s)
      if (!is_null($this->getSave('param')))
      {

        // Set content
        $content = $this->getSave('param');

      }

    }

    // Reset param
    $this->reset('param');

    // Create element
    return $this->tag('object', $content);

  }


  // Create ordered list element from given content or saved li(s)
  public function ol($content = null, $type = null, $start = null, $reversed = null)
  {

    // Check if type is set
    if ($type)
    {

      $this->type($type);

    }

    // Check if start is set
    if ($start)
    {

      $this->start($start);

    }

    // Check if reversed is set
    if ($reversed)
    {

      $this->reversed();

    }

    // Check if content is set
    if (is_null($content))
    {

      // Check if li is saved
      if (!is_null($this->getSave('li')))
      {

        // Set content
        $content = $this->getSave('li');

      }

    }

    // Reset li
    $this->reset('li');

    return $this->tag('ol', $content);

  }


  // Create option group element from given content or saved option(s)
  public function optgroup($content = null, $label = null, $disabled = null)
  {

    // Check if label is set
    if ($label)
    {

      $this->alabel($label);

    }

    // Check if disabled is set
    if (!is_null($disabled))
    {

      $this->disabled();

    }

    // Check for content
    if (is_null($content))
    {

      // Check for saved option(s)
      if (!is_null($this->getSave('option')))
      {

        // Set content
        $content = $this->getSave('option');

      }

    }

    // Reset options
    $this->reset('option');

    // Create element
    return $this->tag('optgroup', $content);

  }


  // Create option element & save for other element calls
  public function option($content = null, $value = null)
  {

    // Check if value is set
    if ($value)
    {

      $this->value($value);

    }

    // Create element
    $option = $this->tag('option', $content);

    // Save option
    $this->save('option', $option);

    return $option;

  }


  // Create output element
  public function output($content = null, $name = null)
  {

    // Check if name is set
    if ($name)
    {

      $this->name($name);

    }

    // Create element
    return $this->tag('output', $content);

  }


  // Create paragraph element
  public function p($content = null)
  {

    return $this->tag('p', $content);

  }


  // Create path element
  public function path($content = null)
  {

    return $this->singletag('path', null, $content);

  }


  // Create parameter element & save for object tag call
  public function param($name = null, $value = null)
  {

    // Check if name is set
    if ($name)
    {

      $this->name($name);

    }

    // Check if value is set
    if ($value)
    {

      $this->value($name);

    }

    // Create element
    $param = $this->singletag('param');

    // Save param
    $this->save('param', $param);

    return $param;

  }


  // Create picture element
  public function picture($content = null)
  {

    return $this->tag('picture', $content);

  }


  // Create preformatted element
  public function pre($content = null)
  {

    return $this->tag('pre', $content);

  }


  // Create progress bar element
  public function progress($content = null, $value = null, $max = null)
  {

    // Check for value
    if ($value)
    {

      $this->value($value);

    }

    // Check for max
    if ($max)
    {

      $this->max($max);

    }

    return $this->tag('progress', $content);

  }


  // Create short quotation
  public function q($content = null, $cite = null)
  {

    // Check for cite
    if ($cite)
    {

      $this->acite($cite);

    }

    return $this->tag('q', $content);

  }


  // Create radio input element
  public function radio($name = null, $id = null)
  {

    // Check for name
    if (!is_null($name))
    {

      $this->name($name);

    }

    // Check for id
    if (!is_null($id))
    {

      $this->id($id);

    }

    // Set type
    $this->type('radio');

    // Create element
    return $this->input();

  }


  // Create ruby parentheses element
  public function rp($content = null)
  {

    return $this->tag('rp', $content);

  }


  // Create ruby text element
  public function rt($content = null)
  {

    return $this->tag('rt', $content);

  }


  // Create ruby text container element
  public function rtc($content = null)
  {

    return $this->tag('rtc', $content);

  }


  // Create ruby element
  public function ruby($content = null)
  {

    return $this->tag('ruby', $content);

  }


  // Create strikethrough text element
  public function s($content = null)
  {

    return $this->tag('s', $content);

  }


  // Create sample output element
  public function samp($content = null)
  {

    return $this->tag('samp', $content);

  }


  // Create script element & save for when head tag is called
  public function script($content = null, $src = null, $type = null, $async = null)
  {

    // Check for src
    if ($src)
    {

      $this->src($src);

    }

    // Check for type
    if ($type)
    {

      $this->type($type);

    }

    // Check for async
    if (!is_null($async))
    {

      $this->async();

    }

    // Create element
    $script = $this->tag('script', $content);

    // Save script
    $this->save('head', $script);

    return $script;

  }


  // Create section element
  public function section($content = null)
  {

    return $this->tag('section', $content);

  }


  // Create select dropdown element from given content or saved option(s)
  public function select($content = null, $name = null, $size = null, $multiple = null, $autofocus = null, $disabled = null, $required = null)
  {

    // Check for name
    if ($name)
    {

      $this->name($name);

    }

    // Check for size
    if ($size)
    {

      $this->size($size);

    }

    // Check for multiple
    if (!is_null($multiple))
    {

      $this->multiple();

    }

    // Check for autofocus
    if (!is_null($autofocus))
    {

      $this->autofocus();

    }

    // Check for disabled
    if (!is_null($disabled))
    {

      $this->disabled();

    }

    // Check for required
    if (!is_null($required))
    {

      $this->required();

    }

    // Check for content
    if (is_null($content))
    {

      // Check for saved option(s)
      if (!is_null($this->getSave('option')))
      {

        // Set content
        $content = $this->getSave('option');

      }

    }

    // Reset options
    $this->reset('option');

    // Create element
    return $this->tag('select', $content);

  }


  // Create small print element
  public function small($content = null)
  {

    return $this->tag('small', $content);

  }


  // Create source element
  public function source($content = null, $src = null, $srcset = null, $sizes = null, $type = null, $media = null)
  {

    // Check for src
    if ($src)
    {

      $this->src($src);

    }

    // Check for srcset
    if ($srcset)
    {

      $this->srcset($srcset);

    }

    // Check for sizes
    if ($sizes)
    {

      $this->sizes($sizes);

    }

    // Check for type
    if ($type)
    {

      $this->type($type);

    }

    // Check for media
    if ($media)
    {

      $this->media($media);

    }

    // Create element
    return $this->singletag('source', $content);

  }


  // Create generic inline span element
  public function span($content = null)
  {

    return $this->tag('span', $content);

  }


  // Create strong importance element
  public function strong($content = null)
  {

    return $this->tag('strong', $content);

  }


  // Create style element & save for head call
  public function style($content = null)
  {

    // Create element
    $style = $this->tag('style', $content);

    // Save style
    $this->save('head', $style);

    return $style;

  }


  // Create subscript text element
  public function sub($content = null)
  {

    return $this->tag('sub', $content);

  }


  // Create summary element
  public function summary($content = null)
  {

    return $this->tag('summary', $content);

  }


  // Create superscript text element
  public function sup($content = null)
  {

    return $this->tag('sup', $content);

  }


  // Create svg element
  public function svg($content = null)
  {

    return $this->tag('svg', $content);

  }


  // Create table element from given content or saved content
  public function table($content = null)
  {

    // Check for content
    if (is_null($content))
    {

      $content = array();

      // Check for caption
      if (!is_null($this->getSave('caption')))
      {

        // Set content
        $content = array_merge($content, $this->getSave('caption'));

        // Reset thead
        $this->reset('caption');

      }

      // Check for thead
      if (!is_null($this->getSave('thead')))
      {

        // Set content
        $content = array_merge($content, $this->getSave('thead'));

        // Reset thead
        $this->reset('thead');

      }

      // Check for tbody
      if (!is_null($this->getSave('tbody')))
      {

        // Set content
        $content = array_merge($content, $this->getSave('tbody'));

        // Reset tbody
        $this->reset('tbody');

      }

      // Check for tfoot
      if (!is_null($this->getSave('tfoot')))
      {

        // Set content
        $content = array_merge($content, $this->getSave('tfoot'));

        // Reset tfoot
        $this->reset('tfoot');

      }

      // Check for table rows
      if (!is_null($this->getSave('tr')))
      {

        // Set content
        $content = array_merge($content, $this->getSave('tr'));

        // Reset tr
        $this->reset('tr');

      }

      // Check if content is still empty
      if (empty($content))
      {

        $content = '';

      }

    }

    return $this->tag('table', $content);

  }


  // Create table body rows container element & save for table call
  public function tbody($content = null)
  {

    // Check for content
    if (is_null($content))
    {

      // Check for saved tr(s)
      if (!is_null($this->getSave('tr')))
      {

        // Set content
        $content = $this->getSave('tr');

      }
    }

    // Reset trs
    $this->reset('tr');

    // Create element
    $tbody = $this->tag('tbody', $content);

    // Save tbody
    $this->save('tbody', $tbody);

    return $tbody;

  }


  // Create caption element to be saved for table element
  public function tcaption($content = null)
  {

    // Create element
    $caption = $this->caption($content);

    // Save caption
    $this->save('caption', $caption);

    // Return element
    return $caption;

  }


  // Create table cell element & save for tr call
  public function td($content = null, $colspan = null, $rowspan = null)
  {

    // Check if colspan is set
    if ($colspan)
    {

      $this->colspan($colspan);

    }

    // Check if rowsapn is set
    if ($rowspan)
    {

      $this->rowspan($rowspan);

    }

    // Create element
    $td = $this->tag('td', $content);

    // Save td
    $this->save('td', $td);

    return $td;

  }


  // Create textarea element
  public function textarea($content = null, $name = null, $autocomplete = null, $minlength = null, $maxlength = null, $placeholder = null, $cols = null, $rows = null, $wrap = null, $disabled = null, $required = null, $autofocus = null, $readonly = null, $spellcheck = null)
  {

    // Check for name
    if ($name)
    {

      $this->name($name);

    }

    // Check for autocomplete
    if ($autocomplete)
    {

      $this->autocomplete($autocomplete);

    }

    // Check for minlength
    if ($minlength)
    {

      $this->minlength($minlength);

    }

    // Check for maxlength
    if ($maxlength)
    {

      $this->maxlength($maxlength);

    }

    // Check for placeholder
    if ($placeholder)
    {

      $this->placeholder($placeholder);

    }

    // Check for cols
    if ($cols)
    {

      $this->cols($cols);

    }

    // Check for rows
    if ($rows)
    {

      $this->rows($rows);

    }

    // Check for wrap
    if ($wrap)
    {

      $this->wrap($wrap);

    }

    // Check for disabled
    if (!is_null($disabled))
    {

      $this->disabled();

    }

    // Check for required
    if (!is_null($required))
    {

      $this->required();

    }

    // Check for autofocus
    if (!is_null($autofocus))
    {

      $this->autofocus();

    }

    // Check for readonly
    if (!is_null($readonly))
    {

      $this->readonly();

    }

    // Check for spellcheck
    if (!is_null($spellcheck))
    {

      $this->spellcheck();

    }

    // Create element
    return $this->tag('textarea', $content);

  }


  // Create table footer row container element & save for table call
  public function tfoot($content = null)
  {

    // Check for content
    if (is_null($content))
    {

      // Check for saved tr(s)
      if (!is_null($this->getSave('tr')))
      {

        // Set content
        $content = $this->getSave('tr');

      }
    }

    // Reset trs
    $this->reset('tr');

    // Create element
    $tfoot = $this->tag('tfoot', $content);

    // Save tfoot
    $this->save('tfoot', $tfoot);

    return $tfoot;

  }


  // Create table header cell element & save for tr call
  public function th($content = null, $colspan = null, $rowspan = null)
  {

    // Check if colspan is set
    if ($colspan)
    {

      $this->colspan($colspan);

    }

    // Check if rowsapn is set
    if ($rowspan)
    {

      $this->rowspan($rowspan);

    }

    // Create element
    $th = $this->tag('th', $content);

    // Save td
    $this->save('th', $th);

    return $th;

  }


  // Create table header row container element & save for table call
  public function thead($content = null)
  {

    // Check for content
    if (is_null($content))
    {

      // Check for saved tr(s)
      if (!is_null($this->getSave('tr')))
      {

        // Set content
        $content = $this->getSave('tr');

      }
    }

    // Reset trs
    $this->reset('tr');

    // Create element
    $thead = $this->tag('thead', $content);

    // Save thead
    $this->save('thead', $thead);

    return $thead;

  }


  // Create time element
  public function time($content = null, $datetime = null)
  {

    // Check for datetime
    if ($datetime)
    {

      $this->datetime($datetime);

    }

    // Create element
    return $this->tag('time', $datetime);

  }


  // Create title element
  public function title($content = null)
  {

    return $this->tag('title', $content);

  }


  // Create table row element & save for thead, tbody, or table call
  public function tr($content = null)
  {

    // Check for content
    if (is_null($content))
    {

      // Declare content
      $content = array();

      // Check for saved th(s)
      if (!is_null($this->getSave('th')))
      {

        // Set content
        $content = $this->getSave('th');

        // Reset ths
        $this->reset('th');

      // th(s) is not set
      }

      // Check for saved td(s)
      if (!is_null($this->getSave('td')))
      {

        // Set content
        $content = array_merge($content, $this->getSave('td'));

        // Reset tds
        $this->reset('td');

      }

    }

    // Create element
    $tr = $this->tag('tr', $content);

    // Save tr
    $this->save('tr', $tr);

    return $tr;

  }


  // Create track element
  public function track($src = null, $kind = null, $srclang = null, $label = null)
  {

    // Check for src
    if ($src)
    {

      $this->src($src);

    }

    // Check for kind
    if ($kind)
    {

      $this->kind($kind);

    }

    // Check for srclang
    if ($srclang)
    {

      $this->srclang($srclang);

    }

    // Check for label
    if ($label)
    {

      $this->alabel($label);

    }

    // Create element
    return $this->singletag('track');

  }


  // Create underlined text element
  public function u($content = null)
  {

    return $this->tag('u', $content);

  }


  // Create unordered list element from given content or saved li(s)
  public function ul($content = null)
  {

    // Check if content is set
    if (is_null($content))
    {

      // Check if li is saved
      if (!is_null($this->getSave('li')))
      {

        // Set content
        $content = $this->getSave('li');

      }

    }

    // Reset li
    $this->reset('li');

    return $this->tag('ul', $content);

  }


  // Create vairable text element
  public function var($content = null)
  {

    return $this->tag('var', $content);

  }


  // Create video element
  public function video($content = null, $src = null, $autoplay = null, $controls = null, $loop = null, $muted = null, $preload = null, $poster = null, $height = null, $width = null)
  {

    // Check for src
    if ($src)
    {

      $this->src($src);

    }

    // Check for autoplay
    if (!is_null($autoplay))
    {

      $this->autoplay();

    }

    // Check for controls
    if (!is_null($controls))
    {

      $this->controls();

    }

    // Check for loop
    if (!is_null($loop))
    {

      $this->loop();

    }

    // Check for muted
    if (!is_null($muted))
    {

      $this->muted();

    }

    // Check for preload
    if (!is_null($preload))
    {

      $this->preload();

    }

    // Check for poster
    if ($poster)
    {

      $this->poster($poster);

    }

    // Check for height
    if ($height)
    {

      $this->height($height);

    }

    // Check for width
    if ($width)
    {

      $this->width($width);

    }

    // Create element
    return $this->tag('video', $content);

  }


  // Create word break opportunity element
  public function wbr($content = null)
  {

    return $this->tag('wbr', $content);

  }


}
