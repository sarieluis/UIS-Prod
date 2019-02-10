//var qs = (function (a) {
//    if (a == "") return {};
//    var b = {};
//    for (var i = 0; i < a.length; ++i) {
//        var p = a[i].split('=', 2);
//        if (p.length == 1)
//            b[p[0]] = "";
//        else
//            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
//    }
//    return b;
//})(window.location.search.substr(1).split('&'));

//qs["utm_af"];    // 123
//qs["name"];     // query string
//qs["nothere"];

//console.log(qs["utm_af"]);

//var affiliate = document.getElementById('affiliate');
//affiliate.value = qs["utm_af"];


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd
}

if (mm < 10) {
    mm = '0' + mm
}

today = mm + '.' + dd + '.' + yyyy;
//document.write(today);
//document.getElementById("MainRightDivDateTitile").innerHTML = today;


//Video


var mainImgVideo = '../images/ArticileImage.jpg';
var oneImgVideo = '../images/SmallVideoUnitImage.jpg';
var twoImgVideo = '../images/MainLeftTopImage.jpg';
var threeImgVideo = '../images/MainLeftBottomImage.jpg';

var mainImgNow = '../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'

/*function ChangeAndPlayVideo(spot){

    if (spot == '1'){
        var img = document.getElementById('MainLeftBottomSmallVideoImageDivOne');
        style = img.currentStyle || window.getComputedStyle(img, false),
            imgBack = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        img.style.backgroundImage = 'url('+ mainImgNow +')';

        mainImgNow = imgBack;

        var video = document.getElementById('myVideo');

        if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage.jpg'){

            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage2.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4'
            video.play();
        }
    } else if (spot == '2'){
        var img = document.getElementById('MainLeftBottomSmallVideoImageDivTwo');
        style = img.currentStyle || window.getComputedStyle(img, false),
            imgBack = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        img.style.backgroundImage = 'url('+ mainImgNow +')';

        mainImgNow = imgBack;


        var video = document.getElementById('myVideo');

        if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage.jpg'){

            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage2.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4'
            video.play();
        }
    } else if (spot == '3'){

        var img = document.getElementById('MainLeftBottomSmallVideoImageDivThree');
        style = img.currentStyle || window.getComputedStyle(img, false),
            imgBack = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        img.style.backgroundImage = 'url('+ mainImgNow +')';

        mainImgNow = imgBack;


        var video = document.getElementById('myVideo');

        if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage.jpg'){

            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage2.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4'
            video.play();
        }

    }
}*/

/*function ChangeAndPlayMobileVideo(spot){

    if (spot == '1'){
        var img = document.getElementById('MainMobileBottomVideoImageDivOne');
        style = img.currentStyle || window.getComputedStyle(img, false),
            imgBack = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        img.style.backgroundImage = 'url('+ mainImgNow +')';

        mainImgNow = imgBack;

        var video = document.getElementById('myVideoMobile');

        if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage.jpg'){

            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage2.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4'
            video.play();
        }
    } else if (spot == '2'){
        var img = document.getElementById('MainMobileBottomVideoImageDivTwo');
        style = img.currentStyle || window.getComputedStyle(img, false),
            imgBack = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        img.style.backgroundImage = 'url('+ mainImgNow +')';

        mainImgNow = imgBack;


        var video = document.getElementById('myVideoMobile');

        if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage.jpg'){

            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage2.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4'
            video.play();
        }
    } else if (spot == '3'){

        var img = document.getElementById('MainMobileBottomVideoImageDivThree');
        style = img.currentStyle || window.getComputedStyle(img, false),
            imgBack = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        img.style.backgroundImage = 'url('+ mainImgNow +')';

        mainImgNow = imgBack;


        var video = document.getElementById('myVideoMobile');

        if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage.jpg'){

            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage2.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4'
            video.play();
        }
        else if (imgBack == 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoImage.jpg'){
            video.src = 'https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4'
            video.play();
        }

    }
}*/

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

