<?php

namespace App\Utility;

use App\Models\Month;

class Loader {
    public static function load() {
        if(!session('month')) {
            $month = Month::all()
                          ->sortBy('last')
                          ->first();

            if($month) {
                session(['month' => $month]);
                return true;
            }else {
                return false;
            }
        }else {
            return true;
        }
    }

    public static function reload() {
        try {
            echo 'uu';
            $month = Month::all()
                          ->sortByDesc('last')
                          ->first();

            echo $month;
            session(['month' => $month]);
        }Catch(\Exception) { null; }
    }
}

?>
