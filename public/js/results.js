    $(document).ready(function() {
        //var now={{ json_encode(session()->get('now')) }};
        //console.log(now);
        var now = 0;
        if (now == 0) {
            console.log('activeTab == 0');
            $('.tab-pane').hide();
            $('#1-content').addClass('active');
            $('#1-content').show();
            $('#1').css({
                'border-bottom': '4px solid #ddd',
            });
        } else {
            console.log('activeTab != 0');

            $('.tab-pane').hide();
            $('#' + localStorage.getItem('activeTab') + '-content').addClass('active');
            $('#' + localStorage.getItem('activeTab') + '-content').show();
            $('#' + localStorage.getItem('activeTab')).css({
                'border-bottom': '4px solid #ddd',
            });
        }

        $('.tab').click(function() {
            //e.preventDefault();
            let id = $(this).attr("id");
            console.log(id);
            localStorage.setItem('activeTab', id);
            //var now2={{ json_encode(session()->get('now')) }};
            // console.log(now2);
            $('.tab-pane').hide();
            $('.tab-pane').removeClass('active');
            $('#' + id + '-content').addClass('active');
            // Show the selected form
            $('#' + id + '-content').show();
            $('.tab').css({
                'border-bottom': 'none',
            });
            $(this).css({
                'border-bottom': '4px solid #ddd',
            });
            // setSessionVariable('IsInArticle', 0);
        });

    });