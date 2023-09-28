<?php

namespace MusicFest\Views;

class HomeView {

    public function render(array $musicEvents) {
        ob_start();
        echo '<h1 class="text-center text-grey">Fictional Music Festival</h1>';

        if (empty($musicEvents)) {
            echo '<p>No music events available.</p>';
        } else {
            // Begin Carousel
            echo '<div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">';
            echo '<div class="carousel-inner">';

            $first = true;

            foreach ($musicEvents as $index => $event) {
                // Every third event, or if it's the very first event, start a new carousel-item
                if ($index % 3 == 0) {
                    if ($index != 0) { // if it's not the very first, close the previous carousel-item
                        echo '</div>';
                    }
                    echo $first ? '<div class="carousel-item active">' : '<div class="carousel-item">';
                    $first = false; // Only the first item should be "active"
                }

                // Display the artist detail
                echo '<div class="artist-detail text-center" style="color: #273f44;">';
                echo "<h3>{$event['name']}</h3>";
                echo "<p>Time: {$event['time']}</p>";
                echo "<p>Stage: {$event['stage']}</p>";
                echo '</div>';

                // If we've just processed the last event, close the carousel-item
                if ($index == count($musicEvents) - 1) {
                    echo '</div>';
                }
            }

            echo '</div>'; // End of carousel-inner

            // Carousel Indicators
            $indicatorCount = ceil(count($musicEvents) / 3);
            echo '<ol class="carousel-indicators custom-carousel-indicators">';
            for ($i = 0; $i < $indicatorCount; $i++) {
                echo $i == 0 ? '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>' : '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
            }
            echo '</ol>';

            echo '</div>'; // End of Carousel
        }

        $content = ob_get_clean();

        $template = file_get_contents(__DIR__ . '/../../public/templates/default.html');
        $outputWithBaseUrl = str_replace('<!--BASE_URL-->', \MusicFest\Core\SiteSettings::get('base_url'), $template);
        $outputWithContent = str_replace('<!-- CONTENT -->', $content, $outputWithBaseUrl);
        echo $outputWithContent;
    }
}