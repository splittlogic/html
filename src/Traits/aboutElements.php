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


trait aboutElements
{


  // About Element page
  public function aboutElement($element)
  {

    // Get Element array
    $data = $this->aboutElementArray();

    // Get Settings array
    $atts = $this->aboutSettingsArray();

    // Declare return
    $return = '';

    // Set line break
    $br = $this->br();

    // Check if element exists
    if (isset($data[$element]))
    {

      // Check if save is set
      $save = '';
      if (isset($data[$element]['save']))
      {

        $save = $this->br() . $this->br()
          . 'This element is saved until called by ';

        // Check if an array
        if (is_array($data[$element]['save']))
        {

          // Cycle through saves
          foreach ($data[$element]['save'] as $s)
          {

            $save .= ' ' . $this->class('btn btn-outline-success')
              ->a($s, route('splittlogic.html.element', $s));

          }

        // Is a string
        } else {

          // Check for body attributes
          if ($data[$element]['save'] == 'body attributes')
          {

            $save .= $this->class('btn btn-outline-success')
              ->a('body attributes', route('splittlogic.html') . '#getBodyAttributes');

          // Not body attributes
          } else {

            $save .= $this->class('btn btn-outline-success')
              ->a($data[$element]['save'], route('splittlogic.html.element', $data[$element]['save']));

          }

        }

      }

      // Check if load is set
      $load = '';
      if (isset($data[$element]['load']))
      {

        $load = $this->br() . $this->br()
          . 'If content is not given, this element will load saved ';

        // Check if an array
        if (is_array($data[$element]['load']))
        {

          // cycle throug loads
          foreach ($data[$element]['load'] as $l)
          {

            $load .= ' ' . $this->class('btn btn-outline-success')
              ->a($l, route('splittlogic.html.element', $l));

          }

        // Is a string
        } else {

          $load .= $this->class('btn btn-outline-success')
            ->a($data[$element]['load'], route('splittlogic.html.element', $data[$element]['load']));

        }

      }

      // Heading
      $small = $this->class('lead')->span($element . '()');
      $return .= $this->h1($data[$element]['htmlchar'] . ' ' . $small)
        . $this->b($data[$element]['descchar'])
        . $save
        . $load
        . $this->br() . $this->br();

      // Check for example
      $example = '';
      if (!isset($data[$element]['noexample']))
      {

        if (isset($data[$element]['example']))
        {

          // Check if alternate example is set
          if (is_null($this->aboutElementAltExample($element)))
          {

            $example = $data[$element]['example'];

          // Alternate example is set
          } else {

            $example = $this->aboutElementAltExample($element);

          }

        // Example is not set
        } else {

          $example = 'Example is not set';

        }

      } else {

        $example = $data[$element]['noexample'];

      }


      // Check for code
      if (isset($data[$element]['code']))
      {

        $code = $data[$element]['code'];

      // Code is not set
      } else {

        $code = 'Code is not set';

      }

      // Attributes
      $attributes = '';
      if (isset($data[$element]['att']))
      {

        foreach ($data[$element]['att'] as $att)
        {

          // Check if attribute is set
          if (isset($atts[$att]))
          {

            // Create attribute link cell
            $this->td(
              $this->class('btn btn-outline-primary')
                ->a($atts[$att]['set'], route('splittlogic.html.setting', $att))
            );

            // Create attribute description cell
            $this->td(
              $this->class('text-light')
                ->span($atts[$att]['descchar'])
            );

            // Create table row
            $this->tr();

          }

        }

        $attributes = $this->class('table')->table();

      }

      // Globals
      $globalsArray = $this->aboutGlobalsArray();

      // Table classes
      $classes = array(
        'table',
        'text-light'
      );

      // Table header
      $header = array();
      $header['set'] = 'Attribute';
      $header['func'] = 'Function';
      $header['descchar'] = 'Description';
      $header['link'] = 'Link';

      $globals = $this->arrayToTable($globalsArray,$classes,$header,true);

      // Basic Instance & Static Method
      $bi = $this->h5('Instance:')
        . $this->class('text-light')->span('$')
        . $this->class('text-danger')->span('html')
        . ' = new '
        . $this->class('text-warning')->span('html')
        . $this->class('text-light')->span(';') . PHP_EOL
        . $this->class('text-light')->span('$')
        . $this->class('text-danger')->span('output')
        . ' = '
        . $this->class('text-light')->span('$')
        . $this->class('text-danger')->span('html')
        . '->'
        . $this->class('text-info')->span($data[$element]['elem'] . '()')
        . $this->class('text-light')->span(';') . PHP_EOL
        . PHP_EOL
        . PHP_EOL
        . $this->h5('Static:')
        . $this->class('text-light')->span('$')
        . $this->class('text-danger')->span('output')
        . ' = '
        . $this->class('text-warning')->span('html')
        . '::'
        . $this->class('text-success')->span('make()')
        . '->'
        . $this->class('text-info')->span($data[$element]['elem'] . '()')
        . $this->class('text-light')->span(';');

      // Full example
      $fi = $this->class('text-warning')->span('html')
        . '::' .
        $this->class('text-success')->span('make()');

        // Check for attributes
        if (isset($data[$element]['att']))
        {

          foreach ($data[$element]['att'] as $att)
          {

            // Check if attribute is set
            if (isset($atts[$att]))
            {

              $att = $atts[$att]['set'];

            }

            $fi .= PHP_EOL
              . ' ->'
              . $this->class('badge')
                ->class('bg-primary')
                ->class('text-light')
                ->span($att)
              . '('
              . $this->class('text-light')
                ->span('$')
              . $this->class('text-danger')
                ->span($att)
              . ')';
          }

        }

        $fi .= PHP_EOL . ' ->'
          . $this->class('text-info')->span(
              $data[$element]['elem'] . '()'
            )
          . $this->class('text-light')->span(';');

      // Full Example Card
      $fi = $this->pre($fi);
      $fi = $this->code($fi);
      $fi = $this->aboutCard(
        'Example with All Attributes:', null, $fi, 'success', 'light'
      );

      // Attributes Card
      if (!empty($attributes))
      {

        $attributes = $this->aboutCard(
          'Attributes: ', null, $attributes
        );

      }

      // Globals Card
      $globals = $this->aboutCard(
        'Globals: ', null, $globals, 'secondary', 'light'
      );

      // Example Card
      if (!empty($example))
      {

        $example = $this->class('text-light')->span($example);
        $example = $this->aboutCard(
          'Example:', null, $example, 'info'
        );

      }


      // Code Card
      $code = $this->pre($code);
      $code = $this->code($code);
      $code = $this->aboutCard(
        'Code:', null, $code, 'warning'
      );

      // Basic Instance & Static Card
      $bi = $this->pre($bi);
      $bi = $this->code($bi);
      $bi = $this->aboutCard(
        'Basic Instance & Static Methods:', null, $bi, 'danger', 'light'
      );

      $col1 = $this->class('col-4')
        ->div($fi . $br . $bi);

      $col2 = $this->class('col-8')
        ->div($example . $br . $code . $br . $attributes . $br . $globals . $br);

      $row = $this->class('row')
        ->div($col1 . $col2);

      $return .= $this->class('container')->div($row);

    // Element does not exist
    } else {

      // Create alert message
      $message = 'The element requested does not exist.  Please use menu links to navigate this guide.';
      $return = $this->class('alert')
        ->class('alert-danger')
        ->class('text-center')
        ->attribute(['role' => 'alert'])
        ->div($message);

      // Create center link
      $link = $this->a('Elements Main Menu', route('splittlogic.html'));
      $return .= $this->class('text-center')
        ->h1($link);

    }

    return $return;

  }


  // About Element Table
  public function aboutElementsTable()
  {

    // Table classes
    $classes = array(
      'table',
      'table-striped',
      'table-hover'
    );

    // Table header
    $header = array();
    $header['elem'] = 'Element';
    $header['descchar'] = 'Description';
    $header['htmlchar'] = 'HTML Tag';
    $header['func'] = 'Function';
    $header['link'] = 'Link';

    // Get Element array
    $data = $this->aboutElementArray();

    // Create array into a table
    return $this->arrayToTable($data,$classes,$header,true);

  }


