<?php

namespace splittlogic\html\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use splittlogic\html\html;

class htmlController extends Controller
{


  public function index ()
  {

    $x = new html;

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutIntro();

    return view('html::about',['content' => $content]);

  }


  public function elements()
  {

    //html::make()->eol();

    $x = new html;

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutElementsTable();

    return view('html::about',['content' => $content]);

  }


  public function element($element)
  {

    //html::make()->eol();

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutElement($element);

    return view('html::about',['content' => $content]);

  }


  public function setting($setting)
  {

    //html::make()->eol();

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutSetting($setting);

    return view('html::about',['content' => $content]);

  }


  public function settings()
  {

    //html::make()->eol();

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutSettingsTable();

    return view('html::about',['content' => $content]);

  }


  public function globals()
  {

    //html::make()->eol();

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutGlobalsTable();

    return view('html::about',['content' => $content]);

  }


  public function search(Request $request)
  {

    //html::make()->eol();

    html::make()
      ->charset('utf-8')
      ->meta();

    html::make()
      ->name('viewport')
      ->acontent('width=device-width, initial-scale=1')
      ->meta();

    html::make()
      ->aboutCSS();

    html::make()
      ->aboutJS();

    html::make()
      ->class('d-flex flex-column h-100')
      ->body();

    $content = html::make()->aboutSearchResults($request->search);

    return view('html::about',['content' => $content]);

  }


}
