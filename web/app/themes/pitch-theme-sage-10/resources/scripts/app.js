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

    urlSelector.addEventListener('change', (event) => {
      const selectedUrl = event.target.value;
      if (selectedUrl) {
        window.location.href = selectedUrl;
      }
    });
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
    var w = window;
    var d = document;
    var el_html = d.documentElement;
    var el_body = d.body;

    function menuIsStuck() {
      var wScrollTop = w.pageYOffset || el_body.scrollTop;
      var isStuck = el_html.classList.contains('nav-is-stuck');

      if (wScrollTop > 0 && !isStuck) {
        el_html.classList.add('nav-is-stuck');
        el_body.style.paddingTop = '0';
      }

      if (wScrollTop < 2 && isStuck) {
        el_html.classList.remove('nav-is-stuck');
        el_body.style.paddingTop = '0';
      }
    }

    w.addEventListener('scroll', function() {
      w.requestAnimationFrame(menuIsStuck);
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
