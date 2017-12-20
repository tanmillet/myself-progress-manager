require.config({
    baseUrl: '/tan-admin/assets/',
    paths: {
        'jquery': 'vendor/jquery.min',
        'sweetalert': 'vendor/sweetalert',
        'CURDModel': 'vendor/curd-model',
    }
});

require(['jquery', 'sweetalert', 'CURDModel'], function ($, sweetalert, curder) {
    $(".oper-upshow").click(function () {
        var me = this;
        $(me).attr('disabled', "true");
        var post_data = $("#upshowproject").serialize();
        post_data = post_data + "&context=" + $('#editor').html();
        var post_url = '/pro/store/project';
        var curd = new curder.CURDModel();
        var res = curd.operC(post_data, post_url);
        $(me).removeAttr("disabled");
        if(res == "success"){
            window.location.reload();
        }
        console.log(res);
    });

    $(".oper-del").click(function () {
        var me = this,
            operId = $(me).attr('data-id'),
            operName = $(me).attr('data-name'),
            operUrl = $(me).attr('data-url') + '/' + operId,
            operData = {
                'operId': operId,
                'operName': operName
            };
        $(me).attr('disabled', "true");

        var curd = new curder.CURDModel();
        curd.operD(operData, operUrl);
        $(me).removeAttr("disabled");
    });
});