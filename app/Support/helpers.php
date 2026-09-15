<?php

/*
|--------------------------------------------------------------------------
| Frontend image helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('frontend_image_value')) {
    /**
     * Resolve a stored image value into a safe browser URL.
     *
     * Absolute URLs (ImageBB, data URIs, ...) are returned unchanged.
     * Relative paths are passed through asset(). Empty or null values
     * fall back to a neutral inline placeholder so a broken image is
     * never shown.
     */
    function frontend_image_value(?string $value, ?string $fallback = null): string
    {
        $value = is_string($value) ? trim($value) : '';

        if ($value !== '') {
            return preg_match('#^(https?:)?//#i', $value) || str_starts_with($value, 'data:')
                ? $value
                : asset($value);
        }

        return $fallback ?: frontend_image_placeholder();
    }
}

if (! function_exists('frontend_image_url')) {
    /**
     * Resolve an image URL from config/frontend_images.php using a dot key.
     *
     * Returns null when the slot is empty so callers can fall back to an
     * initials block (seller/company logos) instead of a placeholder image.
     *
     * Example: frontend_image_url('sellers.green_feed_industries')
     */
    function frontend_image_url(string $key): ?string
    {
        $value = config('frontend_images.'.$key);
        $value = is_string($value) ? trim($value) : '';

        if ($value === '') {
            return null;
        }

        return preg_match('#^(https?:)?//#i', $value) || str_starts_with($value, 'data:')
            ? $value
            : asset($value);
    }
}

if (! function_exists('frontend_image')) {
    /**
     * Resolve an image URL from config/frontend_images.php using a dot key,
     * falling back to the neutral placeholder when the slot is empty.
     *
     * Example: frontend_image('products.premium_pangas')
     */
    function frontend_image(string $key, ?string $fallback = null): string
    {
        return frontend_image_url($key) ?? ($fallback ?: frontend_image_placeholder());
    }
}

if (! function_exists('frontend_image_placeholder')) {
    /**
     * Neutral SVG placeholder used whenever an image URL is not configured.
     */
    function frontend_image_placeholder(): string
    {
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="600" height="450" viewBox="0 0 600 450">'
            .'<rect width="600" height="450" fill="#e2e8f0"/>'
            .'<path d="M210 300l75-90 60 70 45-55 60 75H210z" fill="#cbd5e1"/>'
            .'<circle cx="245" cy="150" r="28" fill="#cbd5e1"/>'
            .'</svg>';

        return 'data:image/svg+xml;base64,'.base64_encode($svg);
    }
}

if (! function_exists('youtube_video_id')) {
    /**
     * Extract a YouTube video ID from a watch, share, embed or shorts URL.
     */
    function youtube_video_id(?string $url): ?string
    {
        $url = trim((string) $url);

        if ($url === '') {
            return null;
        }

        if (preg_match('~(?:youtu\.be/|youtube\.com/(?:watch\?v=|embed/|shorts/|v/))([A-Za-z0-9_-]{11})~i', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }
}

if (! function_exists('youtube_thumbnail')) {
    /**
     * Build a reliable YouTube thumbnail URL from any YouTube video URL.
     */
    function youtube_thumbnail(?string $url): ?string
    {
        $id = youtube_video_id($url);

        return $id ? 'https://img.youtube.com/vi/'.$id.'/hqdefault.jpg' : null;
    }
}
