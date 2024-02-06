document.addEventListener("DOMContentLoaded", function () {
  const scroll = new LocomotiveScroll({
    el: document.querySelector("[data-scroll-container]"),
    smooth: true,
    direction: "horizontal",
  });

  scroll.on("scroll", (args) => {
    const scrollX = args.scroll.x;

    const presentationSection = document.querySelector(".home__presentation");
    const presentationTriggerPoint = presentationSection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > presentationTriggerPoint) {
      gsap.to(".home__presentation__flex__image", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__presentation__texte", { opacity: 1, x: 0, duration: 0.5, delay: 1});
    } else {
      gsap.to(".home__presentation__flex__image, .home__presentation__texte", { opacity: 0, x: -50, duration: 0.5 });
    }
    

    const rivieresSection = document.querySelector(".home__rivieres");
    const rivieresTriggerPoint = rivieresSection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > rivieresTriggerPoint) {
      gsap.to(".home__rivieres__firstBlock .texte", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__rivieres__firstBlock .imagesVideo", { opacity: 1, x: 0, duration: 0.5, delay: 0.5 });
      gsap.to(".home__rivieres__secondBlock .texte", { opacity: 1, x: 0, duration: 0.5, delay: 1 });
      gsap.to(".home__rivieres__secondBlock .imagesVideo", { opacity: 1, x: 0, duration: 0.5, delay: 1.5 });
    } else {
      gsap.to(".home__rivieres__firstBlock .texte, .home__rivieres__firstBlock .imagesVideo, .home__rivieres__secondBlock .texte, .home__rivieres__secondBlock .imagesVideo", { opacity: 0, x: -50, duration: 0.5 });
    }

    const videoPosterSection = document.querySelector(".home__videoPoster");
    const videoPosterTriggerPoint = videoPosterSection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > videoPosterTriggerPoint) {
      gsap.to(".home__videoPoster .imagesVideo", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__videoPoster__posterTexte .image, .home__videoPoster__posterTexte .liens", { opacity: 1, x: 0, duration: 0.5, delay: 0.5 });
      gsap.to(".home__videoPoster .texte", { opacity: 1, x: 0, duration: 0.5, delay: 1 });
    } else {
      gsap.to(".home__videoPoster .imagesVideo, .home__videoPoster__posterTexte .image, .home__videoPoster__posterTexte .liens, .home__videoPoster .texte", { opacity: 0, x: -50, duration: 0.5 });
    }
    const jerrySection = document.querySelector(".home__jerry");
    const jerryTriggerPoint = jerrySection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > jerryTriggerPoint) {
      gsap.to(".home__jerry .imagesVideo .video, .home__jerry .imagesVideo .image", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__jerry .home__jerry__texte", { opacity: 1, x: 0, duration: 0.5, delay: 0.5 });
    } else {
      gsap.to(".home__jerry .imagesVideo .video, .home__jerry .imagesVideo .image, .home__jerry .home__jerry__texte", { opacity: 0, x: -50, duration: 0.5 });
    }

    const poesieSection = document.querySelector(".home__poesie");
    const poesieTriggerSection = poesieSection.offsetLeft - window.innerWidth * 0.75;
    
    if (scrollX > poesieTriggerSection) {
      gsap.to(".home__poesie video, .home__poesie .image", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__poesie__poeme", { opacity: 1, x: 0, duration: 0.5, delay: 0.5 });
    } else {
      gsap.to(".home__poesie video, .home__poesie .image, .home__poesie__poeme", { opacity: 0, x: -50, duration: 0.5 });
    }
    
    const suiteSection = document.querySelector(".home__suite");
    const suiteTriggerSection = suiteSection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > suiteTriggerSection) {
      gsap.to(".home__suite__texteSuite", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__suite .image", { opacity: 1, x: 0, duration: 0.5, delay: 0.5 });
      gsap.to(".home__suite__texte", { opacity: 1, x: 0, duration: 0.5, delay: 1.5 });
    } else {
      gsap.to(".home__suite__texteSuite, .home__suite .image, .home__suite__texte", { opacity: 0, x: -50, duration: 0.5 });
    }

    const makeMeSection = document.querySelector(".home__makeMe");
    const makeMeTriggerPoint = makeMeSection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > makeMeTriggerPoint) {
      gsap.to(".home__makeMe__firstBlock .texte", { opacity: 1, x: 0, duration: 0.5 });
      gsap.to(".home__makeMe__firstBlock .imageVideo .video, .home__makeMe__firstBlock .imageVideo .image", { opacity: 1, x: 0, duration: 0.5, delay: 0.5 });
      gsap.to(".home__makeMe__secondBlock .texte", { opacity: 1, x: 0, duration: 0.5, delay: 1 });
      gsap.to(".home__makeMe__secondBlock .imageVideo .video, .home__makeMe__secondBlock .imageVideo .image", { opacity: 1, x: 0, duration: 0.5, delay: 1.5 });
      gsap.to(".home__makeMe__thirdBlock .imageVideo .video, .home__makeMe__thirdBlock .imageVideo .image", { opacity: 1, x: 0, duration: 0.5, delay: 2 });
      gsap.to(".home__makeMe__thirdBlock .title", { opacity: 1, x: 0, duration: 0.5, delay: 2.5 });
    } else {
      gsap.to(".home__makeMe .home__makeMe__firstBlock .texte, .home__makeMe .home__makeMe__firstBlock .imageVideo .video, .home__makeMe .home__makeMe__firstBlock .imageVideo .image, .home__makeMe .home__makeMe__secondBlock .texte, .home__makeMe .home__makeMe__secondBlock .imageVideo .video, .home__makeMe .home__makeMe__secondBlock .imageVideo .image, .home__makeMe .home__makeMe__thirdBlock .imageVideo .video, .home__makeMe .home__makeMe__thirdBlock .imageVideo .image, .home__makeMe .home__makeMe__thirdBlock .title", { opacity: 0, x: -50, duration: 0.5 });
    }

    const endSection = document.querySelector(".home__end");
    const endTriggerSection = endSection.offsetLeft - window.innerWidth * 0.75;

    if (scrollX > endTriggerSection) {
      gsap.to(".home__end .image", { opacity: 1, x: 0, duration: 0});
      gsap.to(".home__end__texte", { opacity: 1, x: 0, duration: 0.5 , delay: 0.5 });
      gsap.to(".home__end__films", { opacity: 1, x: 0, duration: 0.5, delay: 1 });
    } else {
      gsap.to(".home__end__texte, .home__end .image, .home__end__films", { opacity: 0, x: -50, duration: 0.5 });
    }
  });
  setTimeout(function () {
    document.querySelector(".loading-overlay").style.opacity = 0;
  }, 3000);
});