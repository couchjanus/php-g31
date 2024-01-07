<?php

$messages = [
    [
        'name' => 'Tom',
        'surname' => 'Cat',
        'email' => 'tom@my.cat',
        'message' => 'Please feel free to write an email to us or to use our electronic ticketing system.',
        'created_at' => "August 22, 2023"
    ],
    [
        'name' => 'Sara',
        'surname' => 'Boo',
        'email' => 'sara@my.cat',
        'message' => 'Please feel free to write an email to us or to use our electronic ticketing system.',
        'created_at' => "August 19, 2023"
    ],
];

if ($_POST) {
    // var_dump($_POST);

    $arr = [
        [
            'name' => htmlspecialchars($_POST['name']),
            'surname' =>  htmlspecialchars($_POST['surname']),
            'email' =>  htmlspecialchars($_POST['email']),
            'message' => htmlspecialchars($_POST['message']),
            'created_at' => date("F j, Y")
        ]
        ];

        $messages = array_merge($messages, $arr);

}
render('contact/index', ['messages' => $messages]);