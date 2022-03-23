<?php

class ClassDateTime{
    public function format($datetime, $status_ago=false, $full = false){
        global $lang;
        if( $datetime == null OR $datetime == '0000-00-00 00:00:00'){return;}
        $now	= new DateTime;
        $ago	= new DateTime($datetime);
        $diff	= $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        
        $string = array(
            'y' => $lang['year'],
            'm' => $lang['Month'],
            'w' => $lang['week'],
            'd' => $lang['day'],
            'h' => $lang['hour'],
            'i' => $lang['minute'],
            's' => $lang['second'],
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' ' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        if($status_ago == true){
            return implode(', ', $string);
        }
        return $string ? $lang['now'] .' '. implode(', ', $string) : $lang['ago'];
    }
}