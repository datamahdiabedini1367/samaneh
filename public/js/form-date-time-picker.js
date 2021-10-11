var handleFormDateTimePicker = function () {
    $('#startDate').MdPersianDateTimePicker({
        targetTextSelector: '#startDate',
        fromDate: true,
        enableTimePicker: true,
        groupId: 'rangeSelector1',
        dateFormat: 'yyyy/MM/dd HH:mm:ss',
        textFormat: 'yyyy/MM/dd HH:mm:ss',
    });

    $('#endDate').MdPersianDateTimePicker({
        targetTextSelector: '#endDate',
        fromDate: true,
        enableTimePicker: true,
        groupId: 'rangeSelector1',
        dateFormat: 'yyyy/MM/dd HH:mm:ss',
        textFormat: 'yyyy/MM/dd HH:mm:ss',
    });
};

var FormDateTimePicker = function () {
    return {
        //main function
        init: function () {
            handleFormDateTimePicker();
        }
    };
}();
