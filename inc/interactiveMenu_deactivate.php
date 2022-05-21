<?php
/*
*@package Interactive Menu
*/

class interactiveMenuDeactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}