<?php namespace Application\Controllers;

use System\Core\View;
use System\Core\Helpers;
use System\Core\Url;

/**
 * Class Dashboard
 * @package Application\Controllers
 */
class Dashboard extends Internal
{
    /**
     * Index constructor
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->userinfo->is_editor != 1) Url::redirect('user');
    }

    /**
     * Dashboard page for all users
     */
    public function action_index()
    {
        $data['userinfo'] = $this->userinfo;
        $data['styles_vendor'] = $this->styles_vendor;
        $data['scripts_vendor'] = $this->scripts_vendor;
        $data['scripts_vendor'][] = 'bootstrap-validator/dist/validator.min.js';
        $data['styles'] = $this->styles;
        $data['scripts'] = $this->scripts;
        $data['lng'] = $this->language;

        // Receive all settings from database
        $data['sites'] = $this->_sites->getAll();

        View::render('header', $data);
        View::render('dashboard', $data);
        View::render('footer', $data);
    }

}
