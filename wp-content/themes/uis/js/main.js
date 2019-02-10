jQuery(document).ready(function($) {

    /**
     * ****************************************************************
     *
     *  Description: Country field auto fill after choosing phone code.
     *
     * ****************************************************************
     */
    $( '.phone-code-select' ).on( 'change', function() {

        var dial_code = $( this ).val();

        $( '.phone-code-flag' ).removeClass (function (index, className) {
            return (className.match (/(^|\s)flag-\S+/g) || []).join(' ');
        });

        $.getJSON( "/phone-codes.json", function( data ){
            var countries = data;

            var result = $.grep(countries, function(e, i){
                return e.dial_code == dial_code;
            });

            $( '.phone-code-flag' ).addClass( 'flag-' +(result[0].code).toLowerCase() );


            /*
            $('.register_form [name="country"]').val(result[0].name);
            $('.register_form_lp [name="country"]').val(result[0].name);
            $('.register_form_lp_yp [name="country"]').val(result[0].name);
            */
        });
    } );


    /**
     * ****************************************************************
     *  AutoComplete: Country field
     *
     *  Description: Country field autocomplete, while typing
     *  Lib used: jQuery easyAutocomplete
     * ****************************************************************
     */
    var EACCountries = $(".country-select").easyAutocomplete({
        url: "/phone-codes.json",
        getValue: "name",
        list: {
            match: {
                enabled: true
            },
            maxNumberOfElements: 8
        },
        template: {
            type: "custom",
            method: function(value, item) {
                return "<span class='flag flag-" + (item.code).toLowerCase() + "' ></span>" + value;
            }
        },
        theme: "square"
    });


    /**
     * ****************************************************************
     *  AutoComplete: Phone code field
     *
     *  Description: Phone code field autocomplete, while typing
     *  Lib used: jQuery easyAutocomplete
     * ****************************************************************
     */
    $(".phone-code-select").easyAutocomplete({
        url: "/phone-codes.json",
        getValue: "dial_code",
        list: {
            match: {
                enabled: true,
                method : function(element, phrase) {

                    return element.indexOf(phrase) !== -1;
                }
            },
            maxNumberOfElements: 5
        },
        template: {
            type: "custom",
            method: function(value, item) {

                $( 'span.phone-code-flag' ).removeClass (function (index, className) {
                    return (className.match (/(^|\s)flag-\S+/g) || []).join(' ');
                });
                $( 'span.phone-code-flag' ).addClass( 'flag-' +(item.code).toLowerCase() );
                return "<span class='flag flag-" + (item.code).toLowerCase() + "' ></span>" + value;
            }
        },
        theme: "square"
    });


    $( 'form' ).on( 'keyup keypress', 'input.country-select', function ( e ) {

        var countryInput = $( this );
        var keyCode = e.keyCode;

        if ( keyCode == 13 ) {
            e.preventDefault();
            e.stopPropagation();
        }

        setTimeout( function () {

            var countriesList = countryInput.next().find( 'ul' );
            var countriesListItems = countriesList.find( 'li' );

            if ( countriesListItems.length == 1 ) {
                countriesListItems.addClass('selected');

                if ( keyCode == 13 ) {
                    var value = countriesListItems.text();
                    $(countryInput).val(value).trigger("change");
                    countriesList.hide();
                }

            }

        }, 250 );
    } );


    $.get("https://ipinfo.io?token=ba85d6e5b0bfe3", function (response) {

        var countries = [];

        if ( ! response.country ) {

            $('.register_form [name="country"]').remove();
            $('.register_form_lp [name="country"]').remove();
            $('.register_form_lp_yp [name="country"]').remove();

            var $selectbox = "";
            $selectbox += "<select class='form-text' name='country' placeholder='Choose country' required></select>";
            $( '#country-field' ).prepend( $selectbox );

            $.getJSON( "/countries.json", function( data ){
                countries = data;

                var $options = '';

                for ( var i=0; i<coun0tries.length; i++ ) {
                    $options += "<option value='"+countries[i].name+"'>"+countries[i].name+"</option>";
                }

                $( '#country-field select' ).prepend( $options );
            });

        } else {

            $.getJSON( "/countries.json", function( data ){
                countries = data;

                var result = $.grep(countries, function(e, i){
                    return e.code == response.country;
                });

                //console.log(response);


                $('.register_form [name="country"]').val(result[0].name);
                $('.register_form_lp [name="country"]').val(result[0].name);
                $('.register_form_lp_yp [name="country"]').val(result[0].name);

                $('#region').val(response.region);

                /*$('.register_form [name="ip_country"]').val(result[0].name);
                $('.register_form_lp [name="ip_country"]').val(result[0].name);
                $('.register_form_lp_yp [name="ip_country"]').val(result[0].name);*/
            });

            $.getJSON( "/phone-codes.json", function ( data ) {

                countries = data;
                var result = $.grep( countries, function ( e, i ) {
                    return e.code == response.country;
                } );

                //console.log(countries);

                //console.log(result);


                $( '.auto-phone-code' ).val( result[0].dial_code );
                $( 'span.phone-code-flag' ).removeClass (function (index, className) {
                    return (className.match (/(^|\s)flag-\S+/g) || []).join(' ');
                });
                $( 'span.phone-code-flag' ).addClass( 'flag-' +(result[0].code).toLowerCase() );

                $( '#userCountry' ).val( result[0].dial_code );
                $( '#userCountry' ).removeClass (function (index, className) {
                    return (className.match (/(^|\s)flag-\S+/g) || []).join(' ');
                });
                $( '#userCountry' ).addClass( 'downFlag-' +(result[0].code).toLowerCase() );




            } );


        }

    }, "jsonp");






    $('.register_form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = $(form).attr('action');
        $.post(url, {
            // "first_name": $( form ).find('[name=first_name]').val(),
            // "last_name": $( form ).find('[name=last_name]').val(),
            "full_name": $( form ).find('[name=full_name]').val(),
            "email": $(form).find('[name=email]').val(),
            "phone": $(form).find('[name=phone]').val(),
            "phone_code": $(form).find('[name=phone_code]').val(),
            "country": $(form).find('[name=country]').val(),
            "confirmation": $(form).find('[name=confirmation]').is(':checked') ? 'on' : '',
            "lp_url": $( form ).find( '[name=lp_url]' ).val(),
            "utm_campaign": $(form).find('[name=utm_campaign]').val(),
            "action": $(form).find('[name=action]').val(),
            "_wpnonce": $(form).find('[name=_wpnonce]').val()
        }, function (data) {
            // dataObj = JSON.parse(data);
            if(data.result){

                // $(form).html('');
                // $('.form-wrap').append('<p class="form-title">' + data.message + '</p>');
                console.log( data.result );
                location.href = '/thank-you';

            } else {
                if( data.errors !== undefined ) {
                    $.each(data.errors, function (i, item) {
                        $(form).find('[name='+ i +']').closest('.form-group').addClass('has-error').find('.error-message').text(item);
                    });
                }
            }
        });

    });






    $('.register_form_lp').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = $(form).attr('action');
        var thankyou_url = $( form ).find('[name=thankyou_url]').val();

        var postData = {
            // "first_name": $( form ).find('[name=first_name]').val(),
            // "last_name": $( form ).find('[name=last_name]').val(),
            "full_name": $( form ).find('[name=full_name]').val(),
            "confirmation": $(form).find('[name=confirmation]').is(':checked') ? 'on' : '',
            "thankyou_url": thankyou_url,
            "lp_ref_url": $( form ).find( '[name=lp_ref_url]' ).val(),
            "lp_url": $( form ).find( '[name=lp_url]' ).val(),
            "utm_campaign": $(form).find('[name=utm_campaign]').val(),
            "email": $(form).find('[name=email]').val(),
            "phone": $(form).find('[name=phone]').val(),
            "phone_code": $(form).find('[name=phone_code]').val(),
            "country": $(form).find('[name=country]').val(),
            "action": $(form).find('[name=action]').val(),
            "_wpnonce": $(form).find('[name=_wpnonce]').val()
        };

        $.post(url, postData, function (data) {
            // var dataObj = JSON.parse(data);
            // console.log(data);
            // console.log(dataObj);
            if(data.result){
                // console.log( data.result );
                location.href = thankyou_url;
            } else {
                if( data.errors !== undefined ) {
                    $.each(data.errors, function (i, item) {
                        $(form).find('[name='+ i +']').closest('.header-form-line').addClass('has-error').find('.error-message').text(item);
                    });
                }
            }
        });

    });







    // Young Professionals Form
    $('.register_form_lp_yp').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = $(form).attr('action');
        var thankyou_url = $( form ).find('[name=thankyou_url]').val();

        var postData = {
            // "first_name": $( form ).find('[name=first_name]').val(),
            // "last_name": $( form ).find('[name=last_name]').val(),
            "full_name": $( form ).find('[name=full_name]').val(),
            "confirmation": 'on',
            "thankyou_url": thankyou_url,
            "lp_ref_url": $( form ).find( '[name=lp_ref_url]' ).val(),
            "lp_url": $( form ).find( '[name=lp_url]' ).val(),
            "email": $(form).find('[name=email]').val(),
            "phone": $(form).find('[name=phone]').val(),
            "phone_code": $(form).find('[name=phone_code]').val(),
            /*"country": $(form).find('[name=country]').val(),*/
            "country": $(form).find('[name=country]').val() != '' ? $(form).find('[name=country]').val() : 'Israel',
            "action": $(form).find('[name=action]').val(),
            "utm_campaign": $(form).find('[name=utm_campaign]').val(),
            "_wpnonce": $(form).find('[name=_wpnonce]').val(),
            /*"Have_High_School_Diploma__c": $(form).find('[name=Have_High_School_Diploma__c]').val(),*/
            "Level_of_English__c": $(form).find('[name=Level_of_English__c]').val(),
            "Work_Experience_of_2_yrs__c": $(form).find('[name=Work_Experience_of_2_yrs__c]').val(),
            "Monthly_Income_over_1500__c": $(form).find('[name=Monthly_Income_over_1500__c]').val(),
            "Visa_needed_in__c": $(form).find('[name=Visa_needed_in__c]').val(),
            "Average_Monthly_Income__c": $(form).find('[name=Average_Monthly_Income__c]').val(),
            "Have_In_Savings__c": $(form).find('[name=Have_In_Savings__c]').val(),
            "GCLID__c": $(form).find('[name=GCLID__c]').val(),
            "Would_like_to_be_contacted_between__c": $(form).find('[name=Would_like_to_be_contacted_between__c]').val(),
            "Region__c": $(form).find('[name=region]').val(),
            "minimum_funds_to_open_a_business__c": $(form).find('[name=minimum_funds_to_open_a_business__c]').val(),
            "management_experience__c": $(form).find('[name=management_experience__c]').val()
        };

        $.post(url, postData, function (data) {

            if(data.result){
                location.href = thankyou_url;
            } else {
                if( data.errors !== undefined ) {
                    $.each(data.errors, function (i, item) {
                        $(form).find('[name='+ i +']').closest('.header-form-line').addClass('has-error').find('.error-message').text(item);
                    });
                }
            }

        });
        //location.href = thankyou_url;
    });





    /**
     *
     */
    $('.login_form').on('submit', function (e) {
        e.preventDefault();

        $( '#login-form-btn' ).addClass( 'btn-loader' );
        $( '#login-form-btn' ).addClass( 'red' );

        var form = $(this);
        var url = $(form).attr('action');

        $.post(url, {
            "username": $(form).find('[name=username]').val(),
            "password": $(form).find('[name=password]').val(),
            "action": $(form).find('[name=action]').val(),
            "_wpnonce": $(form).find('[name=_wpnonce]').val()

        }, function (data) {

            $( '#login-form-btn' ).removeClass( 'btn-loader' );
            $( '#login-form-btn' ).removeClass( 'red' );
            if(data.result){
                location.href = data.redirect_url;
            } else {
                if( data.errors !== undefined ) {
                    $.each(data.errors, function (i, item) {
                        $(form).find('[name='+ i +']').closest('.form-group').addClass('has-error').find('.error-message').text(item);
                    });
                }
            }
        });

    });





    $('.register_form input, .login_form input').on('change, blur, keyup', function () {
        $(this).parent().removeClass('has-error');
    });






    $('.express .express-actions .btn, .seo .btn').on('click', function (e) {
        e.preventDefault();

        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });





    /**
     * PhoneNumber validation
     *
     * @param phoneNumber
     * @returns {boolean}
     */
    function validatePhoneNumber ( phoneNumber ) {

        var phoneRegex = /\d{7,10}/;
        var testResult = phoneRegex.test( phoneNumber );
        return testResult;
    }



    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };




});