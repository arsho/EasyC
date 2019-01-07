<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Page Title'; ?>
<?php $category_option = $lesson_category_object->get_all_row(); ?>
<?php
$total_task=0;
$total_solve=0;
$username="arsho";
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $page_title; ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link">
                        <div class="x_title">
                            <h2>Secondary Title</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div class="x_content animated flipInY">

                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" title="Change the avatar">
                                        <img src="images/picture.jpg" alt="Avatar">
                                    </div>

                                </div>
                                <h3>Samuel Doe</h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                                    </li>

                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                    </li>

                                    <li class="m-top-xs">
                                        <i class="fa fa-external-link user-profile-icon"></i>
                                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                    </li>
                                </ul>

                                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                <br />

                                <!-- start skills -->
                                <h4>Skills</h4>
                                <ul class="list-unstyled user_data">
                                    <li>
                                        <p>Web Applications</p>
                                        <div class="progress progress_sm progress-striped animated flipInY">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>Website Design</p>
                                        <div class="progress progress_sm progress-striped animated flipInY">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>Automation & Testing</p>
                                        <div class="progress progress-striped progress_sm animated flipInY">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>UI / UX</p>
                                        <div class="progress progress_sm progress-striped animated flipInY">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end of skills -->

                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">





                            <div class="profile_title">
                                <h3 class="title_left">Performance</h3>
                                <div class="col-md-6">
                                    <div id="echart_guage" style="height:370px;"></div>                                    
                                </div>

                            </div>
                            <!--                             start of user-activity-graph -->
                            <!--                            <div id="graph_bar" style="width:100%; height:280px;"></div>-->
                            <!--                             end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade in" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
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
                                                foreach ($category_option as $single_option) {
                                                    $single_option_first_word = explode(" ", $single_option)[0];
                                                    $single_option_first_word_hash = "#" . $single_option_first_word;
                                                    ?>
                                                    <?php
                                                    $all_task = $task_object->get_row_using_single_attribute($single_option);
                                                    $all_task_len = count($all_task);
                                                    $all_task_solved_len=  $all_task_len>0?1:0;
                                                    $completeness=  ($all_task_solved_len/$all_task_len)*100;
                                                    $total_task+=$all_task_len;
                                                    $total_solve+=$all_task_solved_len;
                                                    ?>                                                
                                                    <tr>
                                                        <td><?php echo $single_option; ?></td>
                                                        <td class="hidden-phone"><?php echo $all_task_len; ?></td>
                                                        <td class="hidden-phone"><?php echo $all_task_solved_len;?></td>
                                                        <td class="vertical-align-mid">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" data-transitiongoal="<?php echo $completeness;?>"></div>
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
                                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk </p>
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
                        name: '<?php echo $username;?> Performance',
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
                                value: <?php echo floor(($total_solve/$total_task)*100);?>,
                                name: '<?php echo $username;?>'
                            }]
                    }
                ]
            });
        });
    </script>


    <!-- page content ends-->

