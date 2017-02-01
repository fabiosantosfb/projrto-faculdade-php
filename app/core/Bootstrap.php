<?php
function view($path) {
  return require_once('app/view/{$path}.php');
}
