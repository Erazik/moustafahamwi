<?php
if ( function_exists('register_sidebars') )
    register_sidebars(3);
/* //////////////////////////////////add thumbnails///////////////////////////////////// */
add_theme_support('post-thumbnails');
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );


register_post_type('slider', array(
    'labels' => array(
        'name' => __('Slider item', 'doc'),
        'singular_name' => __('Slider', 'doc'),
        'menu_name' => __('Slider', 'doc'),
        'add_new' => __('Add New Slider Item', 'doc'),
        'add_new_item' => __('Add New Slider Item', 'doc'),
        'edit_item' => __('Edit Slider item', 'doc'),
        'new_item' => __('New Slider Item', 'doc'),
        'view_item' => __('View Slider item', 'doc'),
        'search_items' => __('Search Slider Items', 'doc'),
        'not_found' => __('No Slider item found', 'doc'),
        'not_found_in_trash' => __('No About Slider found in Trash', 'doc'),
    ),
    'public' => true,
    'rewrite' => array('slug' => 'slider', 'with_front' => true),
    'has_archive' => true,
    'show_ui' => true,
    'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
//    'menu_icon' => '/wp-content/themes/moustafa/admin/images/icons/slider.png'
));
/*
 * Pagination
 * ===================
 * */
function nums($type, $perPage){
    $count_posts = wp_count_posts($type);
    $max = ceil($count_posts->publish/$perPage);
    if(isset($_GET['page']) && intval($_GET['page']) > 1 ){
        echo '<a class="prevP" href="/?page=' . ($_GET['page'] - 1) . '">Older page</a>';
    }
    for ($i = 1; $i <= $max; $i++) {
        if(intval($_GET['page']) == $i )
            echo '<a class="current" href="/?page=' . $i . '">' . $i . '</a>';
        else
            echo '<a href="/?page=' . $i . '">' . $i . '</a>';
    }
    if(isset($_GET['page']) && intval($_GET['page']) < $max){
        echo '<a class="nextP" href="/?page=' . ($_GET['page'] + 1) . '">Next page</a>';
    }elseif(intval($_GET['page']) >= $max){

    }
    else{
        echo '<a class="nextP" href="/?page=2">Next page</a>';
    }
}
/*
 * Show Posts years and months
 * ==========================
 * */
function get_years(){
    global $wpdb;
    $yearliest_year = $wpdb->get_results(

        "SELECT YEAR(post_date) AS year
         FROM $wpdb->posts
         WHERE post_status = 'publish'
         AND post_type = 'post'
         ORDER BY post_date
         DESC LIMIT 1

    ");


    //If there are any posts
    if($yearliest_year){
        $this_year = date('Y');
        $months = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
        $current_year = $yearliest_year[0]->year;

        while($current_year > $this_year - 2){

            echo "<div class='fullDiv'><h3 class='year'><a href='/" . $current_year . "'>" . $current_year . "</a></h3>";
//                echo "<h3><a href='". $current_year ."'> " . $current_year . " </a></h3>";
            echo "<ul class='month_container'>";
            foreach($months as $month_num => $month){

                if($search_month = $wpdb->query(
                    "SELECT MONTHNAME(post_date) as month

                            FROM $wpdb->posts
                            WHERE MONTHNAME(post_date) = '$month'
                            AND YEAR(post_date) = $current_year
                            AND post_type = 'post'
                            AND post_status = 'publish'
                            LIMIT 1

                ")){
                    $countposts=get_posts("year=$current_year&monthnum=$month_num");
                    echo "<li class='month'><i class='s'>></i><a href='" . get_bloginfo('url') . "/" . $current_year . "/" . $month_num . "/'><span class='archive-month'>" . $month . "</span><span>" . count($countposts) ."</span></a></li>";
                }else{}

            }
            echo "</ul></div>";
            $current_year--;
        }
    }else{
        echo "No Posts Found.";
    }
}
/*
 * Get Instagram Photos
 * ====================
 * */
function get_instagram(){
    function getInstaID($username)
    {

        $username = strtolower($username); // sanitization
        $token = "192962714.ab103e5.9b138037d9ed42988e06160bfca32d49";
        $url = "https://api.instagram.com/v1/users/search?q=".$username."&access_token=".$token;
        $get = file_get_contents($url);
        $json = json_decode($get);

        foreach($json->data as $user)
        {
            if($user->username == $username)
            {
                return $user->id;
            }
        }

        return '00000000'; // return this if nothing is found
    }

    //    echo ;

    function fetchData($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    $result = fetchData("https://api.instagram.com/v1/users/". getInstaID('moustafahamwi') ."/media/recent/?access_token=192962714.ab103e5.9b138037d9ed42988e06160bfca32d49&count=8");
    $result = json_decode($result);
    foreach ($result->data as $post) {
        $out = '<div class="instImage">';
        $out .= '<a class="group" target="_blank" href="' . $post->link /*$post->images->standard_resolution->url*/ . '">';
        $out .= '<img src="' . $post->images->thumbnail->url . '"/>';
        $out .= '</a>';
        $out .= '</div>';
        echo $out;
    }
}
if( !is_admin()){

    wp_deregister_script('jquery');
    wp_register_script('jquery', ("http://cdn.jquerytools.org/1.1.2/jquery.tools.min.js"), false, '1.3.2');
//wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false, '1.7.2');
    wp_enqueue_script('jquery');
}
function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    echo implode(" ",array_splice($words,0,$word_limit));
}
//phpinfo();