var articles = [
    {
        Title : "CANADA IS BUSTLING",
        SubTitle : "From Vancouver to Montreal, opportunity is screaming out to you at the top of its lungs.",
        Label : "Jobs",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Bustling/Main_Bustling_Image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Bustling/Bustling_Recent_Image.jpg",
        Url: "https://www.uiscanada.com/canadanews/bustling/?utm_campaign=blog_bustling",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Bustling/Bustling_RightBlock_Image.jpg"
    },
    {
        Title : "CANADA NURTURES IMMIGRANT SUCCESS",
        SubTitle : "Perhaps the best known name of those who immigrated to Canada before making their mark ",
        Label : "News",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Musk/Musk_Main_Image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Musk/Musk_Recent_Image.jpg",
        Url: "https://www.uiscanada.com/canadanews/musk/?utm_campaign=blog_musk",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Musk/Musk_RightBlock_Image.jpg"
    },
    {
        Title : "Everything an Immigrant needs to know about the Canadian Educational System",
        SubTitle : "Did you know that over 30% of Canada's school children are either immigrants themselves or have at least one parent that was born abroad? ",
        Label : "Education",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/EducationalGuide/Educational_Guide_Main_Image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/EducationalGuide/Educational_Guide_Recent_Image.jpg",
        Url: "https://www.uiscanada.com/canadanews/educationalguide/?utm_campaign=blog_educationalguide",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/EducationalGuide/Educational_Guide_Recent_Image.jpg"
    },
    {
        Title : "CANADA TO WELCOME IMMIGRANTS WITH OPEN ARMS",
        SubTitle : "The Canadian government under the Prime Minister Justin Trudeau opened its gates to immigrants like no other previous administration.",
        Label : "News",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/OpenArms/Open_Arms_Main_Image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/OpenArms/Open_Arms_Recent_Image.jpg",
        Url: "https://www.uiscanada.com/canadanews/openarms/?utm_campaign=blog_openarms",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/OpenArms/OpenArms_RightBlock_Image.jpg"
    },
    {
        Title : "Top 5 Cities for Immigrants in Canada",
        SubTitle : "New to Canada? Canada is one of the most welcoming and diverse countries in the world",
        Label : "City Guide",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/immigrantscities/immigrantscities_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/immigrantscities/immigrantscities_recent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/immigrantscities/?utm_campaign=blog_immigrantscities",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/immigrantscities/immigrantscities_rightblock_image.jpg"
    },
    {
        Title : "10 Most Exciting Things to do in Canada",
        SubTitle : "From lakes, to mountains, to icebergs, wildlife, and hustling and bustling cities, Canada has everything you could ever want all in one place.",
        Label : "Travel",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/excitingthings/excitingthings_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/excitingthings/excitingthings_recent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/excitingthings/?utm_campaign=blog_excitingthings",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/excitingthings/excitingthings_rightblock_image.jpg"
    },
    {
        Title : "Canadian Book of Rights for Immigrants",
        SubTitle : "Look at some of these benefits that increase the attraction to Canada all the more",
        Label : "News",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/bookofrights/bookofrights_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/bookofrights/bookofrights_redent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/bookofrights/?utm_campaign=blog_bookofrights",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/bookofrights/bookofrights_rightblock_image.jpg"
    },
    {
        Title : "Immigrant Preferred Profile Canadian Government",
        SubTitle : "In most cases, priority is put on individuals who have “the skills and experience required to meet Canada’s economic needs”.",
        Label : "News",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/immigrantprofile/immigrantprofile_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/immigrantprofile/immigrantprofile_recent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/immigrantprofile/?utm_campaign=blog_immigrantprofile",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/immigrantprofile/immigrantprofile_rightblock_image.jpg"
    },
    {
        Title : "Salaries and Wages by Profession in Canada",
        SubTitle : "According to Statistics Canada, the average salary in Canada is on the rise.",
        Label : "Jobs",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Salaries/Salaries_Main_Image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Salaries/Salaries_Recent_Image.jpg",
        Url: "https://www.uiscanada.com/canadanews/salaries/?utm_campaign=blog_salaries",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Salaries/Salaries_RightBlock_Image.jpg"
    },
    {
        Title : "The Costs of Living in Canada",
        SubTitle : "Beautiful scenery, equal opportunities, universal health care - there are many reasons that one might choose Canada as the perfect immigration location",
        Label : "City Guide",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/costofliving/costofliving_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/costofliving/costofliving_recent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/costofliving/?utm_campaign=blog_costofliving",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/costofliving/costofliving_rightblock_image.jpg"
    },
    {
        Title : "How to Look for a Job in Canada",
        SubTitle : "Searching for a job in a new country can be intimidating - especially if you aren't familiar with the process.",
        Label : "Jobs",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/jobsearch/jobsearch_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/jobsearch/jobsearch_recent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/jobsearch/?utm_campaign=blog_jobsearch",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/jobsearch/jobsearch_rightblock_image.jpg"
    },
    {
        Title : "CANADA’S TO ALLOW ONE MILLION NEW IMMIGRANTS",
        SubTitle : "bringing immigration up to one percent of the total population by 2020.",
        Label : "News",
        MainImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/million-immigrants/million-immigrants_main_image.jpg",
        RecentImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/million-immigrants/million-immigrants_recent_image.jpg",
        Url: "https://www.uiscanada.com/canadanews/million-immigrants/?utm_campaign=blog_million-immigrants",
        BlockRightImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/million-immigrants/million-immigrants_rightblock_image.jpg"
    }
];

