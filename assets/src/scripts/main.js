import { AJAX } from "./api";
import { API_URL } from "./config";



const displayWindow = function(){
  const works = document.querySelectorAll('.work');
  const overlay = document.querySelector('.overlay');
  const displayWindow = document.querySelector('.display-window');
  const buttonClose = document.querySelector('.btn--close-modal');


  buttonClose.addEventListener('click', function () {
    overlay.classList.toggle('hidden');
    displayWindow.classList.toggle('hidden');
  });

  overlay.addEventListener('click', function () {
    overlay.classList.toggle('hidden');
    displayWindow.classList.toggle('hidden');
  });


  works.forEach((work) => {
    work.addEventListener('click', function (e) {
      e.preventDefault();

      let slug = work.dataset.slug
      let project = state.projects.find(project => project.slug === slug);
      const category = document.querySelector('.display-window__category');
      const heading = document.querySelector('.display-window__heading');
      const description = document.querySelector('.display-window__description');
      const images = document.querySelector('.display-window__image-list');
      const skills = document.querySelector('.display-window__skill-list');

      category.textContent = project.subHeading;
      heading.textContent = project.title;
      description.innerHTML = project.description;
      images.textContent = "";
      skills.textContent = "";

      const buttonColors = ['blue', 'green', 'orange', 'purple', 'neon'];
      project.skills.map((skill, index) => {
        let color = buttonColors[index % buttonColors.length];
        let skill_markup = `
             <button class="btn btn--${color}">${skill}</button>
        `;
        skills.insertAdjacentHTML('afterbegin', skill_markup);
      })

      project.links.map(link => {
        let link_markup = `
           <a class="btn btn--cta" target="${link.target}" href="${link.url}">${link.title}</a>
        `;
        skills.insertAdjacentHTML('afterbegin', link_markup);
      })

      project.images.map(image => {
        let image_markup = `
          <div class="display-window__image-item">
               <img class="" src="${image}" alt=""> 
          </div>  
        `;
        images.insertAdjacentHTML('afterbegin', image_markup);
      })

      overlay.classList.toggle('hidden');
      displayWindow.classList.toggle('hidden');

    });
  });
}



/**
 * initScrolledHeader 
 */
const body = jQuery("body");
const scrollChange = 80; 
jQuery(window).scroll(function() {
   initScrolledHeader();
});

const initScrolledHeader = () => {
const scroll = jQuery(window).scrollTop();
   if (scroll >= scrollChange) {
     body.addClass("is-header-scrolled");

   } else {
     body.removeClass("is-header-scrolled");
   }
}




const revealSection = function(entries, observer){
  const [entry] = entries;
  if (!entry.isIntersecting) return;

  entry.target.classList.remove('section--hidden');
  observer.unobserve(entry.target);
}

const sectionObserver = new IntersectionObserver(revealSection, {
  root: null,
  threshold: 0.2,
})

const observeFunction = function(){

  const allSections = document.querySelectorAll('.section');

  allSections.forEach(function(section){
    sectionObserver.observe(section);
    section.classList.add('section--hidden');
  })
  
  
  window.addEventListener('load', () => {
    const hash = window.location.hash;
    if (hash) {
        const targetElement = document.querySelector(hash);
        if (targetElement) {
            targetElement.classList.remove('section--hidden'); // Ensure visibility on page load
            targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
  });
}

const navigationTarget = function(){
  document.querySelectorAll('.scroll-link').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of jumping directly to the section.

        // Get the <a> tag inside the clicked <li>
        const anchor = this.querySelector('a');
        const targetId = anchor.getAttribute('href').substring(1); // Get the ID without the '#'
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            // Calculate the position 10px above the target element
            const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - 150;

            // Scroll to the calculated position
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        } else {
            console.warn(`Element with ID "${targetId}" not found.`);
        }
    });
});
}


const state = {
  projects: {},
}

const renderWork = function(project){
  const parentElement = document.querySelector('.works'); 
  console.log(project);
  const markup = `
      <article class="work section" data-slug="${project.slug}">
            <div class="work__content">
               <p class="work__category">${project.subHeading}</p>
               <h3 class="work__heading">${project.title}</h3>
               ${project.description}
               <button class="btn btn--cta btn--work">Read More</button>
            </div>
            <div class="work__thumbnail" style="background-image: url('${project.displayImage}');">
            </div>
      </article>
  `;
  parentElement.insertAdjacentHTML('beforeend', markup);
}

const toggleSpinner = function(show) {
  const header = document.querySelector('.header');
  const footer = document.querySelector('.footer');
  const main = document.querySelector('.main');
  const spinner = document.querySelector('.spinner');

  if (show) {
    header.classList.add('hidden');
    footer.classList.add('hidden');
    main.classList.add('hidden');
    spinner.classList.remove('hidden');
  } else {
    header.classList.remove('hidden');
    footer.classList.remove('hidden');
    main.classList.remove('hidden');
    spinner.classList.add('hidden');
  }
}


const init = async function (){
  try {
            const data = await AJAX(API_URL);
            console.log(data);
            state.projects = data.map(project =>{
              return {
                  id: project.id,
                  title: project.title?.rendered || '', 
                  subHeading: project.acf?.sub_heading || '',
                  description: project.acf?.description || '',
                  displayImage: project.acf?.display_image || '',
                  slug: project.slug || '',
                  links: project.acf?.links ? project.acf.links.map(link => link.link) : [], 
                  skills: project.acf?.skills ? project.acf.skills.map(skill => skill.skill) : [], 
                  images: project.acf?.images ? project.acf.images.map(image => image.image) : [] 
              }
            })

            state.projects.map(
              project => renderWork(project)
            )

            observeFunction();
            navigationTarget();
            displayWindow();


  } catch (error) {
            throw error;
  }
}

const getData = async function() {
  try {
    toggleSpinner(true); 
    await init(); 
  } catch (error) {
    throw error;
  } finally {
    toggleSpinner(false);
  }
}

getData();



/**
 * Instant Page (Required)
 * When a user hovers near a link, then pre-load a page; psychological
 * effect is that user feels page load is faster.
 * @source https://instant.page
 */
import "instant.page";

/**
* ======================
* Load functions when page is loaded
* ======================
*/
// document.addEventListener("DOMContentLoaded", () => {
         
// });
