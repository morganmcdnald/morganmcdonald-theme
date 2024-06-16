// ----------------------------------------
// INTERSECTION OBSERVER FOR FADE UPS
// ----------------------------------------

const fadeUpEls = document.querySelectorAll('.fade-up');

const fadeUpCallback = (entries) => {
  entries.forEach((entry) => {
    if(entry.isIntersecting){
      entry.target.classList.add('fade-up--animation');
      entry.target.style.animationDelay = `${Math.random() * (900 - 150) + 150}ms`;
    }
  })
}

let fadeUpOptions = {
  rootMargin: '0px 0px -100px 0px',
  threshold: 0.1,
}

let fadeUpObserver = new IntersectionObserver(fadeUpCallback, fadeUpOptions);

if(fadeUpEls){
  for(let i=0; i<fadeUpEls.length; i++){
    fadeUpObserver.observe(fadeUpEls[i]);
  }
}


// INTERSECTION OBSERVER FOR FADE INS

const fadeInEls = document.querySelectorAll('.fade-in');

const fadeInCallback = (entries) => {
  entries.forEach((entry) => {
    if(entry.isIntersecting){
      entry.target.classList.add('fade-in--animation');
      entry.target.style.animationDelay = `${Math.random() * (900 - 150) + 150}ms`;
    }
  })
}

let fadeInOptions = {
  rootMargin: '0px 0px -100px 0px',
  threshold: 0.1,
}

let fadeInObserver = new IntersectionObserver(fadeInCallback, fadeInOptions);

if(fadeInEls){
  for(let i=0; i<fadeInEls.length; i++){
    fadeInObserver.observe(fadeInEls[i]);
  }
}