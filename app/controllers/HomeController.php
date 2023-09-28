<?php

namespace MusicFest\Controllers;

class HomeController {

    protected $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function index() {
        // Fetch the data (e.g., from a database or some other source)
        $musicEvents = [
            ['name' => 'Artist One', 'time' => '10:00 AM - 11:00 AM', 'stage' => 'Main Stage'],
            //... other artists details
        ];

        $this->view->render($musicEvents);
    }
}
