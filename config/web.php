<?php

return array(
    'urlManager' => [
        'controllerUri' => '^(\w+)?(\/\w+)?(?!\?)?(\/\d+?|\?[\w+=&]+)?$',
    ],
    'db' => include 'db.php',
);

//