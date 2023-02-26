<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'             => "HauptseiteController@call_hauptseite",

    '/hauptseite_Emensa' => 'HauptseiteController@call_hauptseite',
    '/anmeldung' => 'HauptseiteController@call_anmeldung',
    '/anmeldung_verifizieren' => 'HauptseiteController@call_verify',
    '/abmeldung' => 'HauptseiteController@call_abmelden',
    '/bewertung' => 'HauptseiteController@call_bewertung',
    '/bewertung_verifizieren' => 'HauptseiteController@call_verifyBewertung',
    '/bewertung_to_highlight' => 'HauptseiteController@call_highlight',
    '/bewertung_to_unhighlight' => 'HauptseiteController@call_unhighlight',
    '/meinebewertungen' => 'HauptseiteController@alleBewertungen',
    '/bewertung_to_delete' => 'HauptseiteController@deleteBewertungen',
    '/subscribe' => 'HauptseiteController@call_subscribe',
    '/check_member' => 'HauptseiteController@call_check_membership',
    '/signup' => 'HauptseiteController@call_signup',
    '/call_verify_signup' => 'HauptseiteController@call_verify_signup',
);