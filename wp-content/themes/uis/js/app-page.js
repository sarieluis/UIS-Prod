jQuery(document).ready(function($) {

    // window.addEventListener("beforeunload", function (e) {
    //     var formSubmitting = parseInt($('.tab-content_active form [name=tab-confirmation]').val());
    //     formSubmitting = formSubmitting === 0 ? false : true;
    //
    //     if (formSubmitting) {
    //         return false;
    //     }
    //     $('.popup-overlay').show();
    //     (e || window.event).returnValue = true;
    //     return true;
    // });

    $('.popup-overlay a').on('click', function (e) {
        e.preventDefault();

        if($(this).data('type') !== 'cancel') {
            $('.tab-content_active form [name=tab-confirmation]').val(1);
        }
        if($(this).data('type') === 'yes') {
            $('.tab-content_active form [name=tab-confirmation]').val(1);
            $('.tab-content_active form [name=need-validation]').val(0);
            $('.tab-content_active form .next-tab-btn').trigger('click');
        }
        $('.popup-overlay').hide();
    });

    $( ".datepicker" ).datepicker({ dateFormat: 'dd / mm / yy' });

    $('.file_upload').on('click' , function() {

        var wrapper = $(this),
            inp = wrapper.find( "input" ),
            btn = wrapper.find( ".button" ),
            lbl = wrapper.find( "mark" );

        // Crutches for the :focus style:
        inp.focus(function(){
            wrapper.addClass( "focus" );
        }).blur(function(){
            wrapper.removeClass( "focus" );
        });

        var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

        inp.change(function(){
            var file_name;
            var files = inp[ 0 ].files;

            if( file_api && inp[ 0 ].files[ 0 ] )
                file_name = inp[ 0 ].files[ 0 ].name;
            else
                file_name = inp.val().replace( "C:\\fakepath\\", '' );


            if( ! file_name.length )
                return;

            if( lbl.is( ":visible" ) ){
                lbl.text( file_name );
                btn.text( "Choose file" );
            }else
                btn.text( file_name );

            var FR= new FileReader();

            var $this = this;
            FR.addEventListener("load", function(e) {
                $('[name='+inp.attr('name')+'-file]').val(e.target.result);
            });

            if ( this.files[0] )
              FR.readAsDataURL( this.files[0] );

        }).change();
    });

    $('select').selectric();





    $('.next-tab-btn').on('click', function (e) {
        e.preventDefault();

        $( '.next-tab-btn' ).addClass( 'btn-loader' );
        $( '.next-tab-btn' ).addClass( 'green' );

        var form = $(this).closest('form');
        var url = $(form).attr('action');

        // console.log(form_data);
        var formdata = form.serializeArray();
        var data = {};

        $(formdata ).each(function(index, obj){

            data[obj.name] = obj.value;
        });

        $(form).find('.hidden-file').each(function (index, obj) {
            data[$(obj).attr('name')] = $(obj).val();
        });


        $.post(url, data, function (data) {
          $( '.next-tab-btn' ).removeClass( 'btn-loader' );
          $( '.next-tab-btn' ).removeClass( 'green' );
          if(data.result){

                var current_tab = $(form).closest('.tab-content').data('tab');

                if(current_tab !== 'equal-6') {
                    $(form).closest('.tab-content').removeClass('tab-content_active').next().addClass('tab-content_active');
                    $('.tabs-header [data-tab=' + current_tab + ']').removeClass('tab-toggle_active').next().addClass('tab-toggle_active');

                    $("html, body").animate({ scrollTop: 200 }, "fast");
                }

            } else {
                if( data.errors !== undefined ) {

                    $(form).find('.app-col').each(function () {
                        $(this).removeClass('has-error');
                    });

                    $.each(data.errors, function (i, item) {
                        $(form).find('[name="'+ i +'"]').closest('.app-col').find('.error-message').remove();
                        $('<p class="error-message"></p>').insertAfter($(form).find('[name="'+ i +'"]'));
                        $(form).find('[name="'+ i +'"]').closest('.app-col').addClass('has-error').find('.error-message').text(item);
                    });
                }
            }
        });

    });





  $('#app-footer-btn').on('click', function (e) {
    e.preventDefault();

    $( '#app-footer-btn' ).addClass( 'btn-loader' );
    $( '#app-footer-btn' ).addClass( 'green' );

    var $currentTab = $('.tab-toggle_active').data( 'tab' );

    var form = $( '.tab-content_active' ).find( 'form' );
    var url = $(form).attr('action');

    // console.log(form_data);
    var formdata = form.serializeArray();
    var data = {};

    $(formdata ).each(function(index, obj){

      data[obj.name] = obj.value;
    });

    $(form).find('.hidden-file').each(function (index, obj) {
      data[$(obj).attr('name')] = $(obj).val();
    });


    $.post(url, data, function (data) {
      $( '#app-footer-btn' ).removeClass( 'btn-loader' );
      $( '#app-footer-btn' ).removeClass( 'green' );
      if(data.result){

      } else {

        if( data.errors !== undefined ) {

          $(form).find('.app-col').each(function () {
            $(this).removeClass('has-error');
          });

          $.each(data.errors, function (i, item) {
            $(form).find('[name="'+ i +'"]').closest('.app-col').find('.error-message').remove();
            $('<p class="error-message"></p>').insertAfter($(form).find('[name="'+ i +'"]'));
            $(form).find('[name="'+ i +'"]').closest('.app-col').addClass('has-error').find('.error-message').text(item);
          });
        }
      }
    });

  });





  $('input, input').on('change, blur, keyup', function () {
        $(this).closest('.app-col').removeClass('has-error');
    });

    $('[name=jobsCount]').on('change', function (e) {

        var changeToCurrent = $(this).val();

        $('.job-description .app-row').show().each(function (i) {
            if(i >= changeToCurrent) {
                $(this).hide();
            }
        });

    });

    $('[name=jobsSpouseCount]').on('change', function (e) {

        var changeToCurrent = $(this).val();

        $('.job-description-spouse .app-row').show().each(function (i) {
            if(i >= changeToCurrent) {
                $(this).hide();
            }
        });

    });

    $('[name=children]').on('change', function (e) {

        var changeToCurrent = $(this).val();

        $('.depends-holder .app-row').show().each(function (i) {
            if(i >= changeToCurrent) {
                $(this).hide();
            }
        });

    });




    $( '[name=the_case]' ).on( 'change',  function (e) {

      var $case_type = $(this).val();
      var $location = $(location).attr('href');
      var newUrl = "";

      if ( $case_type == 'Primary' ) {

        var index = $location.indexOf('?');

        if ( index != -1 ) {

          newUrl = $location.substring( 0, index );
          location.href =  newUrl;
        }

      } else {

        newUrl = $location + "?case=spouse";
        location.href = newUrl;
      }

    } )



    $("input[name=adaptability-1]:radio").click(function () {
        if ($('input[name=adaptability-1]:checked').val() == "Yes") {
            $("#describeCanadianJonExp").show(500);

        } else if ($('input[name=adaptability-1]:checked').val() == "No") {
            $("#describeCanadianJonExp").hide(500);

        }

    });

    if ($('input[name=adaptability-1]:checked').val() == "No") {
        $("#describeCanadianJonExp").hide();

    }
    else if ($('input[name=adaptability-1]:checked').val() == "Yes") {
        $("#describeCanadianJonExp").show();
    }

    $("input[name=adaptability-2]:radio").click(function () {
        if ($('input[name=adaptability-2]:checked').val() == "Yes") {
            $("#TotalYearsAcademic").show(500);
            $("#TypeOfStudies").show(500);

        } else if ($('input[name=adaptability-2]:checked').val() == "No") {
            $("#TotalYearsAcademic").hide(500);
            $("#TypeOfStudies").hide(500);

        }

    });

    if ($('input[name=adaptability-2]:checked').val() == "No") {
        $("#TotalYearsAcademic").hide();
        $("#TypeOfStudies").hide();

    }
    else if ($('input[name=adaptability-2]:checked').val() == "Yes") {
        $("#TotalYearsAcademic").show();
        $("#TypeOfStudies").show();
    }


});