articles = shuffle(articles);

//console.log(articles);

//Main Article

var mainImageArticle = document.getElementById("MainLeftDivLeft");
var mainArticleTitle = document.getElementById("MainLeftDivLeftTextUnder");
var mainArticleTitleUrl = document.getElementById("MainArticleImageURL");
var mainArticleImageUrl = document.getElementById("MainArticleTitleURL");
var mainArticleLabel = document.getElementById("MainLeftDivLeftText");

mainImageArticle.style.backgroundImage = "url(" + articles[0].MainImage + ")" ;
mainArticleTitle.innerText = articles[0].Title;
mainArticleTitleUrl.href = articles[0].Url;
mainArticleImageUrl.href = articles[0].Url;
mainArticleLabel.innerText = articles[0].Label;

//Second Article

var secondTopImageArticle = document.getElementById("MainLeftDivTopRightImage");
var secondTopArticleSubTitle = document.getElementById("MainLeftDivTopRightImageBottomTextA");
var secondTopArticleSubTitleImageUrl = document.getElementById("TopArticleTopUrl");
var secondTopArticleLabel = document.getElementById("MainLeftDivTopRightImageText");

secondTopImageArticle.style.backgroundImage = "url(" + articles[1].MainImage + ")";
secondTopArticleSubTitle.innerText = articles[1].SubTitle;
secondTopArticleSubTitle.href = articles[1].Url;
secondTopArticleSubTitleImageUrl.href = articles[1].Url;
secondTopArticleLabel.innerText = articles[1].Label;

var secondBottomImageArticle = document.getElementById("MainLeftDivBottomRightImage");
var secondBottomArticleSubTitle = document.getElementById("MainLeftDivBottomRightImageBottomTextA");
var secondBottomArticleImageUrl = document.getElementById("TopArticleBottomUrl");
var secondBottomArticleLabel = document.getElementById("MainLeftDivBottomRightImageText");

secondBottomImageArticle.style.backgroundImage = "url(" + articles[2].MainImage + ")";
secondBottomArticleSubTitle.innerText = articles[2].SubTitle;
secondBottomArticleSubTitle.href =  articles[2].Url;
secondBottomArticleImageUrl.href =  articles[2].Url;
secondBottomArticleLabel.innerText = articles[2].Label;


//Recent

var firstRecentImage = document.getElementById("FirstImageRecent");
var firstRecentTitle = document.getElementById("FirstTitleRecent");
var firstRecentSubTitle = document.getElementById("FirstSubTitleRecent");
var firstRecentUrl = document.getElementById("RecentOneLink");

var secondRecentImage = document.getElementById("SecondImageRecent");
var secontRecentTitle = document.getElementById("SecondTitleRecent");
var secontRecentSubTitle = document.getElementById("SecondSubTitleRecent");
var secondRecentUrl = document.getElementById("RecentTwoLink");

