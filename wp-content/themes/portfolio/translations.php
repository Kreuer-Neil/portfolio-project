<?php
$translations = [
    'lang' => 'en',

    'urlproj' => 'projects',

    'langnav' => 'Language selector',
    'footnav' => 'Footer navigation',

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

    //Single projects
    'toprjs' => 'to the projects',
    'noprj' => 'It seems this project does not exist',
    'tryotherprj' => 'Please try another project, or stop playing with the URL!',
];


foreach ($translations as $slug => $string) {
    pll_register_string($slug, $string);
}