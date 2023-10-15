<?php

namespace MusicFest\Views;

class HomeView {

    public function render(array $musicEvents) {
        ob_start();
        echo '<div class="title-box">';
        echo '<h1 class="text-center text-grey">Fictional Music Festival</h1>';
        echo '</div>';


        if (empty($musicEvents)) {
            echo '<p>No music events available.</p>';
        } else {
            // Carousel for Line-Up Highlights
            $this->renderCarousel($musicEvents);
        }

        // Newsletter Signup
        $this->renderNewsletterSignup();

        $content = ob_get_clean();

        // Try to get the content from the 'dist' directory first
        if (file_exists(__DIR__ . '/../../dist/index.htmls')) {
            $template = file_get_contents(__DIR__ . '/../../dist/index.html');
        } else {
            // Fallback to the original template if 'dist/index.html' doesn't exist
            $template = file_get_contents(__DIR__ . '/../../public/templates/default.html');
        }

        $outputWithBaseUrl = str_replace('##BASE_URL##', \MusicFest\Core\SiteSettings::get('base_url'), $template);
        $outputWithContent = str_replace('##CONTENT##', $content, $outputWithBaseUrl);
        echo $outputWithContent;
    }

    private function renderCarousel(array $musicEvents) {
        echo '<div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">';
        echo '<div class="carousel-inner">';

        $first = true;
        foreach ($musicEvents as $index => $event) {
            if ($index % 4 == 0) {
                if ($index != 0) {
                    echo '</div>';
                }
                echo $first ? '<div class="carousel-item active">' : '<div class="carousel-item">';
                $first = false;
            }

            echo '<div class="artist-detail text-center">';
            echo "<h3>{$event['name']}</h3>";
            echo "<p>Time: {$event['time']}</p>";
            echo "<p>Stage: {$event['stage']}</p>";
            echo '</div>';

            if ($index == count($musicEvents) - 1) {
                echo '</div>';
            }
        }

        echo '</div>';

        $indicatorCount = ceil(count($musicEvents) / 4);
        echo '<ol class="carousel-indicators custom-carousel-indicators">';
        for ($i = 0; $i < $indicatorCount; $i++) {
            echo $i == 0 ? '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="active"></li>' : '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
        }
        echo '</ol>';

        echo '</div>';
    }
    private function renderNewsletterSignup() {
        // todo, integrate a dynamic approach from db.
        echo '<section id="newsletter" class="mt-4 section-block">';
        echo '<h2>Stay Updated!</h2>';
        echo '<p>Subscribe to our newsletter for the latest updates and news.</p>';
        echo '<form action="#" method="post">';
        echo '<input type="email" placeholder="Your email address" required>';
        echo '<button type="submit" class="btn btn-dark">Subscribe</button>';
        echo '</form>';
        echo '</section>';
    }
}