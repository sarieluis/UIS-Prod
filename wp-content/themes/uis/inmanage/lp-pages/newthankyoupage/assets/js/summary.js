
jQuery( document ).ready( function( $ ) {

    $( 'select#CountryInput' ).on( 'change', function () {
        var country = $(this).val();
        if ( country == 'US' ) {
            $( '#State' ).show();
        } else {
            $( '#State' ).hide();
            $('select#StateInput').val('');
        }
    } );

    <!-- Real-time Validation -->
    $('#AddressLine1Input').on('input', function(e) {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}

        var valueChanged = false;

        if (e.type=='propertychange') {
            valueChanged = e.originalEvent.propertyName=='value';
        } else {
            valueChanged = true;
        }
        if (valueChanged) {
            $("#errorAddress1").removeClass("error_show");
            $("#errorAddress1").addClass("error");
        }

    });

    $('#CityInput').on('input', function(e) {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}

        if (e.type=='propertychange') {
            valueChanged = e.originalEvent.propertyName=='value';
        } else {
            valueChanged = true;
        }
        if (valueChanged) {
            $("#errorCity").removeClass("error_show");
            $("#errorCity").addClass("error");
        }
    });

    $('#ZipCodeInput').on('input', function(e) {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}

        if (e.type=='propertychange') {
            valueChanged = e.originalEvent.propertyName=='value';
        } else {
            valueChanged = true;
        }
        if (valueChanged) {
            $("#errorZipCode").removeClass("error_show");
            $("#errorZipCode").addClass("error");
        }
    });

    $("#SubmitBtn").click(function(event){

        $( '#SubmitBtn' ).addClass( 'btn-loader' );
        $( '#SubmitBtn' ).addClass( 'green' );

        setTimeout(
            function()
            {
                var form_data=$("#addressForm").serializeArray();
                var error_free=true;
                for (var input in form_data){
                    var element=$("#AddressLine1Input");
                    //var element=$("#"+form_data[input]['name']+"Input");
                    var valid=element.hasClass("valid");
                    var error_element= $("#errorAddress1", element.parent());
                    if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;
                        $( '#SubmitBtn' ).removeClass( 'btn-loader' );
                        $( '#SubmitBtn' ).removeClass( 'green' );
                    }
                    else{error_element.removeClass("error_show").addClass("error");}
                }
                for (var input in form_data){
                    var element=$("#CityInput");
                    var valid=element.hasClass("valid");
                    var error_element=$("div", element.parent());
                    if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;
                        $( '#SubmitBtn' ).removeClass( 'btn-loader' );
                        $( '#SubmitBtn' ).removeClass( 'green' );}
                    else{error_element.removeClass("error_show").addClass("error");}
                }
                for (var input in form_data){
                    var element=$("#ZipCodeInput");
                    var valid=element.hasClass("valid");
                    var error_element=$("div", element.parent());
                    if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;
                        $( '#SubmitBtn' ).removeClass( 'btn-loader' );
                        $( '#SubmitBtn' ).removeClass( 'green' );}
                    else{error_element.removeClass("error_show").addClass("error");}
                }

                if (!error_free){
                    event.preventDefault();
                }
                else{

                    event.preventDefault();

                    var AddressLine1Input = $( 'input#AddressLine1Input' ).val();
                    var AddressLine2Input = $( 'input#AddressLine2Input' ).val();
                    var CityInput         = $( 'input#CityInput' ).val();
                    var StateInput        = $( 'select#StateInput option:selected' ).text();
                    var ZipCode           = $( 'input#ZipCodeInput' ).val();
                    var CountryInput      = $( 'select#CountryInput' ).val();
                    var AccounId          = $( 'input[name=accountId]' ).val();
                    var PaymentId         = $( 'input[name=paymentId]' ).val();
                    var orderId           = $( 'input[name=orderId]' ).val();
                    var orderPrivateId    = $( 'input[name=orderPrivateId]' ).val();
                    var ajax_url          = $( 'input[name=ajax_url]' ).val();
                    var data = {
                        'action': 'sf_update_address_data',
                        'address1'  : AddressLine1Input,
                        'address2'  : AddressLine2Input,
                        'city'      : CityInput,
                        'state'     : StateInput,
                        'zip'       : ZipCode,
                        'country'   : CountryInput,
                        'AccounId'  : AccounId,
                        'PaymentId' : PaymentId,
                        'order' : orderId,
                        'orderPrivate' : orderPrivateId
                    };
                    console.log( data );
                    $.ajax( {
                        url: ajax_url,
                        type: 'post',
                        method: 'post',
                        data: data,
                        success: function (response) {
                            console.log( response );
                            var parsedRes = JSON.parse( response );

                            if ( parsedRes.product_purchased && parsedRes.product_purchased === 'eBook' ) {
                                $( '#loginForm' ).hide();
                                $( '#ebookLink' ).find( 'a' ).attr('href', parsedRes.product_url);
                            } else {
                                $( '#ebookLink' ).hide();
                            }
                            $("#MainLeftFormDiv").hide(1500);
                            $("#MainLeftTitleDiv").hide(1500);
                            $("#PurchaseDetails").show(1500);

                            $(window).scrollTop(0);
                        }
                    });
                }

            }, 2000);


    });
} );