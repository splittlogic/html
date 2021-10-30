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


trait aboutSettings
{


  // About Settings Table
  public function aboutSettingsTable()
  {

    // Table classes
    $classes = array(
      'table',
      'table-striped',
      'table-hover'
    );

    // Table header
    $header = array();
    $header['set'] = 'Attribute / Setting';
    $header['func'] = 'Function';
    $header['descchar'] = 'Description';
    $header['elements'] = 'Elements';
    $header['link'] = 'Link';

    // Get Settings array
    $data = $this->aboutSettingsArray();

    // Create array into a table
    return $this->arrayToTable($data,$classes,$header,true);

  }


  // About Setting page
  public function aboutSetting($setting)
  {

    // Get Settings array
    $data = $this->aboutSettingsArray();

    // Get Element array
    $elems = $this->aboutElementArray();

    // Declare return
    $return = '';

    // Check if setting exists
    if (isset($data[$setting]))
    {

      // Check for custom
      if (isset($data[$setting]['custom']))
      {

        $desc2 = $this->b($data[$setting]['custom']);

        // Check for values
        if (isset($data[$setting]['values']))
        {

          $value = $data[$setting]['values'];

        } else {

          $value = '$value';

        }

      // Custom is not set
      } else {

        // Check for no value
        if (isset($data[$setting]['novalue']))
        {

          $desc2 = $this->b('<... ' . $data[$setting]['set'] . '>');
          $value = '';

        // No value is not set
        } else {

          $desc2 = $this->b('<... ' . $data[$setting]['set'] . '="value" ...>');

          // Check for values
          if (isset($data[$setting]['values']))
          {

            $value = $data[$setting]['values'];

          } else {

            $value = '$value';

          }

        }

      }

      // Format value
      $dol = $this->class('text-light')->span('$');
      $value = str_replace('$', $dol, $value);
      $apo = $this->class('text-light')->span("'");
      $value = str_replace("'", $apo, $value);
      $value = $this->class('text-danger')->span($value);

      // Heading
      $small = $this->class('lead')->span($setting . '()');
      $return .= $this->h1(Str::ucfirst($data[$setting]['set']) . ' ' . $small)
        . $this->b($data[$setting]['descchar'])
        . $this->br() . $this->br()
        . $desc2
        . $this->br() . $this->br();

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
        . $this->class('text-info')->span($setting . '(' . $value . ')')
        . '->'
        . $this->class('text-success')->span('element()')
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
        . $this->class('text-info')->span($setting . '(' . $value . ')')
        . '->'
        . $this->class('text-success')->span('element()')
        . $this->class('text-light')->span(';');

      // Elements
      if (isset($data[$setting]['elem']))
      {

        $elements = '';

        foreach ($data[$setting]['elem'] as $elem)
        {

          // Check for global
          if ($elem == 'global')
          {

            // Create element link cell
            $this->td(
              $this->class('btn btn-outline-primary')
                ->a('Global', route('splittlogic.html.globals'))
            );

            // Create element description cell
            $this->td(
              $this->class('text-light')
                ->span('The global attributes are attributes that can be used with all HTML elements.')
            );

            // Create table row
            $this->tr();

          // Not global
          } else {

            // Check if element is set
            if (isset($elems[$elem]))
            {

              // Create element link cell
              $this->td(
                $this->class('btn btn-outline-primary')
                  ->a($elem, route('splittlogic.html.element', $elem))
              );

              // Create element description cell
              $this->td(
                $this->class('text-light')
                  ->span($elems[$elem]['desc'])
              );

              // Create table row
              $this->tr();

            }

          }

        }

        $elements = $this->class('table')->table();

      }

      // Basic Instance & Static Card
      $bi = $this->pre($bi);
      $bi = $this->code($bi);
      $bi = $this->aboutCard(
        'Basic Instance & Static Methods:', null, $bi, 'success', 'light'
      );

      // Elements Card
      $elements = $this->aboutCard(
        'Elements: ', null, $elements
      );

      $col1 = $this->class('col-4')
        ->div($bi);

      $col2 = $this->class('col-8')
        ->div($elements);

      $row = $this->class('row')
        ->div($col1 . $col2);

      $return .= $this->class('container')->div($row);

    // Setting does not exist
    } else {

      // Create alert message
      $message = 'The setting requested does not exist.  Please use menu links to navigate this guide.';
      $return = $this->class('alert')
        ->class('alert-danger')
        ->class('text-center')
        ->attribute(['role' => 'alert'])
        ->div($message);

      // Create center link
      $link = $this->a('Settings Menu', route('splittlogic.html.settings'));
      $return .= $this->class('text-center')
        ->h1($link);
    }

    return $return;

  }


