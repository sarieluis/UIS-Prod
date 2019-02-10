<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <?php wp_head(); ?>
    <link href="../../wp-content/themes/uis/inmanage/lp-pages/canadanews/fonts/Montserrat-Light.css" rel="stylesheet" />
    <link href="../../wp-content/themes/uis/inmanage/lp-pages/canadanews/fonts/Montserrat-Bold.css" rel="stylesheet" />
    <link href="../../wp-content/themes/uis/inmanage/lp-pages/canadanews/fonts/Montserrat-Regular.css" rel="stylesheet" />
    <script src="../../wp-content/themes/uis/inmanage/lp-pages/canadanews/js/jquery.webticker.min.js"></script>
    <script src="../../wp-content/themes/uis/inmanage/lp-pages/canadanews/js/TickerMobile.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

</head>
<body>

<?php get_template_part( 'inmanage/partials/canadanews-top_manu' ); ?>

<div id="TopRedBar">

</div>

<div id="TickerForMobile">
    <!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="86547/"></script> <!-- end feedwind code -->
</div>

<!--<div id="TickerForMobile">


    <div id="TickerForMobileTitle">Breaking News</div>
    <ul id="webticker-update-example">
        <li data-update="item1">
            CANADA NURTURES IMMIGRANT SUCCESS.
        </li>
        <li data-update="item2">
            CANADA NURTURES IMMIGRANT SUCCESS.
        </li>
        <li data-update="item2">
            CANADA NURTURES IMMIGRANT SUCCESS.
        </li>
        <li data-update="item2">
            CANADA NURTURES IMMIGRANT SUCCESS.
        </li>
        <li data-update="item2">
            CANADA NURTURES IMMIGRANT SUCCESS.
        </li>
    </ul>
</div>-->

