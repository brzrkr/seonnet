<?php
namespace Seonnet;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Route extends \Elegant
{

  /**
   * The Seonnet table
   *
   * @var string
   */
  protected $table = 'seonnet';

  ////////////////////////////////////////////////////////////////////
  ////////////////////////////// ATTRIBUTES //////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get the Route's slug
   *
   * @param string $slug
   *
   * @return string
   */
  public function getSlugAttribute()
  {
    $slug = $this->url ?: $this->title;

    return Str::slug($slug);
  }

  /**
   * Get the Route's pattern
   *
   * @param string $pattern
   *
   * @return string
   */
  public function getPatternAttribute($pattern)
  {
    return '#'.$pattern.'#';
  }

  /**
   * Get the Route's pattern
   *
   * @param string $pattern
   *
   * @return string
   */
  public function setPatternAttribute($pattern)
  {
    return trim($pattern, '#');
  }

  /**
   * Get the meta tags as HTML tags
   *
   * @return string
   */
  public function getMetaTagsAttribute()
  {
    $meta = [
      'description' => $this->description,
      'keywords' => $this->keywords
    ];

    // Format tags
    foreach ($meta as $name => &$tag) {
      $tag = '<meta name="' .$name. '" content="' .$tag. '">';
    }

    return implode($meta);
  }

}
