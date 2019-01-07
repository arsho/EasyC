<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Assign Admin'; ?>
<?php
$all_user = $user_object->get_all_row();
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
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Click to toggle the admin assignment">
                            <h2><?php echo $page_title; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="x_content">


                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>                                    
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Country</th>
                                    <th>User Current Role</th>
                                    <th>Update User Role</th>
                                </tr>
                            </thead>
                            <tbody id="admin_tbody">
                                <?php
                                foreach ($all_user as $key => $value) {

                                    $user_username = $all_user[$key]["user_username"];
                                    $user_photo = $all_user[$key]["user_photo"];
                                    $user_role = $all_user[$key]["user_role"];
                                    $user_fullname = $all_user[$key]["user_fullname"];
                                    $user_country = $all_user[$key]["user_country"];

                                    if ($user_role == 'Super Admin')
                                        continue;
                                    $user_current_role = '';
                                    $change_role = '';
                                    $user_photo_img = '<img class="table_profile_img" src="' . $user_photo . '"/>';
                                    $user_role_label = '';
                                    $user_abiliy = '';
                                    if ($user_role == 'User') {
                                        $change_role = 'Admin';
                                        $user_role_label = 'label-info';
                                        $user_abiliy = 'Can learn lessons and solve the challenges';
                                    } else if ($user_role == 'Admin') {
                                        $change_role = 'User';
                                        $user_role_label = 'label-success';
                                        $user_abiliy = 'Can manage lessons and challenges';
                                    }
                                    $user_current_role = '<span data-toggle="tooltip" data-placement="top" title="' . $user_abiliy . '" class="label ' . $user_role_label . '">' . $user_role . '</span>';

                                    $user_link = '<a data-toggle="tooltip" data-placement="top" title="Click to view ' . $user_username . '\'s profile" class="label label-dark" href="profile.php?user=' . $user_username . '">' . $user_username . '</a>';
                                    $user_country_full = '';
                                    foreach ($countries_ar as $key => $value) {
                                        if ($key == $user_country) {
                                            $selected_val = strtolower($key);
                                            $user_country_full = $value;
                                            $user_country_full = '<img style="margin-left: 10px;" src="css/flags/blank.gif" data-toggle="tooltip" data-placement="top" title="' . $value . '" class="flag flag-' . $selected_val . '" /> ';
                                            break;
                                        }
                                    }

                                    $del_div_id = "change_role_" . $user_username;

                                    $del_div_str = "<div id=\"" . $del_div_id . "\" class=\"modal fade bs-example-modal-sm\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
                                    $del_div_str = $del_div_str . "<div class=\"modal-dialog modal-sm\">";
                                    $del_div_str = $del_div_str . "<div class=\"modal-content\">";

                                    $del_div_str = $del_div_str . "<div class=\"modal-header\">";
                                    $del_div_str = $del_div_str . "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span>";
                                    $del_div_str = $del_div_str . "</button>";
                                    $del_div_str = $del_div_str . "<h4 class=\"modal-title\">Are you sure?</h4>";
                                    $del_div_str = $del_div_str . "</div>";
                                    $del_div_str = $del_div_str . "<div class=\"modal-body\">";
                                    $del_div_str = $del_div_str . "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">";
                                    $del_div_str = $del_div_str . "<h3>Warning!</h3>";
                                    $del_div_str = $del_div_str . "<strong>Username: </strong> " . $user_username . " <br/>";
                                    $del_div_str = $del_div_str . "<strong>Current Role: </strong> " . $user_role . " <br/>";
                                    $del_div_str = $del_div_str . "<strong>New Role: </strong> " . $change_role . " <br/>";

                                    $del_div_str = $del_div_str . "<h4>The role will be changed.</h4>";
                                    $del_div_str = $del_div_str . "</div>";
                                    $del_div_str = $del_div_str . "</div>";
                                    $del_div_str = $del_div_str . "<div class=\"modal-footer\">";
                                    $del_div_str = $del_div_str . "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";


                                    $del_div_str = $del_div_str . "<form  style=\"display:inline;\" action=\"admin_assign_check.php\" method=\"post\">";
                                    $del_div_str = $del_div_str . "<input type=\"hidden\" name=\"user_username\" value=\"" . $user_username . "\"/>";
                                    $del_div_str = $del_div_str . "<input type=\"hidden\" name=\"user_role\" value=\"" . $change_role . "\"/>";
                                    $del_div_str = $del_div_str . "<button type=\"submit\" class=\"btn btn-warning\">Make " . $change_role . "</button>";
                                    $del_div_str = $del_div_str . "</form>";

//                                    $del_div_str = $del_div_str . "<a href=\"" . $del_link . "\" class=\"btn btn-warning\">Make " . $change_role . "</button>";

                                    $del_div_str = $del_div_str . "</div>";

                                    $del_div_str = $del_div_str . "</div>";
                                    $del_div_str = $del_div_str . "</div>";
                                    $del_div_str = $del_div_str . "</div>";
                                    $user_role_change_btn = "<a href = \"#\" class = \"btn btn-primary\" data-toggle = \"modal\" data-target = \"#" . $del_div_id . "\"><i class = \"fa fa-cogs\"></i> Make " . $change_role . " </a>";
                                    $del_div_str = $del_div_str . $user_role_change_btn;
                                    ?>
                                    <tr>
                                        <td><?php echo $user_photo_img; ?></td>
                                        <td><?php echo $user_link; ?></td>
                                        <td><?php echo $user_fullname; ?></td>
                                        <td><?php echo $user_country_full; ?></td>
                                        <td><?php echo $user_current_role; ?></td>
                                        <td><?php echo $del_div_str; ?></td>


                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require './module/footer.php'; ?>
    <!--submission_view ends-->

