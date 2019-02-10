$(function(){
     $('#btnIntermediate').click(function(){
        $('#qu-steep01').removeClass('steeps_active');
        $('#qu-steep02').addClass('steeps_active');
    });
    $('#btnAdvanced').click(function () {
        $('#qu-steep01').removeClass('steeps_active');
        $('#qu-steep02').addClass('steeps_active');
    });

    $('#btnNoEnglish').click(function () {
        $('#qu-steep01').removeClass('steeps_active');
        $('#qu-steep04').addClass('steeps_active');
    });

    $('#qu-steep02>.button').click(function(){
        $('#qu-steep02').removeClass('steeps_active');
        $('#qu-steep03').addClass('steeps_active');
    });

    $('#qu-button_yes').click(function(){
        $('#qu-steep03').removeClass('steeps_active');
        $('#qu-steep05').addClass('steeps_active');
        setTimeout(function(){
            $('.header-inner .container').css('display', 'flex');
            $('.qu-background').hide();
            $('.question-content').hide();
        },1000);
    });

    $('#qu-button_no').click(function(){
        $('#qu-steep03').removeClass('steeps_active');
        $('#qu-steep04').addClass('steeps_active');
    });

    $('#qu-steep04').click(function(){
        $('#qu-steep04').removeClass('steeps_active');
        $('#qu-steep01').addClass('steeps_active');
    });

    // $('#qu-steep05').click(function(){
    //     $('#qu-steep05').removeClass('steeps_active');
    //     $('#qu-steep01').addClass('steeps_active');
    // });
});

$(function () {
    $('#btnNoEnglish').click(function () {
        $('[name=Level_of_English__c]').val("No English");

    });
    $('#btnIntermediate').click(function () {
        $('[name=Level_of_English__c]').val("Intermediate");

    });

    $('#btnAdvanced').click(function () {
        $('[name=Level_of_English__c]').val("Advanced");

    });

    $('#btnYesQuestion2').click(function () {
        $('[name=University_Degree__c]').val("Yes");

    });
    $('#btnNoQuestion2').click(function () {
        $('[name=University_Degree__c]').val("No");

    });

    $('#qu-button_yes').click(function () {
        $('[name=Monthly_Income_Over_2000__c').val("Yes");

    });
    $('#qu-button_no').click(function () {
        $('[name=Monthly_Income_Over_2000__c]').val("No");

    }); 

   

});