<?php

namespace MusicFest\Core;

class SiteSettings
{
    private static $settings = [
        'base_url' => 'http://php70.apache.localhost/music_fest/'
        // ... add more settings as needed here
    ];

    /**
     * Fetch a specific setting value.
     *
     * @param string $key The key of the setting.
     * @param mixed $default Default value if the key isn't set.
     * @return mixed The setting value.
     */
    public static function get($key, $default = null)
    {
        return self::$settings[$key] ?? $default;
    }
}
