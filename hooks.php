<?php

add_hook('AdminAreaFooterOutput', 1, function ($vars) {
    return <<<HTML
Sample output goes here...
HTML;
});