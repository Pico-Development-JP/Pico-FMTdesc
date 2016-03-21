<?php
/**
 * Pico FMTDesc Plugin
 * Descriptionにごく簡易的な書式設定を可能にする
 *
 * @author TakamiChie
 * @link http://onpu-tamago.net/
 * @license http://opensource.org/licenses/MIT
 * @version 1.0
 */
class Pico_FMTDesc extends AbstractPicoPlugin{

  protected $enabled = false;

  public function onSinglePageLoaded(array &$pageData)
  {
    $d = $pageData['meta']['description'];
    $d = preg_replace('/^(.*)$/m', '<p>\1</p>', $d);
    $d = preg_replace('/\[(.*?)]\((.*?)\)/', '<a href="\2">\1</a>', $d);
    $d = preg_replace('/\*\*(.+?)\*\*/', '<em>\1</em>', $d);
    $d = preg_replace('/!!(.+?)!!/', '<strong>\1</strong>', $d);
    $d = preg_replace('/""(.+?)""/', '<q>\1</q>', $d);
    $d = preg_replace('/\|\|(.+?)\|\|/', '<samp>\1</samp>', $d);
    $pageData['meta']['description'] = $d;
  }
}

?>