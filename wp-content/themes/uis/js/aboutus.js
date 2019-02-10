
        // Get the video
        var video = document.getElementById("myVideo");

        // Get the button
        var btn = document.getElementById("myBtn");

      

        function playorstopvideo() {

            //var element = document.getElementById("myBtn");
            var playBtn = document.getElementById("playBtn");
            var playBtnDesktop = document.getElementById("playBtnDesktop");	
			var videoDiv = document.getElementById("videoDiv");

            if (video.paused) {
                video.play();
                //element.style.background = "url('Style/stop-button.png')";
                //element.style.backgroundSize = "200px 200px";
                playBtn.style.display = "none";
				videoDiv.style.marginTop = "0";
                
            } else {
                video.pause();
                //element.style.background = "url('Style/play_Button.png')";
                //element.style.backgroundSize = "200px 200px";
                playBtn.style.display = "block";
                playBtnDesktop.style.paddingTop = "34px";
                playBtnDesktop.style.paddingLeft = "42px";
                
            }
        }
		
		function mutedVideo() {
			
			var mobilevideo = document.getElementById("myMobileVideo");
            var muteBtn = document.getElementById("muteBtn");

            if (mobilevideo.muted) {
                mobilevideo.muted = false;
                muteBtn.style.backgroundImage = "url('../../wp-content/themes/uis/css/images/mute.gif')";
            }
            else {
                mobilevideo.muted = true;
                muteBtn.style.backgroundImage = "url('../../wp-content/themes/uis/css/images/umuted.png')";
            }
            
        }
		
		function showFormMobile(){
			var formMobile = document.getElementById("static-block-mobile");
			var videoDivMobile = document.getElementById("videoMobileDiv");
			var headerDiv = document.getElementById("headerDiv");
			var wrapper = document.getElementById("wrapperDiv");
			var aboutUsText = document.getElementById("aboutUsDiv");
			var servicesDiv = document.getElementById("servicesDiv");
			var aboutUsDescr = document.getElementById("aboutUsDescr");
			var formMobileDown = document.getElementById("static-block-mobileDown");
			var seoDiv = document.getElementById("seoDiv");
			var footerDiv = document.getElementById("footerDiv");	
			var containerFormMobile = document.getElementById("containerFormMobile");
			var mobilevideo = document.getElementById("myMobileVideo");			
			var muteBtn = document.getElementById("muteBtn");
			var whoWeAre = document.getElementById("whoWeAre");
			
			formMobile.style.display = "block";
			videoDivMobile.style.display = "none";
			headerDiv.style.display = "none";
			wrapper.style.paddingTop = "0";
			aboutUsText.style.display = "none";
			servicesDiv.style.display = "none";
			aboutUsDescr.style.display = "none";
			formMobileDown.style.display = "none";
			seoDiv.style.display = "none";
			footerDiv.style.display = "none";
			containerFormMobile.style.height = "600px";
			mobilevideo.muted = true;
			muteBtn.style.backgroundImage = "url('../../wp-content/themes/uis/css/images/umuted.png')";
			whoWeAre.style.display = "none";
		};
	
		function returnPage(){
			var formMobile = document.getElementById("static-block-mobile");
			var videoDivMobile = document.getElementById("videoMobileDiv");
			var headerDiv = document.getElementById("headerDiv");
			var wrapper = document.getElementById("wrapperDiv");
			var aboutUsText = document.getElementById("aboutUsDiv");
			var servicesDiv = document.getElementById("servicesDiv");
			var aboutUsDescr = document.getElementById("aboutUsDescr");
			var formMobileDown = document.getElementById("static-block-mobileDown");
			var seoDiv = document.getElementById("seoDiv");
			var footerDiv = document.getElementById("footerDiv");	
			var containerFormMobile = document.getElementById("containerFormMobile");	
			var whoWeAre = document.getElementById("whoWeAre");
			
			formMobile.style.display = "none";
			videoDivMobile.style.display = "block";
			headerDiv.style.display = "block";
			wrapper.style.paddingTop = "60px"
			aboutUsText.style.display = "block";
			servicesDiv.style.display = "block";
			aboutUsDescr.style.display = "block";
			formMobileDown.style.display = "block";
			seoDiv.style.display = "block";
			footerDiv.style.display = "block";
			containerFormMobile.style.height = "auto";
			whoWeAre.style.display = "block";
		};
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		