<div id="Main">
    <div id="MainDiv">
        <div id="MainLeftDiv">
            <!--<a href="https://www.uiscanada.com/canadanews/openarms/?utm_source=oa_blog&utm_medium=oa_blog&utm_campaign=oa_blog&utm_term=oa_blog&utm_content=oa_blog" >-->
            <a id="MainArticleImageURL">
                <div id="MainArticleElement">
                    <div id="MainLeftDivLeft"></div>
                    <div id="MainLeftDivLeftText"></div>
                </div>
            </a>
            <img id="MainImageMobile" src="../../wp-content/themes/uis/inmanage/lp-pages/canadanews/images/MainLeftImage.jpg" />
            <a href="https://www.uiscanada.com/canadanews/openarms/?utm_source=oa_blog&utm_medium=oa_blog&utm_campaign=oa_blog&utm_term=oa_blog&utm_content=oa_blog" >
                <div id="MainLeftDivLeftTextUnderMobile">
                    Canada to Welcome Immigrants with Open Arms.
                </div>
            </a>
            <div id="MainLeftDivRight">
                <div id="MainLeftDivTopRight">
                    <a href="" id ="TopArticleTopUrl" >
                        <div id="TopRightArticle">
                            <div id="MainLeftDivTopRightImage">
                                <div id="MainLeftDivTopRightImageBottomText">
                                    <a id ="MainLeftDivTopRightImageBottomTextA">

                                    </a>
                                </div>
                            </div>
                            <div id="MainLeftDivTopRightImageText"></div>
                        </div>
                    </a>

                    <a href="" id ="TopArticleBottomUrl" >
                        <div id="TopBottomRightArticle">
                            <div id="MainLeftDivBottomRightImage">
                                <div id="MainLeftDivBottomRightImageBottomText">
                                    <a id="MainLeftDivBottomRightImageBottomTextA"></a>
                                </div>
                            </div>
                            <div id="MainLeftDivBottomRightImageText">Travel</div>
                        </div>
                    </a>




                </div>

            </div>

            <a id="MainArticleTitleURL" >
                <div id="MainLeftDivLeftTextUnder">
                    <!--Canada to Welcome Immigrants with Open Arms.-->
                </div>
            </a>

            <div id="MainLeftMiddleDiv">
                <div id="MainLeftMiddleTitleDiv">Recent</div>
                <a id="RecentOneLink">
                    <div class="MainLeftMiddleArticileDiv">
                        <div class="MainLeftMiddleArticileImageDiv" id="FirstImageRecent"></div>
                        <div class="MainLeftMiddleArticileTitleDiv" id="FirstTitleRecent"></div>
                        <div class="MainLeftMiddleArticileTextDiv" id="FirstSubTitleRecent">

                        </div>
                    </div>
                </a>
                <a id="RecentTwoLink">
                    <div class="MainLeftMiddleArticileDiv">
                        <div class="MainLeftMiddleArticileImageDiv" id="SecondImageRecent"></div>
                        <div class="MainLeftMiddleArticileTitleDiv" id="SecondTitleRecent"></div>
                        <div class="MainLeftMiddleArticileTextDiv" id="SecondSubTitleRecent">

                        </div>
                    </div>
                </a>

                <a id="RecentThreeLink">
                    <div class="MainLeftMiddleArticileDiv">
                        <div class="MainLeftMiddleArticileImageDiv" id="ThirdImageRecent"></div>
                        <div class="MainLeftMiddleArticileTitleDiv" id="ThirdTitleRecent"></div>
                        <div class="MainLeftMiddleArticileTextDiv" id="ThirdSubTitleRecent">

                        </div>
                    </div>
                </a>

            </div>

            <div id="MainLeftBottomDiv">
                <div id="MainLeftBottomTitleDiv">Video</div>

                <div id="MainLeftBottomVideoDiv">

                    <div id="MainLeftBottomMainVideoDiv">
                        <video id="myVideo" poster="" controls>
                            <source src="" type="video/mp4">
                        </video>
                    </div>

                    <div id="MainLeftBottomSmallVideoImageDiv">
                        <div class="MainLeftBottomSmallVideoImageDiv" id="MainLeftBottomSmallVideoImageDivOne" onclick="ChangeAndPlayVideo(1)"></div>
                        <div class="MainLeftBottomSmallVideoImageDiv" id="MainLeftBottomSmallVideoImageDivTwo" onclick="ChangeAndPlayVideo(2)"></div>
                        <div class="MainLeftBottomSmallVideoImageDiv" id="MainLeftBottomSmallVideoImageDivThree" onclick="ChangeAndPlayVideo(3)"></div>
                    </div>

                </div>
                <div id="MainLeftBottomMainVideoTitleDiv">
                    CANADA NURTURES IMMIGRANT SUCCESS.
                </div>

                <div id="MainLeftBottomMainVideoTextDiv">
                    Canada is one of the most exciting places in the world for young people to immigrate to begin their great adventure called life. Many success stories have started here. the best known name of.....
                </div>
            </div>

            <div id="NewVideo">
                <div id="MainNewVideo">
                    <video id="CanadanewsVideo" poster="" controls>
                        <source src="" type="video/mp4">
                    </video>
                </div>
                <div id="SmallNewVideo">
                    <div id="SmallNewVideoFirst" onclick="PlayNewVideo(1)"></div>
                    <div id="SmallNewVideoSecond" onclick="PlayNewVideo(2)"></div>
                    <div id="SmallNewVideoFirstThird" onclick="PlayNewVideo(3)"></div>
                </div>
            </div>

        </div>

        <div id="MainRightDiv">
            <!--<div id="MainRightDivDateTitile"></div>-->

            <div id="MainRightDivTitile">Breaking<br />News</div>

            <div id="BreakingNewsMobile">
                <!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="86769/"></script> <!-- end feedwind code -->
            </div>
            <div class="MainRightDivTopNews">
                <div class="MainRightDivTopNewsImage"></div>
                <div class="MainRightDivTopNewsText">CANADA NURTURES<br /> IMMIGRANT<br /> SUCCESS.</div>
            </div>
            <div class="MainRightDivTopNews">
                <div class="MainRightDivTopNewsImage"></div>
                <div class="MainRightDivTopNewsText">CANADA NURTURES<br /> IMMIGRANT<br /> SUCCESS.</div>
            </div>
            <div class="MainRightDivTopNews">
                <div class="MainRightDivTopNewsImage"></div>
                <div class="MainRightDivTopNewsText">CANADA NURTURES<br /> IMMIGRANT<br /> SUCCESS.</div>
            </div>
            <div class="MainRightDivTopNews">
                <div class="MainRightDivTopNewsImage"></div>
                <div class="MainRightDivTopNewsText">CANADA NURTURES<br /> IMMIGRANT<br /> SUCCESS.</div>
            </div>

            <div id="MainRightBottomDiv">
                <div id="MainRightBottomFirstDiv">
                    <div id="MainRightBottomFirstImageDiv"></div>
                    <div id="MainRightBottomFirstTextDiv">
                        Young Professionals Canada<br />is Waiting for You
                    </div>
                </div>

                <div id="MainRightBottomSecondtDiv">
                    <div id="MainRightBottomSecondImageDiv"></div>
                    <div id="MainRightBottomSecondTextDiv">
                        Young Professionals Canada<br />is Waiting for You
                    </div>
                </div>

                <div id="MainRightBottomThirdtDiv">
                    <div id="MainRightBottomThirdImageDiv"></div>
                </div>

            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <a href="#" class="footer-top-logo footer-top-item">
                    <img src="https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/young_professionals/assets/images/logo-footer.png" alt="">
                </a>
                <div class="footer-top-item">
                    <span>68 Water Street, Office 406,</span>
                    <span>Gastown, Vancouver,</span>
                    <span>BC V6B 1A4, Canada</span>
                </div>
                <div class="footer-top-item">
                    <span><a href="tel:+15874043939">+1-604-262-3728</a></span>
                    <span><a href="mailto:Support@uiscanada.com">Support@uiscanada.com</a></span>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="copyright-top">Copyright © 2017</div>
                <div class="copyright-bottom">All rights reserved to U.M.C Ltd. Düsseldorf, Unternehmerstadt, Johannstrasse 37, 3rd floor, Dusseldorf, 40476, Germany</div>
            </div>
        </div>
    </footer>

