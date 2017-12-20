/**
 * Created by hp on 17.11.29.
 */
require.config({
    baseUrl: '/tan-admin/assets/',
    paths: {
        'jquery': 'vendor/jquery.min',
        'AjaxModel': 'vendor/ajax-service',
        'sweetalert': 'vendor/sweetalert',
    }
});

define(['jquery', 'AjaxModel', 'sweetalert'], function ($, req, sweetalert) {

    function CURDModel() {
    }

    CURDModel.prototype = {
        operC: function (post_data, post_url) {
            var request = new req.AjaxModel();
            request.loseAjax(post_url, 'post', post_data, 'json', function (res) {
                swal("结果信息！", res.info.message,"success")
                // swal({
                //         title: "结果信息！",
                //         text: res.info.message,
                //         type: "success",
                //         confirmButtonText: "确定",
                //     },
                //     function () {
                //         window.location.reload();
                //     });
                return 'success';
            });

            return 'error';
        },
        operU: function () {

        },
        operR: function () {

        },
        operD: function (operData, operUrl) {
            var request = new req.AjaxModel();
            swal({
                    title: "确定要删除?",
                    text: operData.operName,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "确定",
                    cancelButtonText: "取消",
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        request.loseAjax(operUrl, 'post', operData, 'json', function (res) {
                            swal({
                                    title: "结果信息！",
                                    text: res.info.message,
                                    type: "success",
                                    confirmButtonText: "确定",
                                },
                                function () {
                                    window.location.reload();
                                });
                        });
                    } else {
                        // window.location.reload();
                    }
                });
        }
    };

    return {
        CURDModel: CURDModel
    }
});
