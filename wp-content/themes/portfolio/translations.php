<?php
$translations = [
    'lang' => 'en',

    // Home
    'webdev' => 'Web Developer',
    'mytools' => 'My tools',
    'myproj' => 'My projects',
    'see' => 'See',
    'amypr' => 'all my projects',
    'mylinks' => 'My links',
    'myacc' => 'If you want to see more, there are my links to my accounts:',
    'contactme' => 'Contact me',
    'contmedir' => 'Contact me directly',

    //Projects archive
    'back' => 'Back',
    'home' => 'home',
];


foreach ($translations as $slug => $string) {
    pll_register_string($slug, $string);
}