<?php
 $GLOBALS['bar1'] = '0';
 $GLOBALS['bar2'] = '0';
 $GLOBALS['bar3'] = '0';

if ($_GET['page']== 'info' ) {
 $GLOBALS['bar1'] = '0';
 $GLOBALS['bar2'] = '0';
 $GLOBALS['bar3'] = '0';    
}elseif ($_GET['page']== 'ticket') {
    $GLOBALS['bar1'] = '100';
    $GLOBALS['bar2'] = '0';
    // $GLOBALS['bar3'] = '0';
}elseif ($_GET['page']== 'preview') {
    $GLOBALS['bar1'] = '100';
    $GLOBALS['bar2'] = '100';
}elseif ($_GET['page']== 'payment') {
    $GLOBALS['bar1'] = '100';
    $GLOBALS['bar2'] = '100';
    $GLOBALS['bar3'] = '100';
}elseif ($_GET['page']== 'finished') {
    $GLOBALS['bar1'] = '100';
    $GLOBALS['bar2'] = '100';
    $GLOBALS['bar3'] = '100';
}