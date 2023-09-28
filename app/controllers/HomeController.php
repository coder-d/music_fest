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
            ['name' => 'Artist Two', 'time' => '12:00 PM - 13:00 PM', 'stage' => 'Second Stage'],
            ['name' => 'Artist Three', 'time' => '2:00 PM - 3:00 PM', 'stage' => 'Main Stage'],
            ['name' => 'Artist Four', 'time' => '5:00 PM - 6:00 PM', 'stage' => 'Second Stage'],
            ['name' => 'Artist Five', 'time' => '21:00 PM - 22:00 PM', 'stage' => 'Third Stage'],
            ['name' => 'Artist Six', 'time' => '22:00 PM - 23:00 PM', 'stage' => 'Main Stage'],
            ['name' => 'Artist Seven', 'time' => '21:00 PM - 22:00 PM', 'stage' => 'Outer Stage'],
            ['name' => 'Artist Eight', 'time' => '22:00 PM - 23:00 PM', 'stage' => 'Outer Stage'],
        ];

        $this->view->render($musicEvents);
    }
}
