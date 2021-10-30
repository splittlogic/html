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


trait aboutIntro
{


  public function aboutIntro()
  {

    // Line Breaks
    $br = $this->br();

    // Heading
    $c = $this->class('text-center')->h2('Splittlogic/html');

    // Description
    $c .= $this->class('text-center')
      ->class('lead')
      ->p(
        'Laravel HTML element generator'
      );

    $c .= $br;

    $elements = $this->a('Elements', '#elements');
    $blade = $this->a('Blade', '#blade');
    $getbodyatt = $this->a('Body Attributes', '#getBodyAttributes');
    $settings = $this->a('Settings', '#settings');

    $c .= $this->class('text-center')->nav(
      $elements . ' '
      . $blade . ' '
      . $getbodyatt . ' '
      . $settings
    );

    $c .= $br;

    $c .= $this->class('text-center')->id('elements')->h4('Elements');

    $make = $this->code('make()');
    $c .= $this->class('text-center')
      ->p(
        'Any element can be called as an instance or statically (Must use the '
        . $make
        . ' function as the first function called):'
      );

    // Programming colors
    $dollar = $this->class('text-light')->span('$');
    $html = $this->class('text-warning')->span('html');
    $colon = $this->class('text-light')->span(';');
    $make = $this->class('text-success')->span('make()');
    $bladeOpen = $this->class('text-light')->span('{') . '!! ';
    $bladeClose = ' !!' . $this->class('text-light')->span('}');

    // Instance
    $in = $dollar
      . $this->class('text-danger')->span('html')
      . ' = new '
      . $html
      . $colon
      . PHP_EOL
      . $dollar
      . $this->class('text-danger')->span('content')
      . ' = '
      . $dollar
      . $this->class('text-danger')->span('html')
      . '->'
      . $this->class('text-info')->span('a(') . "'http://link/to/page'"
      . $this->class('text-info')->span(')')
      . $colon;

    $in = $this->pre($in);
    $in = $this->code($in);
    $in = $this->aboutCard(
      'Instance:', null, $in
    );

    // Static
    $st = $dollar
      . $this->class('text-danger')->span('content')
      . ' = '
      . $html
      . '::'
      . $make
      . '->'
      . $this->class('text-info')->span('a(') . "'http://link/to/page'"
      . $this->class('text-info')->span(')')
      . $colon;

    $st = $this->pre($st);
    $st = $this->code($st);
    $st = $this->aboutCard(
      'Static:', null, $st
    );

    $divSides = $this->class('col-1')->div();
    $divCenter = $this->class('col-2')->div();

    $in = $this->class('col-4')->div($in);
    $st = $this->class('col-4')->div($st);

    $row = $this->class('row')->div($divSides . $in . $divCenter . $st . $divSides);

    $c .= $this->class('container')->div($row);

    $c .= $br . $br;
    $c .= $this->class('text-center')
      ->p(
        'Elements can also be called directly within a blade template:'
      );

    // Blade
    $bl = $bladeOpen
      . $html
      . '::'
      . $make
      . '->'
      . $this->class('text-info')->span('a(') . "'http://link/to/page'"
      . $this->class('text-info')->span(')')
      . $bladeClose;

    $bl = $this->pre($bl);
    $bl = $this->code($bl);
    $bl = $this->aboutCard(
      'Blade:', null, $bl
    );

    $bl = $this->class('col-4')->div($bl);

    $row = $this->class('row')->div($divCenter . $divCenter . $bl . $divCenter . $divCenter);

    $c .= $this->class('container')->div($row);

    $c .= $br;

    $elements = $this->a('Elements', route('splittlogic.html.elements'));

    $c .= $this->class('text-center')
      ->p(
        'Check the ' . $elements . ' page to view all availabe elements.  If an element is needed that does not exist, it can be created using the tag (tags that need to be opened and closed around content) & singletag (one line, self closing tags) functions:'
      );

    // Tag
    $tag = $dollar
      . $this->class('text-danger')->span('content')
      . ' = '
      . $html
      . '::'
      . $make
      . PHP_EOL
      . ' ->'
      . $this->class('text-info')->span('tag(') . "'newTag', 'Content of new tag'"
      . $this->class('text-info')->span(')')
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $this->h6('Creates:')
      . $this->htmlchar(
        '<newTag>' . PHP_EOL
        . ' Content of new tag' . PHP_EOL
        . '</newTag>'
      );

    $tag = $this->pre($tag);
    $tag = $this->code($tag);
    $tag = $this->aboutCard(
      'Tag:', null, $tag
    );

    // Tagline
    $tl = $dollar
      . $this->class('text-danger')->span('content')
      . ' = '
      . $html
      . '::'
      . $make
      . PHP_EOL
      . ' ->'
      . $this->class('text-info')->span('singletag(') . "'newTag', '\', 'Content of new tag'"
      . $this->class('text-info')->span(')')
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $this->h6('Creates:')
      . $this->htmlchar(
        '<newTag Content of new tag \>'
      );

    $tl = $this->pre($tl);
    $tl = $this->code($tl);
    $tl = $this->aboutCard(
      'Single Tag:', null, $tl
    );

    $tag = $this->class('col-4')->div($tag);
    $tl = $this->class('col-4')->div($tl);

    $row = $this->class('row')->div($divSides . $tag . $divCenter . $tl . $divSides);

    $c .= $this->class('container')->div($row);

    $c .= $br;
    $c .= $this->hr();
    $c .= $br;

    $c .= $this->class('text-center')->id('blade')->h4('Blade');

    $c .= $this->class('text-center')
      ->p(
        'A built-in blank blade template can be called from any controller:'
      );

    $v = 'return '
      . $this->class('text-info')->span('view(')
      . $this->class('text-warning')->span("'html::blank'")
      . $this->class('text-light')->span(',')
      . $this->class('text-warning')->span("['content'")
      . " =>"
      . $this->class('text-warning')->span(' $content]')
      . $this->class('text-info')->span(')')
      . $colon;

    $v = $this->pre($v);
    $v = $this->code($v);
    $v = $this->aboutCard(
      'View:', null, $v
    );

    $v = $this->class('col-4')->div($v);

    $row = $this->class('row')->div($divCenter . $divCenter . $v . $divCenter . $divCenter);

    $c .= $this->class('container')->div($row);

    $c .= $br;

    $c .= $this->class('text-center')
      ->p(
        'If content does not need to be passed, then just call the template alone:'
      );

    $v = 'return '
      . $this->class('text-info')->span('view(')
      . $this->class('text-warning')->span("'html::blank'")
      . $this->class('text-info')->span(')')
      . $colon;

    $v = $this->pre($v);
    $v = $this->code($v);
    $v = $this->aboutCard(
      'View:', null, $v
    );

    $v = $this->class('col-4')->div($v);

    $row = $this->class('row')->div($divCenter . $divCenter . $v . $divCenter . $divCenter);

    $c .= $this->class('container')->div($row);

    $c .= $br;

    $head = $this->class('btn btn-outline-success')
      ->a('head',route('splittlogic.html.element', 'head'));

    $p = $this->class('btn btn-outline-success')
        ->a('base', route('splittlogic.html.element', 'base'))
      . ' '
      . $this->class('btn btn-outline-success')
        ->a('css', route('splittlogic.html.element', 'css'))
      . ' '
      . $this->class('btn btn-outline-success')
        ->a('js', route('splittlogic.html.element', 'js'))
      . ' '
      . $this->class('btn btn-outline-success')
        ->a('link', route('splittlogic.html.element', 'link'))
      . ' '
      . $this->class('btn btn-outline-success')
        ->a('meta', route('splittlogic.html.element', 'meta'))
      . ' '
      . $this->class('btn btn-outline-success')
        ->a('script', route('splittlogic.html.element', 'script'))
      . ' '
      . $this->class('btn btn-outline-success')
        ->a('style', route('splittlogic.html.element', 'style'));

    $c .= $this->class('text-center')
      ->p(
        'The template will automatically add any ' . $head . ' element that is called from the controller:'
        . $br . $br . $p
      );

    $c .= $br;

    $c .= $this->class('text-center')
      ->p(
        'The ' . $head . ' element can be called in a custom blade template with the following command:'
      );

    $bl = $bladeOpen
      . $html
      . '::'
      . $this->class('text-info')->span('head()')
      . $bladeClose;

    $bl = $this->pre($bl);
    $bl = $this->code($bl);
    $bl = $this->aboutCard(
      'Blade - Head:', null, $bl
    );

    $bl = $this->class('col-4')->div($bl);

    $row = $this->class('row')->div($divCenter . $divCenter . $bl . $divCenter . $divCenter);

    $c .= $this->class('container')->div($row);

    $c .= $this->id('getBodyAttributes')->br();

    $body = $this->class('btn btn-outline-success')
      ->a('body', route('splittlogic.html.element', 'body'));

    $c .= $this->class('text-center')
      ->p(
        'If the ' . $body . " element is called in the controller it's attributes will also be automatically added.  This can be done in a custom template with the following command:"
      );

    $bl = $this->htmlchar('<body')
      . $bladeOpen
      . $html
      . '::'
      . $this->class('text-info')->span('getBodyAttributes()')
      . $bladeClose
      . '>';

    $bl = $this->pre($bl);
    $bl = $this->code($bl);
    $bl = $this->aboutCard(
      'Blade - Body Attributes:', null, $bl
    );

    $bl = $this->class('col-4')->div($bl);

    $row = $this->class('row')->div($divCenter . $divCenter . $bl . $divCenter . $divCenter);

    $c .= $this->class('container')->div($row);

    $c .= $br;
    $c .= $this->hr();
    $c .= $br;

    $c .= $this->class('text-center')->id('settings')->h4('Settings');

    $c .= $this->class('text-center')
      ->p(
        'When settings functions are called, they are saved until an element function is called.  Because of this, settings functions can be called alone or piped and will be cleared once an element is called:'
      );

    $d = $dollar
      . $this->class('text-danger')->span('html')
      . ' = new '
      . $html
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $dollar
      . $this->class('text-danger')->span('html')
      . '->'
      . $this->class('text-info')->span('class(')
      . "'text-center'"
      . $this->class('text-info')->span(')')
      . $colon
      . PHP_EOL
      . $dollar
      . $this->class('text-danger')->span('html')
      . '->'
      . $this->class('text-info')->span('id(')
      . "'myDiv'"
      . $this->class('text-info')->span(')')
      . $colon
      . PHP_EOL
      . $dollar
      . $this->class('text-danger')->span('content')
      . ' = '
      . $dollar
      . $this->class('text-danger')->span('html')
      . '->'
      . $this->class('text-info')->span('div(')
      . "'The content of my new div!'"
      . $this->class('text-info')->span(')')
      . $colon;

    $d = $this->pre($d);
    $d = $this->code($d);
    $d = $this->aboutCard(
      'Standalone Settings:', null, $d
    );

    $p = $dollar
      . $this->class('text-danger')->span('content')
      . ' = '
      . $html
      . '::'
      . $this->class('text-info')->span('class(')
      . "'text-center'"
      . $this->class('text-info')->span(')')
      . PHP_EOL
      . ' ->'
      . $this->class('text-info')->span('id(')
      . "'myDiv'"
      . $this->class('text-info')->span(')')
      . PHP_EOL
      . ' ->'
      . $this->class('text-info')->span('div(')
      . "'The content of my new div!'"
      . $this->class('text-info')->span(')')
      . $colon;

    $p = $this->pre($p);
    $p = $this->code($p);
    $p = $this->aboutCard(
      'Piped Settings:', null, $p
    );

    $d = $this->class('col-4')->div($d);
    $p = $this->class('col-4')->div($p);

    $row = $this->class('row')->div($divSides . $d . $divCenter . $p . $divSides);

    $c .= $this->class('container')->div($row);

    $c .= $br;

    $settings = $this->a('Settings', route('splittlogic.html.settings'));
    $elements = $this->a('Elements', route('splittlogic.html.elements'));
    $globals = $this->a('Globals', route('splittlogic.html.globals'));

    $c .= $this->class('text-center')
      ->p(
        'Technically all settings/attributes can be applied to any element, but use the '
        . $settings
        . ' and ' . $elements . ' pages to verify what html will apply correctly.  The '
        . $globals . ' page has a list of attributes that most elements can use.'
      );

    $c .= $br;

    $attribute = $this->class('btn btn-outline-success')
      ->a('attribute', route('splittlogic.html.setting', 'attribute'));

    $c .= $this->class('text-center')
      ->p(
        'If there is a custom attribute needed that does not exist on the ' . $settings . ' page, it can been created by using the ' . $attribute . ' function, to set either an attribute with a value or with no value:'
      );

    $val = $dollar
      . $this->class('text-danger')->span('html')
      . ' = new '
      . $html
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $dollar
      . $this->class('text-danger')->span('html')
      . '->'
      . $this->class('text-info')->span('attribute(')
      . "['newAttribute' => 'value']"
      . $this->class('text-info')->span(')')
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $this->h6('Creates:')
      . '<... newAttribute="value" ...>';

    $val = $this->pre($val);
    $val = $this->code($val);
    $val = $this->aboutCard(
      'Attribute with value:', null, $val
    );

    $nv = $dollar
      . $this->class('text-danger')->span('html')
      . ' = new '
      . $html
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $dollar
      . $this->class('text-danger')->span('html')
      . '->'
      . $this->class('text-info')->span('attribute(')
      . "'newAttribute'"
      . $this->class('text-info')->span(')')
      . $colon
      . PHP_EOL
      . PHP_EOL
      . $this->h6('Creates:')
      . '<... newAttribute>';

    $nv = $this->pre($nv);
    $nv = $this->code($nv);
    $nv = $this->aboutCard(
      'Attribute with no value:', null, $nv
    );

    $val = $this->class('col-4')->div($val);
    $nv = $this->class('col-4')->div($nv);

    $row = $this->class('row')->div($divSides . $val . $divCenter . $nv . $divSides);

    $c .= $this->class('container')->div($row);

    $c .= $br . $br;

    return $c;

  }

}
