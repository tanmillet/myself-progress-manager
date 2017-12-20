/**
 * author Terry Lucas
 * globals service
 */

var ProjectGlobals = ProjectGlobals || {};

ProjectGlobals.Globals = {};
ProjectGlobals.Apps = {};

ProjectGlobals.Globals =
{
    'pAjax': function (url, method, params, dataType, callback) {

        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': $.cookie('XSRF-TOKEN')
            }
        });

        $.ajax({
            url: url, type: method, data: params, dataType: dataType, success: callback,
            error: function () {
                ProjectGlobals.Globals.pLayer('网络异常！');
            }
        });
    },

    'pLayer': function (msg) {
        layer.open({
            content: msg,
            style: 'background-color:rgba(0,0,0,0.8); padding:5px; color:#fff; border:none; border-radius:6px; -webkit-border-radius:6px; text-align:center;',
            time: 2
        });
    },
   
    'loading':function(msg) {
    	layer.open({
    	    type: 2,
    	    content: msg,
    	    shadeClose: false,
    	    style: 'border:none; background-color: rgba(0,0,0,.0); box-shadow: 0 0 8px rgba(0,0,0,.0);'
    	  });
    },

    'validateForm': function (params, validateRules, validateMessages, validateAttrbutes, validateError) {
        $(params).each(function (index, param) {
            if (validateRules[param.name] !== undefined) {
                var rules = validateRules[param.name];
                console.log(rules);
                console.log(param.name);
                console.log(param.value);
                console.log(ProjectGlobals.Globals.isEmpty(param.value));
                $(rules).each(function (idx, rule) {
                    switch (rule) {
                        case 'required':
                            if (ProjectGlobals.Globals.isEmpty(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['required'];
                            }
                            break;
                        case 'number':
                            if (!ProjectGlobals.Globals.isNum(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['number'];
                            }
                            break;
                        case 'isIdCard':
                            if (!ProjectGlobals.Globals.isIdCard(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isIdCard'];
                            }
                            break;
                        case 'isPostCode':
                            if (!ProjectGlobals.Globals.isPostCode(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isPostCode'];
                            }
                            break;
                        case 'isEmail':
                            if (!ProjectGlobals.Globals.isEmail(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isEmail'];
                            }
                            break;
                        case 'isPhone':
                            if (!ProjectGlobals.Globals.isPhone(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isPhone'];
                            }
                            break;
                        case 'isPhoneV':
                            if (!ProjectGlobals.Globals.isPhoneV(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isPhoneV'];
                            }
                            break;
                        case 'isPhoneH':
                            if (!ProjectGlobals.Globals.isPhoneH(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isPhoneH'];
                            }
                            break;
                        case 'isChinese':
                            if (!ProjectGlobals.Globals.isChinese(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isChinese'];
                            }
                            break;
                        case 'isDigits':
                            if (!ProjectGlobals.Globals.isDigits(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isDigits'];
                            }
                            break;
                        case 'after':
                            if (!ProjectGlobals.Globals.after(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['after'];
                            }
                            break;
                        case 'minmax010':
                            if (!ProjectGlobals.Globals.minmax010(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['minmax010'];
                            }
                            break;
						case 'isNotNullNum':
                            if (!ProjectGlobals.Globals.isNotNullNum(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullNum'];
                            }
                            break;
						case 'isNotNullPhoneV':
                            if (!ProjectGlobals.Globals.isNotNullPhoneV(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullPhoneV'];
                            }
                            break;
						case 'isNotNullPhoneH':
                            if (!ProjectGlobals.Globals.isNotNullPhoneH(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullPhoneH'];
                            }
                            break;
						case 'isNotNullEmail':
                            if (!ProjectGlobals.Globals.isNotNullEmail(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullEmail'];
                            }
                            break;
                        case 'isNotNullPostCode':
                            if (!ProjectGlobals.Globals.isNotNullPostCode(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullPostCode'];
                            }
                            break;
                        case 'isBankCard':
                            if (!ProjectGlobals.Globals.isBankCard(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isBankCard'];
                            }
                            break;
                        case 'isNotNullAfter':
                            if (!ProjectGlobals.Globals.isNotNullAfter(param.value)) {
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullAfter'];
                            }
                            break;                            
                            
                        case 'isNotNullBefore':                            
                            if (!ProjectGlobals.Globals.isNotNullBefore(param.value)) {                            
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['isNotNullBefore'];
                            }
                            break;
                        case 'moreThanZero':                            
                            if (!ProjectGlobals.Globals.moreThanZero(param.value)) {                            
                                validateError += '[' + validateAttrbutes[param.name] + ']' + validateMessages['moreThanZero'];
                            }
                            break;
                            
                    }
                });
            }
        });
        return validateError;
    },

    'isEmpty': function (str) {
        console.log(str);
        if (str === '' || str === undefined || str === null) {
            return true;
        }
        return false;
    },

    'isNum': function (num) {
        if (/^(\-|\+)?([0-9]+|Infinity)$/.test(num)) {
            return true;
        }
        return false;
    },
    'isIdCard': function (value) {
        var idCard = /^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;
        return (idCard.test(value)) ? true : false;
    },

    'isPostCode': function (value) {
        var isPostCode = /^[0-9]{6}$/;
        return (isPostCode.test(value)) ? true : false;
    },

    'isEmail': function (value) {
        var isEmail = /\w@\w*\.\w/;
        return (isEmail.test(value)) ? true : false;
    },

    'isPhone': function (value) {
        var isPhone = /^1[3|4|5|7|8]\d{9}$/;
        return (isPhone.test(value)) ? true : false;
    },

    'isPhoneV': function (value) {
        var isPhoneV = /((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/;
        return (isPhoneV.test(value)) ? true : false;
    },

    'isPhoneH': function (value) {
        var isPhoneH = /0\d{2,3}-\d{5,9}|0\d{2,3}-\d{5,9}/;
        return (isPhoneH.test(value)) ? true : false;
    },

    'isPhoneH': function (value) {
        var isPhoneH = /0\d{2,3}-\d{5,9}|0\d{2,3}-\d{5,9}/;
        return (isPhoneH.test(value)) ? true : false;
    },

    'isChinese': function (value) {
        var isChinese = /[\u4E00-\u9FA5]+/;
        return (isChinese.test(value)) ? true : false;
    },

    'isDigits': function (value) {
        return ( /^\d+$/.test(value)) ? true : false;
    },

    'after': function (value) {        
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var day = myDate.getDate();
        var year = myDate.getFullYear() 
        var startTime = year+'-'+month+'-'+day;

        var endTime = value;
        var start = new Date(startTime.replace("-", "/").replace("-", "/"));
        var end = new Date(endTime.replace("-", "/").replace("-", "/"));
        if (end < start) {
            return false;
        }
        return true;
    },
    'minmax010': function (value) {
        if (ProjectGlobals.Globals.isDigits(value)) {
            var v = parseInt(value);
            if (v >= 0 && v <= 10) {
                return true;
            }
            return false;
        }
        return false;
    },

    'isBankCard': function (value) {
        var bankcard = /^[0-4][0-9]{15,18}$/;
        var bankcard2 = /^[6-9][0-9]{15,18}$/;
        return ((bankcard.test(value)) || (bankcard2.test(value))) ? true : false;
    },
	
	'isNotNullNum': function (num) {
		if (num == '') {
			return true;
		} else if (/^(\-|\+)?([0-9]+|Infinity)$/.test(num)) {
            return true;
        } else {
			return false;
		}
	},
	
	'isNotNullPhoneV': function (value) {
		if (value == '') {
			return true;
		} else {
			var isPhoneV = /((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/;
			return (isPhoneV.test(value)) ? true : false;
		}
	},
	
	'isNotNullPhoneH': function (value) {
		if (value == '') {
			return true;
		} else {
			var isPhoneH = /0\d{2,3}-\d{5,9}|0\d{2,3}-\d{5,9}/;
			return (isPhoneH.test(value)) ? true : false;
		}
	},
	
	'isNotNullEmail': function (value) {
		if (value == '') {
			return true;
		} else {
			var isEmail = /\w@\w*\.\w/;
			return (isEmail.test(value)) ? true : false;
		}
    },

    'isNotNullPostCode': function (value) {  
        if (value == '') {
            return true;
        } else {
            var isPostCode = /^[0-9]{6}$/;
            return (isPostCode.test(value)) ? true : false;
        }
    },

    //不能在当前日期之前
    'isNotNullAfter': function (value) {     
        if (value == '') {
            return true;
        }      
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var day = myDate.getDate();
        var year = myDate.getFullYear() 
        var startTime = year+'-'+month+'-'+day;

        var endTime = value;
        var start = new Date(startTime.replace("-", "/").replace("-", "/"));
        var end = new Date(endTime.replace("-", "/").replace("-", "/"));        
        if (end < start) {
            return false;
        }
        return true;
    },

    //不能在当前日期之后
    'isNotNullBefore': function (value) {     
        if (value == '') {
            return true;
        }      
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var day = myDate.getDate();
        var year = myDate.getFullYear() 
        var startTime = year+'-'+month+'-'+day;

        var endTime = value;
        var start = new Date(startTime.replace("-", "/").replace("-", "/"));
        var end = new Date(endTime.replace("-", "/").replace("-", "/"));        
        if (end > start) {
            return false;
        }
        return true;
    },


    /*
    根据身份证获取年龄
     */
    'getAgeFromIdCard' : function (UUserCard){        
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var day = myDate.getDate();
        var age = myDate.getFullYear() - UUserCard.substring(6, 10) - 1;
        if (UUserCard.substring(10, 12) < month || UUserCard.substring(10, 12) == month && UUserCard.substring(12, 14) <= day) {
            age++;
        } 

        return age;
    },

    /*
    根据身份证获取性别
     */
    'getGenderFromIdCard' : function (UUserCard){        
        if (parseInt(UUserCard.substr(16, 1)) % 2 == 1) {
            return 0;//男
        } else {
            return 1;//女
        } 

        
    },

    //大于0
    'moreThanZero' : function (value){
        if (value > 0) {
            return true;
        } else {
            return false;
        }
    }

}



