
jQuery( document ).ready( function( $ ) {

    $("#MainMiddle2ImagesLeftImageDiv").mouseover(function(){
        $("#MainMiddle2ImagesLeftImageLabelDesktopDiv").css("display", "flex");
    });

    $("#MainMiddle2ImagesLeftImageDiv").mouseleave(function(){
        $("#MainMiddle2ImagesLeftImageLabelDesktopDiv").css("display", "none");
    });

    $("#MainMiddle2ImagesMiddleImageDiv").mouseover(function(){
        $("#MainMiddle2ImagesMiddleImageLabelDesktopDiv").css("display", "flex");
    });

    $("#MainMiddle2ImagesMiddleImageDiv").mouseleave(function(){
        $("#MainMiddle2ImagesMiddleImageLabelDesktopDiv").css("display", "none");
    });

    $("#MainMiddle2ImagesRightImageDiv").mouseover(function(){
        $("#MainMiddle2ImagesRightImageLabelDesktopDiv").css("display", "flex");
    });

    $("#MainMiddle2ImagesRightImageDiv").mouseleave(function(){
        $("#MainMiddle2ImagesRightImageLabelDesktopDiv").css("display", "none");
    });

    var testimonials = [
        {
            Name: "Carlos Morales",
            CSS: "MainMiddle4GalleryPerson2Div",
            Testimonial: "I'm an Orthopedic surgeon from Upstate New York now living and working in Toronto. I got my work Permit through UIS Canada who was very professional and trustworthy. They have simplified the immigration process that I was able to continue working regularly until my permit arrived.",
            Position: "1"
        },
        {
            Name: "Jan Coetzee",
            CSS: "MainMiddle4GalleryPerson3Div",
            Testimonial: "I'm a young software engineer from Cape Town, South Africa now happily living and working in Vancouver. I received my work permit through Express Entry Visa – Young professionals category, and was amazed at how many great companies wanted me to come work for them. My future has never looked brighter!",
            Position: "2"
        },
        {
            Name: "Edward O’Neill",
            CSS: "",
            Testimonial: "I’m an account manager from Dublin, Ireland. I’m now happily living in Toronto, Canada. I received my work permit through Express Entry Visa – Young professionals category, and was amazed at how many great companies wanted me to come work for them. My future has never looked brighter!",
            Position: "3"
        },
        {
            Name: "Robert Du Plessis",
            CSS: "MainMiddle4GalleryPerson4Div",
            Testimonial: "I'm Robert Du Plessis, an entrepreneur originally from Orania, South Africa. My wife and I started our Property Management company in Vancouver using Entrepreneur Visa Program. UIS Canada have been very helpful not only with the visa application but also with providing us with vital instructions on how to apply for tax break for our business.",
            Position: "4"
        }
    ];

    $("#MainMiddle4GalleryRightArrowDiv").click(function () {
        var PersonName = $("#MainMiddle4PersonNameDiv").text();

        switch (PersonName) {
            case "Edward O’Neill":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[0].CSS);
                $("#MainMiddle4PersonNameDiv").text(testimonials[0].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[0].Testimonial);
                break;

            case "Carlos Morales":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[1].CSS);
                $("#MainMiddle4PersonNameDiv").text(testimonials[1].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[1].Testimonial);
                break;

            case "Jan Coetzee":
            $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
            $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[3].CSS);
            $("#MainMiddle4PersonNameDiv").text(testimonials[3].Name);
            $("#MainMiddle4PersonTextDiv").text(testimonials[3].Testimonial);
            break;

            case "Robert Du Plessis":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4PersonNameDiv").text(testimonials[2].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[2].Testimonial);
            break;


            default:
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4PersonNameDiv").text(testimonials[2].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[2].Testimonial);


        }
    });

    $("#MainMiddle4GalleryLeftArrowDiv").click(function () {
        var PersonName = $("#MainMiddle4PersonNameDiv").text();

        switch (PersonName) {
            case "Edward O’Neill":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[3].CSS);
                $("#MainMiddle4PersonNameDiv").text(testimonials[3].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[3].Testimonial);
                break;

            case "Jan Coetzee":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[0].CSS);
                $("#MainMiddle4PersonNameDiv").text(testimonials[0].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[0].Testimonial);
                break;

            case "Carlos Morales":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[2].CSS);
                $("#MainMiddle4PersonNameDiv").text(testimonials[2].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[2].Testimonial);
                break;

            case "Robert Du Plessis":
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4GalleryPersonDiv").addClass(testimonials[1].CSS);
                $("#MainMiddle4PersonNameDiv").text(testimonials[1].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[1].Testimonial);
                break;

            default:
                $("#MainMiddle4GalleryPersonDiv").removeAttr("class");
                $("#MainMiddle4PersonNameDiv").text(testimonials[2].Name);
                $("#MainMiddle4PersonTextDiv").text(testimonials[2].Testimonial);


        }
    });

    $(document).on('scroll', function() {
        if($(this).scrollTop()>=$('#CheckScroll').position().top){
            $("#HeaderMobile").addClass("HeaderMobile-Scrolling");
        }
        else {
            $("#HeaderMobile").removeClass("HeaderMobile-Scrolling");
        }
    })


    setTimeout(function(){
        $("#LogoDiv").slideDown();
    }, 2000);



} );

