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


var TopBanners = [
    {
        ImgURL : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/TopBannersArticles/Family.jpg",
        LP_URL : "https://www.uiscanada.com/family/?utm_campaign=blog_family"
    },
    {
        ImgURL : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/TopBannersArticles/YoungProfessional.jpg",
        LP_URL : "https://www.uiscanada.com/youngprofessionals/?utm_campaign=blog_youngprofessionals"
    },
    {
        ImgURL : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/TopBannersArticles/YoungProfessional2.jpg",
        LP_URL : "https://www.uiscanada.com/youngprofessionals/?utm_campaign=blog_youngprofessionals"
    }
];

TopBanners = shuffle(TopBanners);

var TopRightBannerImage = document.getElementById("TopBannerImg");
var TopRightBannerImageLPUrl = document.getElementById("TopBannerURL");

TopRightBannerImage.src = TopBanners[0].ImgURL;
TopRightBannerImageLPUrl.href = TopBanners[0].LP_URL;

var BottomBanners = [
    {
        ImgURL : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/BottomBannersArticles/Family.jpg",
        LP_URL : "https://www.uiscanada.com/family/?utm_campaign=blog_family"
    },
    {
        ImgURL : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/BottomBannersArticles/YoungProfessional.jpg",
        LP_URL : "https://www.uiscanada.com/youngprofessionals/?utm_campaign=blog_youngprofessionals"
    },
    {
        ImgURL : "../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/BottomBannersArticles/YoungProfessional2.jpg",
        LP_URL : "https://www.uiscanada.com/youngprofessionals/?utm_campaign=blog_youngprofessionals"
    }
];

BottomBanners = shuffle(BottomBanners);

var BottomBannerImage = document.getElementById("BottomBanner");
var BottomBannerImageUrl = document.getElementById("BottomBannerUrl");

BottomBannerImage.src = BottomBanners[0].ImgURL;
BottomBannerImageUrl.href = BottomBanners[0].LP_URL;

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
    }
];

var articlesUpdated = [];

var PageUrl = window.location.href;

for (i = 0; i < articles.length; i++){
    //console.log("sariel" + i);
    if (articles[i].Url != PageUrl)
    {
        articlesUpdated.push(articles[i]);
    }
};

articlesUpdated = shuffle(articlesUpdated);

//Right Block News

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
var SecondBlockRightArticleUrl = document.getElementById("SecondBlockRightArticleUrl");

var ThirdBlockRightArticleImage = document.getElementById("MainRightBottomThirdImageDiv");
var ThirdBlockRightArticleText = document.getElementById("MainRightBottomThirdTextDiv");
var ThirdBlockRightArticleLabel = document.getElementById("MainRightBottomThirdLabelDiv");
var ThirdBlockRightArticleUrl = document.getElementById("ThirdBlockRightArticleUrl");

var FourthBlockRightArticleImage = document.getElementById("MainRightBottomFourthImageDiv");
var FourthBlockRightArticleText = document.getElementById("MainRightBottomFourthTextDiv");
var FourthBlockRightArticleLabel = document.getElementById("MainRightBottomFourthLabelDiv");
var FourthBlockRightArticleUrl = document.getElementById("FourthBlockRightArticleUrl");

FirstBlockRightArticleImage.style.backgroundImage = "url(" + articlesUpdated[0].BlockRightImage + ")";
FirstBlockRightArticleText.innerText = articlesUpdated[0].Title;
FirstBlockRightArticleLabel.innerText = articlesUpdated[0].Label;
FirstBlockRightArticleLabel.style.borderColor = RightBlockColorLabel[0];
FirstBlockRightArticleUrl.href = articlesUpdated[0].Url;

SecondBlockRightArticleImage.style.backgroundImage = "url(" + articlesUpdated[1].BlockRightImage + ")";
SecondBlockRightArticleText.innerText = articlesUpdated[1].Title;
SecondBlockRightArticleLabel.innerText = articlesUpdated[1].Label;
SecondBlockRightArticleLabel.style.borderColor = RightBlockColorLabel[1];
SecondBlockRightArticleUrl.href = articlesUpdated[1].Url;

ThirdBlockRightArticleImage.style.backgroundImage = "url(" + articlesUpdated[2].BlockRightImage + ")";
ThirdBlockRightArticleText.innerText = articlesUpdated[2].Title;
ThirdBlockRightArticleLabel.innerText = articlesUpdated[2].Label;
ThirdBlockRightArticleLabel.style.borderColor = RightBlockColorLabel[2];
ThirdBlockRightArticleUrl.href = articlesUpdated[2].Url;

FourthBlockRightArticleImage.style.backgroundImage = "url(" + articlesUpdated[3].BlockRightImage + ")";
FourthBlockRightArticleText.innerText = articlesUpdated[3].Title;
FourthBlockRightArticleLabel.innerText = articlesUpdated[3].Label;
FourthBlockRightArticleLabel.style.borderColor = RightBlockColorLabel[3];
FourthBlockRightArticleUrl.href = articlesUpdated[3].Url;