const nodeOps = {
  qs(selector, scope) {
    return (scope || document).querySelector(selector);
  },
  qsAll(selector, scope) {
    return (scope || document).querySelectorAll(selector);
  },
  getById(selector, scope) {
    return (scope || document).getElementById(selector);
  },
};


/* ------------------------------------------------------
// Drawer
*/
const ModalOpenButtons = nodeOps.qsAll(".js-modal-open-button");
const ModalCloseButtons = nodeOps.qsAll(".js-modal-close-button");
let currentModal = null;

// モーダルを開く
const handleModalOpen = (e) => {
  const openButton = e.target.closest(".js-modal-open-button");
  if (!openButton) return;

  const attributeValue = openButton.getAttribute("data-modal-open");
  const targetModal = nodeOps.getById(attributeValue);
  currentModal = targetModal;
  targetModal.classList.add("show-from");
  targetModal.showModal();
  header.classList.add("is-scroll-lock");
  currentModal.addEventListener('keydown', handleModalCloseKeydown);
  requestAnimationFrame(() => {
    targetModal.classList.remove("show-from");
  });
};

// モーダルを閉じる
const handleModalClose = () => {
  currentModal.classList.add("hide-to");
  // transitionが終わった後のイベントを追加
  currentModal.addEventListener(
    "transitionend",
    () => {
      currentModal.classList.remove("hide-to");
      currentModal.close();
      header.classList.remove("is-scroll-lock");
      currentModal = null;
    },
    {
      once: true, // trueを指定しないと2回目からモーダルが自動で閉じてしまう
    },
  );
};

// モーダルを閉じる(Escapeキーが押下された時)
const handleModalCloseKeydown = (e) => {
  e.preventDefault()
  if (e.key === 'Escape') {
    handleModalClose();
  }
};

// menuボタンにイベントを追加
ModalOpenButtons.forEach((openButton) => {
  openButton.addEventListener("click", handleModalOpen);
});

// closeボタンにイベントを追加
ModalCloseButtons.forEach((closeButton) => {
  closeButton.addEventListener("click", handleModalClose);
});


/* drawer表示切り替え(pcとsp)
/* -------------------------------- */
/* ------------------------------------------------------
// Drawer表示切り替え(Pc　| Sp)
*/
const drawerOpenButton = nodeOps.qs(".l-header__menu-button");
const BREAKPOINT = 1052;

function changeAttribute() {
  if (window.innerWidth >= BREAKPOINT) {
    drawerOpenButton.setAttribute("data-modal-open", "drawer-pc");
  } else {
    drawerOpenButton.setAttribute("data-modal-open", "drawer");
  }
}

changeAttribute();

let resizeTimer;
window.addEventListener("resize", () => {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    changeAttribute();
  }, 100);
});


/* ------------------------------------------------------
// Headerの追従切り替え
*/
const fvSection = nodeOps.qs(".p-fv");
const header = nodeOps.qs(".js-header");
const menuButton = nodeOps.qs(".js-modal-open-button");
const menuIconBar = nodeOps.qs(".js-header__menu-bar");
const logoImage = nodeOps.qs(".js-header__logo-img");

const fvObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) {
        header.classList.add("fade");
        header.style.backgroundColor = "var(--color-white-1)";
        menuButton.style.color = "var(--color-black)";
        menuIconBar.style.backgroundColor = "var(--color-black)";
        logoImage.setAttribute("src", logoImage.dataset.blackLogo);
      } else {
        header.classList.remove("fade");
        header.style.backgroundColor = "";
        menuButton.style.color = "";
        menuIconBar.style.backgroundColor = "";
        logoImage.setAttribute("src", logoImage.dataset.whiteLogo);
      }
    });
  },
  {
    threshold: 0,
    rootMargin: "0px 0px 0px 0px",
  }
);

fvObserver.observe(fvSection);


// /* ------------------------------------------------------
// // Navigation underline.
// */
// const underline = nodeOps.getById("js-underline");
// const navigationItems = nodeOps.qsAll(".l-footer__nav-item");

// navigationItems.forEach(item => {
//   item.addEventListener('mouseenter', function() {
//     underline.style.inlineSize = `${this.offsetWidth}px`;
//     underline.style.insetInlineStart = `${this.offsetLeft}px`;
//   });

//   item.addEventListener('mouseleave', function() {
//     underline.style.inlineSize = '0';
//   });
// });