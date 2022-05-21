<?php
/*
*@package Interactive Menu
*/

class interactiveMenuActivate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}