var thirdRecentImage = document.getElementById("ThirdImageRecent");
var thirdRecentTitle = document.getElementById("ThirdTitleRecent");
var thirdRecentSubTitle = document.getElementById("ThirdSubTitleRecent");
var thirdRecentUrl = document.getElementById("RecentThreeLink");

firstRecentImage.style.backgroundImage = "url(" + articles[3].MainImage + ")";
firstRecentTitle.innerText = articles[3].Title;
firstRecentSubTitle.innerText = articles[3].SubTitle;
firstRecentUrl.href = articles[3].Url;

secondRecentImage.style.backgroundImage = "url(" + articles[4].MainImage + ")";
secontRecentTitle.innerText = articles[4].Title;
secontRecentSubTitle.innerText = articles[4].SubTitle;
secondRecentUrl.href = articles[4].Url;

thirdRecentImage.style.backgroundImage = "url(" + articles[5].MainImage + ")";
thirdRecentTitle.innerText = articles[5].Title;
thirdRecentSubTitle.innerText = articles[5].SubTitle;
thirdRecentUrl.href = articles[5].Url;

//Block Right Article

var RightBlockColorLabel = [
    '#47a1d8',
    '#ff0a79',
    '#0a15ff',
    '#78bd02',
    '#bf6002'
];

RightBlockColorLabel = shuffle(RightBlockColorLabel);


var FirstBlockRightArticleImage = document.getElementById("MainRightBottomFirstImageDiv");
var FirstBlockRightArticleText = document.getElementById("MainRightBottomFirstTextDiv");
var FirstBlockRightArticleLabel = document.getElementById("MainRightBottomFirstLabelDiv");
var FirstBlockRightArticleUrl = document.getElementById("FirstBlockRightArticleUrl");

var SecondBlockRightArticleImage = document.getElementById("MainRightBottomSecondImageDiv");
var SecondBlockRightArticleText = document.getElementById("MainRightBottomSecondTextDiv");
var SecondBlockRightArticleLabel = document.getElementById("MainRightBottomSecondLabelDiv");
var SecondBlockRightArticleUrl = document.getElementById("SecondBloackRightArticleUrl");


FirstBlockRightArticleImage.style.backgroundImage = "url(" + articles[6].BlockRightImage + ")";
FirstBlockRightArticleText.innerText = articles[6].Title;
FirstBlockRightArticleLabel.innerText = articles[6].Label;
FirstBlockRightArticleLabel.style.borderColor = RightBlockColorLabel[0];
FirstBlockRightArticleUrl.href = articles[6].Url;

SecondBlockRightArticleImage.style.backgroundImage = "url(" + articles[7].BlockRightImage + ")";
SecondBlockRightArticleText.innerText = articles[7].Title;
SecondBlockRightArticleLabel.innerText = articles[7].Label;
SecondBlockRightArticleLabel.style.borderColor = RightBlockColorLabel[1];
SecondBlockRightArticleUrl.href = articles[7].Url;


//Main Article Mobile

var  mainImageArticleMobile = document.getElementById("MainImageTopMobile");
var mainTitleArticleMobile = document.getElementById("MainMobileMainTopText");
var mainArticleUrl = document.getElementById("MainArticleUrlMobile");
var mainArticleLabelMobile = document.getElementById("MainMobileMainTopTextImage");

mainImageArticleMobile.src = articles[0].MainImage;
mainTitleArticleMobile.innerText = articles[0].Title;
mainArticleUrl.href = articles[0].Url;
mainArticleLabelMobile.innerText = articles[0].Label;

//Second Main Article Mobile

var SecondMainFirstImageArticleMobile = document.getElementById("MainMobileTopBottomTopImage");
var SecondMainFirstLabelArticleMobile = document.getElementById("MainMobileTopBottomTopImageText");
var SecondMainFirstSubTitleArticleMobile = document.getElementById("MainMobileTopBottomTopText");
var SecondMainFirstArticleUrlMobile = document.getElementById("SecondMainArticleFirstUrl");

var SecondMainSecondImageArticleMobile = document.getElementById("MainMobileTopBottomBottomImage");
var SecondMainSecondLabelArticleMobile = document.getElementById("MainMobileTopBottomBottomImageText");
var SecondMainSecondSubTitleArticleMobile = document.getElementById("MainMobileTopBottomBottomText");
var SecondMainSecondArticleUrlMobile = document.getElementById("SecondMainArticleSecondUrl");