  // About Element Alternate Examples
  public function aboutElementAltExample($element = null)
  {

    // Declare return
    $return = null;

    // Check if element is set
    if (!is_null($element))
    {

      // Area & Map
      if ($element == 'area' || $element == 'map')
      {

        // Create image
        $return = $this->src('https://htmlreference.io/images/world-continents.png')
          ->width(320)
          ->height(160)
          ->orgwidth(320)
          ->orgheight(160)
          ->usemap('#world-continents')
          ->img();

        // Create area tags for map
        $this->atitle('North America')
          ->href('https://en.wikipedia.org/wiki/North_America')
          ->shape('poly')
          ->coords('48,89,67,69,77,49,140,0,68,0,6,10,4,31,16,69')
          ->target()
          ->area();
        $this->atitle('South America')
          ->href('https://en.wikipedia.org/wiki/South_America')
          ->shape('poly')
          ->coords('48,88,61,74,119,99,95,160,66,159')
          ->target()
          ->area();
        $this->atitle('Europe')
          ->href('https://en.wikipedia.org/wiki/Europe')
          ->shape('poly')
          ->coords('124,49,145,46,158,50,187,43,198,6,146,1,115,21')
          ->target()
          ->area();
        $this->atitle('Africa')
          ->href('https://en.wikipedia.org/wiki/Africa')
          ->shape('poly')
          ->coords('121,53,140,47,169,51,186,77,196,80,188,137,156,136,138,97,118,86')
          ->target()
          ->area();
        $this->atitle('Asia')
          ->href('https://en.wikipedia.org/wiki/Asia')
          ->shape('poly')
          ->coords('166,50,184,77,201,74,215,91,258,108,263,87,283,74,297,8,192,3,191,29,187,46,170,42')
          ->target()
          ->area();
        $this->atitle('Australia')
          ->href('https://en.wikipedia.org/wiki/Australia_(continent)')
          ->shape('poly')
          ->coords('257,107,263,85,314,89,316,137,294,151,249,132,248,114')
          ->target()
          ->area();

        // Create map
        $return .= $this->name('world-continents')->map();

      }

    }

    return $return;

  }


