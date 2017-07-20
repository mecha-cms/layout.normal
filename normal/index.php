<?php

Asset::set($url->protocol . 'maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
Asset::set(__DIR__ . DS . 'asset' . DS . 'css' . DS . 'normal.min.css');
Asset::set(__DIR__ . DS . 'asset' . DS . 'js' . DS . 'normal.min.js');

// Manual page excerpt feature
Hook::set('page.excerpt', function($content, $lot) use($language) {
    $s = Page::open($lot['path'])->get([
        'description' => null,
        'content' => null,
        'url' => null
    ]);
    // Excerpt cropper does not exist, return the page description
    // If page description is empty, return a fake excerpt generated by the page content
    if (!$s['content'] || strpos($s['content'], '<!-- cut -->') === false) {
        return $s['description'] ?: To::snippet($s['content']);
    }
    // Return the first part!
    return trim(explode('<!-- cut -->', $s['content'])[0]) . '<p>' . HTML::a($language->article_continue, $s['url']) . '</p>';
});

// Mark site author’s comment (requires panel extension)
if (Route::is('%*%/' . Extend::state('comment', 'path', '-comment')) && Request::is('post')) {
    if (Extend::exist('panel') && User::get()) {
        Request::set('post', 'status', 1);
    }
}