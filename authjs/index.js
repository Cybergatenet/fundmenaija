const singleElementSelector = element => document.querySelector(element) // Html single element selector
const multiElementSelector = element => document.querySelectorAll(element) // Html multiple element selector

const logo = singleElementSelector('.logo') 
const hamburgerMenuIcon = singleElementSelector('.menuIcon')
const faTimes = singleElementSelector('.fa-times')
const faBars = singleElementSelector('.fa-bars')

const links = multiElementSelector('#nav-link') 
const writeUp = multiElementSelector('.write-up')  
const detailsBtn = multiElementSelector('.detailsBtn') 

//********** Change Navbar background on scroll **********
window.addEventListener('scroll', () => {

  if (window.scrollY > 8) {
    logo.classList.add('scrollColor')
    faBars.classList.add('scrollColor')
    faTimes.classList.add('scrollColor')
    singleElementSelector('header').classList.add('scroll')
<<<<<<< HEAD
    // change_link_color(links)
    links.forEach(link => link.classList.add('scrollColor'))
=======
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
    
  }else{
    logo.classList.remove('scrollColor')
    faBars.classList.remove('scrollColor')
    faTimes.classList.remove('scrollColor')
    singleElementSelector('header').classList.remove('scroll')
<<<<<<< HEAD
    // change_link_color(links)
    links.forEach(link => link.classList.remove('scrollColor'))
  }
      
=======
  }
      
  change_link_color(links)
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
})


// *************** Hamburger menu function ***************
let hamburerIndicator = 'false';
const hamburger = () => {
  let x = singleElementSelector('.mobile')

  if (x.style.display === 'block') {
    x.style.display = 'none'; 
    faTimes.classList.add('hideMenu')
    faBars.classList.remove('hideMenu')
    
    
  }else{
    x.style.display = 'block';
    faTimes.classList.remove('hideMenu')
    faBars.classList.add('hideMenu')
  }
}
    
    
//************* Change link and hamburger menu color on scroll *************
const change_link_color = (arrayOfLinks) => { 
  arrayOfLinks.forEach(link => {
    if (window.scrollY > 8) return link.classList.color = 'black !important'
    link.classList.color = 'white'
  });
}
// change_link_color(links)


//****************** Fly-in Effect ******************
const Observer = new IntersectionObserver(entries => { 
  entries.forEach(entry => {
    if (entry.isIntersecting) {
        entry.target.classList.add('show')
        
    }else{
        entry.target.classList.remove('show')

    }
  })
}) 

const hiddenElements = multiElementSelector('.hidden')
hiddenElements.forEach(ele => Observer.observe(ele))



//*********** Donation Page Read functionality ***********
let counter = 0;
let hide = 'text-truncate';
multiElementSelector('.write-up').forEach(post => {post.classList.add(hide)})

multiElementSelector('.detailsBtn').forEach(btn => {
  btn.addEventListener('click', () => {
    counter ++
    multiElementSelector('.write-up').forEach(ele => {

      if (ele.id == btn.id && counter == 1) {
        ele.classList.remove(hide)
        
      }else if (ele.id == btn.id && counter > 1) {
        ele.classList.add(hide)
        counter  = 0
      }
    })
  })
})



// Effects
const select = (el, all = false) => {
  el = el.trim()
  if (all) {
    return [...document.querySelectorAll(el)]
  } else {
    return document.querySelector(el)
  }
}

  /**
   * Back to top button
   */
   let backtotop = select('.back-to-top')
   if (backtotop) {
     const toggleBacktotop = () => {
       if (window.scrollY > 100) {
         backtotop.classList.add('active')
       } else {
         backtotop.classList.remove('active')
       }
     }
     window.addEventListener('load', toggleBacktotop)
     onscroll(document, toggleBacktotop)
   }
 
   /**
    * Mobile nav toggle
    */
   on('click', '.mobile-nav-toggle', function(e) {
     select('#navbar').classList.toggle('navbar-mobile')
     this.classList.toggle('bi-list')
     this.classList.toggle('bi-x')
   })
 
   /**
    * Mobile nav dropdowns activate
    */
   on('click', '.navbar .dropdown > a', function(e) {
     if (select('#navbar').classList.contains('navbar-mobile')) {
       e.preventDefault()
       this.nextElementSibling.classList.toggle('dropdown-active')
     }
   }, true)
 
   /**
    * Scrool with ofset on links with a class name .scrollto
    */
   on('click', '.scrollto', function(e) {
     if (select(this.hash)) {
       e.preventDefault()
 
       let navbar = select('#navbar')
       if (navbar.classList.contains('navbar-mobile')) {
         navbar.classList.remove('navbar-mobile')
         let navbarToggle = select('.mobile-nav-toggle')
         navbarToggle.classList.toggle('bi-list')
         navbarToggle.classList.toggle('bi-x')
       }
       scrollto(this.hash)
     }
   }, true)
 
   /**
    * Scroll with ofset on page load with hash links in the url
    */
   window.addEventListener('load', () => {
     if (window.location.hash) {
       if (select(window.location.hash)) {
         scrollto(window.location.hash)
       }
     }
   });
 
   /**
    * Preloader
    */
   let preloader = select('#preloader');
   if (preloader) {
     window.addEventListener('load', () => {
       preloader.remove()
     });
   }
 