  // About Element Data Array
  public function aboutElementArray()
  {

    // Declare array
    $data = [

      'a' => [
        'elem' => 'a',
        'desc' => 'Creates a link to a URL: a web page, a section within a page, an email address... Also called the anchor element, where the a comes from.',
        'tag' => '',
        'att' => [
          'href',
          'target',
          'rel'
        ],
        'example' => '<a href="' . route('splittlogic.html.element', 'a') . '">' . PHP_EOL
                    . ' Anchor Link' . PHP_EOL
                    . '</a>'
      ],

      'abbr' => [
        'elem' => 'abbr',
        'desc' => 'Defines an abbreviation, and usually includes its full description.',
        'tag' => '',
        'att' => [
          'atitle'
        ],
        'example' => '<abbr title="World Health Organization">' . PHP_EOL
          . ' WHO' . PHP_EOL
          . '</abbr>'
      ],

      'address' => [
        'elem' => 'address',
        'desc' => 'Defines a block for contact information.',
        'tag' => '',
        'example' => '<address>' . PHP_EOL
          . ' Infinite Loop, <br>' . PHP_EOL
          . ' Cupertino, CA <br>' . PHP_EOL
          . ' 95014, USA' . PHP_EOL
          . '</address>'
      ],

      'area' => [
        'elem' => 'area',
        'desc' => 'Defines an interactive area within a map.',
        'tag' => 'self',
        'att' => [
          'atitle',
          'shape',
          'coords',
          'href',
          'target'
        ],
        'save' => 'map',
        'example' => '<img src="/images/world-continents.png" width="320" height="160" orgwidth="320" orgheight="160" usemap="#world-continents">' . PHP_EOL
          . ' <map name="world-continents">' . PHP_EOL
          . '   <area title="North America" href="https://en.wikipedia.org/wiki/North_America" shape="poly" coords="48,89,67,69,77,49,140,0,68,0,6,10,4,31,16,69">' . PHP_EOL
          . '   <area title="South America" href="https://en.wikipedia.org/wiki/South_America" shape="poly" coords="48,88,61,74,119,99,95,160,66,159">' . PHP_EOL
          . '   <area title="Europe" href="https://en.wikipedia.org/wiki/Europe" shape="poly" coords="124,49,145,46,158,50,187,43,198,6,146,1,115,21">' . PHP_EOL
          . '   <area title="Africa" href="https://en.wikipedia.org/wiki/Africa" shape="poly" coords="121,53,140,47,169,51,186,77,196,80,188,137,156,136,138,97,118,86">' . PHP_EOL
          . '   <area title="Asia" href="https://en.wikipedia.org/wiki/Asia" shape="poly" coords="166,50,184,77,201,74,215,91,258,108,263,87,283,74,297,8,192,3,191,29,187,46,170,42">' . PHP_EOL
          . '   <area title="Australia" href="https://en.wikipedia.org/wiki/Australia_(continent)" shape="poly" coords="257,107,263,85,314,89,316,137,294,151,249,132,248,114">' . PHP_EOL
          . ' </map>'
      ],

      'article' => [
        'elem' => 'article',
        'desc' => 'Defines a self-contained block of content that can exist in any context. It can have its own header, footer, sections... Useful for a list of blog posts.',
        'tag' => '',
        'example' => [
          '<article>',
          ' <header>',
          '   <h3>',
          '     <a href="/my-blog-post">My blog post</a>',
          '   </h3>',
          ' </header>',
          ' <section>',
          '   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          ' </section>',
          ' <footer>',
          '   <small>',
          '     Posted on Apr 29',
          '   </small>',
          ' </footer>',
          '</article>'
        ]
      ],

      'aside' => [
        'elem' => 'aside',
        'desc' => 'Defines a block of content that is related to the main content. Displayed as a sidebar usually.',
        'tag' => '',
        'example' => [
          '<main>',
          ' <h1>My blog post</h1>',
          ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          ' <p>etc.</p>',
          '</main>',
          '',
          '<aside>',
          ' <h3>About the author</h3>',
          ' <p>Frontend Designer from Bordeaux, currently working for Improbable in sunny London.</p>',
          '</aside>'
        ]
      ],

      'audio' => [
        'elem' => 'audio',
        'desc' => 'Allows to embed an audio clip into a web page.',
        'tag' => '',
        'att' => [
          'src',
          'volume',
          'autoplay',
          'controls',
          'loop',
          'muted',
          'preload'
        ],
        'example' => '<audio src="/audio.mp3" controls></audio>'
      ],

      'b' => [
        'elem' => 'b',
        'desc' => 'Makes an element bold.',
        'tag' => '',
        'example' => 'Hello <b>World</b>'
      ],

      'base' => [
        'elem' => 'base',
        'desc' => 'Defines the base URL for all relative links of a web page. Should be placed in the <head>.',
        'tag' => 'self',
        'att' => [
          'href',
          'target'
        ],
        'save' => 'head',
        'example' => [
          '<base href="' . route('splittlogic.html') . '">',
          ' <a href="/element/base">The HTML base element</a>',
          '<!-- This will be an absolute link to ' . route('splittlogic.html') . '/element/base -->'
        ]
      ],

      'bdi' => [
        'elem' => 'bdi',
        'desc' => 'Allows to display part of a text in the opposite direction. Stands for bidirectional isolation.',
        'tag' => '',
        'example' => 'The word <bdi>مرحبا</bdi> means "Hello" in Arabic'
      ],

      'bdo' => [
        'elem' => 'bdo',
        'desc' => 'Allows to override the direction of text.',
        'tag' => '',
        'att' => [
          'dir'
        ],
        'example' => 'The word <bdo dir="rtl">Hello</bdo> is "Hello" spelled backwards.'
      ],

      'blockquote' => [
        'elem' => 'blockquote',
        'desc' => 'Defines a long quotation.',
        'tag' => '',
        'att' => [
          'acite'
        ],
        'example' => [
          '<blockquote cite="https://en.wikiquote.org/wiki/Marie_Curie">',
          ' Be less curious about people and more curious about ideas.',
          '</blockquote>'
        ]
      ],

      'body' => [
        'elem' => 'body',
        'desc' => "The container for a web page's content. Must be a direct child of <html>, and must be an ancestor of all HTML elements (except where noted).",
        'tag' => '',
        'save' => 'body attributes',
        'noexample' =>"If you're only wanting to get the attributes of the body tag, you can call this function in your blade template:"
          . '<br>'
          . '<br>'
          . $this->htmlchar("<body{!! html::getBodyAttributes() !!}>"),
        'example' => [
          '<!DOCTYPE html>',
          '<html>',
          ' <head>',
          '   <!-- Document metadata -->',
          ' </head>',
          ' <body>',
          '   <!-- Document content -->',
          ' </body>',
          '</html>'
        ]
      ],

      'br' => [
        'elem' => 'br',
        'desc' => 'Defines a line break within a text.',
        'tag' => 'self',
        'example' => 'Lorem ipsum dolor sit<br>amet, consectetur adipiscing elit. Donec viverra<br>nec<br>nulla vitae mollis.'
      ],

      'button' => [
        'elem' => 'button',
        'desc' => 'Defines a clickable button.',
        'tag' => '',
        'att' => [
          'name',
          'value',
          'type',
          'disabled',
          'autofocus'
        ],
        'example' => [
          '<button>',
          ' Submit form',
          '</button>'
        ]
      ],

      'canvas' => [
        'elem' => 'canvas',
        'desc' => 'Defines an element where you can draw graphics.',
        'tag' => '',
        'att' => [
          'height',
          'width'
        ],
        'example' => [
          '<canvas id="myCanvas">',
          ' Your browser does not support the canvas tag.',
          '</canvas>',
          '',
          '<script>',
          ' var canvas = document.getElementById("myCanvas");',
          ' var ctx = canvas.getContext("2d");',
          ' ctx.fillStyle = "#FF0000";',
          ' ctx.fillRect(0, 0, 80, 80);',
          '</script>'
        ]
      ],

      'caption' => [
        'elem' => 'caption',
        'desc' => 'Defines the title of a <table>.',
        'tag' => '',
        'example' => [
          '<table class="table text-light">',
          ' <caption>The Beatles</caption>',
          ' <tr>',
          '   <td>John Lennon</td>',
          '   <td>Rhythm Guitar</td>',
          ' </tr>',
          ' <tr>',
          '   <td>Paul McCartney</td>',
          '   <td>Bass</td>',
          ' </tr>',
          ' <tr>',
          '   <td>George Harrison</td>',
          '   <td>Lead Guitar</td>',
          ' </tr>',
          ' <tr>',
          '   <td>Ringo Starr</td>',
          '   <td>Drums</td>',
          ' </tr>',
          '</table>'
        ]
      ],

      'cite' => [
        'elem' => 'cite',
        'desc' => 'Defines the source of a creative work.',
        'tag' => '',
        'example' => 'If you want to learn HTML and CSS, go read <cite>MarkSheet.io</cite>!'
      ],

      'code' => [
        'elem' => 'code',
        'desc' => 'Defines a snippet of code within a block of text.',
        'tag' => '',
        'example' => "Type <code>npm install</code> in your terminal to install a project's dependencies."
      ],

      'col' => [
        'elem' => 'col',
        'desc' => 'Defines a column within a table.',
        'tag' => 'self',
        'att' => [
          'aspan'
        ],
        'example' => [
          '<table>',
          ' <colgroup>',
          '   <col style="background-color: hotpink;">',
          '   <col span="2" style="background-color: blue;">',
          ' </colgroup>',
          ' <tr>',
          '   <td>John Lennon</td>',
          '   <td>Rhythm Guitar</td>',
          '   <td>1960–1969</td>',
          ' </tr>',
          ' <tr>',
          '   <td>Paul McCartney</td>',
          '   <td>Bass</td>',
          '   <td>1960–1970</td>',
          ' </tr>',
          ' <tr>',
          '   <td>George Harrison</td>',
          '   <td>Lead Guitar</td>',
          '   <td>1960–1970</td>',
          ' </tr>',
          ' <tr>',
          '   <td>Ringo Starr</td>',
          '   <td>Drums</td>',
          '   <td>1960–1970</td>',
          ' </tr>',
          '</table>'
        ]
      ],

      'colgroup' => [
        'elem' => 'colgroup',
        'desc' => 'Defines a group of columns within a table.',
        'tag' => '',
        'example' => [
          '<table>',
          ' <colgroup>',
          '   <col style="background-color: hotpink;">',
          '   <col span="2" style="background-color: blue;">',
          ' </colgroup>',
          ' <tr>',
          '   <td>John Lennon</td>',
          '   <td>Rhythm Guitar</td>',
          '   <td>1960–1969</td>',
          ' </tr>',
          ' <tr>',
          '   <td>Paul McCartney</td>',
          '   <td>Bass</td>',
          '   <td>1960–1970</td>',
          ' </tr>',
          ' <tr>',
          '   <td>George Harrison</td>',
          '   <td>Lead Guitar</td>',
          '   <td>1960–1970</td>',
          ' </tr>',
          ' <tr>',
          '   <td>Ringo Starr</td>',
          '   <td>Drums</td>',
          '   <td>1960–1970</td>',
          ' </tr>',
          '</table>'
        ]
      ],

      'comment' => [
        'elem' => 'comment',
        'desc' => 'The comment tag is used to insert comments in the source code. Comments are not displayed in the browsers.',
        'tag' => 'custom',
        'elemtag' => '<!-- ... -->',
        'example' => [
          '<!--This is a comment. Comments are not displayed in the browser-->',
          '',
          '<p>This is a paragraph.</p>'
        ]
      ],

      'css' => [
        'elem' => 'css',
        'desc' => 'Creates a link element already formatted for the given css file',
        'tag' => 'custom',
        'elemtag' => '<link rel="stylesheet" type="text/css" href="value">',
        'example' => '<link rel="stylesheet" type="text/css" href="style.css">',
        'noexample' => '',
        'save' => 'head'
      ],

      'data' => [
        'elem' => 'data',
        'desc' => 'Defines content linked to machine-readable output.',
        'tag' => '',
        'att' => [
          'value'
        ],
        'example' => [
          '<p>Computers</p>',
          ' <ul>',
          '   <li>',
          '     <data value="499">Mini PC</data>',
          '   </li>',
          '   <li>',
          '     <data value="899">Small laptop</data>',
          '   </li>',
          '   <li>',
          '     <data value="1399">Large laptop</data>',
          '   </li>',
          '   <li>',
          '     <data value="2099">Desktop PC</data>',
          '   </li>',
          ' </ul>'
        ]
      ],

      'datalist' => [
        'elem' => 'datalist',
        'desc' => 'Defines a list of autocomplete options when using a text <input>.',
        'tag' => '',
        'example' => [
          '<label>South American countries</label><br>',
          '<input list="countries" placeholder="Type a country">',
          '',
          '<datalist id="countries">',
          ' <option value="Argentina">',
          ' <option value="Bolivia">',
          ' <option value="Brazil">',
          ' <option value="Chile">',
          ' <option value="Colombia">',
          ' <option value="Ecuador">',
          ' <option value="Guyana">',
          ' <option value="Paraguay">',
          ' <option value="Peru">',
          ' <option value="Suriname">',
          ' <option value="Uruguay">',
          ' <option value="Venezuela">',
          '</datalist>'
        ]
      ],

      'dd' => [
        'elem' => 'dd',
        'desc' => 'Defines an item in a definition list.',
        'tag' => '',
        'save' => 'dl',
        'example' => [
          '<dl>',
          ' <dt>Web</dt>',
          ' <dd>The part of the Internet that contains websites and web pages</dd>',
          ' <dt>HTML</dt>',
          ' <dd>A markup language for creating web pages</dd>',
          ' <dt>CSS</dt>',
          ' <dd>A technology to make HTML look better</dd>',
          '</dl>'
        ]
      ],

      'del' => [
        'elem' => 'del',
        'desc' => 'Defines text that has been deleted.',
        'tag' => '',
        'att' => [
          'acite',
          'datetime'
        ],
        'example' => 'To write abbreviations, use the <del cite="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/acronym">acronym</del> <ins>abbr</ins> HTML element.'
      ],

      'details' => [
        'elem' => 'details',
        'desc' => 'Defines a toggable block of content with a summary and additional details.',
        'tag' => '',
        'att' => [
          'aopen'
        ],
        'example' => [
          '<details>',
          ' <summary>Read more</summary>',
          ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '</details>'
        ]
      ],

      'dfn' => [
        'elem' => 'dfn',
        'desc' => 'Defines where a term is defined within a web page.',
        'tag' => '',
        'example' => 'The <dfn>World Wide Web</dfn> is the part of the Internet that uses the HTTP protocol.'
      ],

      'dialog' => [
        'elem' => 'dialog',
        'desc' => 'Defines a dialog box that can be opened and closed with JavaScript.',
        'tag' => '',
        'att' => [
          'open'
        ],
        'example' => [
          '<dialog open>',
          ' This is a dialog box!',
          '</dialog>'
        ]
      ],

      'div' => [
        'elem' => 'div',
        'desc' => 'Defines a generic block of content, that does not carry any semantic value. Used for layout elements like containers.',
        'tag' => '',
        'example' => [
          '<h1>The div element</h1>',
          '',
          '<div class="myDiv">',
          ' <h2>This is a heading in a div element</h2>',
          ' <p>This is some text in a div element.</p>',
          '</div>',
          '',
          '<p>This is some text outside the div element.</p>',
          '',
          '<style>',
          ' .myDiv {',
          '   border: 5px outset red;',
          '   background-color: lightblue;',
          '   text-align: center;',
          ' }',
          '</style>'
        ]
      ],

      'dl' => [
        'elem' => 'dl',
        'desc' => 'Defines a definition list.',
        'tag' => '',
        'load' => [
          'dd',
          'dt'
        ],
        'example' => [
          '<dl>',
          ' <dt>Web</dt>',
          ' <dd>The part of the Internet that contains websites and web pages</dd>',
          ' <dt>HTML</dt>',
          ' <dd>A markup language for creating web pages</dd>',
          ' <dt>CSS</dt>',
          ' <dd>A technology to make HTML look better</dd>',
          '</dl>'
        ]
      ],

      'dt' => [
        'elem' => 'dt',
        'desc' => 'Defines a definition term.',
        'tag' => '',
        'save' => 'dl',
        'example' => [
          '<dl>',
          ' <dt>Web</dt>',
          ' <dd>The part of the Internet that contains websites and web pages</dd>',
          ' <dt>HTML</dt>',
          ' <dd>A markup language for creating web pages</dd>',
          ' <dt>CSS</dt>',
          ' <dd>A technology to make HTML look better</dd>',
          '</dl>'
        ]
      ],

      'em' => [
        'elem' => 'em',
        'desc' => 'Defines emphasis on text. Is usually rendered as italic text.',
        'tag' => '',
        'example' => 'HTML should only be used to write <em>content</em>, and keep CSS for <em>styling</em> the web page.'
      ],

      'embed' => [
        'elem' => 'embed',
        'desc' => 'Defines a container for external application.',
        'tag' => 'self',
        'att' => [
          'src',
          'type',
          'height',
          'width'
        ],
        'example' => '<embed src="https://www.youtube.com/embed/kmk43_2dtn0" width="640" height="480">'
      ],

      'fieldset' => [
        'elem' => 'fieldset',
        'desc' => 'Defines a group of controls within a form.',
        'tag' => '',
        'att' => [
          'disabled'
        ],
        'example' => [
          '<form action="/subscribe" method="post">',
          ' <fieldset>',
          '   <legend>Subscribe to the Newsletter</legend>',
          '   <input type="email" name="email">',
          '   <button>Ok</button>',
          ' </fieldset>',
          '</form>'
        ]
      ],

      'figcaption' => [
        'elem' => 'figcaption',
        'desc' => 'Defines the caption of a <figure>.',
        'tag' => '',
        'example' => [
          '<figure>',
          ' <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="HTML Reference logo">',
          ' <figcaption>The HTML Reference logo</figcaption>',
          '</figure>'
        ]
      ],

      'figure' => [
        'elem' => 'figure',
        'desc' => 'Defines a single self-contained element, usually an image.',
        'tag' => '',
        'example' => [
          '<figure>',
          ' <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="HTML Reference logo">',
          ' <figcaption>The HTML Reference logo</figcaption>',
          '</figure>'
        ]
      ],

      'footer' => [
        'elem' => 'footer',
        'desc' => 'Defines the footer of a web page or section.',
        'tag' => '',
        'example' => [
          '<footer>',
          ' HTML Reference - A free reference to all HTML5 elements and attributes',
          '</footer>'
        ]
      ],

      'form' => [
        'elem' => 'form',
        'desc' => 'Defines an interactive form with controls.',
        'tag' => '',
        'att' => [
          'action',
          'method',
          'name',
          'autocomplete',
          'target',
          'enctype',
          'novalidate'
        ],
        'example' => [
          '<form action="/signup" method="post">',
          ' <p>',
          '   <label>Title</label><br>',
          '   <label>',
          '     <input type="radio" name="title" value="mr">',
          '     Mr',
          '   </label>',
          '   <label>',
          '     <input type="radio" name="title" value="mrs">',
          '     Mrs',
          '   </label>',
          '   <label>',
          '     <input type="radio" name="title" value="miss">',
          '     Miss',
          '   </label>',
          ' </p>',
          ' <p>',
          '   <label>First name</label><br>',
          '   <input type="text" name="first_name">',
          ' </p>',
          ' <p>',
          '   <label>Last name</label><br>',
          '   <input type="text" name="last_name">',
          ' </p>',
          ' <p>',
          '   <label>Email</label><br>',
          '   <input type="email" name="email" required>',
          ' </p>',
          ' <p>',
          '   <label>Phone number</label><br>',
          '   <input type="tel" name="phone">',
          ' </p>',
          ' <p>',
          '   <label>Password</label><br>',
          '   <input type="password" name="password">',
          ' </p>',
          ' <p>',
          '   <label>Country</label><br>',
          '   <select>',
          '     <option>China</option>',
          '     <option>India</option>',
          '     <option>United States</option>',
          '     <option>Indonesia</option>',
          '     <option>Brazil</option>',
          '   </select>',
          ' </p>',
          ' <p>',
          ' <label>',
          '   <input type="checkbox" value="terms">',
          '   I agree to the <a href="/terms">terms and conditions</a>',
          ' </label>',
          ' </p>',
          ' <p>',
          '   <button>Sign up</button>',
          '   <button type="reset">Reset form</button>',
          ' </p>',
          '</form>'
        ]
      ],

      'h1' => [
        'elem' => 'h1',
        'desc' => 'Defines a section heading of level one: the highest level.',
        'tag' => '',
        'example' => '<h1>My blog post</h1>'
      ],

      'h2' => [
        'elem' => 'h2',
        'desc' => 'Defines a section heading of level two.',
        'tag' => '',
        'example' => [
          '<h1>My blog post</h1>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h2>Introduction</h2>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'h3' => [
        'elem' => 'h3',
        'desc' => 'Defines a section heading of level three.',
        'tag' => '',
        'example' => [
          '<h1>My blog post</h1>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h2>Introduction</h2>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h3>Example</h3>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'h4' => [
        'elem' => 'h4',
        'desc' => 'Defines a section heading of level four.',
        'tag' => '',
        'example' => [
          '<h1>My blog post</h1>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h2>Introduction</h2>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h3>Example</h3>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h4>Why</h4>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'h5' => [
        'elem' => 'h5',
        'desc' => 'Defines a section heading of level five.',
        'tag' => '',
        'example' => [
          '<h1>My blog post</h1>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h2>Introduction</h2>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h3>Example</h3>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h4>Why</h4>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h5>Reason</h5>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'h6' => [
        'elem' => 'h6',
        'desc' => 'Defines a section heading of level six: the lowest level.',
        'tag' => '',
        'example' => [
          '<h1>My blog post</h1>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h2>Introduction</h2>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h3>Example</h3>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h4>Why</h4>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h5>Reason</h5>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<h6>Focus</h6>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'head' => [
        'elem' => 'head',
        'desc' => "Defines a container for a web page's metadata.",
        'tag' => '',
        'load' => [
          'base',
          'css',
          'js',
          'link',
          'meta',
          'script',
          'style'
        ],
        'noexample' =>"You can call this function in your blade template:"
          . '<br>'
          . '<br>'
          . $this->htmlchar("{!! html::head() !!}"),
        'example' => [
          '<!DOCTYPE html>',
          '<html>',
          ' <head>',
          '   <!-- Document metadata -->',
          ' </head>',
          ' <body>',
          '   <!-- Document content -->',
          ' </body>',
          '</html>'
        ]
      ],

      'header' => [
        'elem' => 'header',
        'desc' => 'Defines the header of a web page or section.',
        'tag' => '',
        'example' => [
          '<header>',
          ' <h1>HTML Reference</h1>',
          ' <nav>',
          '   <a>Home</a>',
          '   <a>About</a>',
          '   <a>Contact</a>',
          ' </nav>',
          '</header>'
        ]
      ],

      'hgroup' => [
        'elem' => 'hgroup',
        'desc' => 'Defines the heading of a section. It can only contain heading levels: <h1> <h2> <h3> <h4> <h5> <h6>',
        'tag' => '',
        'example' => [
          '<hgroup>',
          ' <h1>HTML Reference</h1>',
          ' <h2>A free guide to all HTML elements and attributes.</h2>',
          '</hgroup>'
        ]
      ],

      'hr' => [
        'elem' => 'hr',
        'desc' => 'Defines a semantic break between blocks of text. It is often represented as a horizontal rule.',
        'tag' => '',
        'example' => [
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '',
          '<hr>',
          '',
          '<h2>Next section</h2>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'i' => [
        'elem' => 'i',
        'desc' => 'Makes an element italic.',
        'tag' => '',
        'example' => 'Hello <i>World</i>'
      ],

      'iframe' => [
        'elem' => 'iframe',
        'desc' => 'Defines a container for a nested browsing context: you can include a web page within another web page.',
        'tag' => '',
        'att' => [
          'src',
          'allowfullscreen',
          'height',
          'width'
        ],
        'example' => [
          '<iframe src="https://w3.org">',
          ' Fallback text for non-supported browsers',
          '</iframe>'
        ]
      ],

      'img' => [
        'elem' => 'img',
        'desc' => 'Defines an image inserted in the web page.',
        'tag' => 'self',
        'att' => [
          'src',
          'alt',
          'srcset',
          'sizes',
          'height',
          'width'
        ],
        'example' => '<img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="Google Logo">'
      ],

      'input' => [
        'elem' => 'input',
        'desc' => 'Defines an interactive control within a web form.',
        'tag' => 'self',
        'att' => [
          'type',
          'name',
          'placeholder',
          'required',
          'disabled'
        ],
        'example' => '<input type="text" name="first_name" placeholder="e.g. Alex">'
      ],

      'ins' => [
        'elem' => 'ins',
        'desc' => 'Defines text that has been inserted.',
        'tag' => '',
        'att' => [
          'cite',
          'datetime'
        ],
        'example' => 'To write abbreviations, use the <del cite="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/acronym">acronym</del> <ins>abbr</ins> HTML element.'
      ],

      'js' => [
        'elem' => 'script',
        'desc' => 'Creates a script element already formatted for the given js file',
        'tag' => 'custom',
        'elemtag' => '<script src="script.js" type="text/javascript"></script>',
        'save' => 'head',
        'example' => '<script src="script.js" type="text/javascript"></script>',
        'noexample' => ''
      ],

      'kbd' => [
        'elem' => 'kbd',
        'desc' => 'Defines a snippet of user input.',
        'tag' => '',
        'example' => 'To save, press <kbd>Ctrl + S</kbd>.'
      ],

      'label' => [
        'elem' => 'label',
        'desc' => 'Defines a label for a form control.',
        'tag' => '',
        'att' => [
          'for'
        ],
        'example' => [
          '<label for="first_name">First name</label>',
          ' <br>',
          '<input type="text" name="first_name" id="first_name">',
          '<br>',
          '<br>',
          '<label>',
          ' <input type="checkbox" name="terms">',
          ' I agree to the terms',
          '</label>',
          '<br>',
          '<br>',
          '<p>Subscribe to the newsletter?</p>',
          '<label>',
          ' <input type="radio" name="newsletter" value="yes"> Yes',
          '</label>',
          '<label>',
          ' <input type="radio" name="newsletter" value="no"> No',
          '</label>'
        ]
      ],

      'legend' => [
        'elem' => 'legend',
        'desc' => "Defines a caption for a parent's content.",
        'tag' => '',
        'example' => [
          '<form action="/subscribe" method="post">',
          ' <fieldset>',
          '   <legend>Subscribe to the Newsletter</legend>',
          '   <input type="email" name="email">',
          '   <button>Ok</button>',
          ' </fieldset>',
          '</form>'
        ]
      ],

      'li' => [
        'elem' => 'li',
        'desc' => 'Defines a list item within an ordered list <ol> or unordered list <ul>.',
        'tag' => '',
        'save' => [
          'ol',
          'ul'
        ],
        'example' => [
          '<ol>',
          ' <li>Step one</li>',
          ' <li>Step two</li>',
          ' <li>????</li>',
          ' <li>PROFIT!!!</li>',
          '</ol>',
          '<br>',
          '<p>My shopping list:</p>',
          '<ul>',
          ' <li>Milk</li>',
          ' <li>Bread</li>',
          ' <li>Chocolate</li>',
          ' <li>More chocolate</li>',
          '</ul>'
        ]
      ],

      'link' => [
        'elem' => 'link',
        'desc' => 'Defines a link between the current web page and an external link or resource.',
        'tag' => 'self',
        'att' => [
          'href',
          'rel',
          'type'
        ],
        'save' => 'head',
        'example' => '<link rel="stylesheet" type="text/css" href="style.css">',
        'noexample' => ''
      ],

      'main' => [
        'elem' => 'main',
        'desc' => 'Defines the main content of a web page. Can be displayed with a sidebar.',
        'tag' => '',
        'example' => [
          '<main>',
          ' <h1>My blog post</h1>',
          ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          ' <p>etc.</p>',
          '</main>',
          '',
          '<aside>',
          ' <h3>About the author</h3>',
          ' <p>Frontend Designer from Bordeaux, currently working for Improbable in sunny London.</p>',
          '</aside>'
        ]
      ],

      'map' => [
        'elem' => 'map',
        'desc' => 'Defines an interactive map over an image.',
        'tag' => '',
        'att' => [
          'name'
        ],
        'load' => 'area',
        'example' => '<img src="/images/world-continents.png" width="320" height="160" orgwidth="320" orgheight="160" usemap="#world-continents">' . PHP_EOL
          . ' <map name="world-continents">' . PHP_EOL
          . '   <area title="North America" href="https://en.wikipedia.org/wiki/North_America" shape="poly" coords="48,89,67,69,77,49,140,0,68,0,6,10,4,31,16,69">' . PHP_EOL
          . '   <area title="South America" href="https://en.wikipedia.org/wiki/South_America" shape="poly" coords="48,88,61,74,119,99,95,160,66,159">' . PHP_EOL
          . '   <area title="Europe" href="https://en.wikipedia.org/wiki/Europe" shape="poly" coords="124,49,145,46,158,50,187,43,198,6,146,1,115,21">' . PHP_EOL
          . '   <area title="Africa" href="https://en.wikipedia.org/wiki/Africa" shape="poly" coords="121,53,140,47,169,51,186,77,196,80,188,137,156,136,138,97,118,86">' . PHP_EOL
          . '   <area title="Asia" href="https://en.wikipedia.org/wiki/Asia" shape="poly" coords="166,50,184,77,201,74,215,91,258,108,263,87,283,74,297,8,192,3,191,29,187,46,170,42">' . PHP_EOL
          . '   <area title="Australia" href="https://en.wikipedia.org/wiki/Australia_(continent)" shape="poly" coords="257,107,263,85,314,89,316,137,294,151,249,132,248,114">' . PHP_EOL
          . ' </map>'
      ],

      'mark' => [
        'elem' => 'mark',
        'desc' => 'Defines highlighted text.',
        'tag' => '',
        'example' => 'We use HTML5 to write <mark>content</mark> on the Web.'
      ],

      'meta' => [
        'elem' => 'meta',
        'desc' => 'Defines metadata attached to a web page.',
        'tag' => 'self',
        'att' => [
          'charset',
          'http-equiv',
          'name',
          'content',
        ],
        'save' => 'head',
        'noexample' => '',
        'example' => [
          '<meta charset="UTF-8">',
          '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">',
          '<meta name="viewport" content="width=device-width, initial-scale=1">',
          '<meta name="theme-color" content="#ffffff">',
          '',
          '<!-- Refresh the page every 5 seconds -->',
          '<meta http-equiv="refresh" content="5">',
          '',
          '<!-- Redirect instantly to https://github.com/splittlogic -->',
          '<meta http-equiv="refresh" content="0; url=https://github.com/splittlogic">'
        ]
      ],

      'meter' => [
        'elem' => 'meter',
        'desc' => 'Defines a horizontal meter.',
        'tag' => '',
        'att' => [
          'value',
          'max',
          'min',
          'low',
          'high'
        ],
        'example' => [
          '<meter min="0" low="16" value="71" high="92" max="100">Alex</meter><br>',
          '<meter min="0" low="16" value="16" high="92" max="100">Brandon</meter><br>',
          '<meter min="0" low="16" value="40" high="92" max="100">Charlotte</meter><br>',
          '<meter min="0" low="16" value="92" high="92" max="100">Sam</meter>'
        ]
      ],

      'nav' => [
        'elem' => 'nav',
        'desc' => 'Defines a section with navigation links.',
        'tag' => '',
        'example' => [
          '<nav>',
          ' <a href="/">Home</a>',
          ' <a href="/about">About</a>',
          ' <a href="/contact">Contact</a>',
          '</nav>'
        ]
      ],

      'noframes' => [
        'elem' => 'noframes',
        'desc' => 'Defines content displayed when the browser does not support frames.',
        'tag' => '',
        'example' => [
          '<frameset cols="50%, 50%">',
          ' <frame src="https://github.com/splittlogic">',
          ' <frame src="https://github.com/splittlogic/html">',
          ' <noframes>This browser does not support framesets.</noframes>',
          '</frameset>'
        ]
      ],

      'noscript' => [
        'elem' => 'noscript',
        'desc' => 'Defines content displayed when the browser does not have JavaScript enabled.',
        'tag' => '',
        'noexample' => '',
        'example' => '<noscript>Please enable JavaScript.</noscript>'
      ],

      'object' => [
        'elem' => 'object',
        'desc' => 'Defines a container for external resource.',
        'tag' => '',
        'att' => [
          'data',
          'type',
          'height',
          'width'
        ],
        'example' => [
          '<object type="application/x-shockwave-flash" data="golf.swf" width="800" height="360">',
          ' <param name="movie" value="golf.swf">',
          ' <param name="wmode" value="transparent">',
          ' <p>You need to enable Flash to view this content.</p>',
          '</object>'
        ]
      ],

      'ol' => [
        'elem' => 'ol',
        'desc' => 'Defines an ordered list.',
        'tag' => '',
        'att' => [
          'type',
          'start',
          'reversed'
        ],
        'load' => 'li',
        'example' => [
          '<ol>',
          ' <li>Step one</li>',
          ' <li>Step two</li>',
          ' <li>????</li>',
          ' <li>PROFIT!!!</li>',
          '</ol>'
        ]
      ],

      'optgroup' => [
        'elem' => 'optgroup',
        'desc' => 'Defines a group of <option> elements.',
        'tag' => '',
        'att' => [
          'label',
          'disabled'
        ],
        'load' => 'option',
        'example' => [
          '<select>',
          ' <optgroup label="South America">',
          '   <option>Uruguay</option>',
          '   <option>Brazil</option>',
          '   <option>Argentina</option>',
          ' </optgroup>',
          ' <optgroup label="Europe">',
          '   <option>Italy</option>',
          '   <option>Germany</option>',
          '   <option>England</option>',
          '   <option>France</option>',
          '   <option>Spain</option>',
          ' </optgroup>',
          '</select>'
        ]
      ],

      'option' => [
        'elem' => 'option',
        'desc' => 'Defines an option within a <select> dropdown.',
        'tag' => '',
        'att' => [
          'value',
          'label',
          'disabled',
          'selected'
        ],
        'save' => [
          'datalist',
          'optgroup',
          'select'
        ],
        'example' => [
          '<select name="country">',
          ' <option value="Argentina">Argentina</option>',
          ' <option value="Bolivia">Bolivia</option>',
          ' <option value="Brazil">Brazil</option>',
          ' <option value="Chile">Chile</option>',
          ' <option value="Colombia">Colombia</option>',
          ' <option value="Ecuador">Ecuador</option>',
          ' <option value="Guyana">Guyana</option>',
          ' <option value="Paraguay">Paraguay</option>',
          ' <option value="Peru">Peru</option>',
          ' <option value="Suriname">Suriname</option>',
          ' <option value="Uruguay">Uruguay</option>',
          ' <option value="Venezuela">Venezuela</option>',
          '</select>'
        ]
      ],

      'output' => [
        'elem' => 'output',
        'desc' => 'Defines the result of a calculation or of user action.',
        'tag' => '',
        'att' => [
          'name'
        ],
        'example' => [
          '<form oninput="sum.value = parseInt(a.value) + parseInt(b.value)">',
          ' <input type="number" name="a" value="4">',
          ' +',
          ' <input type="number" name="b" value="7">',
          ' =',
          ' <output name="sum">11</output>',
          '</form>'
        ]
      ],

      'p' => [
        'elem' => 'p',
        'desc' => 'Defines a simple paragraph of text.',
        'tag' => '',
        'example' => [
          '<p>Hello World</p>',
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>'
        ]
      ],

      'param' => [
        'elem' => 'param',
        'desc' => 'Defines a parameter for an <object> element.',
        'tag' => 'self',
        'att' => [
          'name',
          'value'
        ],
        'example' => [
          '<object type="application/x-shockwave-flash" data="golf.swf" width="800" height="360">',
          ' <param name="movie" value="golf.swf">',
          ' <param name="wmode" value="transparent">',
          ' <p>You need to enable Flash to view this content.</p>',
          '</object>'
        ]
      ],

      'picture' => [
        'elem' => 'picture',
        'desc' => 'Defines a container for sources of an <img> element.',
        'tag' => '',
        'example' => [
          '<picture>',
          ' <source ',
          '   media="(min-width: 800px)"',
          '   srcset="https://htmlreference.io/images/sunset-360.jpg 360w,',
          '     https://htmlreference.io/images/sunset-720.jpg 720w,',
          '     https://htmlreference.io/images/sunset-1440.jpg 1440w"',
          '   sizes="33.3vw">',
          ' <source ',
          '   srcset="https://htmlreference.io/images/sunset-720.jpg 2x,',
          '     https://htmlreference.io/images/sunset-360.jpg 1x">',
          ' <img src="https://htmlreference.io/images/sunset.jpg" alt="Picture of a Ha Long Bay sunset">',
          '</picture>'
        ]
      ],

      'pre' => [
        'elem' => 'pre',
        'desc' => 'Defines preformatted text.',
        'tag' => '',
        'example' => [
          '<pre>&lt;!DOCTYPE html&gt;',
          '&lt;html&gt;',
          ' &lt;head&gt;',
          '   &lt;title&gt;Hello World&lt;/title&gt;',
          ' &lt;/head&gt;',
          ' &lt;body&gt;',
          '   &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.&lt;/p&gt;',
          ' &lt;/body&gt;',
          '&lt;/html&gt;</pre>'
        ]
      ],

      'progress' => [
        'elem' => 'progress',
        'desc' => 'Defines a progress bar.',
        'tag' => '',
        'att' => [
          'value',
          'max'
        ],
        'example' => [
          '<progress value="71" max="100">Alex</progress><br>',
          '<progress value="16" max="100">Brandon</progress><br>',
          '<progress value="40" max="100">Charlotte</progress><br>',
          '<progress value="92" max="100">Sam</progress>'
        ]
      ],

      'q' => [
        'elem' => 'q',
        'desc' => 'Defines a short quotation.',
        'tag' => '',
        'att' => [
          'acite'
        ],
        'example' => "He looks around and says " . '<q cite="https://en.wikiquote.org/wiki/The_Terminator">' . "I'll be back</q>."
      ],

      'rp' => [
        'elem' => 'rp',
        'desc' => 'Defines content displayed when the browser does not support the <ruby> element.',
        'tag' => '',
        'example' => [
          '<ruby>',
          ' 漢 <rp>(</rp><rt>Kan</rt><rp>)</rp>',
          ' 字 <rp>(</rp><rt>ji</rt><rp>)</rp>',
          '</ruby>'
        ]
      ],

      'rt' => [
        'elem' => 'rt',
        'desc' => 'Defines the pronunciation of ruby annotations.',
        'tag' => '',
        'example' => [
          '<ruby>',
          ' 漢 <rp>(</rp><rt>Kan</rt><rp>)</rp>',
          ' 字 <rp>(</rp><rt>ji</rt><rp>)</rp>',
          '</ruby>'
        ]
      ],

      'rtc' => [
        'elem' => 'rtc',
        'desc' => 'Defines a text container within ruby annotations.',
        'tag' => '',
        'example' => [
          '<ruby>',
          ' <rb>旧</rb>',
          ' <rb>金</rb>',
          ' <rb>山</rb>',
          ' <rt>jiù</rt>',
          ' <rt>jīn</rt>',
          ' <rt>shān</rt>',
          ' <rtc>San Francisco</rtc>',
          '</ruby>'
        ]
      ],

      'ruby' => [
        'elem' => 'ruby',
        'desc' => 'Defines a ruby annotation to show the pronunciation of East Asian characters.',
        'tag' => '',
        'example' => [
          '<ruby>',
          ' 漢 <rp>(</rp><rt>Kan</rt><rp>)</rp>',
          ' 字 <rp>(</rp><rt>ji</rt><rp>)</rp>',
          '</ruby>'
        ]
      ],

      's' => [
        'elem' => 's',
        'desc' => 'Defines strikethrough text.',
        'tag' => '',
        'example' => 'Alex is <s>37</s> 38 years old.'
      ],

      'samp' => [
        'elem' => 'samp',
        'desc' => 'Defines a sample output from a computer program.',
        'tag' => '',
        'example' => 'I entered <code>git push</code> and the terminal printed out <samp>Everything up-to-date</samp>.'
      ],

      'script' => [
        'elem' => 'script',
        'desc' => 'Defines a container for an external script.',
        'tag' => '',
        'att' => [
          'src',
          'type',
          'async'
        ],
        'save' => 'head',
        'noexample' => '',
        'example' => [
          '<script src="https://htmlreference.io/javascript/my-scripts.js"></script>',
          '',
          '<script type="text/javascript">',
          " console.log('Hello World');",
          '</script>'
        ]
      ],

      'section' => [
        'elem' => 'section',
        'desc' => 'Defines a section within a web page.',
        'tag' => '',
        'example' => [
          '<section>',
          ' <h2>Section title</h2>',
          ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '</section>'
        ]
      ],

      'select' => [
        'elem' => 'select',
        'desc' => 'Defines a select dropdown with different <option> elements.',
        'tag' => '',
        'att' => [
          'name',
          'size',
          'multiple',
          'autofocus',
          'disabled',
          'required'
        ],
        'load' => 'option',
        'example' => [
          '<select name="country">',
          ' <option value="Argentina">Argentina</option>',
          ' <option value="Bolivia">Bolivia</option>',
          ' <option value="Brazil">Brazil</option>',
          ' <option value="Chile">Chile</option>',
          ' <option value="Colombia">Colombia</option>',
          ' <option value="Ecuador">Ecuador</option>',
          ' <option value="Guyana">Guyana</option>',
          ' <option value="Paraguay">Paraguay</option>',
          ' <option value="Peru">Peru</option>',
          ' <option value="Suriname">Suriname</option>',
          ' <option value="Uruguay">Uruguay</option>',
          ' <option value="Venezuela">Venezuela</option>',
          '</select>'
        ]
      ],

      'small' => [
        'elem' => 'small',
        'desc' => 'Defines small print, for less important content.',
        'tag' => '',
        'example' => [
          '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '<small>Posted on <time datetime="2017-04-29T19:00">Apr 29</time> in <a href="/category/code">Code</a></small>'
        ]
      ],

      'source' => [
        'elem' => 'source',
        'desc' => 'Defines a source for an <audio>, <video>, or <picture> element.',
        'tag' => 'self',
        'att' => [
          'src',
          'srcset',
          'sizes',
          'type',
          'media'
        ],
        'example' => [
          '<picture>',
          ' <source ',
          '   media="(min-width: 800px)"',
          '   srcset="https://htmlreference.io/images/sunset-360.jpg 360w,',
          '     https://htmlreference.io/images/sunset-720.jpg 720w,',
          '     https://htmlreference.io/images/sunset-1440.jpg 1440w"',
          '   sizes="33.3vw">',
          ' <source ',
          '   srcset="https://htmlreference.io/images/sunset-720.jpg 2x,',
          '     https://htmlreference.io/images/sunset-360.jpg 1x">',
          ' <img src="https://htmlreference.io/images/sunset.jpg" alt="Picture of a Ha Long Bay sunset">',
          '</picture>'
        ]
      ],

      'span' => [
        'elem' => 'span',
        'desc' => 'Defines a generic inline container of content, that does not carry any semantic value.',
        'tag' => '',
        'example' => '<p>My mother has <span style="color:green">green</span> eyes.</p>'
      ],

      'strong' => [
        'elem' => 'strong',
        'desc' => 'Defines strong importance on text.',
        'tag' => '',
        'example' => 'HTML should only be used to write <strong>content</strong>, and keep CSS for <strong>styling</strong> the web page.'
      ],

      'style' => [
        'elem' => 'style',
        'desc' => 'Defines a container to add CSS within a web page.',
        'tag' => '',
        'att' => [
          'type'
        ],
        'save' => 'head',
        'noexample' => '',
        'example' => [
          '<style type="text/css">',
          ' .important {',
          '   color: red;',
          ' }',
          '</style>'
        ]
      ],

      'sub' => [
        'elem' => 'sub',
        'desc' => 'Defines text that should be displayed lower.',
        'tag' => '',
        'example' => 'The formula of carbon dioxide is CO<sub>2</sub>.'
      ],

      'summary' => [
        'elem' => 'summary',
        'desc' => 'Defines the summary of a <details> element.',
        'tag' => '',
        'example' => [
          '<details>',
          ' <summary>Read more</summary>',
          ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.</p>',
          '</details>'
        ]
      ],

      'sup' => [
        'elem' => 'sup',
        'desc' => 'Defines text that should be displayed higher.',
        'tag' => '',
        'example' => 'The "power of two" is 2<sup>n</sup> where n is an integer.'
      ],

      'table' => [
        'elem' => 'table',
        'desc' => 'Defines a container for tabular data.',
        'tag' => '',
        'load' => [
          'thead',
          'tbody',
          'tfoot',
          'tr'
        ],
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'tbody' => [
        'elem' => 'tbody',
        'desc' => 'Defines a group of table rows <tr>.',
        'tag' => '',
        'save' => 'table',
        'load' => 'tr',
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'td' => [
        'elem' => 'td',
        'desc' => 'Defines a table cell. Must be a direct child of a <tr>.',
        'tag' => '',
        'att' => [
          'colspan',
          'rowspan'
        ],
        'save' => 'tr',
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'textarea' => [
        'elem' => 'textarea',
        'desc' => 'Defines a multi-line text control within a web form.',
        'tag' => '',
        'att' => [
          'name',
          'autocomplete',
          'minlength',
          'maxlength',
          'placeholder',
          'cols',
          'rows',
          'wrap',
          'disabled',
          'required',
          'autofocus',
          'readonly',
          'spellcheck'
        ],
        'example' => [
          '<label for="textareaExample">Textarea label:</label>',
          '<br>',
          '<textarea id="textareaExample" name="textareaExample" rows="4" cols="50">',
          ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.',
          '</textarea>'
        ]
      ],

      'tfoot' => [
        'elem' => 'tfoot',
        'desc' => 'Defines a group of table rows <tr> at the end of a <table>.',
        'tag' => '',
        'save' => 'table',
        'load' => 'tr',
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'th' => [
        'elem' => 'th',
        'desc' => 'Defines a table header. Must be a direct child of a <tr>.',
        'tag' => '',
        'att' => [
          'colspan',
          'rowspan'
        ],
        'save' => 'tr',
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'thead' => [
        'elem' => 'thead',
        'desc' => 'Defines a group of table rows <tr> at the start of a <table>.',
        'tag' => '',
        'save' => 'table',
        'load' => 'tr',
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'time' => [
        'elem' => 'time',
        'desc' => 'Defines a time on a 24h clock.',
        'tag' => '',
        'att' => [
          'datetime'
        ],
        'example' => 'The game starts at <time datetime="2017-04-29T19:00">19:00</time>.'
      ],

      'title' => [
        'elem' => 'title',
        'desc' => 'Defines the title of the web page, displayed on the browser tab.',
        'tag' => '',
        'noexample' => '',
        'example' => [
          '<!DOCTYPE html>',
          '<html>',
          ' <head>',
          '   <!-- Document metadata -->',
          '   <title>',
          '     Splittlogic/html',
          '   </title>',
          ' </head>',
          ' <body>',
          '   <!-- Document content -->',
          ' </body>',
          '</html>'
        ]
      ],

      'tr' => [
        'elem' => 'tr',
        'desc' => 'Defines a table row.',
        'tag' => '',
        'save' => [
          'table',
          'tbody',
          'tfoot',
          'thead'
        ],
        'load' => [
          'td',
          'th'
        ],
        'example' => [
          '<table class="table text-light">',
          ' <thead>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </thead>',
          ' <tfoot>',
          '   <tr>',
          '     <th>Name</th>',
          '     <th>Instrument</th>',
          '   </tr>',
          ' </tfoot>',
          ' <tbody>',
          '   <tr>',
          '     <td>John Lennon</td>',
          '     <td>Rhythm Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Paul McCartney</td>',
          '     <td>Bass</td>',
          '   </tr>',
          '   <tr>',
          '     <td>George Harrison</td>',
          '     <td>Lead Guitar</td>',
          '   </tr>',
          '   <tr>',
          '     <td>Ringo Starr</td>',
          '     <td>Drums</td>',
          '   </tr>',
          ' </tbody>',
          '</table>'
        ]
      ],

      'track' => [
        'elem' => 'track',
        'desc' => 'Defines text tracks (like subtitles) for <audio> and <video> elements.',
        'tag' => 'self',
        'example' => [
          '<video width="320" height="240" controls>',
          ' <source src="forrest_gump.mp4" type="video/mp4">',
          ' <source src="forrest_gump.ogg" type="video/ogg">',
          ' <track src="fgsubtitles_en.vtt" kind="subtitles" srclang="en" label="English">',
          ' <track src="fgsubtitles_no.vtt" kind="subtitles" srclang="no" label="Norwegian">',
          '</video>'
        ]
      ],

      'u' => [
        'elem' => 'u',
        'desc' => "Makes an element's text underlined.",
        'tag' => '',
        'example' => 'Hello <u>World</u>'
      ],

      'ul' => [
        'elem' => 'ul',
        'desc' => 'Defines an unordered list.',
        'tag' => '',
        'load' => 'li',
        'example' => [
          '<p>My shopping list:</p>',
          '<ul>',
          ' <li>Milk</li>',
          ' <li>Bread</li>',
          ' <li>Chocolate</li>',
          ' <li>More chocolate</li>',
          '</ul>'
        ]
      ],

      'var' => [
        'elem' => 'var',
        'desc' => 'Defines a variable in a mathematical or programming expression.',
        'tag' => '',
        'example' => 'The value of <var>x</var> is 12.'
      ],

      'video' => [
        'elem' => 'video',
        'desc' => 'Allows to embed an video clip into a web page.',
        'tag' => '',
        'att' => [
          'src',
          'autoplay',
          'controls',
          'loop',
          'muted',
          'poster',
          'height',
          'width'
        ],
        'example' => '<video src="video.mp4" controls></video>'
      ],

      'wbr' => [
        'elem' => 'wbr',
        'desc' => 'The <wbr> (Word Break Opportunity) tag specifies where in a text it would be ok to add a line-break.',
        'tag' => '',
        'example' => '<p>To learn AJAX, you must be familiar with the XML<wbr>Http<wbr>Request Object.</p>'
      ]

    ];

    // Cycle through data to add extra values
    foreach ($data as $key => $arr)
    {

      // Check that elem & tag are set
      if (isset($arr['elem']) && isset($arr['tag']))
      {

        // Check for self closing
        if ($arr['tag'] == 'self')
        {

          $data[$key]['html'] = '<' . $arr['elem'] . '...>';
          $data[$key]['htmlchar'] = $this->htmlchar($data[$key]['html']);

        // Not self closing
        } else {

          // Check for custom
          if ($arr['tag'] == 'custom')
          {

            $data[$key]['html'] = $arr['elemtag'];
            $data[$key]['htmlchar'] = $this->htmlchar($data[$key]['html']);

          // Not custom
          } else {

            $data[$key]['html'] = '<' . $arr['elem'] . '>...</' . $arr['elem'] . '>';
            $data[$key]['htmlchar'] = $this->htmlchar($data[$key]['html']);

          }

        }

        // Add link
        $data[$key]['link'] = $this->class('btn btn-outline-primary')
          ->a('Link', route('splittlogic.html.element', $arr['elem']));

      }

      // Check for desc
      if (isset($arr['desc']))
      {

        $data[$key]['descchar'] = $this->htmlchar($arr['desc']);

      }

      // Check for example
      if (isset($arr['example']))
      {

        // Check if example is an array
        if (is_array($arr['example']))
        {

          // Reset example key
          $data[$key]['example'] = null;
          foreach ($arr['example'] as $ex)
          {

            $data[$key]['example'] .= $ex . PHP_EOL;

          }

        }

        $data[$key]['code'] = $this->htmlchar($data[$key]['example']);

      }

      // Set function
      $data[$key]['func'] = $key . '()';

    }

    return $data;

  }


}
