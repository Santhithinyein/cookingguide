<?php
     // show stars according to ratings
     for($i=1;$i<=$calculated_points;$i++) {
        echo '<img src="../../icons/favourite.png">';                                    
    }

    // show left stars
    if($calculated_points !== 0) {
        $loop = 5 - $calculated_points;
        for($j=1;$j<=$loop;$j++) {
            echo '<img src="../../icons/star.png">';
        }
    } else {
        // if rating is zero
        for($k=1;$k<=5;$k++) {
            echo '<img src="../../icons/star.png">';
        }
    }
?>