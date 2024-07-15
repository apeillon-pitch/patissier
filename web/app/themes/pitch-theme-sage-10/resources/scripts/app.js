import {domReady} from '@roots/sage/client';
import $ from 'jquery';
import 'bootstrap';
import './slide-menu';
import 'select2';

/**
 * Addons
 */
import 'slick-carousel/slick/slick.min';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  filterRecipes();
  setSelect2();
  dropdownMenu();
  getStickyMenu();

  function filterRecipes()
  {
    const urlSelector = document.getElementById('mag-filter');

    if(urlSelector) {
      urlSelector.addEventListener('change', (event) => {
        const selectedUrl = event.target.value;
        if (selectedUrl) {
          window.location.href = selectedUrl;
        }
      });
    }
  }

  function setSelect2() {
    $('.ginput_container_select select').select2({
      minimumResultsForSearch: Infinity,
    });
  }

  function dropdownMenu() {
    const navLinks = document.querySelectorAll('#o-wrapper .nav-link.dropdown-toggle');
    const dropdownMenus = document.querySelectorAll('#o-wrapper .dropdown-menu');

    navLinks.forEach(navLink => {
      navLink.addEventListener('mouseenter', () => {
        navLink.classList.add('show');
      });

      navLink.addEventListener('mouseleave', () => {
        navLink.classList.remove('show');
      });
    });

    dropdownMenus.forEach(dropdownMenu => {
      dropdownMenu.addEventListener('mouseenter', () => {
        Array.from(dropdownMenu.parentElement.children).forEach(child => {
          child.classList.add('show');
        });
      });

      dropdownMenu.addEventListener('mouseleave', () => {
        Array.from(dropdownMenu.parentElement.children).forEach(child => {
          child.classList.remove('show');
        });
      });
    });
  }

  function getStickyMenu() {
    var el_html = document.documentElement;
    var el_body = document.body;
    var lastScrollTop = 0; // Stocke la dernière position de défilement

    function onScrolling() {
      var wScrollTop = window.pageYOffset || el_body.scrollTop;

      // Si tout en haut de la page, ajouter 'nav-transparent'
      if (wScrollTop <= 0) {
        el_html.classList.add('nav-transparent');
      } else {
        el_html.classList.remove('nav-transparent');
      }

      // Défilement vers le bas
      if (wScrollTop > lastScrollTop) {
        el_html.classList.remove('nav-visible');
        el_html.classList.add('nav-hidden');
      }
      // Défilement vers le haut
      else if (wScrollTop < lastScrollTop) {
        el_html.classList.remove('nav-hidden');
        el_html.classList.add('nav-visible');
      }

      // Mettre à jour lastScrollTop pour la prochaine invocation
      lastScrollTop = wScrollTop <= 0 ? 0 : wScrollTop; // Pour éviter les valeurs négatives
    }

    window.addEventListener('scroll', function () {
      window.requestAnimationFrame(onScrolling);
    });
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
