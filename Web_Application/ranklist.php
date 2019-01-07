<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Ranklist'; ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Click to toggle the ranklist">
                            <h2><?php echo $page_title; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="x_content">


                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th><center>Rank</center></th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th><center>Country</center></th>
                                    <th><center>Total Solved</center></th>
                                </tr>
                            </thead>
                            <tbody id="ranklist_tbody">

                                <?php
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


                                $all_ranklist = $user_ranklist_object->get_all_row();

                                $user_rank = 0;
                                $cur_solve = 0;
                                foreach ($all_ranklist as $key => $value) {
                                    $ranklist_username = $all_ranklist[$key]["ranklist_username"];
                                    $number_of_ac = $all_ranklist[$key]["number_of_ac"];
                                    if ($number_of_ac != $cur_solve) {
                                        $cur_solve = $number_of_ac;
                                        $user_rank++;
                                    }
                                    $number_of_submissions = $all_ranklist[$key]["number_of_submissions"];
                                    $date_of_last_submission = $all_ranklist[$key]["date_of_last_submission"];

                                    $date_of_last_submission_obj = date("d/m/Y h:i a", $date_of_last_submission);
                                    $single_user_details_ar = $user_object->get_row_using_id($ranklist_username);
                                    $single_user_details = $single_user_details_ar[0];
                                    $single_user_country = $single_user_details["user_country"];
                                    $single_user_photo = $single_user_details["user_photo"];
                                    $single_user_fullname = $single_user_details["user_fullname"];

                                    $single_user_photo_img = '<img class="table_profile_img" src="' . $single_user_photo . '"/>';
                                    $selected_val = '';

                                    $ranklist_user_link = '<a data-toggle="tooltip" data-placement="top" title="Click to view ' . $ranklist_username . '\'s profile" class="label label-dark" href="profile.php?user=' . $ranklist_username . '">' . $ranklist_username . '</a>';
                                    $single_user_country_full = '';
                                    foreach ($countries_ar as $key => $value) {
                                        if ($key == $single_user_country) {
                                            $selected_val = strtolower($key);
                                            $single_user_country_full = '<img src="css/flags/blank.gif" data-toggle="tooltip" data-placement="top" title="' . $value . '" class="flag flag-' . $selected_val . '" /> ';
                                            break;
                                        }
                                    }


                                    $tr_own_class = $current_user_details["user_username"] == $ranklist_username ? 'success' : '';

                                    $ret_str = '<tr class=' . $tr_own_class . '>';
                                    $ret_str = $ret_str . "<td><center><strong>" . $user_rank . "</strong></center></td>";
                                    $ret_str = $ret_str . "<td>" . $single_user_photo_img . "</td>";

                                    $ret_str = $ret_str . "<td>" . $ranklist_user_link . "</td>";
                                    $ret_str = $ret_str . "<td>" . $single_user_fullname . "</td>";
                                    $ret_str = $ret_str . "<td><center>" . $single_user_country_full . "</center></td>";
                                    $ret_str = $ret_str . "<td><center>" . $number_of_ac . "</center></td>";

                                    $ret_str = $ret_str . "</tr>";
                                    echo $ret_str;
                                }
                                ?>                                


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function () {
//
//            // Load all employee info in page load
//            function init_load() {
//                $.ajax({
//                    url: 'ranklist_get_view.php',
//                    type: 'POST',
//                    success: function (returndata) {
//                        $("#ranklist_tbody").html(returndata);
//                    }
//                });
//            }
//
//            init_load();
//
//            $("#ranklist_country_id").on("keyup", function () {
//                $ranklist_country_id = $("#ranklist_country_id").val();
//                formData = {ranklist_country_id: $ranklist_country_id, }; //Array 
//                $.ajax({
//                    data: formData,
//                    url: 'ranklist_get_view.php',
//                    type: 'POST',
//                    success: function (returndata) {
//                        $("#ranklist_tbody").html(returndata);
//                    }
//                });
//            })
//
//            $("#ranklist_search_form_submit").on("click", function () {
//                $ranklist_country_id = $("#ranklist_country_id").val();
//                formData = {ranklist_country_id: $ranklist_country_id, }; //Array 
//                $.ajax({
//                    data: formData,
//                    url: 'ranklist_get_view.php',
//                    type: 'POST',
//                    success: function (returndata) {
//                        $("#ranklist_tbody").html(returndata);
//                    }
//                });
//            })

        });
    </script>
    <?php require './module/footer.php'; ?>
    <!--submission_view ends-->

