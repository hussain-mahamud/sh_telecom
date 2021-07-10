 $(document).ready(function () {
        //Daily Sales Report Generate
        $('.daily-sales').click(function (e) {
            e.preventDefault();
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/daily-sales",
                method: "GET",
                dataType: 'json',
                success: function (response) {
                    var tr='';
                    $('tbody').html(tr);
                    $.each( response.products, function( key, item ) {
                        tr+='<tr><td>'+item.pr_name+'</td><td>'+item.pc_qty+
                        '</td><td>'+item.pr_price+
                        '</td><td>'+item.c_name+
                        '</td><td>'+item.c_phone+
                        '</td><td>'+item.c_address+
                        '</td></tr>';
                        $('tbody').html(tr);
                    });
                    
                    $('.pdf-div').html('<a href="#" type="button" class="btn btn-dark pdf-button">Export PDF</a>');
                    $('.report-title').html('<h5>Daily Sales Report</h5>');
                },
                error: function (data) {
                console.log('Error:', data);
            }
            });
        });
        //End Daily Report
        //Weekly Sales Report
        $('.weekly-sales').click(function (e) {
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/admin/weekly-sales" ,
                method: "GET",
                success: function (response) {
                    var tr='';
                    $('tbody').html(tr);
                    $.each( response.products, function( key, item ) {
                        tr+='<tr><td>'+item.pr_name+'</td><td>'+item.pc_qty+
                        '</td><td>'+item.pr_price+
                        '</td><td>'+item.c_name+
                        '</td><td>'+item.c_phone+
                        '</td><td>'+item.c_address+
                        '</td></tr>';
                        $('tbody').html(tr);
                    });
                    
                    $('.pdf-div').html('<a href="#" type="button" class="btn btn-dark pdf-button">Export PDF</a>');
                    $('.report-title').html('<h5>Weekly Sales Report</h5>');
                
                },
                error: function (data) {
                console.log('Error:', data);
            }
            });
        });

        //Genrate Reporte on the basis of specific Range

         $('.range-report').click(function (e) {
            e.preventDefault();
           
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var start_date=$("#d1").val();
            var last=$("#d2").val();
            $.ajax({
                url:"/admin/range-sales" ,
                method: "POST",
                data:{
                     str_date:start_date,
                     end_date:last,
                },
              
                success: function (response) {
                   var tr='';
                   $('tbody').html(tr);
                    $.each( response.products, function( key, item ) {
                        tr+='<tr><td>'+item.pr_name+'</td><td>'+item.pc_qty+
                        '</td><td>'+item.pr_price+
                        '</td><td>'+item.c_name+
                        '</td><td>'+item.c_phone+
                        '</td><td>'+item.c_address+
                        '</td></tr>';
                        $('tbody').html(tr);
                    });
                    
                    $('.pdf-div').html('<a href="#" type="button" class="btn btn-dark pdf-button">Export PDF</a>');
                    $('.report-title').html('<h5>Range Report</h5>');
                },
                error: function (data) {
                console.log('Error:', data);
            }
            });
        });
    });
