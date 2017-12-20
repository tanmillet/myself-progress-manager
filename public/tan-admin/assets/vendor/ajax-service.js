/**
 *
 */
require.config({
    baseUrl: '/tan-admin/assets/',
    paths: {
        'jquery': 'vendor/jquery.min',
        'sweetalert': 'vendor/sweetalert'
    }
});

define(['jquery', 'sweetalert'], function ($, sweetalert) {

    function AjaxModel() {
    }

    AjaxModel.prototype = {
        loseAjax: function (url, method, params, dataType, callback) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            // $.ajaxSetup({
            //     headers: {
            //         'X-XSRF-TOKEN': $.cookie('XSRF-TOKEN')
            //     }
            // });

            $.ajax({
                url: url, type: method, data: params, dataType: dataType, success: callback,
                error: function () {
                    swal({
                        title: "网络异常!",
                        text: "请你稍后再操作,谢谢!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonText: "确认",
                        closeOnConfirm: true
                    });
                }
            })
        },
    }

    return {
        AjaxModel: AjaxModel
    }

});