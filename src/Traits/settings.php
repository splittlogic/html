<?php


/*
|--------------------------------------------------------------------------
| settings - Trait to set options / settings
|--------------------------------------------------------------------------
|
| Required Traits:
|   setget
|
| accept()            - Set accept attribute
| acceptcharset()     - Set accept-charset attribute
| accesskey()         - Set accesskey attribute
| acite()             - Set citation attribute
| acontent()          - Set content attribute
| action()            - Set action attribute
| adata()             - Set data attribute
| aform()             - Set form attribute
| alabel()            - Set label attribute
| allowfullscreen()   - Set allowfullscreen attribute
| alt()               - Set alt attribute
| aopen()             - Set open attribute with value
| aspan()             - Set span attribute
| astyle()            - Set style attribute
| async()             - Set async attribute
| atitle()            - Set title attribute
| attribute()         - Set a unique attribute for the element
| autocomplete()      - Set autocomplete attribute
| autofocus()         - Set autofocus attribute
| autoplay()          - Set autoplay attribute
| cdata()             - Set data-* (custom data) attribute
| charset()           - Set charset attribute
| checked()           - Set checked attribute
| class()             - Set class for element
| cols()              - Set cols attribute
| colspan()           - Set colspan attribute
| content()           - Set content variable
| contenteditable()   - Set content editable attribute
| controls()          - Set controls attribute
| coords()            - Set coords attribute
| d()                 - Set d attribute
| datetime()          - Set datetime attribute
| default()           - Set default attribute
| defer()             - Set defer attribute
| dir()               - Set dir attribute
| dirname()           - Set dirname attribute
| disabled()          - Set disabled attribute
| download()          - Set download attribute
| draggable()         - Set draggable attribute
| enctype()           - Set enctype attribute
| fill()              - Set fill attribute
| for()               - Set for attribute
| formaction()        - Set formaction attribute
| headers()           - Set headers attribute
| height()            - Set height attribute
| hidden()            - Set hidden attribute
| high()              - Set high attribute
| href()              - Set href attribute
| hreflang()          - Set hreflang attribute
| httpequiv()         - Set http-equiv attribute
| id()                - Set id attribute
| ismap()             - Set ismap attribute
| kind()              - Set kind attribute
| lang()              - Set lang attribute
| list()              - Set list attribute
| loop()              - Set loop attribute
| low()               - Set low attribute
| ltr()               - Set ltr direction
| mailto()            - Set mailto href attribute
| max()               - Set max attribute
| maxlength()         - Set maxlength attribute
| media()             - Set media attribute
| method()            - Set method attribute
| min()               - Set min attribute
| minlength()         - Set minlength attribute
| multiple()          - Set multiple attribute
| muted()             - Set muted attribute
| name()              - Set name attribute
| novalidate()        - Set novalidate attribute
| onabort()           - Set onabort attribute
| onafterprint()      - Set onafterprint attribute
| onbeforeprint()     - Set onbeforeprint attribute
| onbeforeunload()    - Set onbeforeunload attribute
| onblur()            - Set onblur attribute
| oncanplay()         - Set oncanplay attribute
| oncanplaythrough()  - Set oncanplaythrough attribute
| onchange()          - Set onchange attribute
| onclick()           - Set onclick attribute
| oncontextmenu()     - Set oncontextmenu attribute
| oncopy()            - Set oncopy attribute
| oncuechange()       - Set oncuechange attribute
| oncut()             - Set oncut attribute
| ondblclick()        - Set ondblclick attribute
| ondrag()            - Set ondrag attribute
| ondragend()         - Set ondragend attribute
| ondragenter()       - Set ondragenter attribute
| ondragleave()       - Set ondragleave attribute
| ondragover()        - Set ondragover attribute
| ondragstart()       - Set ondragstart attribute
| ondrop()            - Set ondrop attribute
| ondurationchange()  - Set ondurationchange attribute
| onemptied()         - Set onemptied attribute
| onended()           - Set onended attribute
| onerror()           - Set onerror attribute
| onfocus()           - Set onfocus attribute
| onhashchange()      - Set onhashchange attribute
| oninput()           - Set oninput attribute
| oninvalid()         - Set oninvalid attribute
| onkeydown()         - Set onkeydown attribute
| onkeypress()        - Set onkeypress attribute
| onkeyup()           - Set onkeyup attribute
| onload()            - Set onload attribute
| onloadeddata()     - Set onloadeddata attribute
| onloadedmetadata()  - Set onloadedmetadata attribute
| onloadstart()       - Set onloadstart attribute
| onmousedown()       - Set onmousedown attribute
| onmousemove()       - Set onmousemove attribute
| onmouseout()        - Set onmouseout attribute
| onmouseover()       - Set onmouseover attribute
| onmouseup()         - Set onmouseup attribute
| onmousewheel()      - Set onmousewheel attribute
| onoffline()         - Set onoffline attribute
| ononline()          - Set ononline attribute
| onpagehide()        - Set onpagehide attribute
| onpageshow()        - Set onpageshow attribute
| onpaste()           - Set onpaste attribute
| onpause()           - Set onpause attribute
| onplay()            - Set onplay attribute
| onplaying()         - Set onplaying attribute
| onpopstate()        - Set onpopstate attribute
| onprogress()        - Set onprogress attribute
| onratechange()      - Set onratechange attribute
| onreset()           - Set onreset attribute
| onresize()          - Set onresize attribute
| onscroll()          - Set onscroll attribute
| onsearch()          - Set onsearch attribute
| onseeked()          - Set onseeked attribute
| onseeking()         - Set onseeking attribute
| onselect()          - Set onselect attribute
| onstalled()         - Set onstalled attribute
| onstorage()         - Set onstorage attribute
| onsubmit()          - Set onsubmit attribute
| onsuspend()         - Set onsuspend attribute
| ontimeupdate()      - Set ontimeupdate attribute
| ontoggle()          - Set ontoggle attribute
| onunload()          - Set onunload attribute
| onvolumechange()    - Set onvolumechange attribute
| onwaiting()         - Set onwaiting attribute
| onwheel()           - Set onwheel attribute
| open()              - Set open attribute without value
| optimum()           - Set optimum attribute
| orgheight()         - Set orgheight attribute
| orgwidth()          - Set orgwidth attribute
| pattern()           - Set pattern attribute
| placeholder()       - Set placeholder attribute
| poster()            - Set poster attribute
| preload()           - Set preload attribute
| readonly()          - Set readonly attribute
| rel()               - Set relationship attribute
| required()          - Set required attribute
| reversed()          - Set reversed attribute
| rows()              - Set rows attribute
| rowspan()           - Set rowspan attribute
| rtl()               - Set rtl direction
| sandbox()           - Set sandbox attribute
| scope()             - Set scope attribute
| selected()          - Set selected attribute
| shape()             - Set shape attribute
| size()              - Set size attribute
| sizes()             - Set sizes attribute
| spellcheck()        - Set spellcheck attribute
| src()               - Set source attribute
| srcdoc()            - Set srcdoc attribute
| srclang()           - Set srclang attribute
| srcset()            - Set srcset attribute
| start()             - Set start attribute
| step()              - Set step attribute
| tabindex()          - Set tabindex attribute
| target()            - Set target attribute
| translate()         - Set translate attribute
| type()              - Set type attribute
| usemap()            - Set usemap attribute
| value()             - Set value attribute
| viewbox()           - Set viewbox attribute
| volume()            - Set volume attribute
| width()             - Set width attribute
| wrap()              - Set wrap attribute
| xmlns()             - Set xmlns attribute
*/


