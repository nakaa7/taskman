<?php

return array(
    'urlManager' => [
        'controllerUri' => '^(\w+)?\/?(\w+)?\/?(\d*)$',
    ],
    'db' => include 'db.php',
);