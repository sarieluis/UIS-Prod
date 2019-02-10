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

var ColorsLabel = [
    '#47a1d8',
    '#ff0a79',
    '#0a15ff',
    '#78bd02',
    '#bf6002',
    '#340cb7',
    '#b1da00',
    '#561455',
    '#828282',
    '#fd9400',
    '#5f8fa5',
    '#982f4e',
    '#a27150',

];

ColorsLabel = shuffle(ColorsLabel);


var MainArticlesDiv = document.getElementById("MainArticles");

for (i = 0 ; i < articles.length ; i++){
    var ArticleUrl = document.createElement("a");
    ArticleUrl.className = "ArticleUrl";
    MainArticlesDiv.appendChild(ArticleUrl);

    var MainLeftMiddleArticileDiv = document.createElement("div");
    MainLeftMiddleArticileDiv.className = "MainLeftMiddleArticileDiv";
    ArticleUrl.appendChild(MainLeftMiddleArticileDiv);

    var MainLeftMiddleArticileImageDiv = document.createElement("div");
    MainLeftMiddleArticileImageDiv.className = "MainLeftMiddleArticileImageDiv";
    MainLeftMiddleArticileDiv.appendChild(MainLeftMiddleArticileImageDiv);

    var MainLeftMiddleArticileTitleDiv = document.createElement("div");
    MainLeftMiddleArticileTitleDiv.className = "MainLeftMiddleArticileTitleDiv";
    MainLeftMiddleArticileDiv.appendChild(MainLeftMiddleArticileTitleDiv);

    var MainArticleLabelDiv = document.createElement("div");
    MainArticleLabelDiv.className = "MainArticleLabelDiv";
    MainLeftMiddleArticileDiv.appendChild(MainArticleLabelDiv);

    var MainLeftMiddleArticileTextDiv = document.createElement("div");
    MainLeftMiddleArticileTextDiv.className = "MainLeftMiddleArticileTextDiv";
    MainLeftMiddleArticileDiv.appendChild(MainLeftMiddleArticileTextDiv);

    MainLeftMiddleArticileImageDiv.style.backgroundImage = "url(" + articles[i].MainImage + ")";
    MainLeftMiddleArticileTitleDiv.innerText = articles[i].Title;
    MainArticleLabelDiv.innerText = articles[i].Label;
    MainArticleLabelDiv.style.borderColor = ColorsLabel[i];
    MainLeftMiddleArticileTextDiv.innerHTML = articles[i].SubTitle;
    ArticleUrl.href = articles[i].Url;

}

















