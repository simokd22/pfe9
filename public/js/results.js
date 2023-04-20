    $(document).ready(function() {
        var IsInArticle = localStorage.getItem('IsInArticle');
        var activeTab = localStorage.getItem('activeTab');
        console.log(activeTab);
        if (IsInArticle == 0 || IsInArticle == null) {
            $('.tab-pane').hide();
            $('#1-content').addClass('active');
            $('#1-content').show();
            $('#1').css({
                'border-bottom': '4px solid #ddd',
            });
        } else {
            console.log('activeTab != 0');

            $('.tab-pane').hide();
            $('#' + activeTab + '-content').addClass('active');
            $('#' + activeTab + '-content').show();
            $('#' + activeTab).css({
                'border-bottom': '4px solid #ddd',
            });
        }

        $('.tab').click(function() {
            //e.preventDefault();
            let id = $(this).attr("id");
            console.log(id);
            localStorage.setItem('activeTab', id);
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
        });
        localStorage.setItem('IsInArticle', 0);

    });