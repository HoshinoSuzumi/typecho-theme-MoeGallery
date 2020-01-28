const $$ = mdui.JQ;
$$(document).ready(() => {
    mdui.mutation();
    let galleryList = document.getElementsByClassName('imageGroup');
    for (let i = 0; i < galleryList.length; i++) {
        new Viewer(galleryList[i]);
    }
});

let isFullscreen = false;

let fabDebounce = null;
let fabInst = new mdui.Fab('#fab');
fabInst.hide();
window.addEventListener('scroll', function () {
    if (fabDebounce) {
        clearTimeout(fabDebounce);
    }
    fabDebounce = setTimeout(function () {
        let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop >= 100) {
            fabInst.show();
        } else {
            fabInst.hide();
        }
    }, 100);
});

function foldAll() {
    let panels = $$('.mdui-panel');
    for (let i = 0; i < panels.length; i++) {
        (new mdui.Panel(panels[i])).closeAll();
    }
}

function fullscreen() {
    $$('#icon_fullscreen').html(isFullscreen ? 'fullscreen' : 'fullscreen_exit');
    if (!isFullscreen) {
        let element = document.documentElement;
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }
    isFullscreen = !isFullscreen;
}

function msgBox(title, msg) {
    mdui.alert(msg, title);
}

function scrollScreenTo(px) {
    document.documentElement.scrollTop = px;
    document.body.scrollTop = px;
}

scrollScreenTo(0);