  // About Settings Data Array
  public function aboutSettingsArray()
  {

    // Declare Array
    $data = [

      'accept' => [
        'set' => 'accept',
        'desc' => 'Specifies the types of files that the server accepts (only for type="file")',
        'elem' => [
          'input'
        ]
      ],

      'acceptcharset' => [
        'set' => 'accept-charset',
        'desc' => '	Specifies the character encodings that are to be used for the form submission',
        'elem' => [
          'form'
        ]
      ],

      'accesskey' => [
        'set' => 'accesskey',
        'desc' => 'Specifies a shortcut key to activate/focus an element',
        'elem' => [
          'global'
        ]
      ],

      'acite' => [
        'set' => 'cite',
        'desc' => 'Defines the source URL of the citation',
        'elem' => [
          'blockquote',
          'del',
          'ins',
          'q'
        ]
      ],

      'acontent' => [
        'set' => 'content',
        'desc' => 'The content attribute gives the value associated with the http-equiv or name attribute.',
        'elem' => [
          'meta'
        ]
      ],

      'action' => [
        'set' => 'action',
        'desc' => 'Specifies where to send the form-data when a form is submitted',
        'elem' => [
          'form'
        ]
      ],

      'adata' => [
        'set' => 'data',
        'desc' => 'Specifies the URL of the resource to be used by the object',
        'elem' => [
          'object'
        ]
      ],

      'aform' => [
        'set' => 'form',
        'desc' => 'Specifies the name of the form the element belongs to',
        'elem' => [
          'button',
          'fieldset',
          'input',
          'label',
          'meter',
          'object',
          'output',
          'select',
          'textarea'
        ]
      ],

      'alabel' => [
        'set' => 'label',
        'desc' => 'Specifies the title of the text track',
        'elem' => [
          'track',
          'option',
          'optgroup'
        ]
      ],

      'allowfullscreen' => [
        'set' => 'allowfullscreen',
        'desc' => 'Set to true if the <iframe> can activate fullscreen mode',
        'elem' => [
          'iframe'
        ],
        'novalue' => true
      ],

      'alt' => [
        'set' => 'alt',
        'desc' => 'Specifies an alternate text when the original element fails to display',
        'elem' => [
          'area',
          'img',
          'input'
        ]
      ],

      'aopen' => [
        'set' => 'open',
        'desc' => 'Specifies that the details should be visible (open) to the user',
        'elem' => [
          'details'
        ]
      ],

      'aspan' => [
        'set' => 'span',
        'desc' => 'Specifies the number of columns to span',
        'elem' => [
          'col',
          'colgroup'
        ]
      ],

      'astyle' => [
        'set' => 'style',
        'desc' => 'Specifies an inline CSS style for an element',
        'elem' => [
          'global'
        ]
      ],

      'async' => [
        'set' => 'async',
        'desc' => 'Specifies that the script is executed asynchronously (only for external scripts)',
        'elem' => [
          'script'
        ],
        'novalue' => true
      ],

      'atitle' => [
        'set' => 'title',
        'desc' => 'The title attribute specifies extra information about an element. The information is most often shown as a tooltip text when the mouse moves over the element.',
        'elem' => [
          'global'
        ]
      ],

      'attribute' => [
        'set' => 'attribute',
        'desc' => 'Set a unique attribute for any element.  Calling with an array will set a value for the given attribute, and calling with a string with set a "no value" attribute.',
        'elem' => [
          'global'
        ],
        'custom' => "attribute(['attributeName' => 'value']) OR attribute('value')"
      ],

      'autocomplete' => [
        'set' => 'autocomplete',
        'desc' => '	Specifies whether the <form> or the <input> element should have autocomplete enabled',
        'elem' => [
          'form',
          'input'
        ]
      ],

      'autofocus' => [
        'set' => 'autofocus',
        'desc' => 'Specifies that the element should automatically get focus when the page loads',
        'elem' => [
          'button',
          'input',
          'select',
          'textarea'
        ],
        'novalue' => true
      ],

      'autoplay' => [
        'set' => 'autoplay',
        'desc' => 'Specifies that the audio/video will start playing as soon as it is ready',
        'elem' => [
          'audio',
          'video'
        ],
        'novalue' => true
      ],

      'cdata' => [
        'set' => 'data-*',
        'desc' => '	Used to store custom data private to the page or application',
        'elem' => [
          'global'
        ],
        'values' => '$data, $value'
      ],

      'charset' => [
        'set' => 'charset',
        'desc' => '	Specifies the character encoding',
        'elem' => [
          'meta',
          'script'
        ]
      ],

      'checked' => [
        'set' => 'checked',
        'desc' => 'Specifies that an <input> element should be pre-selected when the page loads (for type="checkbox" or type="radio")',
        'elem' => [
          'input'
        ]
      ],

      'class' => [
        'set' => 'class',
        'desc' => 'Specifies one or more classnames for an element (refers to a class in a style sheet)',
        'elem' => [
          'global'
        ]
      ],

      'cols' => [
        'set' => 'cols',
        'desc' => 'Specifies the visible width of a text area',
        'elem' => [
          'textarea'
        ]
      ],

      'colspan' => [
        'set' => 'colspan',
        'desc' => 'Specifies the number of columns a table cell should span',
        'elem' => [
          'td',
          'th'
        ]
      ],

      'contenteditable' => [
        'set' => 'contenteditable',
        'desc' => 'Specifies whether the content of an element is editable or not',
        'elem' => [
          'global'
        ]
      ],

      'coords' => [
        'set' => 'coords',
        'desc' => 'Specifies the coordinates of the area',
        'elem' => [
          'area'
        ]
      ],

      'datetime' => [
        'set' => 'datetime',
        'desc' => 'The datetime attribute specifies the date and time when the text was deleted/inserted. When used together with the <time> element, it represents a date and/or time of the <time> element.',
        'elem' => [
          'del',
          'ins',
          'time'
        ]
      ],

      'default' => [
        'set' => 'default',
        'desc' => "Specifies that the track is to be enabled if the user's preferences do not indicate that another track would be more appropriate",
        'elem' => [
          'track'
        ],
        'novalue' => true
      ],

      'defer' => [
        'set' => 'defer',
        'desc' => 'Specifies that the script is executed when the page has finished parsing (only for external scripts)',
        'elem' => [
          'script'
        ],
        'novalue' => true
      ],

      'dir' => [
        'set' => 'dir',
        'desc' => 'Specifies the text direction for the content in an element',
        'elem' => [
          'global'
        ]
      ],

      'dirname' => [
        'set' => 'dirname',
        'desc' => 'Specifies that the text direction will be submitted',
        'elem' => [
          'input',
          'textarea'
        ]
      ],

      'disabled' => [
        'set' => 'disabled',
        'desc' => 'Specifies that the specified element/group of elements should be disabled',
        'elem' => [
          'button',
          'fieldset',
          'input',
          'optgroup',
          'option',
          'select',
          'textarea'
        ],
        'novalue' => true
      ],

      'download' => [
        'set' => 'download',
        'desc' => 'Specifies that the target will be downloaded when a user clicks on the hyperlink',
        'elem' => [
          'a',
          'area'
        ],
        'novalue' => true
      ],

      'draggable' => [
        'set' => 'draggable',
        'desc' => '	Specifies whether an element is draggable or not',
        'elem' => [
          'global'
        ]
      ],

      'enctype' => [
        'set' => 'enctype',
        'desc' => 'Specifies how the form-data should be encoded when submitting it to the server (only for method="post")',
        'elem' => [
          'form'
        ]
      ],

      'for' => [
        'set' => 'for',
        'desc' => 'Specifies which form element(s) a label/calculation is bound to',
        'elem' => [
          'label',
          'output'
        ]
      ],

      'formaction' => [
        'set' => 'formaction',
        'desc' => '	Specifies where to send the form-data when a form is submitted. Only for type="submit"',
        'elem' => [
          'button',
          'input'
        ]
      ],

      'headers' => [
        'set' => 'headers',
        'desc' => 'Specifies one or more headers cells a cell is related to',
        'elem' => [
          'td',
          'th'
        ]
      ],

      'height' => [
        'set' => 'height',
        'desc' => 'Specifies the height of the element',
        'elem' => [
          'canvas',
          'embed',
          'iframe',
          'img',
          'input',
          'object',
          'video'
        ]
      ],

      'hidden' => [
        'set' => 'hidden',
        'desc' => 'Specifies that an element is not yet, or is no longer, relevant',
        'elem' => [
          'global'
        ],
        'novalue' => true
      ],

      'high' => [
        'set' => 'high',
        'desc' => 'Specifies the range that is considered to be a high value',
        'elem' => [
          'meter'
        ]
      ],

      'href' => [
        'set' => 'href',
        'desc' => 'Specifies the URL of the page the link goes to',
        'elem' => [
          'a',
          'area',
          'base',
          'link'
        ]
      ],

      'hreflang' => [
        'set' => 'hreflang',
        'desc' => 'Specifies the language of the linked document',
        'elem' => [
          'a',
          'area',
          'link'
        ]
      ],

      'httpequiv' => [
        'set' => 'http-equiv',
        'desc' => 'Provides an HTTP header for the information/value of the content attribute',
        'elem' => [
          'meta'
        ]
      ],

      'id' => [
        'set' => 'id',
        'desc' => 'Specifies a unique id for an element',
        'elem' => [
          'global'
        ]
      ],

      'ismap' => [
        'set' => 'ismap',
        'desc' => 'Specifies an image as a server-side image map',
        'elem' => [
          'img'
        ],
        'novalue' => true
      ],

      'kind' => [
        'set' => 'kind',
        'desc' => 'Specifies the kind of text track',
        'elem' => [
          'track'
        ]
      ],

      'lang' => [
        'set' => 'lang',
        'desc' => "Specifies the language of the element's content",
        'elem' => [
          'global'
        ]
      ],

      'list' => [
        'set' => 'list',
        'desc' => 'Refers to a <datalist> element that contains pre-defined options for an <input> element',
        'elem' => [
          'input'
        ]
      ],

      'loop' => [
        'set' => 'loop',
        'desc' => 'Specifies that the audio/video will start over again, every time it is finished',
        'elem' => [
          'audio',
          'video'
        ],
        'novalue' => true
      ],

      'low' => [
        'set' => 'low',
        'desc' => 'Specifies the range that is considered to be a low value',
        'elem' => [
          'meter'
        ]
      ],

      'ltr' => [
        'set' => 'dir',
        'desc' => 'Specifies the text direction left-to-right for the content in an element',
        'elem' => [
          'global'
        ],
        'novalue' => true,
        'custom' => '<... dir="ltr" ...>',
        'values' => ''
      ],

      'mailto' => [
        'set' => 'href',
        'desc' => 'Set href mailto link',
        'elem' => [
          'a',
          'area',
          'base',
          'link'
        ],
        'custom' => '<... href="mailto:value" ...>'
      ],

      'max' => [
        'set' => 'max',
        'desc' => 'Specifies the maximum value',
        'elem' => [
          'input',
          'meter',
          'progress'
        ]
      ],

      'maxlength' => [
        'set' => 'maxlength',
        'desc' => 'Specifies the maximum number of characters allowed in an element',
        'elem' => [
          'input',
          'textarea'
        ]
      ],

      'media' => [
        'set' => 'media',
        'desc' => 'Specifies what media/device the linked document is optimized for',
        'elem' => [
          'a',
          'area',
          'link',
          'source',
          'style'
        ]
      ],

      'method' => [
        'set' => 'method',
        'desc' => 'Specifies the HTTP method to use when sending form-data',
        'elem' => [
          'form'
        ]
      ],

      'min' => [
        'set' => 'min',
        'desc' => 'Specifies a minimum value',
        'elem' => [
          'input',
          'meter'
        ]
      ],

      'minlength' => [
        'set' => 'minlength',
        'desc' => 'Specifies the minimum number of characters allowed in an element',
        'elem' => [
          'input',
          'textarea'
        ]
      ],

      'multiple' => [
        'set' => 'multiple',
        'desc' => 'Specifies that a user can enter more than one value',
        'elem' => [
          'input',
          'select'
        ],
        'novalue' => true
      ],

      'muted' => [
        'set' => 'muted',
        'desc' => 'Specifies that the audio output of the video should be muted',
        'elem' => [
          'video',
          'audio'
        ],
        'novalue' => true
      ],

      'name' => [
        'set' => 'name',
        'desc' => 'Specifies the name of the element',
        'elem' => [
          'button',
          'fieldset',
          'form',
          'iframe',
          'input',
          'map',
          'meta',
          'object',
          'output',
          'param',
          'select',
          'textarea'
        ]
      ],

      'novalidate' => [
        'set' => 'novalidate',
        'desc' => 'Specifies that the form should not be validated when submitted',
        'elem' => [
          'form'
        ],
        'novalue' => true
      ],

      'onabort' => [
        'set' => 'onabort',
        'desc' => 'Script to be run on abort',
        'elem' => [
          'audio',
          'embed',
          'img',
          'object',
          'video'
        ]
      ],

      'onafterprint' => [
        'set' => 'onafterprint',
        'desc' => 'Script to be run after the document is printed',
        'elem' => [
          'body'
        ]
      ],

      'onbeforeprint' => [
        'set' => 'onbeforeprint',
        'desc' => 'Script to be run before the document is printed',
        'elem' => [
          'body'
        ]
      ],

      'onbeforeunload' => [
        'set' => 'onbeforeunload',
        'desc' => 'Script to be run when the document is about to be unloaded',
        'elem' => [
          'body'
        ]
      ],

      'onblur' => [
        'set' => 'onblur',
        'desc' => 'Script to be run when the element loses focus',
        'elem' => [
          'visible'
        ]
      ],

      'oncanplay' => [
        'set' => 'oncanplay',
        'desc' => 'Script to be run when a file is ready to start playing (when it has buffered enough to begin)',
        'elem' => [
          'audio',
          'embed',
          'object',
          'video'
        ]
      ],

      'oncanplaythrough' => [
        'set' => 'oncanplaythrough',
        'desc' => 'Script to be run when a file can be played all the way to the end without pausing for buffering',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onchange' => [
        'set' => 'onchange',
        'desc' => 'Script to be run when the value of the element is changed',
        'elem' => [
          'visible'
        ]
      ],

      'onclick' => [
        'set' => 'onclick',
        'desc' => 'Script to be run when the element is being clicked',
        'elem' => [
          'visible'
        ]
      ],

      'oncontextmenu' => [
        'set' => 'oncontextmenu',
        'desc' => 'Script to be run when a context menu is triggered',
        'elem' => [
          'visible'
        ]
      ],

      'oncopy' => [
        'set' => 'oncopy',
        'desc' => 'Script to be run when the content of the element is being copied',
        'elem' => [
          'visible'
        ]
      ],

      'oncuechange' => [
        'set' => 'oncuechange',
        'desc' => 'Script to be run when the cue changes in a <track> element',
        'elem' => [
          'track'
        ]
      ],

      'oncut' => [
        'set' => 'oncut',
        'desc' => 'Script to be run when the content of the element is being cut',
        'elem' => [
          'visible'
        ]
      ],

      'ondblclick' => [
        'set' => 'ondblclick',
        'desc' => 'Script to be run when the element is being double-clicked',
        'elem' => [
          'visible'
        ]
      ],

      'ondrag' => [
        'set' => 'ondrag',
        'desc' => 'Script to be run when the element is being dragged',
        'elem' => [
          'visible'
        ]
      ],

      'ondragend' => [
        'set' => 'ondragend',
        'desc' => 'Script to be run at the end of a drag operation',
        'elem' => [
          'visible'
        ]
      ],

      'ondragenter' => [
        'set' => 'ondragenter',
        'desc' => 'Script to be run when an element has been dragged to a valid drop target',
        'elem' => [
          'visible'
        ]
      ],

      'ondragleave' => [
        'set' => 'ondragleave',
        'desc' => 'Script to be run when an element leaves a valid drop target',
        'elem' => [
          'visible'
        ]
      ],

      'ondragover' => [
        'set' => 'ondragover',
        'desc' => 'Script to be run when an element is being dragged over a valid drop target',
        'elem' => [
          'visible'
        ]
      ],

      'ondragstart' => [
        'set' => 'ondragstart',
        'desc' => 'Script to be run at the start of a drag operation',
        'elem' => [
          'visible'
        ]
      ],

      'ondrop' => [
        'set' => 'ondrop',
        'desc' => 'Script to be run when dragged element is being dropped',
        'elem' => [
          'visible'
        ]
      ],

      'ondurationchange' => [
        'set' => 'ondurationchange',
        'desc' => 'Script to be run when the length of the media changes',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onemptied' => [
        'set' => 'onemptied',
        'desc' => 'Script to be run when something bad happens and the file is suddenly unavailable (like unexpectedly disconnects)',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onended' => [
        'set' => 'onended',
        'desc' => 'Script to be run when the media has reach the end (a useful event for messages like "thanks for listening")',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onerror' => [
        'set' => 'onerror',
        'desc' => 'Script to be run when an error occurs',
        'elem' => [
          'audio',
          'body',
          'embed',
          'img',
          'object',
          'script',
          'style',
          'video'
        ]
      ],

      'onfocus' => [
        'set' => 'onfocus',
        'desc' => 'Script to be run when the element gets focus',
        'elem' => [
          'visible'
        ]
      ],

      'onhashchange' => [
        'set' => 'onhashchange',
        'desc' => 'Script to be run when there has been changes to the anchor part of the a URL',
        'elem' => [
          'body'
        ]
      ],

      'oninput' => [
        'set' => 'oninput',
        'desc' => 'Script to be run when the element gets user input',
        'elem' => [
          'visible'
        ]
      ],

      'oninvalid' => [
        'set' => 'oninvalid',
        'desc' => 'Script to be run when the element is invalid',
        'elem' => [
          'visible'
        ]
      ],

      'onkeydown' => [
        'set' => 'onkeydown',
        'desc' => 'Script to be run when a user is pressing a key',
        'elem' => [
          'visible'
        ]
      ],

      'onkeypress' => [
        'set' => 'onkeypress',
        'desc' => 'Script to be run when a user presses a key',
        'elem' => [
          'visible'
        ]
      ],

      'onkeyup' => [
        'set' => 'onkeyup',
        'desc' => 'Script to be run when a user releases a key',
        'elem' => [
          'visible'
        ]
      ],

      'onload' => [
        'set' => 'onload',
        'desc' => 'Script to be run when the element is finished loading',
        'elem' => [
          'body',
          'iframe',
          'img',
          'input',
          'link',
          'script',
          'style'
        ]
      ],

      'onloadeddata' => [
        'set' => 'onloadeddata',
        'desc' => 'Script to be run when media data is loaded',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onloadedmetadata' => [
        'set' => 'onloadedmetadata',
        'desc' => 'Script to be run when meta data (like dimensions and duration) are loaded',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onloadstart' => [
        'set' => 'onloadstart',
        'desc' => 'Script to be run just as the file begins to load before anything is actually loaded',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onmousedown' => [
        'set' => 'onmousedown',
        'desc' => 'Script to be run when a mouse button is pressed down on an element',
        'elem' => [
          'visible'
        ]
      ],

      'onmousemove' => [
        'set' => 'onmousemove',
        'desc' => 'Script to be run as long as the  mouse pointer is moving over an element',
        'elem' => [
          'visible'
        ]
      ],

      'onmouseout' => [
        'set' => 'onmouseout',
        'desc' => 'Script to be run when a mouse pointer moves out of an element',
        'elem' => [
          'visible'
        ]
      ],

      'onmouseover' => [
        'set' => 'onmouseover',
        'desc' => 'Script to be run when a mouse pointer moves over an element',
        'elem' => [
          'visible'
        ]
      ],

      'onmouseup' => [
        'set' => 'onmouseup',
        'desc' => 'Script to be run when a mouse button is released over an element',
        'elem' => [
          'visible'
        ]
      ],

      'onmousewheel' => [
        'set' => 'onmousewheel',
        'desc' => 'Script to be run when a mouse wheel is being scrolled over an element',
        'elem' => [
          'visible'
        ]
      ],

      'onoffline' => [
        'set' => 'onoffline',
        'desc' => 'Script to be run when the browser starts to work offline',
        'elem' => [
          'body'
        ]
      ],

      'ononline' => [
        'set' => 'ononline',
        'desc' => 'Script to be run when the browser starts to work online',
        'elem' => [
          'body'
        ]
      ],

      'onpagehide' => [
        'set' => 'onpagehide',
        'desc' => 'Script to be run when a user navigates away from a page',
        'elem' => [
          'body'
        ]
      ],

      'onpageshow' => [
        'set' => 'onpageshow',
        'desc' => 'Script to be run when a user navigates to a page',
        'elem' => [
          'body'
        ]
      ],

      'onpaste' => [
        'set' => 'onpaste',
        'desc' => 'Script to be run when the user pastes some content in an element',
        'elem' => [
          'visible'
        ]
      ],

      'onpause' => [
        'set' => 'onpause',
        'desc' => 'Script to be run when the media is paused either by the user or programmatically',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onplay' => [
        'set' => 'onplay',
        'desc' => 'Script to be run when the media has started playing',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onplaying' => [
        'set' => 'onplaying',
        'desc' => 'Script to be run when the media has started playing',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onpopstate' => [
        'set' => 'onpopstate',
        'desc' => "Script to be run when the window's history changes.",
        'elem' => [
          'body'
        ]
      ],

      'onprogress' => [
        'set' => 'onprogress',
        'desc' => 'Script to be run when the browser is in the process of getting the media data',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onratechange' => [
        'set' => 'onratechange',
        'desc' => 'Script to be run each time the playback rate changes (like when a user switches to a slow motion or fast forward mode).',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onreset' => [
        'set' => 'onreset',
        'desc' => 'Script to be run when a reset button in a form is clicked.',
        'elem' => [
          'form'
        ]
      ],

      'onresize' => [
        'set' => 'onresize',
        'desc' => 'Script to be run when the browser window is being resized.',
        'elem' => [
          'body'
        ]
      ],

      'onscroll' => [
        'set' => 'onscroll',
        'desc' => "Script to be run when an element's scrollbar is being scrolled",
        'elem' => [
          'visible'
        ]
      ],

      'onsearch' => [
        'set' => 'onsearch',
        'desc' => 'Script to be run when the user writes something in a search field (for <input="search">)',
        'elem' => [
          'input'
        ]
      ],

      'onseeked' => [
        'set' => 'onseeked',
        'desc' => 'Script to be run when the seeking attribute is set to false indicating that seeking has ended',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onseeking' => [
        'set' => 'onseeking',
        'desc' => 'Script to be run when the seeking attribute is set to true indicating that seeking is active',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onselect' => [
        'set' => 'onselect',
        'desc' => 'Script to be run when the element gets selected',
        'elem' => [
          'visible'
        ]
      ],

      'onstalled' => [
        'set' => 'onstalled',
        'desc' => 'Script to be run when the browser is unable to fetch the media data for whatever reason',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onstorage' => [
        'set' => 'onstorage',
        'desc' => 'Script to be run when a Web Storage area is updated',
        'elem' => [
          'body'
        ]
      ],

      'onsubmit' => [
        'set' => 'onsubmit',
        'desc' => 'Script to be run when a form is submitted',
        'elem' => [
          'form'
        ]
      ],

      'onsuspend' => [
        'set' => 'onsuspend',
        'desc' => 'Script to be run when fetching the media data is stopped before it is completely loaded for whatever reason',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'ontimeupdate' => [
        'set' => 'ontimeupdate',
        'desc' => 'Script to be run when the playing position has changed (like when the user fast forwards to a different point in the media)',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'ontoggle' => [
        'set' => 'ontoggle',
        'desc' => 'Script to be run when the user opens or closes the <details> element',
        'elem' => [
          'details'
        ]
      ],

      'onunload' => [
        'set' => 'onunload',
        'desc' => 'Script to be run when a page has unloaded (or the browser window has been closed)',
        'elem' => [
          'body'
        ]
      ],

      'onvolumechange' => [
        'set' => 'onvolumechange',
        'desc' => 'Script to be run each time the volume of a video/audio has been changed',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onwaiting' => [
        'set' => 'onwaiting',
        'desc' => 'Script to be run when the media has paused but is expected to resume (like when the media pauses to buffer more data)',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'onwheel' => [
        'set' => 'onwheel',
        'desc' => 'Script to be run when the mouse wheel rolls up or down over an element',
        'elem' => [
          'visible'
        ]
      ],

      'open' => [
        'set' => 'open',
        'desc' => 'Specifies that the dialog should be visible (open) to the user',
        'elem' => [
          'dialog'
        ],
        'novalue' => true
      ],

      'optimum' => [
        'set' => 'optimum',
        'desc' => 'Specifies what value is the optimal value for the gauge',
        'elem' => [
          'meter'
        ]
      ],

      'orgheight' => [
        'set' => 'orgheight',
        'desc' => 'Specifies height of interactive map',
        'elem' => [
          'img'
        ]
      ],

      'orgwidth' => [
        'set' => 'orgwidth',
        'desc' => 'Specifies width of interactive map',
        'elem' => [
          'img'
        ]
      ],

      'pattern' => [
        'set' => 'pattern',
        'desc' => "Specifies a regular expression that an <input> element's value is checked against",
        'elem' => [
          'input'
        ]
      ],

      'placeholder' => [
        'set' => 'placeholder',
        'desc' => 'Specifies a short hint that describes the expected value of the element',
        'elem' => [
          'input',
          'textarea'
        ]
      ],

      'poster' => [
        'set' => 'poster',
        'desc' => 'Specifies an image to be shown while the video is downloading, or until the user hits the play button',
        'elem' => [
          'video'
        ]
      ],

      'preload' => [
        'set' => 'preload',
        'desc' => 'Specifies if and how the author thinks the audio/video should be loaded when the page loads',
        'elem' => [
          'audio',
          'video'
        ]
      ],

      'readonly' => [
        'set' => 'readonly',
        'desc' => 'Specifies that the element is read-only',
        'elem' => [
          'input',
          'textarea'
        ],
        'novalue' => true
      ],

      'rel' => [
        'set' => 'rel',
        'desc' => 'Specifies the relationship between the current document and the linked document',
        'elem' => [
          'a',
          'area',
          'form',
          'link'
        ]
      ],

      'required' => [
        'set' => 'required',
        'desc' => 'Specifies that the element must be filled out before submitting the form',
        'elem' => [
          'input',
          'select',
          'textarea'
        ],
        'novalue' => true
      ],

      'reversed' => [
        'set' => 'reversed',
        'desc' => 'Specifies that the list order should be descending (9,8,7...)',
        'elem' => [
          'ol'
        ],
        'novalue' => true
      ],

      'rows' => [
        'set' => 'rows',
        'desc' => 'Specifies the visible number of lines in a text area',
        'elem' => [
          'textarea'
        ]
      ],

      'rowspan' => [
        'set' => 'rowspan',
        'desc' => 'Specifies the number of rows a table cell should span',
        'elem' => [
          'td',
          'th'
        ]
      ],

      'rtl' => [
        'set' => 'dir',
        'desc' => 'Specifies the text direction right-to-left for the content in an element',
        'elem' => [
          'global'
        ],
        'novalue' => true,
        'custom' => '<... dir="rtl" ...>',
        'values' => ''
      ],

      'sandbox' => [
        'set' => 'sandbox',
        'desc' => '	Enables an extra set of restrictions for the content in an <iframe>',
        'elem' => [
          'iframe'
        ],
        'novalue' => true
      ],

      'scope' => [
        'set' => 'scope',
        'desc' => 'Specifies whether a header cell is a header for a column, row, or group of columns or rows',
        'elem' => [
          'th'
        ]
      ],

      'selected' => [
        'set' => 'selected',
        'desc' => 'Specifies that an option should be pre-selected when the page loads',
        'elem' => [
          'option'
        ],
        'novalue' => true
      ],

      'shape' => [
        'set' => 'shape',
        'desc' => 'Specifies the shape of the area',
        'elem' => [
          'area'
        ]
      ],

      'size' => [
        'set' => 'size',
        'desc' => 'Specifies the width, in characters (for <input>) or specifies the number of visible options (for <select>)',
        'elem' => [
          'input',
          'select'
        ]
      ],

      'sizes' => [
        'set' => 'sizes',
        'desc' => 'Specifies the size of the linked resource',
        'elem' => [
          'img',
          'link',
          'source'
        ]
      ],

      'spellcheck' => [
        'set' => 'spellcheck',
        'desc' => 'Specifies whether the element is to have its spelling and grammar checked or not',
        'elem' => [
          'global'
        ]
      ],

      'src' => [
        'set' => 'src',
        'desc' => 'Specifies the URL of the media file',
        'elem' => [
          'audio',
          'embed',
          'iframe',
          'img',
          'input',
          'script',
          'source',
          'track',
          'video'
        ]
      ],

      'srcdoc' => [
        'set' => 'srcdoc',
        'desc' => 'Specifies the HTML content of the page to show in the <iframe>',
        'elem' => [
          'iframe'
        ]
      ],

      'srclang' => [
        'set' => 'srclang',
        'desc' => 'Specifies the language of the track text data (required if kind="subtitles")',
        'elem' => [
          'track'
        ]
      ],

      'srcset' => [
        'set' => 'srcset',
        'desc' => 'Specifies the URL of the image to use in different situations',
        'elem' => [
          'img',
          'source'
        ]
      ],

      'start' => [
        'set' => 'start',
        'desc' => 'Specifies the start value of an ordered list',
        'elem' => [
          'ol'
        ]
      ],

      'step' => [
        'set' => 'step',
        'desc' => 'Specifies the legal number intervals for an input field',
        'elem' => [
          'input'
        ]
      ],

      'tabindex' => [
        'set' => 'tabindex',
        'desc' => 'Specifies the tabbing order of an element',
        'elem' => [
          'global'
        ]
      ],

      'target' => [
        'set' => 'target',
        'desc' => 'Specifies the target for where to open the linked document or where to submit the form',
        'elem' => [
          'a',
          'area',
          'base',
          'form'
        ]
      ],

      'translate' => [
        'set' => 'translate',
        'desc' => 'Specifies whether the content of an element should be translated or not',
        'elem' => [
          'global'
        ]
      ],

      'type' => [
        'set' => 'type',
        'desc' => 'Specifies the type of element',
        'elem' => [
          'a',
          'button',
          'embed',
          'input',
          'link',
          'menu',
          'object',
          'script',
          'source',
          'style'
        ]
      ],

      'usemap' => [
        'set' => 'usemap',
        'desc' => '	Specifies an image as a client-side image map',
        'elem' => [
          'img',
          'object'
        ]
      ],

      'value' => [
        'set' => 'value',
        'desc' => 'Specifies the value of the element',
        'elem' => [
          'button',
          'input',
          'li',
          'option',
          'meter',
          'progress',
          'param'
        ]
      ],

      'volume' => [
        'set' => 'volume',
        'desc' => 'Set the volume. Between 0.0 (silent) and 1.0 (loudest).',
        'elem' => [
          'audio'
        ]
      ],

      'width' => [
        'set' => 'width',
        'desc' => 'Specifies the width of the element',
        'elem' => [
          'canvas',
          'embed',
          'iframe',
          'img',
          'input',
          'object',
          'video'
        ]
      ],

      'wrap' => [
        'set' => 'wrap',
        'desc' => 'Specifies how the text in a text area is to be wrapped when submitted in a form',
        'elem' => [
          'textarea'
        ]
      ]

    ];

    // Cycle through data to add extra values
    foreach ($data as $key => $arr)
    {

      // Set function
      $data[$key]['func'] = $key . '()';

      // Check for desc
      if (isset($arr['desc']))
      {

        $data[$key]['descchar'] = $this->htmlchar($arr['desc']);

      }

      // Check for elements
      $data[$key]['elements'] = '';
      if (isset($arr['elem']))
      {

        foreach ($arr['elem'] as $elem)
        {

          $data[$key]['elements'] .= $this->class('btn btn-outline-success')
            ->a($elem, route('splittlogic.html.element', $elem)) . ' ';

        }

      }

      $data[$key]['link'] = $this->class('btn btn-outline-primary')
        ->a('Link', route('splittlogic.html.setting', $key));

    }

    return $data;

  }

}
