$(function(){
     $('#qu-steep01>.button').click(function(){
        $('#qu-steep01').removeClass('steeps_active');
        $('#qu-steep02').addClass('steeps_active');
    });


    $('#qu-steep02>.button').click(function(){
        $('#qu-steep02').removeClass('steeps_active');
        $('#qu-steep03').addClass('steeps_active');
    });

    $('#qu-steep03>.button').click(function(){
        $('#qu-steep03').removeClass('steeps_active');
        $('#qu-steep05').addClass('steeps_active');
        setTimeout(function(){
            $('.header-inner .container').css('display', 'flex');
            $('.qu-background').hide();
            $('.question-content').hide();
        },1000);
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
    $('#qu-steep03>.btnOptionA').click(function () {
        $('[name=Visa_needed_in__c]').val("Immediately");

    });
    $('#qu-steep03>.btnOptionB').click(function () {
        $('[name=Visa_needed_in__c]').val("6 months -1 Year");

    });

    $('#qu-steep03>.btnOptionC').click(function () {
        $('[name=Visa_needed_in__c]').val("1-2 Years");

    });
	
	

    $('#qu-steep02>.btnOptionA').click(function () {
        $('[name=Average_Monthly_Income__c]').val("$1500-$2500");

    });
    $('#qu-steep02>.btnOptionB').click(function () {
        $('[name=Average_Monthly_Income__c]').val("$2500-$5000");

    });

    $('#qu-steep02>.btnOptionC').click(function () {
        $('[name=Average_Monthly_Income__c]').val("$5000 Or More");

    }); 
	
	
	
	$('#qu-steep01>.btnOptionA').click(function () {
        $('[name=Have_In_Savings__c]').val("$0-$5000");

    });
    $('#qu-steep01>.btnOptionB').click(function () {
        $('[name=Have_In_Savings__c]').val("$5000-$20,000");

    });

    $('#qu-steep01>.btnOptionC').click(function () {
        $('[name=Have_In_Savings__c]').val("$20,000 Or more");

    });

   

});