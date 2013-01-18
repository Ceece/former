<?php
/**
 * Config
 *
 * Redirect calls to Config instance to Laravel's
 * original static class
 */
namespace Former\Facades\Legacy;

use \Laravel\Config as LaravelConfig;

class Config extends Redirector
{
  /**
   * The name of the class to redirect to
   * @var string
   */
  protected $class = 'Config';

  /**
   * Rerout Laravel 4's get style to Laravel 3's
   *
   * @param string $key      The key to get
   * @param string $fallback An optional fallback
   *
   * @return mixed The desired config value
   */
  public function get($key, $fallback = null)
  {
    $key = str_replace('former::', 'former::config.', $key);

    return LaravelConfig::get($key, $fallback);
  }
}