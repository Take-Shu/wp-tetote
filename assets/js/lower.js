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
  modalOpenButtons.forEach((modalOpenButton) => {
    modalOpenButton.removeEventListener("click", handleModalOpen);
    modalOpenButton.addEventListener("click", handleModalOpen);
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
const observerTarget = nodeOps.qs(".js-observer-target");
const header = nodeOps.qs(".js-header");

const headerObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) {
        header.classList.add("fade");
      } else {
        header.classList.remove("fade");
      }
    });
  },
  {
    threshold: 0,
    rootMargin: "0px 0px 0px 0px",
  }
);

headerObserver.observe(observerTarget);

// /* スタッフ詳細ページ
// ----------------------------------------------------- */
// /* スムーススクロール
// ----------------------------------------------------- */
// const staffAboutLinks = nodeOps.qsAll(".p-lower-staff-detail__sidebar a");

// staffAboutLinks.forEach(staffAboutLink => {
//   staffAboutLink.addEventListener('click', (e) => {
//     e.preventDefault();
//     const id = staffAboutLink.getAttribute('href').replace('#', '');
//     const targetElement = nodeOps.getById(id);

//     if (targetElement) {
//       targetElement.scrollIntoView({
//         behavior: 'smooth',
//         block: 'start'
//       });
//     }
//   });
// });

// /* サイドバーのアクティブ表示
// ----------------------------------------------------- */
const sidebarItems = nodeOps.qsAll(".p-lower-staff-detail__sidebar-item");
const sections = nodeOps.qsAll(".p-lower-staff-detail__about h2");
const aside = nodeOps.qs(".p-lower-staff-detail__aside");

const handleClick = function() {
  sidebarItems.forEach((i) => i.classList.remove('active'));
  this.classList.add('active');
}

let timeoutId;
const handleResize = () => {
  cancelAnimationFrame(timeoutId);
  timeoutId = requestAnimationFrame(() => {
    const isVisible = window.getComputedStyle(aside).display !== "none";
    if (isVisible) {
      // サイドバーの項目をクリックした時の処理
      sidebarItems.forEach((item) => {
        item.addEventListener('click', handleClick);
      });

      // 最初のセクションタイトル用の設定(articleセクションが監視対象)
      const firstSectionOptions = {
        root: null,
        rootMargin: "-50% 0px", // 画面中央でトリガー
        threshold: 0, // 一部でも見えたらコールバックを実行
      };
      // 全てのセクションタイトル用の設定（画面上部手前トリガー）
      const otherSectionOptions = {
        root: null, // ビューポートをルートとして使用
        rootMargin: "-200px 0px -100% 0px", // 画面上部手前でトリガー
        threshold: 0, // 一部でも見えたらコールバックを実行
      };

      // 最初のセクションタイトル用のコールバック
      const firstSectionCallback = (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            if (sidebarItems[0].classList.contains("active")) {
              sidebarItems[0].classList.remove("active");
            } else {
              return;
            }
          }
        });
      };

      // 全てのセクションタイトル用のコールバック
      const otherSectionsCallback = (entries) => {
        entries.forEach((entry) => {
          // 対応するサイドバー項目にアクティブクラスを追加
          const targetId = entry.target.id;
          const activeItem = nodeOps.qs(
            `.p-lower-staff-detail__sidebar-item a[href="#${targetId}"]`
          )?.parentElement;

          if (!activeItem) return;

          if (entry.isIntersecting) {
            sidebarItems.forEach((item) => item.classList.remove("active"));
            activeItem.classList.add("active");
          }
        });
      };

      // ２つのIntersectionObserverを作成
      const firstSectionObserver = new IntersectionObserver(
        firstSectionCallback,
        firstSectionOptions
      );
      const otherSectionObserver = new IntersectionObserver(
        otherSectionsCallback,
        otherSectionOptions
      );

      // 各セクションタイトル要素を監視対象に追加
      sections.forEach((section) => {
        otherSectionObserver.observe(section);
      });

      // articleセクションを監視対象に追加
      firstSectionObserver.observe(observerTarget);

    } else {
      sidebarItems.forEach((item) => {
        item.removeEventListener('click', handleClick);
      });
    }
  });
};

window.addEventListener("resize", handleResize);
handleResize();
