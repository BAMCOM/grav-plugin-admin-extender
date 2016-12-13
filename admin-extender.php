<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

/**
 * Class Plugin
 * @package Grav\Plugin
 */
class AdminExtenderPlugin extends Plugin
{
    /** 
     * @return array
     */
    public static function getSubscribedEvents() {
      return [
        'onPluginsInitialized' => ['onPluginsInitialized', 0]
      ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized() {
      if ($this->isAdmin()) {
        $this->enable([
          'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
          'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ]);
      } 
    }

  public function onTwigTemplatePaths() {

    $theme_name = $this->config->get('plugins.admin-extender.theme', 'custom-admin');
    $twig_paths = $this->grav['twig']->twig_paths;
    array_unshift($twig_paths, realpath(__DIR__ . '/../../themes/' . $theme_name . '/templates'));

    $this->grav['twig']->twig_paths = $twig_paths;

    $admin = $this->grav['admin'];
    $twig = $this->grav['twig']->twig();
    
    $this->config->set('plugins.admin.theme', $theme_name);
    $admin->theme = $theme_name;
    
  }

  public function onTwigSiteVariables() {

    $override = $this->config->get('plugins.admin-extender.override_url');
    
    
    $theme_name = $this->config->get('plugins.admin-extender.theme', 'custom-admin');
    $theme_url = '/' . ltrim($this->grav['locator']->findResource('user://themes/' . $theme_name,
            false), '/');

    if ($override) {
      $this->grav['twig']->twig_vars['theme_url'] = $theme_url;
    }
    $this->grav['twig']->twig_vars['theme_custom_url'] = $theme_url;

  }

}
