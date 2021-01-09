    <script src="<?=base_url('assets/lib/jquery/jquery.js')?>"></script>
    <script src="<?=base_url('assets/lib/jquery-ui/jquery-ui.js')?>"></script>
    <script src="<?=base_url('assets/lib/popper.js/popper.js')?>"></script>
    <script src="<?=base_url('assets/lib/bootstrap/bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')?>"></script>
    <script src="<?=base_url('assets/lib/moment/moment.js')?>"></script>
    <script src="<?=base_url('assets/lib/jquery-switchbutton/jquery.switchButton.js')?>"></script>
    <script src="<?=base_url('assets/lib/peity/jquery.peity.js')?>"></script>
    <script src="<?=base_url('assets/lib/highlightjs/highlight.pack.js')?>"></script>
    <script src="<?=base_url('assets/lib/raphael/raphael.min.js')?>"></script>
    <script src="<?=base_url('assets/lib/morris.js/morris.js')?>"></script>

    <script src="<?=base_url('assets/lib/datatables/jquery.dataTables.js')?>"></script>
    <script src="<?=base_url('assets/lib/datatables-responsive/dataTables.responsive.js')?>"></script>
    <script src="<?=base_url('assets/lib/select2/js/select2.min.js')?>"></script>

    <script src="<?=base_url('assets/js/bracket.js')?>"></script>

    <!-- Table export as PDF,Excel,Json,SQL,Word,CSV,PNG -->
    <script src="<?=base_url('assets/plugins/tableExport/libs/FileSaver/FileSaver.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/tableExport/libs/js-xlsx/xlsx.core.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/tableExport/libs/jsPDF/jspdf.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js')?>"></script>
    <script src="<?=base_url('assets/plugins/tableExport/libs/html2canvas/html2canvas.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/tableExport/tableExport.js')?>"></script>
    <!-- END Scripts -->

    <script>
        $(function() {
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function() {
                minimizeMenu();
            });

            minimizeMenu();

            function minimizeMenu() {
                if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                    // show only the icons and hide left menu label by default
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>
    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>
    <script>
        function exportTableAs(tableClass, exportType) {
            $("table." + tableClass).tableExport({
                type: exportType
            });
        }
        
    //Change my password
    var base_url = '<?php echo base_url();?>';
    $('form.password-change-form').on('submit', function (e) {
        e.preventDefault();
        var current_password = $.trim($('#current_password').val());
        var new_password = $.trim($('#new_password').val());
        var confirm_password = $.trim($('#confirm_password').val());
        if (new_password != confirm_password) 
        {
            $('#password-change-info').html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oops!</strong> Your New Password & Confirm Password must be same.</div>');
        }
        else
        {
            $('#password-change-info').html('');
            // Ajax starts here
            $.ajax({
                type:"POST",
                url:base_url+'home/change_password_after_login',
                cache:false,
                contentType:false,
                processData:false,
                data:new FormData(this),
                beforeSend: function () {
                    $('#passwordChangeModal > div > div').addClass('csspinner duo');
                    $('.change-pass-btn').attr("disabled", "disabled");
                    $('form.password-change-form')[0].reset(); 
                },
                success:function (responseData) { //responseData will be the result returned by the serverside
                    $('.change-pass-btn').removeAttr("disabled", "disabled");
                    $('#passwordChangeModal > div > div').removeClass('csspinner duo');
                    $('#password-change-info').html(responseData);
                }
            });
        }
    });
    </script>