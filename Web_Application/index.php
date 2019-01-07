<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php
$get_user_username = $current_user_details["user_username"];
$single_user_details_ar = $user_object->get_row_using_id($get_user_username);
$count_value = count($single_user_details_ar);

$number_of_users = count($user_object->get_all_row());
$number_of_lessons = count($lesson_object->get_all_row());
$number_of_challenges = count($task_object->get_all_row());
$number_of_submissions = count($user_task_object->get_all_row());
$number_of_categories = count($lesson_category_object->get_all_row());
$number_of_chats = count($chat_object->get_all_row());

$countries_ar = array(
    "AF" => "Afghanistan",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "BQ" => "British Antarctic Territory",
    "IO" => "British Indian Ocean Territory",
    "VG" => "British Virgin Islands",
    "BN" => "Brunei",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CT" => "Canton and Enderbury Islands",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos [Keeling] Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo - Brazzaville",
    "CD" => "Congo - Kinshasa",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "CI" => "Côte d’Ivoire",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "NQ" => "Dronning Maud Land",
    "DD" => "East Germany",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "FQ" => "French Southern and Antarctic Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-Bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and McDonald Islands",
    "HN" => "Honduras",
    "HK" => "Hong Kong SAR China",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JT" => "Johnston Island",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Laos",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macau SAR China",
    "MK" => "Macedonia",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "FX" => "Metropolitan France",
    "MX" => "Mexico",
    "FM" => "Micronesia",
    "MI" => "Midway Islands",
    "MD" => "Moldova",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar [Burma]",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NT" => "Neutral Zone",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "KP" => "North Korea",
    "VD" => "North Vietnam",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PC" => "Pacific Islands Trust Territory",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territories",
    "PA" => "Panama",
    "PZ" => "Panama Canal Zone",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "YD" => "People's Democratic Republic of Yemen",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn Islands",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RO" => "Romania",
    "RU" => "Russia",
    "RW" => "Rwanda",
    "RE" => "Réunion",
    "BL" => "Saint Barthélemy",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "MF" => "Saint Martin",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and the Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "CS" => "Serbia and Montenegro",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and the South Sandwich Islands",
    "KR" => "South Korea",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syria",
    "ST" => "São Tomé and Príncipe",
    "TW" => "Taiwan",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania",
    "TH" => "Thailand",
    "TL" => "Timor-Leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UM" => "U.S. Minor Outlying Islands",
    "PU" => "U.S. Miscellaneous Pacific Islands",
    "VI" => "U.S. Virgin Islands",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "SU" => "Union of Soviet Socialist Republics",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "ZZ" => "Unknown or Invalid Region",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VA" => "Vatican City",
    "VE" => "Venezuela",
    "VN" => "Vietnam",
    "WK" => "Wake Island",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe",
    "AX" => "Åland Islands",
);

$data_found = 1;
/* Checking if anything found */
if ($count_value == 0) {
    $data_found = 0;
} else {
    $single_user_details = $single_user_details_ar[0];
    $single_user_username = $single_user_details["user_username"];
    $single_user_email = $single_user_details["user_email"];
    $single_user_phone = $single_user_details["user_phone"];
    $single_user_fullname = $single_user_details["user_fullname"];
    $single_user_city = $single_user_details["user_city"];
    $single_user_country = $single_user_details["user_country"];
    $single_user_occupation = $single_user_details["user_occupation"];
    $single_user_institute = $single_user_details["user_institute"];
    $single_user_website = $single_user_details["user_website"];
    $single_user_github = $single_user_details["user_github"];
    $single_user_bio = $single_user_details["user_bio"];
    $single_user_photo = $single_user_details["user_photo"];
    if ($single_user_photo == '' || $single_user_photo == NULL) {
        $single_user_photo = 'images/user.png';
    }
    $single_user_role = $single_user_details["user_role"];
}
?>
<?php $page_title = 'Profile'; ?>
<?php $category_option = $lesson_category_object->get_all_row(); ?>
<?php $all_task_len = count($task_object->get_all_row()); ?>
<?php //$category_option = $lesson_category_object->get_all_row();                      ?>

