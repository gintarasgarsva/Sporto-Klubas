<?php

namespace App\Views;

use App\App;

class Navigation extends \Core\View {

    public function __construct($data = []) {
        parent::__construct($data);

        $this->addLink('left', '/index.php', 'Turbo Gym Home');
        
        if (App::$session->userLoggedIn()) {
            $user = App::$session->getUser();
            $label = $user->getEmail();
            $this->addLink('left', '/feedback.php', "Leave Comment");
            $this->addLink('right', '/logout.php', "Logout($label)");
        } else {
            $this->addLink('right', '/login.php', 'Login');
            $this->addLink('right', '/register.php', 'Register');            
        }
    }

    public function addLink($section, $url, $title) {
        $link = ['url' => $url, 'title' => $title];
        
        if ($_SERVER['REQUEST_URI'] == $link['url']) {
            $link['active'] = true;
        }
        
        $this->data[$section][] = $link;
    }

    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php') {
        return parent::render($template_path);
    }

}