SecondMainFirstImageArticleMobile.style.backgroundImage = "url(" + articles[1].MainImage + ")";
SecondMainFirstLabelArticleMobile.innerText = articles[1].Label;
SecondMainFirstSubTitleArticleMobile.innerText = articles[1].SubTitle;
SecondMainFirstArticleUrlMobile.href = articles[1].Url;

SecondMainSecondImageArticleMobile.style.backgroundImage = "url(" + articles[2].MainImage + ")";
SecondMainSecondLabelArticleMobile.innerText = articles[2].Label;
SecondMainSecondSubTitleArticleMobile.innerText = articles[2].SubTitle;
SecondMainSecondArticleUrlMobile.href = articles[2].Url;


//Recent Mobile

var RecentImageFirstMobile = document.getElementById("RecentFirstMobileImage");
var RecentTitleFirstMobile = document.getElementById("RecentFirstMobileTitle");
var RecentSubTitleFirstMobile = document.getElementById("RecentFirstMobileSubTitle");
var RecentUrlFirstMobile = document.getElementById("RecentOneMobileUrl");

var RecentImageSecondMobile = document.getElementById("RecentSecondMobileImage");
var RecentTitleSecondMobile = document.getElementById("RecentSecondMobileTitle");
var RecentSubTitleSecondMobile = document.getElementById("RecentSecondMobileSubTitle");
var RecentUrlSecondMobile = document.getElementById("RecentTwoMobileUrl");

var RecentImageThirdMobile = document.getElementById("RecentThirdMobileImage");
var RecentTitleThirdMobile = document.getElementById("RecentThirdMobileTitle");
var RecentSubTitleThirdMobile = document.getElementById("RecentThirdMobileSubTitle");
var RecentUrlThirdMobile = document.getElementById("RecentThreeMobileUrl");

RecentImageFirstMobile.style.backgroundImage = "url(" + articles[3].MainImage + ")";
RecentTitleFirstMobile.innerText = articles[3].Title;
RecentSubTitleFirstMobile.innerText = articles[3].SubTitle;
RecentUrlFirstMobile.href = articles[3].Url;

RecentImageSecondMobile.style.backgroundImage = "url(" + articles[4].MainImage + ")";
RecentTitleSecondMobile.innerText = articles[4].Title;
RecentSubTitleSecondMobile.innerText = articles[4].SubTitle;
RecentUrlSecondMobile.href = articles[4].Url;

RecentImageThirdMobile.style.backgroundImage = "url(" + articles[5].MainImage + ")";
RecentTitleThirdMobile.innerText = articles[5].Title;
RecentSubTitleThirdMobile.innerText = articles[5].SubTitle;
RecentUrlThirdMobile.href = articles[5].Url;


labelBackgroundColors = [
    '#137F39',
    '#b602f4',
    '#ff0734',
    '#0201E0'
];

labelBackgroundColors = shuffle(labelBackgroundColors);

mainArticleLabel.style.backgroundColor = labelBackgroundColors[0];
secondTopArticleLabel.style.backgroundColor = labelBackgroundColors[1];
secondBottomArticleLabel.style.backgroundColor = labelBackgroundColors[2];
mainArticleLabelMobile.style.backgroundColor = labelBackgroundColors[0];
SecondMainFirstLabelArticleMobile.style.backgroundColor = labelBackgroundColors[1];
SecondMainSecondLabelArticleMobile.style.backgroundColor = labelBackgroundColors[2];



//New Video

var Videos = [
    {
        MainImage : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Bustling/Bustling_Video_Image_Large.jpg",
        SmallImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Bustling/Bustling_Video_Image_Small.png",
        VideoUrl : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_3.mp4"
    },
    {
        MainImage : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Musk/Musk_Video_Image_Large.png",
        SmallImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/Musk/Musk_Video_Image_Small.jpg",
        VideoUrl : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_1.mp4"
    },
    {
        MainImage : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/OpenArms/Open_Arms_Video_Image_Large.jpg",
        SmallImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/articles/OpenArms/Open_Arms_Video_Image_Small.jpg",
        VideoUrl : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_2.mp4"
    },
    {
        MainImage : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainVideoUnitImage3.jpg",
        SmallImage: "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/SmallVideoUnitImage3.jpg",
        VideoUrl : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/video/Video_4.mp4"
    },
];

