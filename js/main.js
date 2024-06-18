
/*=============== LOADER IMAGE ===============*/
window.onload = function(){
  setTimeout(() => {
    document.querySelector('.loader').style.display = "none";
    document.querySelector('.wrap-container').style.display = "block"
  }, 2000);
}

/*=============== SHOW NAV ===============*/
const close = document.querySelector('.nav i');
const nav = document.querySelector('.nav');
const menu = document.querySelector('.menudiv');

menu.addEventListener('click',()=>{
  nav.classList.add('shownav');
})

close.addEventListener('click',()=>{
  nav.classList.remove('shownav');
})







/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav_link')

function linkAction(){
    const navMenu = document.querySelector('nav')
    //when we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('shownav')
}

navLink.forEach(n => n.addEventListener('click',linkAction))


/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')


function scrollActive(){
  const scrollY = window.pageYOffset

  sections.forEach(current =>{
    const sectionHeight = current.offsetHeight,
          sectionTop = current.offsetTop -58,
          sectionId = current.getAttribute('id')

      if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
        document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.add('active-link')
      } else {
          document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.remove('active-link')
      }
  })
}

window.addEventListener('scroll',scrollActive)

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
  origin: 'top',
  distance: '60px',
  duration: 2500,
  delay: 400,
  //reset: true
})

sr.reveal(`.logo, nav`,{delay: 200})
sr.reveal(`.left-div`,{delay: 450, origin:"left"})
sr.reveal(`.right-div`,{delay: 450, origin:"right"})






/*=============== SWIPER JS ===============*/

let swiperPopular = new Swiper(".slider-counter", {
  loop: true,
  spaceBetween: 24,
  slidesPerView: 'auto',
  grabCursor: true,
  autoplay: true,
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    autoplay: true,
  },
  breakpoints: {
      768: {
        slidesPerView: 1,
      },
      1024: {
        spaceBetween: 48,
      },
    },
});

/*=============== BIBLE SWIPER JS ===============*/
let swiperVerse = new Swiper(".verse-counter", {
  loop: true,
  spaceBetween: 24,
  slidesPerView: 'auto',
  grabCursor: true,
  autoplay: true,
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    autoplay: true,
  },
  breakpoints: {
      768: {
        slidesPerView: 3,
      },
      1024: {
        spaceBetween: 48,
      },
    },
});





/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader(){
  const header = document.getElementById('header');
  //when the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
  if(this.scrollY >= 50) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}

window.addEventListener('scroll',scrollHeader)


/*=============== VIDEO PLAYER ===============*/



function videoPlayers(playbtn){
var btn = document.getElementById(playbtn)
var sibling = btn.parentElement;
var sibling2 = sibling.parentElement;
var video = sibling2.previousElementSibling;
var source = video.querySelector('source');
var juice = sibling2.querySelector('.orange-juice')
var btnicon = sibling2.querySelector('#iconplay')
var videoDuration = sibling2.querySelector('#videoDuration');
var videoTime = sibling2.querySelector('#videoTime');
var volume = sibling2.querySelector('input[type="range"]')
var volumeicon = sibling2.querySelector('#volumeicon')
var projectoricon = sibling2.querySelector('.projector')






volume.addEventListener('mousemove',(e)=>{
  video.volume = e.target.value;
  if(video.volume == 0){
    volumeicon.className = "ri-volume-down-line";
  }else{
    volumeicon.className = "ri-volume-up-line";
  }
})

function togglePlayPause(){
  if(video.paused){
    btnicon.className = "ri-pause-fill";
      video.play();
  }
  
  else {
    btnicon.className = "ri-play-fill";
    video.pause();
  }
}



btn.onclick = function(){
  // alert('me')
  // console.log(videosecond)
  togglePlayPause();
  sibling2.querySelector('.videoDuration').style.visibility = "visible";
}

video.addEventListener('timeupdate',function(){
  var juicePos = video.currentTime / video.duration;
  juice.style.width = juicePos * 100 + "%";
  if(video.ended){
    btnicon.className = "ri-play-fill";
  }

})

//change progress bar on click
juice.addEventListener('click',(e)=>{
  var progressTime = (e.offsetX / juice.offsetWidth) * video.duration
  video.currentTime = progressTime
})

function currentTime(){
  var currentMinutes = Math.floor(video.currentTime / 60)
  var currentSeconds = Math.floor(video.currentTime - currentMinutes * 60)
  var durationMinutes = Math.floor(video.duration / 60)
  var durationSeconds = Math.floor(video.duration - durationMinutes * 60)
  videoTime.innerHTML = `${currentMinutes}:${currentSeconds < 10 ? '0'+ currentSeconds: currentSeconds} `
  videoDuration.innerHTML = `${durationMinutes}:${durationSeconds}`
}

video.addEventListener('timeupdate',currentTime)



projectoricon.addEventListener('click',function(){
  video.pause();
  window.scrollTo(0,6000);
  document.querySelector('.videomodal').style.visibility = "visible";
  document.querySelector('.videomodal').style.height = "950px";
  document.querySelector('.videomodal h2').style.display = "block";
  document.querySelector('.videomodal .video .controls').style.visibility = "visible";
  var projectorvideo = document.querySelector('.videomodal video')
  var projectvid = document.querySelector('.videomodal video > source')
  var srcstring = source.src;
 
  var newsrc = srcstring.substr(31,srcstring.length);
  // console.log(newsrc);
  // // projectvid.src = newsrc;
  projectvid.setAttribute('src',newsrc)
  projectorvideo.load()
  projectorvideo.play();
  //console.log(newsrc)
  var projectid = document.querySelector('.videomodal .videolink')
  projectid.href = `#${video.id}`;
})

var projecticoned = document.querySelector('.projectvideo')
projecticoned.addEventListener('click',function(){
  document.querySelector('.videomodal').style.visibility = "hidden";
  document.querySelector('.videomodal').style.height = "0px";
  document.querySelector('.videomodal h2').style.display = "none";
  document.querySelector('.videomodal .video .controls').style.visibility = "hidden";
  var projectorvideo = document.querySelector('.videomodal video')
  var projectid = document.querySelector('.videomodal .videolink')
  var projectvid = document.querySelector('.videomodal video > source')
  projectvid.setAttribute('src',"")
  projectorvideo.load()
  projectorvideo.pause();
  document.querySelector('.videomodal .videoDuration').innerHTML = "";
  document.querySelector('.videomodal .orange-juice').style.background = "none";
  var oldid = projectid.href;
  var newid = oldid.substr(39,oldid.length)
  var vidid = `${newid}`
  //console.log(vidid)
  var svideo = document.querySelector(vidid)
  svideo.play();
})


// window.onload = currentTime;
}



videoPlayers('play-pause')

videoPlayers('play-pause2')

videoPlayers('play-pause3')

videoPlayers('play-pause4')

videoPlayers('play-pause5')
