<?php
// data is found
if ($data_found == 1) {
    ?>

    <?php
    $page_title = $single_user_username;
    $total_task = 0;
    $total_solve = 0;
    $username = $single_user_username;
    ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>



            <div class="row top_tiles">
                <div class="animated flipInX col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="no_text_decoration" href="lessons.php">

                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-book blue"></i>
                            </div>
                            <div class="count"><?php echo $number_of_lessons; ?></div>

                            <h3>Lessons</h3>
                            <!--<p>Lorem ipsum psdea itgum rixt.</p>-->
                        </div>

                    </a>                            
                </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="no_text_decoration" href="challenges.php">

                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-desktop green"></i>
                            </div>
                            <div class="count"><?php echo $number_of_challenges; ?></div>

                            <h3>Challenges</h3>
                            <!--<p>Lorem ipsum psdea itgum rixt.</p>-->
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="no_text_decoration" href="">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-bars blue"></i>
                            </div>
                            <div class="count"><?php echo $number_of_categories; ?></div>

                            <h3>Categories</h3>
                            <!--<p>Lorem ipsum psdea itgum rixt.</p>-->
                        </div>
                    </a>
                </div>
            </div>            

            <div class="row top_tiles">

                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="no_text_decoration" href="ranklist.php">

                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users green"></i>
                            </div>
                            <div class="count"><?php echo $number_of_users; ?></div>

                            <h3>Coders</h3>
                            <!--<p>Lorem ipsum psdea itgum rixt.</p>-->
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="no_text_decoration" href="">

                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-send-o blue"></i>
                            </div>
                            <div class="count"><?php echo $number_of_submissions; ?></div>

                            <h3>Submissions</h3>
                            <!--<p>Lorem ipsum psdea itgum rixt.</p>-->
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a class="no_text_decoration" href="chat.php">

                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-comments green"></i>
                            </div>
                            <div class="count"><?php echo $number_of_chats; ?></div>

                            <h3>Talks</h3>
                            <!--<p>Lorem ipsum psdea itgum rixt.</p>-->
                        </div>
                    </a>
                </div>

            </div>            



            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Toggle Profile Widget">
                            <div class="x_title">
                                <h2><strong><?php echo $page_title; ?></strong></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <div class="x_content animated slideInRight">

                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                                <div class="profile_img">

                                    <!-- end of image cropping -->
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <div class="avatar-view" title="<?php echo $single_user_username; ?>">
                                            <img src="<?php echo $single_user_photo; ?>" alt="<?php echo $single_user_username; ?>">
                                        </div>

                                    </div>
                                    <?php
                                    if ($single_user_fullname != '' && $single_user_fullname != NULL) {
                                        ?>
                                        <h3><?php echo $single_user_fullname; ?></h3>
                                        <?php
                                    }
                                    ?>


                                    <table class="table table-striped table-responsive">
                                        <tbody>
                                            <?php
                                            if ($single_user_city != '' && $single_user_city != NULL) {
                                                ?>
                                                <tr>
                                                    <td><i class="fa fa-map-marker user-profile-icon"></i> </td>
                                                    <td><?php echo $single_user_city; ?></td>                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>                                                
                                            <?php
                                            if ($single_user_country != '' && $single_user_country != NULL) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $selected_val = '';
                                                        $single_user_country_full='';
                                                        foreach ($countries_ar as $key => $value) {
                                                            if ($key == $single_user_country) {
                                                                $selected_val = strtolower($key);
                                                                $single_user_country_full=$value;
                                                                echo '<img src="css/flags/blank.gif" class="flag flag-' . $selected_val . '" />';
                                                                break;
                                                            }
                                                        }
                                                        ?>                                                                                                                
                                                    </td>
                                                    <td><?php echo $single_user_country_full; ?></td>                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>                                                
                                            <?php
                                            if ($single_user_occupation != '' && $single_user_occupation != NULL) {
                                                ?>
                                                <tr>
                                                    <td><i class="fa fa-briefcase user-profile-icon"></i> </td>
                                                    <td><?php echo $single_user_occupation; ?></td>                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>                                                
                                            <?php
                                            if ($single_user_website != '' && $single_user_website != NULL) {
                                                ?>
                                                <tr>
                                                    <td><i class="fa fa-external-link user-profile-icon"></i> </td>
                                                    <td><a href="<?php echo $single_user_website; ?>" target="_blank"><?php echo $single_user_website; ?></a></td>                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>                                                
                                            <?php
                                            if ($single_user_github != '' && $single_user_github != NULL) {
                                                ?>
                                                <tr>
                                                    <td><i class="fa fa-github user-profile-icon"></i> </td>
                                                    <td><a href="https://github.com/<?php echo $single_user_github; ?>" target="_blank"><?php echo $single_user_github; ?></a></td>                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                            <?php
                                            if ($single_user_institute != '' && $single_user_institute != NULL) {
                                                ?>
                                                <tr>
                                                    <td><i class="fa fa-institution user-profile-icon"></i> </td>
                                                    <td><?php echo $single_user_institute; ?></td>                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>        


                                        </tbody>
                                    </table>
                                    <?php
                                    if ($single_user_username === $current_user_details["user_username"]) {
                                        ?>
                                        <a href="edit_profile.php" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                        &nbsp;
                                        <a href="change_password.php" class="btn btn-warning"><i class="fa fa-lock m-right-xs"></i> Change Password</a>                                        
                                        
                                        <?php
                                    }
                                    ?>  
                                    <br />



                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">





                                <div class="profile_title">
                                    <h3 class="title_left">Performance</h3>
                                    <div class="col-md-6">
                                        <div id="echart_guage" style="height:320px;"></div>
                                        <div id="res_summery">
                                        </div>
                                    </div>

                                </div>
                                <!--                             start of user-activity-graph -->
                                <!--                            <div id="graph_bar" style="width:100%; height:280px;"></div>-->
                                <!--                             end of user-activity-graph -->

                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Progress</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Bio</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane active fade in" id="tab_content2" aria-labelledby="profile-tab">

                                            <!-- start user projects -->
                                            <table class="data table table-striped no-margin table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Category</th>
                                                        <th class="hidden-phone">Challenges</th>
                                                        <th class="hidden-phone">Solved</th>
                                                        <th>Completeness</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($category_option as $key => $val) {
                                                        $single_option = $category_option[$key]["lesson_category_title"];
                                                        $single_option_first_word = explode(" ", $category_option[$key]["lesson_category_title"])[0];
                                                        $single_option_first_word_link = '<a data-toggle="tooltip" data-placement="top" title="Click to view challenges in ' . $single_option . ' category" class="btn btn-dark" href="challenges.php#tab_' . $single_option_first_word . '">' . $single_option . '</a>';
                                                        ?>
                                                        <?php
                                                        $all_task = $task_object->get_row_using_single_attribute($single_option);
                                                        $all_task_len = count($all_task);
                                                        $all_task_solved_len = count($user_task_object->get_number_of_accepted_solution_in_a_category_of_user($single_user_username, $single_option));
                                                        $completeness = ($all_task_solved_len / $all_task_len) * 100;
                                                        $total_task+=$all_task_len;
                                                        $total_solve+=$all_task_solved_len;
                                                        ?>                                                
                                                        <tr>
                                                            <td><?php echo $single_option_first_word_link; ?></td>
                                                            <td class="hidden-phone"><?php echo $all_task_len; ?></td>
                                                            <td class="hidden-phone"><?php echo $all_task_solved_len; ?></td>
                                                            <td class="vertical-align-mid">
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-success" data-transitiongoal="<?php echo $completeness; ?>"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>                                                



                                                </tbody>
                                            </table>
                                            <!-- end user projects -->

                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                            <p>
                                                <?php
                                                echo $single_user_bio . '<br>';
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>                     




                        </div> <!-- ./x-content -->
                    </div> <!-- ./x-panel -->
                </div> <!-- ./col-md12 --> 
            </div> <!-- ./row -->
        </div> <!-- ./div -->
        <?php require './module/footer.php'; ?>

        <script>
            $(document).ready(function () {
                var myChart = echarts.init(document.getElementById('echart_guage'), theme);
                myChart.setOption({
                    tooltip: {
                        formatter: "{a} <br/>{b} : {c}%"
                    },
                    toolbox: {
                        show: false,
                        feature: {
                            restore: {
                                show: true
                            },
                            saveAsImage: {
                                show: true
                            }
                        }
                    },
                    series: [
                        {
                            name: '<?php echo $username; ?> Performance',
                            type: 'gauge',
                            center: ['50%', '50%'], // 默认全局居中
                            radius: [0, '75%'],
                            startAngle: 140,
                            endAngle: -140,
                            min: 0, // 最小值
                            max: 100, // 最大值
                            precision: 0, // 小数精度，默认为0，无小数点
                            splitNumber: 10, // 分割段数，默认为5
                            axisLine: {// 坐标轴线
                                show: true, // 默认显示，属性show控制显示与否
                                lineStyle: {// 属性lineStyle控制线条样式
                                    color: [[0.2, 'lightgreen'], [0.4, 'skyblue'], [0.8, 'orange'], [1, '#ff4500']],
                                    width: 30
                                }
                            },
                            axisTick: {// 坐标轴小标记
                                show: true, // 属性show控制显示与否，默认不显示
                                splitNumber: 5, // 每份split细分多少段
                                length: 8, // 属性length控制线长
                                lineStyle: {// 属性lineStyle控制线条样式
                                    color: '#eee',
                                    width: 1,
                                    type: 'solid'
                                }
                            },
                            axisLabel: {// 坐标轴文本标签，详见axis.axisLabel
                                show: true,
                                formatter: function (v) {
                                    switch (v + '') {
                                        case '10':
                                            //                                        return '弱';
                                            return 'Green';
                                        case '30':
                                            //                                        return '低';
                                            return 'Blue';
                                        case '60':
                                            //                                        return '中';
                                            return 'Yellow';
                                        case '90':
                                            //                                        return '高';
                                            return 'Red';
                                        default:
                                            return '';
                                    }
                                },
                                textStyle: {// 其余属性默认使用全局文本样式，详见TEXTSTYLE
                                    color: '#333'
                                }
                            },
                            splitLine: {// 分隔线
                                show: true, // 默认显示，属性show控制显示与否
                                length: 30, // 属性length控制线长
                                lineStyle: {// 属性lineStyle（详见lineStyle）控制线条样式
                                    color: '#eee',
                                    width: 2,
                                    type: 'solid'
                                }
                            },
                            pointer: {
                                length: '80%',
                                width: 8,
                                color: 'auto'
                            },
                            title: {
                                show: true,
                                offsetCenter: ['-65%', -10], // x, y，单位px
                                textStyle: {// 其余属性默认使用全局文本样式，详见TEXTSTYLE
                                    color: '#333',
                                    fontSize: 15
                                }
                            },
                            detail: {
                                show: true,
                                backgroundColor: 'rgba(0,0,0,0)',
                                borderWidth: 0,
                                borderColor: '#ccc',
                                width: 100,
                                height: 40,
                                offsetCenter: ['-60%', 10], // x, y，单位px
                                formatter: '{value}%',
                                textStyle: {// 其余属性默认使用全局文本样式，详见TEXTSTYLE
                                    color: 'auto',
                                    fontSize: 30
                                }
                            },
                            data: [{
                                    value: <?php echo floor(($total_solve / $total_task) * 100); ?>,
                                    name: 'Solved'
                                }]
                        }
                    ]
                });
                $("#res_summery").html('<center><strong>Solved <?php echo $total_solve; ?>' + ' out of <?php echo $total_task; ?> challenges</strong></center>');

            });
        </script>


        <!-- page content ends-->






        <?php
    }
// If no user is found
    else {
        include './error_data.php';
    }
    ?>