namespace splittlogic\html\Traits;


trait settings
{


  // Set accept attribute
  public function accept($accept = null)
  {

    // Check if accept is set
    if ($accept)
    {

      $this->attribute(['accept' => $accept]);

    }

    return $this;

  }


  // Set accept-charset attribute
  public function acceptcharset($charset = null)
  {

    // Check if charset is set
    if ($charset)
    {

      $this->attribute(['accept-charset' => $charset]);

    }

    return $this;

  }


  // Set accesskey attribute
  public function accesskey($key = null)
  {

    // Check if key is set
    if ($key)
    {

      $this->attribute(['accesskey' => $key]);

    }

    return $this;

  }


  // Set citation attribute
  public function acite($cite = null)
  {

    // Check if cite is set
    if ($cite)
    {

      $this->attribute(['cite' => $cite]);

    }

    return $this;

  }


  // Set content attribute
  public function acontent($content = null)
  {

    // Check if content is set
    if ($content)
    {

      $this->attribute(['content' => $content]);

    }

    return $this;

  }


  // Set action attribute
  public function action($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['action' => $action]);

    }

    return $this;

  }


  // Set data attribute
  public function adata($data = null)
  {

    // Check if data is set
    if ($data)
    {

      $this->attribute(['data' => $data]);

    }
  }


  // Set form attribute
  public function aform($form = null)
  {

    // Check if form is set
    if ($form)
    {

      $this->attribute(['form' => $form]);

    }

    return $this;

  }


  // Set label attribute
  public function alabel($label = null)
  {

    // Check if label is set
    if ($label)
    {

      $this->attribute(['label' => $label]);

    }

    return $this;

  }


  // Set allowfullscreen attribute
  public function allowfullscreen()
  {

    $this->attribute('allowfullscreen');

    return $this;

  }


  // Set alt attribute
  public function alt($alt = null)
  {

    // Check if alt is set
    if ($alt)
    {

      $this->attribute(['alt' => $alt]);

    }

    return $this;

  }


  // Set open attribute with value
  public function aopen($open = null)
  {

    // Check if open is set
    if ($open)
    {

      $this->attribute(['open' => $open]);

    }

    return $this;

  }


  // Set span attribute
  public function aspan($span = null)
  {

    // Check if span is set
    if ($span)
    {

      $this->attribute(['span' => $span]);

    }

    return $this;

  }


  // Set style attribute
  public function astyle($style = null)
  {

    // Check if style is set
    if ($style)
    {

      $this->attribute(['style' => $style]);

    }

    return $this;

  }


  // Set async attribute
  public function async()
  {

    $this->attribute('async');

  }


  public function atitle($title = null)
  {

    // Check if title is null
    if ($title)
    {

      $this->attribute(['title' => $title]);

    }

    return $this;

  }


  // Set a unique attribute for the element
  // Value Attributes
  // Example:
  // data-dismiss="alert"
  // attribute(['data-dismiss' => 'alert'])
  // Non Value Attributes
  // Example:
  // attribute('disabled')
  public function attribute($attribute)
  {

    // Check if attribute is an array
    if (is_array($attribute))
    {

      $this->set('attributes', $attribute, 'add');

    // attribute is non-value
    } else {

      $this->set('nonValueAttributes', $attribute, 'add');

    }

    return $this;

  }


  // Set autocomplete attribute
  public function autocomplete($autocomplete = null)
  {

    // Check if autocomplete is set
    if ($autocomplete)
    {

      $this->attribute(['autocomplete' => $autocomplete]);

    }

    return $this;

  }


  // Set autofocus attribute
  public function autofocus()
  {

    $this->attribute('autofocus');

    return $this;

  }


  // Set autoplay attribute
  public function autoplay()
  {

    $this->attribute('autoplay');

    return $this;

  }


  // Set data-* (custom data) attribute
  public function cdata($data = null, $value = null)
  {

    // Check if data & value is set
    if ($data && $value)
    {

      $this->attribute(['data-' . $data => $value]);

    }

    return $this;

  }


  // Set charset attribute
  public function charset($charset = null)
  {

    // Check if charset is set
    if ($charset)
    {

      $this->attribute(['charset' => $charset]);

    }

    return $this;

  }


  // Set checked attribute
  public function checked()
  {

    $this->attribute('checked');

    return $this;

  }


  // Set class for element
  public function class($class = null)
  {

    // Check if class is null
    if ($class)
    {

      // Add class to classes variable
      $this->set('classes', $class, 'add');

    }

    return $this;

  }


  // Set cols attribute
  public function cols($cols = null)
  {

    // Check if cols is set
    if ($cols)
    {

      $this->attribute(['cols' => $cols]);

    }

    return $this;

  }


  // Set colspan attribute
  public function colspan($colspan = null)
  {

    if ($colspan)
    {

      $this->attribute(['colspan' => $colspan]);

    }

    return $this;

  }


  // Set content variable
  public function content($content = null)
  {

    // Check if content is set
    if ($content)
    {

      $this->set('content', $content);

    }

    return $this;

  }


  // Set content editable attribute
  public function contenteditable()
  {

    $this->attribute(['contenteditable' => 'true']);

    return $this;

  }


  // Set controls attribute
  public function controls()
  {

    $this->attribute('controls');

    return $this;

  }


  // Set coords attribute
  public function coords($coords = null)
  {

    // Check if coords is null
    if ($coords)
    {

      $this->attribute(['coords' => $coords]);

    }

    return $this;

  }


  // Set d attribute
  public function d($value = null)
  {

    // Check if value is set
    if (!is_null($value))
    {

      $this->attribute(['d' => $value]);

    }

    return $this;

  }


  // Set datetime attribute
  public function datetime($datetime = null)
  {

    // Check if datetime is set
    if ($datetime)
    {

      $this->attribute(['datetime' => $datetime]);

    }

    return $this;

  }


  // Set defualt attribute
  public function default()
  {

    $this->attribute('default');

    return $this;

  }


  // Set defer attribute
  public function defer()
  {

    $this->attribute('defer');

    return $this;

  }


  // Set dir attribute
  public function dir($dir = null)
  {

    // Check if dir is null
    if ($dir)
    {

      $this->attribute(['dir' => $dir]);

    }

    return $this;

  }


  // Set dirname attribute
  public function dirname($name = null)
  {

    // Check if name is set
    if ($name)
    {

      $this->attribute(['dirname' => $name]);

    }

    return $this;

  }


  // Set disabled attribute
  public function disabled()
  {

    $this->attribute('disabled');

    return $this;

  }


  // Set download attribute
  public function download()
  {

    $this->attribute('download');

    return $this;

  }


  // Set draggable attribute
  public function draggable()
  {

    $this->attribute(['draggable' => 'true']);

    return $this;

  }


  // Set enctype attribute
  public function enctype($enctype = null)
  {

    // Check if enctype is set
    if ($enctype)
    {

      $this->attribute(['enctype' => $enctype]);

    }

    return $this;

  }


  // Set eol for line return in code
  public function eol()
  {

    $this->save('eol', true);

    return $this;

  }


  // Set fill attribute
  public function fill($fill = null)
  {

    // Check if fill is set
    if (!is_null($fill))
    {

      $this->attribute(['fill' => $fill]);

    }

    return $this;

  }


  // Set for attribute
  public function for($for = null)
  {

    // Check if for is set
    if ($for)
    {

      $this->attribute(['for' => $for]);

    }

    return $this;

  }


  // Set formaction attribute
  public function formaction($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['formaction' => $action]);

    }

    return $this;

  }


  // Set headers attribute
  public function headers($header = null)
  {

    // Check if header is set
    if ($header)
    {

      $this->attribute(['headers' => $header]);

    }

    return $this;

  }


  // Set height attribute
  public function height($height = null)
  {

    // Check if height is set
    if ($height)
    {

      $this->attribute(['height' => $height]);

    }

    return $this;

  }


  // Set hidden attribute
  public function hidden()
  {

    $this->attribute('hidden');

    return $this;

  }


  // Set high attribute
  public function high($high = null)
  {

    // Check if high is set
    if ($high)
    {

      $this->attribute(['high' => $high]);

    }

    return $this;

  }


  // Set href attribute
  public function href($href = null)
  {

    // Check if href is null
    if ($href)
    {

      $this->attribute(['href' => $href]);

    }

    return $this;

  }


  // Set hreflang attribute
  public function hreflang($lang = null)
  {

    // Check if lang is set
    if ($lang)
    {

      $this->attribute(['hreflang' => $lang]);

    }

    return $this;

  }


  // Set http-equiv attribute
  public function httpequiv($http = null)
  {

    // Check if http is set
    if ($http)
    {

      $this->attribute(['http-equiv' => $http]);

    }

    return $this;

  }


  // Set id attribute
  public function id($id = null)
  {

    // Check if id is null
    if ($id)
    {

      $this->attribute(['id' => $id]);

      $this->set('id', $id);

    }

    return $this;

  }


  // Set ismap attribute
  public function ismap()
  {

    $this->attribute('ismap');

    return $this;

  }


  // Set kind attribute
  public function kind($kind = null)
  {

    // Check if kind is set
    if ($kind)
    {

      $this->attribute(['kind' => $kind]);

    }

    return $this;

  }


  // Set lang attribute
  public function lang($lang = null)
  {

    // Check if lang is set
    if ($lang)
    {

      $this->attribute(['lang' => $lang]);

    }

    return $this;

  }


  // Set list attribute
  public function list($item = null)
  {

    // Check if item is null
    if ($item)
    {

      $this->attribute(['list' => $item]);

    }

    return $this;

  }


  // Set loop attribute
  public function loop()
  {

    $this->attribute('loop');

    return $this;

  }


  // Set low attribute
  public function low($low = null)
  {

    // Check if low is set
    if ($low)
    {

      $this->attribute(['low' => $low]);

    }

    return $this;

  }


  // Set ltr direction
  public function ltr()
  {

    $this->dir('ltr');

    return $this;

  }


  // Set mailto href attribute
  public function mailto($email = null)
  {

    // Check if email is null
    if ($email)
    {

      $this->href('mailto:' . $email);

    }

    return $this;

  }


  // Set max attribute
  public function max($max = null)
  {

    // Check if max is set
    if ($max)
    {

      $this->attribute(['max' => $max]);

    }

    return $this;

  }


  // Set maxlength attribute
  public function maxlength($maxlength = null)
  {

    // Check if maxlength is set
    if ($maxlength)
    {

      $this->attribute(['maxlength' => $maxlength]);

    }

    return $this;

  }


  // Set media attribute
  public function media($media = null)
  {

    // Check if media is set
    if ($media)
    {

      $this->attribute(['media' => $media]);

    }

    return $this;

  }


  // Set method attribute
  public function method($method = null)
  {

    // Check if method is set
    if ($method)
    {

      $this->attribute(['method' => $method]);

    }

    return $this;

  }


  // Set min attribute
  public function min($min = null)
  {

    // Check if min is set
    if ($min)
    {

      $this->attribute(['min' => $min]);

    }

    return $this;

  }


  // Set minlength attribute
  public function minlength($minlength = null)
  {

    // Check if minlength is set
    if ($minlength)
    {

      $this->attribute(['minlength' => $minlength]);

    }

    return $this;

  }


  // Set multiple attribute
  public function multiple()
  {

    $this->attribute('multiple');

    return $this;

  }


  // Set muted attribute
  public function muted()
  {

    $this->attribute('muted');

    return $this;

  }


  // Set name attribute
  public function name($name = null)
  {

    // Check if name is null
    if ($name)
    {

      $this->attribute(['name' => $name]);

    }

    return $this;

  }


  // Set novalidate attribute
  public function novalidate()
  {

    $this->attribute('novalidate');

    return $this;

  }


  // Set onabort attribute
  public function onabort($value = null)
  {

    // Check if value is set
    if ($value)
    {

      $this->attribute(['onabort' => $value]);

    }

    return $this;

  }


  // Set onafterprint attribute
  public function onafterprint($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onafterprint' => $action]);

    }

    return $this;

  }


  // Set onbeforeprint attribute
  public function onbeforeprint($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onbeforeprint' => $action]);

    }

    return $this;

  }


  // Set onbeforeunload attribute
  public function onbeforeunload($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onbeforeunload' => $action]);

    }

    return $this;

  }


  // Set onblur attribute
  public function onblur($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onblur' => $action]);

    }

    return $this;

  }


  // Set oncanplay attribute
  public function oncanplay($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oncanplay' => $action]);

    }

    return $this;

  }


  // Set oncanplaythrough attribute
  public function oncanplaythrough($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oncanplaythrough' => $action]);

    }

    return $this;

  }


  // Set onchange attribute
  public function onchange($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onchange' => $action]);

    }

    return $this;

  }


  // Set onclick attribute
  public function onclick($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onclick' => $action]);

    }

    return $this;

  }


  // Set oncontextmenu attribute
  public function oncontextmenu($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oncontextmenu' => $action]);

    }

    return $this;

  }


  // Set oncopy attribute
  public function oncopy($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oncopy' => $action]);

    }

    return $this;

  }


  // Set oncuechange attribute
  public function oncuechange($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oncuechange' => $action]);

    }

    return $this;

  }


  // Set oncut attribute
  public function oncut($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oncut' => $action]);

    }

    return $this;

  }


  // Set ondblclick attribute
  public function ondblclick($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondblclick' => $action]);

    }

    return $this;

  }


  // Set ondrag attribute
  public function ondrag($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondrag' => $action]);

    }

    return $this;

  }


  // Set ondragend attribute
  public function ondragend($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondragend' => $action]);

    }

    return $this;

  }


  // Set ondragenter attribute
  public function ondragenter($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondragenter' => $action]);

    }

    return $this;

  }


  // Set ondragleave attribute
  public function ondragleave($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondragleave' => $action]);

    }

    return $this;

  }


  // Set ondragover attribute
  public function ondragover($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondragover' => $action]);

    }

    return $this;

  }


  // Set ondragstart attribute
  public function ondragstart($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondragstart' => $action]);

    }

    return $this;

  }


  // Set ondrop attribute
  public function ondrop($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondrop' => $action]);

    }

    return $this;

  }


  // Set ondurationchange attribute
  public function ondurationchange($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ondurationchange' => $action]);

    }

    return $this;

  }


  // Set onemptied attribute
  public function onemptied($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onemptied' => $action]);

    }

    return $this;

  }


  // Set onended attribute
  public function onended($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onended' => $action]);

    }

    return $this;

  }


  // Set onerror attribute
  public function onerror($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onerror' => $action]);

    }

    return $this;

  }


  // Set onfocus attribute
  public function onfocus($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onfocus' => $action]);

    }

    return $this;

  }


  // Set onhashchange attribute
  public function onhashchange($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onhashchange' => $action]);

    }

    return $this;

  }


  // Set oninput attribute
  public function oninput($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oninput' => $action]);

    }

    return $this;

  }


  // Set oninvalid attribute
  public function oninvalid($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['oninvalid' => $action]);

    }

    return $this;

  }


  // Set onkeydown attribute
  public function onkeydown($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onkeydown' => $action]);

    }

    return $this;

  }


  // Set onkeypress attribute
  public function onkeypress($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onkeypress' => $action]);

    }

    return $this;

  }


  // Set onkeyup attribute
  public function onkeyup($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onkeyup' => $action]);

    }

    return $this;

  }


  // Set onload attribute
  public function onload($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onload' => $action]);

    }

    return $this;

  }


  // Set onloadeddata attribute
  public function onloadeddata($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onloadeddata' => $action]);

    }

    return $this;

  }


  // Set onloadedmetadata attribute
  public function onloadedmetadata($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onloadedmetadata' => $action]);

    }

    return $this;

  }


  // Set onloadstart attribute
  public function onloadstart($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onloadstart' => $action]);

    }

    return $this;

  }


  // Set onmousedown attribute
  public function onmousedown($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onmousedown' => $action]);

    }

    return $this;

  }


  // Set onmousemove attribute
  public function onmousemove($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onmousemove' => $action]);

    }

    return $this;

  }


  // Set onmouseout attribute
  public function onmouseout($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onmouseout' => $action]);

    }

    return $this;

  }


  // Set onmouseover attribute
  public function onmouseover($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onmouseover' => $action]);

    }

    return $this;

  }


  // Set onmouseup attribute
  public function onmouseup($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onmouseup' => $action]);

    }

    return $this;

  }


  // Set onmousewheel attribute
  public function onmousewheel($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onmousewheel' => $action]);

    }

    return $this;

  }


  // Set onoffline attribute
  public function onoffline($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onoffline' => $action]);

    }

    return $this;

  }


  // Set ononline attribute
  public function ononline($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ononline' => $action]);

    }

    return $this;

  }


  // Set onpagehide attribute
  public function onpagehide($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onpagehide' => $action]);

    }

    return $this;

  }


  // Set onpageshow attribute
  public function onpageshow($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onpageshow' => $action]);

    }

    return $this;

  }


  // Set onpaste attribute
  public function onpaste($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onpaste' => $action]);

    }

    return $this;

  }


  // Set onpause attribute
  public function onpause($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onpause' => $action]);

    }

    return $this;

  }


  // Set onplay attribute
  public function onplay($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onplay' => $action]);

    }

    return $this;

  }


  // Set onplaying attribute
  public function onplaying($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onplaying' => $action]);

    }

    return $this;

  }


  // Set onpopstate attribute
  public function onpopstate($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onpopstate' => $action]);

    }

    return $this;

  }


  // Set onprogress attribute
  public function onprogress($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onprogress' => $action]);

    }

    return $this;

  }


  // Set onratechange attribute
  public function onratechange($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onratechange' => $action]);

    }

    return $this;

  }


  // Set onreset attribute
  public function onreset($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onreset' => $action]);

    }

    return $this;

  }


  // Set onresize attribute
  public function onresize($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onresize' => $action]);

    }

    return $this;

  }


  // Set onscroll attribute
  public function onscroll($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onscroll' => $action]);

    }

    return $this;

  }


  // Set onsearch attribute
  public function onsearch($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onsearch' => $action]);

    }

    return $this;

  }


  // Set onseeked attribute
  public function onseeked($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onseeked' => $action]);

    }

    return $this;

  }


  // Set onseeking attribute
  public function onseeking($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onseeking' => $action]);

    }

    return $this;

  }


  // Set onselect attribute
  public function onselect($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onselect' => $action]);

    }

    return $this;

  }


  // Set onstalled attribute
  public function onstalled($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onstalled' => $action]);

    }

    return $this;

  }


  // Set onstorage attribute
  public function onstorage($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onstorage' => $action]);

    }

    return $this;

  }


  // Set onsubmit attribute
  public function onsubmit($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onsubmit' => $action]);

    }

    return $this;

  }


  // Set onsuspend attribute
  public function onsuspend($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onsuspend' => $action]);

    }

    return $this;

  }


  // Set ontimeupdate attribute
  public function ontimeupdate($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ontimeupdate' => $action]);

    }

    return $this;

  }


  // Set ontoggle attribute
  public function ontoggle($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['ontoggle' => $action]);

    }

    return $this;

  }


  // Set onunload attribute
  public function onunload($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onunload' => $action]);

    }

    return $this;

  }


  // Set onvolumechange attribute
  public function onvolumechange($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onvolumechange' => $action]);

    }

    return $this;

  }


  // Set onwaiting attribute
  public function onwaiting($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onwaiting' => $action]);

    }

    return $this;

  }


  // Set onwheel attribute
  public function onwheel($action = null)
  {

    // Check if action is set
    if ($action)
    {

      $this->attribute(['onwheel' => $action]);

    }

    return $this;

  }


  // Set open attribute without value
  public function open()
  {

    $this->attribute('open');

    return $this;

  }


  // Set optimum attribute
  public function optimum($value = null)
  {

    // Check if value is set
    if ($value)
    {

      $this->attribute(['optimum' => $value]);

    }

    return $this;

  }


  // Set orgheight attribute
  public function orgheight($height = null)
  {

    // Check if height is set
    if ($height)
    {

      $this->attribute(['orgheight' => $height]);

    }

    return $this;

  }


  // Set orgwidth attribute
  public function orgwidth($width = null)
  {

    // Check if width is set
    if ($width)
    {

      $this->attribute(['orgwidth' => $width]);

    }

    return $this;

  }


  // Set pattern attribute
  public function pattern($pattern = null)
  {

    // Check if pattern is set
    if ($pattern)
    {

      $this->attribute(['pattern' => $pattern]);

    }

    return $this;

  }


  // Set placeholder attribute
  public function placeholder($placeholder = null)
  {

    // Check if placeholder is null
    if ($placeholder)
    {

      $this->attribute(['placeholder' => $placeholder]);

    }

    return $this;

  }


  // Set poster attribute
  public function poster($poster = null)
  {

    // Check if poster is set
    if ($poster)
    {

      $this->attribute(['poster' => $poster]);

    }

    return $this;

  }


  // Set preload attribute
  public function preload()
  {

    $this->attribute('preload');

    return $this;

  }


  // Set readonly attribute
  public function readonly()
  {

    $this->attribute('readonly');

    return $this;

  }


  // Set relationship attribute
  public function rel($rel = null)
  {

    // Check if rel is null
    if ($rel)
    {

      $this->attribute(['rel' => $rel]);

    }

    return $this;

  }


  // Set required attribute
  public function required()
  {

    $this->attribute('required');

    return $this;

  }


  // Set reversed attribute
  public function reversed()
  {

    $this->attribute('reversed');

    return $this;

  }


  // Set rows attribute
  public function rows($rows = null)
  {

    // Check if rows is set
    if ($rows)
    {

      $this->attribute(['rows' => $rows]);

    }

    return $this;

  }


  // Set rowspan attribute
  public function rowspan($rowspan = null)
  {

    // Check if rowspan is set
    if ($rowspan)
    {

      $this->attribute(['rowspan' => $rowspan]);

    }

    return $this;

  }


  // Set rtl direction
  public function rtl()
  {

    $this->dir('rtl');

    return $this;

  }


  // Set sandbox attribute
  public function sandbox()
  {

    $this->attribute('sandbox');

    return $this;

  }


  // Set scope attribute
  public function scope($scope = null)
  {

    // Check if scope is set
    if ($scope)
    {

      $this->attribute(['scope' => $scope]);

    }

    return $this;

  }


  // Set selected attribute
  public function selected()
  {

    $this->attribute('selected');

    return $this;

  }


  // Set shape attribute
  public function shape($shape = null)
  {

    // Check if shape is null
    if ($shape)
    {

      $this->attribute(['shape' => $shape]);

    }

    return $this;

  }


  // Set size attribute
  public function size($size = null)
  {

    // Check if size is set
    if ($size)
    {

      $this->attribute(['size' => $size]);

    }

    return $this;

  }


  // Set sizes attribute
  public function sizes($sizes = null)
  {

    // Check if sizes is set
    if ($sizes)
    {

      $this->attribute(['sizes' => $sizes]);

    }

    return $this;

  }


  // Set spellcheck attribute
  public function spellcheck()
  {

    $this->attribute('spellcheck');

    return $this;

  }


  // Set source attribute
  public function src($src = null)
  {

    // Check if src is null
    if ($src)
    {

      $this->attribute(['src' => $src]);

    }

    return $this;

  }


  // Set srcdoc attribute
  public function srcdoc($doc = null)
  {

    // Check if doc is set
    if ($doc)
    {

      $this->attribute(['srcdoc' => $doc]);

    }

    return $this;

  }


  // Set srclang attribute
  public function srclang($srclang = null)
  {

    // Check if srclang is set
    if ($srclang)
    {

      $this->attribute(['srclang' => $srclang]);

    }

    return $this;

  }


  // Set srcset attribute
  public function srcset($srcset = null)
  {

    // Check if srcset is set
    if ($srcset)
    {

      $this->attribute(['srcset' => $srcset]);

    }

    return $this;

  }


  // Set start attribute
  public function start($start = null)
  {

    // Check if start is set
    if ($start)
    {

      $this->attribute(['start' => $start]);

    }

    return $this;

  }


  // Set step attribute
  public function step($step = null)
  {

    // Check if step is set
    if ($step)
    {

      $this->attribute(['step' => $step]);

    }

    return $this;

  }


  // Set tabindex attribute
  public function tabindex($index = null)
  {

    // Check if index is set
    if (!is_null($index))
    {

      $this->attribute(['tabindex' => $index]);

    }

    return $this;

  }


  // Set target attribute
  public function target($target = null)
  {

    // Check for blank
    if ($target == '' || $target == 'blank' || is_null($target))
    {

      $target = '_blank';

    // Check for self
    } else if ($target == 'self') {

      $target = '_self';

    // Check for parent
    } else if ($target == 'parent') {

      $target = '_parent';

    // Check for top
    } else if ($target == 'top') {

      $target = '_top';

    }

    $this->attribute(['target' => $target]);


    return $this;

  }


  // Set translate attribute
  public function translate($value = null)
  {

    // Check if value is set
    if ($value)
    {

      $this->attribute(['translate' => $value]);

    }

    return $this;

  }


  // Set type attribute
  public function type($type = null)
  {

    // Check if type is set
    if ($type)
    {

      $this->attribute(['type' => $type]);

    }

    return $this;

  }


  // Set usemap attribute
  public function usemap($map = null)
  {

    // Check if map is set
    if ($map)
    {

      $this->attribute(['usemap' => $map]);

    }

    return $this;

  }


  // Set value attribute
  public function value($value = null)
  {

    // Check if value is null
    if ($value)
    {

      $this->attribute(['value' => $value]);

    }

    return $this;

  }


  // Set viewBox attribute
  public function viewbox($value = null)
  {

    // Check if value is set
    if (!is_null($value))
    {

      $this->attribute(['viewBox' => $value]);

    }

    return $this;

  }


  // Set volume attribute
  public function volume($volume = null)
  {

    // Check if volume is set
    if ($volume)
    {

      $this->attribute(['volume' => $volume]);

    }

    return $this;

  }


  // Set width attribute
  public function width($width = null)
  {

    // Check if width is set
    if ($width)
    {

      $this->attribute(['width' => $width]);

    }

    return $this;

  }


  // Set wrap attribute
  public function wrap($wrap = null)
  {

    // Check if wrap is set
    if ($wrap)
    {

      $this->attribute(['wrap' => $wrap]);

    }

    return $this;

  }


  // Set xmlns attribute
  public function xmlns($xmlns = null)
  {

    // Check if xmlns is set
    if (!is_null($xmlns))
    {

      $this->attribute(['xmlns' => $xmlns]);

    }

    return $this;

  }


}
