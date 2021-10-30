<?php

use Illuminate\Support\Facades\Route;

use splittlogic\html\Http\Controllers\htmlController;

Route::get(
  'splittlogic/html',
  [htmlController::class, 'index']
)->name('splittlogic.html');

Route::get(
  'splittlogic/html/elements',
  [htmlController::class, 'elements']
)->name('splittlogic.html.elements');

Route::get(
  'splittlogic/html/settings',
  [htmlController::class, 'settings']
)->name('splittlogic.html.settings');

Route::get(
  'splittlogic/html/globals',
  [htmlController::class, 'globals']
)->name('splittlogic.html.globals');

Route::get(
  'splittlogic/html/element/{element}',
  [htmlController::class, 'element']
)->name('splittlogic.html.element');

Route::get(
  'splittlogic/html/settings/{setting}',
  [htmlController::class, 'setting']
)->name('splittlogic.html.setting');

Route::post(
  'splittlogic/html/search',
  [htmlController::class, 'search']
)->name('splittlogic.html.search');