Videos = shuffle(Videos);

var MainNewVideo = document.getElementById("CanadanewsVideo");
var FirstNewVideo = document.getElementById("SmallNewVideoFirst");
var SecondNewVideo = document.getElementById("SmallNewVideoSecond");
var ThirdNewVideo = document.getElementById("SmallNewVideoFirstThird");


/*
MainNewVideo.src = Videos[0].VideoUrl;
MainNewVideo.poster = Videos[0].MainImage;

FirstNewVideo.style.backgroundImage =  "url(" + Videos[1].SmallImage; + ")" ;
SecondNewVideo.style.backgroundImage = "url(" + Videos[2].SmallImage; + ")" ;
ThirdNewVideo.style.backgroundImage = "url(" + Videos[3].SmallImage; + ")" ;


function PlayNewVideo(spot){

    var TempMainVideoUrl;
    var TempMainVideoImage;

    if (spot == "1"){
        MainNewVideo.poster = Videos[1].MainImage;
        MainNewVideo.src = Videos[1].VideoUrl;
        MainNewVideo.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[1].VideoUrl;
        Videos[0].SmallImage = Videos[1].SmallImage;

        Videos[1].VideoUrl = TempMainVideoUrl;
        Videos[1].SmallImage = TempMainVideoImage;

        FirstNewVideo.style.backgroundImage =  "url(" + Videos[1].SmallImage; + ")" ;
    } else if (spot == "2"){
        MainNewVideo.poster = Videos[2].MainImage;
        MainNewVideo.src = Videos[2].VideoUrl;
        MainNewVideo.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[2].VideoUrl;
        Videos[0].SmallImage = Videos[2].SmallImage;

        Videos[2].VideoUrl = TempMainVideoUrl;
        Videos[2].SmallImage = TempMainVideoImage;

        SecondNewVideo.style.backgroundImage =  "url(" + Videos[2].SmallImage; + ")" ;
    } else if (spot == "3"){
        MainNewVideo.poster = Videos[3].MainImage;
        MainNewVideo.src = Videos[3].VideoUrl;
        MainNewVideo.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[3].VideoUrl;
        Videos[0].SmallImage = Videos[3].SmallImage;

        Videos[3].VideoUrl = TempMainVideoUrl;
        Videos[3].SmallImage = TempMainVideoImage;

        ThirdNewVideo.style.backgroundImage =  "url(" + Videos[3].SmallImage; + ")" ;
    }
};

*/


var MainNewVideo = document.getElementById("myVideo");
var FirstNewVideo = document.getElementById("MainLeftBottomSmallVideoImageDivOne");
var SecondNewVideo = document.getElementById("MainLeftBottomSmallVideoImageDivTwo");
var ThirdNewVideo = document.getElementById("MainLeftBottomSmallVideoImageDivThree");



MainNewVideo.src = Videos[0].VideoUrl;
MainNewVideo.poster = Videos[0].MainImage;

FirstNewVideo.style.backgroundImage =  "url(" + Videos[1].SmallImage; + ")" ;
SecondNewVideo.style.backgroundImage = "url(" + Videos[2].SmallImage; + ")" ;
ThirdNewVideo.style.backgroundImage = "url(" + Videos[3].SmallImage; + ")" ;



