<?php

// Widget state
Lot::set('widget', new State(require __DIR__ . DS . 'state' . DS . 'widget.php'));

// Automatic paragraph tag(s) for description data
Hook::set('page.description', function($description) {
    if ($description && strpos($description, '</p>') === false) {
        return '<p>' . str_replace(["\n\n", "\n"], ['</p><p>', '<br>'], trim(n($description))) . '</p>';
    }
    return $description;
});

// Load asset(s)
Asset::set($url->protocol . 'maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', 20);
Asset::set('css/normal.min.css', 20);
Asset::set('js/normal.min.js', 20);