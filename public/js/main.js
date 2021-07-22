$(function () {
    $("#dropBox").on("change", function () {
        switch ($(this).val()) {
            case "1":
                $("#divText").html("info@netrika.in");
                break;
            case "2":
                $("#divText").html("srilanka@netrika.in");
                break;
            case "3":
                $("#divText").html("dubai@netrika.in");
                break;
            case "4":
                $("#divText").html("singapore@netrika.in");
                break;
        }
    });
});


var videoPlayButton,
    videoWrapper = document.getElementsByClassName('video-wrapper')[0],
    video = document.getElementsByTagName('video')[0],
    videoMethods = {
        renderVideoPlayButton: function () {
            if (videoWrapper.contains(video)) {
                this.formatVideoPlayButton();
                video.classList.add('has-media-controls-hidden');
                videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0];
                videoPlayButton.addEventListener('click', this.hideVideoPlayButton);
            }
        },

        formatVideoPlayButton: function () {
            videoWrapper.insertAdjacentHTML('beforeend', '\
                <svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video">\
                    <polygon points="70, 55 70, 145 145, 100" fill="#355699"/>\
                </svg>\
            ');
        },

        hideVideoPlayButton: function () {
            video.play();
            videoPlayButton.classList.add('is-hidden');
            video.classList.remove('has-media-controls-hidden');
            video.setAttribute('controls', 'controls');
        } };


videoMethods.renderVideoPlayButton();