function ChangeAndPlayVideo(spot){

    var TempMainVideoUrl;
    var TempMainVideoImage;

    if (spot == "1"){
        MainNewVideo.poster = Videos[1].MainImage;
        MainNewVideo.src = Videos[1].VideoUrl;
        MainNewVideo.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[1].VideoUrl;
        Videos[0].SmallImage = Videos[1].SmallImage;

        Videos[1].VideoUrl = TempMainVideoUrl;
        Videos[1].SmallImage = TempMainVideoImage;

        FirstNewVideo.style.backgroundImage =  "url(" + Videos[1].SmallImage; + ")" ;
    } else if (spot == "2"){
        MainNewVideo.poster = Videos[2].MainImage;
        MainNewVideo.src = Videos[2].VideoUrl;
        MainNewVideo.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[2].VideoUrl;
        Videos[0].SmallImage = Videos[2].SmallImage;

        Videos[2].VideoUrl = TempMainVideoUrl;
        Videos[2].SmallImage = TempMainVideoImage;

        SecondNewVideo.style.backgroundImage =  "url(" + Videos[2].SmallImage; + ")" ;
    } else if (spot == "3"){
        MainNewVideo.poster = Videos[3].MainImage;
        MainNewVideo.src = Videos[3].VideoUrl;
        MainNewVideo.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[3].VideoUrl;
        Videos[0].SmallImage = Videos[3].SmallImage;

        Videos[3].VideoUrl = TempMainVideoUrl;
        Videos[3].SmallImage = TempMainVideoImage;

        ThirdNewVideo.style.backgroundImage =  "url(" + Videos[3].SmallImage; + ")" ;
    }

};





var MainNewVideoMobile = document.getElementById("myVideoMobile");
var FirstNewVideoMobile = document.getElementById("MainMobileBottomVideoImageDivOne");
var SecondNewVideoMobile = document.getElementById("MainMobileBottomVideoImageDivTwo");
var ThirdNewVideoMobile = document.getElementById("MainMobileBottomVideoImageDivThree");



MainNewVideoMobile.src = Videos[0].VideoUrl;
MainNewVideoMobile.poster = Videos[0].MainImage;

FirstNewVideoMobile.style.backgroundImage =  "url(" + Videos[1].SmallImage; + ")" ;
SecondNewVideoMobile.style.backgroundImage = "url(" + Videos[2].SmallImage; + ")" ;
ThirdNewVideoMobile.style.backgroundImage = "url(" + Videos[3].SmallImage; + ")" ;




function ChangeAndPlayMobileVideo(spot){

    var TempMainVideoUrl;
    var TempMainVideoImage;

    if (spot == "1"){
        MainNewVideoMobile.poster = Videos[1].MainImage;
        MainNewVideoMobile.src = Videos[1].VideoUrl;
        MainNewVideoMobile.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[1].VideoUrl;
        Videos[0].SmallImage = Videos[1].SmallImage;

        Videos[1].VideoUrl = TempMainVideoUrl;
        Videos[1].SmallImage = TempMainVideoImage;

        FirstNewVideoMobile.style.backgroundImage =  "url(" + Videos[1].SmallImage; + ")" ;
    } else if (spot == "2"){
        MainNewVideoMobile.poster = Videos[2].MainImage;
        MainNewVideoMobile.src = Videos[2].VideoUrl;
        MainNewVideoMobile.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[2].VideoUrl;
        Videos[0].SmallImage = Videos[2].SmallImage;

        Videos[2].VideoUrl = TempMainVideoUrl;
        Videos[2].SmallImage = TempMainVideoImage;

        SecondNewVideoMobile.style.backgroundImage =  "url(" + Videos[2].SmallImage; + ")" ;
    } else if (spot == "3"){
        MainNewVideoMobile.poster = Videos[3].MainImage;
        MainNewVideoMobile.src = Videos[3].VideoUrl;
        MainNewVideoMobile.play();

        TempMainVideoUrl = Videos[0].VideoUrl;
        TempMainVideoImage = Videos[0].SmallImage;

        Videos[0].VideoUrl = Videos[3].VideoUrl;
        Videos[0].SmallImage = Videos[3].SmallImage;

        Videos[3].VideoUrl = TempMainVideoUrl;
        Videos[3].SmallImage = TempMainVideoImage;

        ThirdNewVideoMobile.style.backgroundImage =  "url(" + Videos[3].SmallImage; + ")" ;
    }
};

/*var previousPosition = window.pageYOffset || document.documentElement.scrollTop;

window.onscroll = function() {
    var currentPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (previousPosition > currentPosition) {
        console.log('scrolling up');
    } else {
        console.log('scrolling down');
    }

    previousPosition = currentPosition;
};*/