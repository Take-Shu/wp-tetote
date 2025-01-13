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


// /* drawer
// ----------------------------------------------------- */
const modalOpenButtons = nodeOps.qsAll(".js-modal-open-button");

const modalManager = {
  currentModal: null,
  modalOpen: function (targetModal) {
    this.currentModal = targetModal;
    this.currentModal.showModal();
    this.currentModal.addEventListener("click", handleModalClose);
  },
  modalClose: function () {
    this.currentModal.removeEventListener("click", handleModalClose);
    this.currentModal.close();
    this.currentModal = null;
  },
};

const handleModalOpen = (e) => {
  const targetButton = e.target.closest(".js-modal-open-button");
  if (!targetButton) return;

  const attributeValue = targetButton.getAttribute("data-modal-open");
  const targetModal = nodeOps.getById(attributeValue);
  modalManager.modalOpen(targetModal);
};

const handleModalClose = (e) => {
  if (e.target.classList.contains("js-modal-close-button")) {
    modalManager.modalClose();
  }
};

const modalOpenTrigger = () => {
  modalOpenButtons.forEach(modalOpenButton => {
    modalOpenButton.removeEventListener('click', handleModalOpen);
    modalOpenButton.addEventListener('click', handleModalOpen);
  });
};

modalOpenTrigger();


// /* drawer表示切り替え(pcとsp)
// ----------------------------------------------------- */
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


// /* ヘッダーの表示切り替え
// ----------------------------------------------------- */
const fvSection = nodeOps.qs(".c-lower-fv");
const header = nodeOps.qs(".js-header");

const fvObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      header.classList.add("fade");
    } else {
      header.classList.remove("fade");
    }
  })
},
{
  threshold: 0,
  rootMargin: "0px 0px 0px 0px",
});

fvObserver.observe(fvSection);