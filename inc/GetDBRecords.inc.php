<?php
    // get detail(specific) record 
    function get_detail_record($table_name,$id) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM $table_name WHERE id = $id");
        return $result;  
    }

    // get latest record
    function get_latest_record($table_name) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM $table_name ORDER BY created_at DESC LIMIT 1");
        return $result;              
    }

    // checking characters limit 
    function words_limit($words) {
        if (strlen($words) > 130) {
            $sub_words = substr("$words",0,130);
            $sub_words = $sub_words."..........";
            return $sub_words;
        }
        else {
            return $words;
        }
    } 

    function words_limit_2($words) {
        if (strlen($words) > 30) {
            $sub_words = substr("$words",0,30);
            $sub_words = $sub_words."..........";
            return $sub_words;
        }
        else {
            return $words;
        }
    } 

    // get all records
    function get_all_records($table_name,$limit,$start) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM $table_name ORDER BY created_at DESC LIMIT $start,$limit");
        return $result;
    }

    // get all records by type 
    function get_all_records_by_type($table_name,$type,$limit,$start) {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM $table_name WHERE type = '$type' ORDER BY created_at DESC LIMIT $start,$limit");
        return $result;
    }

    // get latest 4 records
    function get_4_records($main_category) {
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM sub_categories WHERE main_category = '$main_category' ORDER BY created_at DESC");
        return $result;
    }

    // get total count
    function total_count($table_name) {
        global $conn;
        $result = mysqli_query($conn,"SELECT COUNT(*) FROM $table_name");
        return $result;
    }

    // get total count by type
    function total_count_by_type($table_name,$type) {
        global $conn;
        $result = mysqli_query($conn,"SELECT COUNT(*) FROM $table_name WHERE type = '$type'");
        return $result;
    }

    // get comments
    function get_comments($category,$id) {
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM comments WHERE category = '$category' AND respective_id = '$id' ORDER BY created_at DESC");
        return $result;
    }

    // get total points
    function get_total_points($category,$id) {
        $total = 0;
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM ratings WHERE category = '$category' AND respective_id = '$id' ORDER BY created_at DESC");

        // count total points
        while($row=mysqli_fetch_assoc($result)) {
            $total = $row['points']+$total;
        }

        return $total; // return total points;
    }

    // don't repeat mail
    function do_not_repeat_mail($email,$category,$page,$id) {
        global $conn;

        $match = 0; // original value

        $result = mysqli_query($conn,"SELECT * FROM ratings WHERE email = '$email'");

        // search through loop
        while($row=mysqli_fetch_assoc($result)) {
            $db_category = $row['category'];
            $db_id = $row['respective_id'];

            if($id == $db_id && $category == $db_category) { // if match redirect back
               $match = 1; // if same email found modify value
            }
        }

        return $match;
    }

    // get search results
    function get_search_results($table_name,$key_words) {
        global $conn;
		$result = mysqli_query($conn,"SELECT * FROM $table_name WHERE name_eng LIKE '%$key_words%' OR ingredients_eng LIKE '%$key_words%' OR about_eng LIKE '%$key_words%'");
		return $result;
    }

    // get sub category receipes
    function get_sub_categories_receipes($table_name,$sub_cat_id) {
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM $table_name WHERE sub_category = '$sub_cat_id' ORDER BY created_at DESC");
        return $result;
    }

    // get sub category info
    function get_sub_category_info($id) {
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM sub_categories WHERE id = '$id'");
        return $result;
    }

    // calculate ratings
    function calculate_ratings($id,$category) {
        $total = 0;
        $total_points = 0;
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM ratings WHERE category = '$category' AND respective_id = '$id' ORDER BY created_at DESC");

        // count total points
        while($row=mysqli_fetch_assoc($result)) {
            $total_points = $total_points + $row['points'];
            $total = $total + 1; // count total
        }

        if($total > 0) {
            $calculated_points = $total_points / $total; // calculate ratings
            $calculated_points = intval($calculated_points);
            return $calculated_points;
        }
        else {
            return $total;
        }
    }

    // get feedbacks
    function get_ratings_for_feedbacks($email,$category,$respective_id) {
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM ratings WHERE email = '$email' AND category = '$category' AND respective_id = '$respective_id' ORDER BY created_at DESC");
        
        while($row = mysqli_fetch_assoc($result)):
            return $row['points'];
        endwhile;
    }
?>