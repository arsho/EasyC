<!--footer starts-->
<!-- footer content -->
<footer>
    <div class="">
        <p  class="pull-left">
            <span style="font-size: 120%;" class="lead">Developed by <a href="<?php echo $developer_site_url; ?>"> <?php echo $developer_org; ?></a></span>            
        </p>

        <p  class="pull-right">            
            <span style="font-size: 120%;" class="lead">Copyright &copy; 2016 <a href="<?php echo $site_url; ?>"><i class="glyphicon glyphicon-blackboard"></i> <?php echo $site_title; ?></a></span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->

</div>
<!-- /page content -->
</div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="js/bootstrap.min.js"></script>

<!-- chart js -->
<script src="js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="js/icheck/icheck.min.js"></script>

<script src="js/custom.js"></script>

<!-- moris js -->
<!--<script src="js/moris/raphael-min.js"></script>
<script src="js/moris/morris.js"></script>
<script src="js/moris/example.js"></script>-->

<!-- echart -->
<script src="js/echart/echarts-all.js"></script>
<script src="js/echart/green.js"></script>

<!--Syntax highlighter js starts-->
<script src="js/code/highlight.pack.js"></script>
<script>
    $(document).ready(function () {
        hljs.configure({'languages': ['c']});
        hljs.initHighlightingOnLoad();

    });



</script>
<!--Syntax highlighter js ends-->
</body>

</html>
<!--footer ends-->