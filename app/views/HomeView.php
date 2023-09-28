<?php

namespace MusicFest\Views;

class HomeView {

    public function render(array $musicEvents) {
        ob_start();

        echo " home view content";

        $content = ob_get_clean();
        echo  $content;
    }
}