</div>

<div id="MainMobileDiv">
    <div id="MainMobileTop">
        <a id="MainArticleUrlMobile" href="https://www.uiscanada.com/canadanews/openarms/?utm_source=oa_blog&utm_medium=oa_blog&utm_campaign=oa_blog&utm_term=oa_blog&utm_content=oa_blog">
            <div id="MainMobileMainTop">
                <img src="" id="MainImageTopMobile" />
                <div id="MainMobileMainTopTextImage"></div>
                <div id="MainMobileMainTopText"></div>
            </div>
        </a>
        <div id="MainMobileTopBottom">

            <a href="" id="SecondMainArticleFirstUrl">
                <div id="MainMobileTopBottomTop">
                    <div id="MainMobileTopBottomTopImage"></div>
                    <div id="MainMobileTopBottomTopImageText"></div>
                    <div id="MainMobileTopBottomTopText">

                    </div>
                </div>
            </a>

            <a href="" id="SecondMainArticleSecondUrl">
                <div id="MainMobileTopBottomBottom">
                    <div id="MainMobileTopBottomBottomImage"></div>
                    <div id="MainMobileTopBottomBottomImageText"></div>
                    <div id="MainMobileTopBottomBottomText">

                    </div>
                </div>
            </a>

        </div>

    </div>

    <div id="MainMobileMiddleDiv">
        <div id="MainMobileMiddleTitileDiv">Recent</div>

        <a href="" id="RecentOneMobileUrl">
            <div class="MainMobileMiddleArticleDiv">
                <div class="MainMobileMiddleArticleImageDiv" id="RecentFirstMobileImage"></div>
                <div class="MainMobileMiddleArticleTitleDiv" id="RecentFirstMobileTitle"></div>
                <div class="MainMobileMiddleArticleTextDiv" id="RecentFirstMobileSubTitle"></div>
            </div>
        </a>

        <a href="" id="RecentTwoMobileUrl">
            <div class="MainMobileMiddleArticleDiv">
                <div class="MainMobileMiddleArticleImageDiv" id="RecentSecondMobileImage"></div>
                <div class="MainMobileMiddleArticleTitleDiv" id="RecentSecondMobileTitle"></div>
                <div class="MainMobileMiddleArticleTextDiv" id="RecentSecondMobileSubTitle"></div>
            </div>
        </a>

        <a href="" id="RecentThreeMobileUrl">
            <div class="MainMobileMiddleArticleDiv">
                <div class="MainMobileMiddleArticleImageDiv" id="RecentThirdMobileImage"></div>
                <div class="MainMobileMiddleArticleTitleDiv" id="RecentThirdMobileTitle"></div>
                <div class="MainMobileMiddleArticleTextDiv" id="RecentThirdMobileSubTitle"></div>
            </div>
        </a>

    </div>

    <div id="MainMobileBottomDiv">
        <div id="MainMobileBottomTitleDiv">Video</div>
        <div id="MainMobileBottomVideoDiv">

            <video id="myVideoMobile" poster="" controls>
                <source src="" type="video/mp4">
            </video>

        </div>
        <div id="MainMobileBottomVideoImagesDiv">
            <div class="MainMobileBottomVideoImageDiv" id="MainMobileBottomVideoImageDivOne" onclick="ChangeAndPlayMobileVideo(1)"></div>
            <div class="MainMobileBottomVideoImageDiv" id="MainMobileBottomVideoImageDivTwo" onclick="ChangeAndPlayMobileVideo(2)"></div>
            <div class="MainMobileBottomVideoImageDiv" id="MainMobileBottomVideoImageDivThree" onclick="ChangeAndPlayMobileVideo(3)"></div>
        </div>
        <div id="MainMobileBottomDownArticleDiv">
            <div id="MainMobileBottomDownArticleTitleDiv">
                CANADA NURTURES IMMIGRANT SUCCESS.
            </div>
            <div id="MainMobileBottomDownArticleTextDiv">
                Canada is one of the most exciting places in the world for young people to immigrate to begin their great adventure called life. Many success stories have started here. the best known name of.....
            </div>
            <div id="MainMobileBottomDownTitleArticleDiv">
                Live Net
            </div>
            <div id="MainMobileBottomDownSecondArticleDiv"></div>
            <div id="MainMobileBottomDownSecondArticleTextDiv">
                Young Professionals Canada is Waiting for You
            </div>

            <div id="MainMobileBottomDownThirdArticleDiv"></div>
            <div id="MainMobileBottomDownThirdArticleTextDiv">
                Young Professionals Canada is Waiting for You
            </div>

        </div>


    </div>





</body>
</html>