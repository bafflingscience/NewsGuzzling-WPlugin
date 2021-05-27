<?php
/**
 * @package Newzzler
 */
namespace Things\Pages;

use Things\Api\SettingsApi;
use Things\Base\BaseController;
use Things\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        
        $this->setPages();
        $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Newzzler',
                'menu_title' => 'Newzzler',
                'capability' => 'manage_options',
                'menu_slug'  => 'newzzler',
                'callback'   => array($this->callbacks, 'adminDashboard'),
                'icon_url'   => 'dashicons-media-content',
                'position'   => 16
            )
        );
    }
    
    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'newzzler',
                'page_title'  => 'Custom Post Types',
                'menu_title'  => 'CPT',
                'capability'  => 'manage_options',
                'menu_slug'   => 'newzzler_cpt',
                'callback'    => array($this->callbacks, 'adminCpt')
            ),
            array(
                'parent_slug' => 'newzzler',
                'page_title'  => 'Custom Taxonomies',
                'menu_title'  => 'Taxonomies',
                'capability'  => 'manage_options',
                'menu_slug'   => 'newzzler_taxonomies',
                'callback'    => array($this->callbacks, 'adminTaxonomy')
            ),
            array(
                'parent_slug' => 'newzzler',
                'page_title'  => 'Custom Widgets',
                'menu_title'  => 'Widgets',
                'capability'  => 'manage_options',
                'menu_slug'   => 'newzzler_widgets',
                'callback'    => array($this->callbacks, 'adminWidget')
            )
        );
    }

    public function setSettings()
    {
        $args = array(
                array(
                    'option_group' => 'newzzler_options_group',
                    'option_name'  => 'text_example',
                    'callback'     => array($this->callbacks, 'newzzlerOptionsGroup')
                ),
                array(
                    'option_group' => 'newzzler_options_group',
                    'option_name'  => 'first_name'             
                )
            );

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
                array(
                    'id'       => 'newzzler_admin_index',
                    'title'    => 'Settings',
                    'callback' => array( $this->callbacks, 'newzzlerAdminSection'),
                    'page'     => 'newzzler'
                )
            );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array(
                array(
                    'id'       => 'text_example',
                    'title'    => 'Test Example',
                    'callback' => array($this->callbacks, 'newzzlerTextExample'),
                    'page'     => 'newzzler',
                    'section'  => 'newzzler_admin_index',
                    'args'     => array(
                        'label_for' => 'text_example',
                        'class'     => 'example-class'
                    )
                ),
                array(
                    'id'       => 'first_name',
                    'title'    => 'First Name',
                    'callback' => array($this->callbacks, 'newzzlerFirstName'),
                    'page'     => 'newzzler',
                    'section'  => 'newzzler_admin_index',
                    'args'     => array(
                        'label_for' => 'first_name',
                        'class'     => 'example-class'
                    )
            )
        );
        
        $this->settings->setFields( $args );
    }
}