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

/* 下層ページ 
-------------------------------------------------- */
/* drawer
-------------------------------------------------- */
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

/* 下層ページ 
-------------------------------------------------- */
/* drawer表示切り替え(pcとsp)
----------------------------------------------------- */
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

/* 下層ページ 共通
-------------------------------------------------- */
/* header
-------------------------------------------------- */
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

/* STAFF-DETAIL ページ 
-------------------------------------------------- */
/* sidebar
-------------------------------------------------- */
const sidebarItems = nodeOps.qsAll(".p-lower-staff-detail__sidebar-item a");
const sections = nodeOps.qsAll(".p-lower-staff-detail__about h2");
const aside = nodeOps.qs(".p-lower-staff-detail__aside");

const handleClick = function () {
  sidebarItems.forEach((i) => i.removeAttribute("aria-current"));
  this.setAttribute("aria-current", "true");
};

let timeout;
const handleResize = () => {
  clearTimeout(timeout);
  timeout = setTimeout(() => {
    if (!aside) return;
    const isVisible = window.getComputedStyle(aside).display !== "none";
    if (isVisible) {
      // サイドバーの項目をクリックした時の処理
      sidebarItems.forEach((item) => {
        item.addEventListener("click", accordionHandleClick);
      });

      // 最初のセクションタイトル用の設定(articleセクションが監視対象)
      const firstSectionOptions = {
        root: null,
        rootMargin: "-50% 0px 0px 0px", // 画面中央でトリガー
        threshold: 0, // 一部でも見えたらコールバックを実行
      };
      // 全てのセクションタイトル用の設定（画面上部手前トリガー）
      const otherSectionOptions = {
        root: null, // ビューポートをルートとして使用
        rootMargin: "0px 0px -70% 0px", // 画面上部手前でトリガー
        threshold: 0, // 一部でも見えたらコールバックを実行
      };

      // 最初のセクションタイトル用のコールバック
      const firstSectionCallback = (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            sidebarItems.forEach((item) => {
              if (item.hasAttribute("aria-current")) {
                item.removeAttribute("aria-current");
              } else {
                return;
              }
            });
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
          );

          if (!activeItem) return;

          if (entry.isIntersecting) {
            sidebarItems.forEach((item) =>
              item.removeAttribute("aria-current")
            );
            activeItem.setAttribute("aria-current", "true");
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
        item.removeEventListener("click", accordionHandleClick);
      });
    }
  }, 250);
};

window.addEventListener("resize", handleResize);
handleResize();

/* DETAILS | FAQ ページ 
-------------------------------------------------- */
/* スムーススクロール
-------------------------------------------------- */
const occupationLinks = nodeOps.qsAll(".js-scroll-link");

occupationLinks.forEach((occupationLink) => {
  occupationLink.addEventListener("click", (e) => {
    e.preventDefault();
    const id = occupationLink.getAttribute("href").replace("#", "");
    const targetElement = nodeOps.getById(id);
    const isPrefersReduced = window.matchMedia(
      "(prefers-reduced-motion: reduce)"
    ).matches;
    const scrollBehavior = isPrefersReduced ? "instant" : "smooth";

    if (targetElement) {
      targetElement.scrollIntoView({
        behavior: scrollBehavior,
        block: "start",
      });
    }
  });
});

/* FAQ ページ 
-------------------------------------------------- */
/* アコーディオン
-------------------------------------------------- */
const defaultOptions = {
  duration: 300,
  easing: "ease-in-out",
  printAll: false,
};

const initializeDetailsAccordion = (details, options = {}) => {
  if (!details) {
    console.error("initializeDetailsAccordion: Details element is not found.");
    return;
  }
  const summary = nodeOps.qs("summary", details);
  const panel = nodeOps.qs("summary + *", details);

  if (!summary || !panel) {
    console.error(
      "initializeDetailsAccordion: Elements required for initializeDetailsAccordion are not found."
    );
    return;
  }

  const mergedOptions = { ...defaultOptions, ...options };
  const detailsName = details.getAttribute("name") || null;

  // summaryをクリックしたらaccordionHandleClick関数を実行
  details.addEventListener(
    "click",
    (e) => accordionHandleClick(e, details, panel, mergedOptions, detailsName),
    false
  );

  // printAllがtrueの場合の処理
  // 印刷前の状態を記録し、印刷後に復元する
  if (mergedOptions.printAll) {
    window.addEventListener("beforeprint", () =>
      handleBeforePrint(details, detailsName)
    );
    window.addEventListener("afterprint", () =>
      handleAfterPrint(details, detailsName)
    );
  }
};

let isAnimating = false;

// アコーディオンにアニメーションをつける
const toggleAccordion = (details, panel, options, detailsName, show) => {
  if (details.open === show) return;

  // アニメーション中は連打を防止する
  isAnimating = true;

  // name属性をアニメーション中は削除する
  if (detailsName) details.removeAttribute("name");
  if (show) details.open = true;

  // アニメーション中のみにoverflow:clipを適用
  panel.style.overflow = "clip";

  const { blockSize } = window.getComputedStyle(panel);
  const keyframes = show
    ? [{ maxBlockSize: "0" }, { maxBlockSize: blockSize }]
    : [{ maxBlockSize: blockSize }, { maxBlockSize: "0" }];

  // 視差効果を減らす設定をしているかを判定
  const isPrefersReduced = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;
  const animationOptions = {
    duration: isPrefersReduced ? 0 : Math.max(0, options.duration || 0),
    easing: options.easing,
  };

  const onAnimationEnd = () => {
    requestAnimationFrame(() => {
      panel.style.overflow = "";
      if (!show) details.open = false;
      if (detailsName) details.setAttribute("name", detailsName);
      isAnimating = false;
    });
  };

  // アニメーションが終わった後にonAnimationEnd関数を実行
  requestAnimationFrame(() => {
    const animation = panel.animate(keyframes, animationOptions);
    animation.addEventListener("finish", onAnimationEnd);
  });
};

// 同じname属性を持つ他のアコーディオンを閉じる
const hideOtherAccordions = (details, options, detailsName) => {
  if (!detailsName) return;

  const otherDetails = nodeOps.qs(`details[name="${detailsName}"][open]`);
  if (!otherDetails || otherDetails === details) return;

  const otherPanel = nodeOps.qs("summary + *", otherDetails);
  if (!otherPanel) return;

  toggleAccordion(otherDetails, otherPanel, options, detailsName, false);
};

// アコーディオンの開閉を実行
const accordionHandleClick = (e, details, panel, options, detailsName) => {
  e.preventDefault();

  // アニメーション中であれば早期リターン
  if (isAnimating) return;

  toggleAccordion(details, panel, options, detailsName, !details.open);

  if (details.open) hideOtherAccordions(details, options, detailsName);
};

const openStatusAttribute = "data-open-status";

// 印刷前の表示状態を記録する
const handleBeforePrint = (details, detailsName) => {
  if (!details) return;
  details.setAttribute(openStatusAttribute, String(details.open));
  if (detailsName) details.removeAttribute("name");
  details.open = true;
};

// 印刷後に印刷前の表示状態に復元
const handleAfterPrint = (details, detailsName) => {
  if (!details) return;
  if (detailsName) details.setAttribute("name", detailsName);
  details.open = details.getAttribute(openStatusAttribute) === "true";
  details.removeAttribute(openStatusAttribute);
};

document.addEventListener("DOMContentLoaded", () => {
  const accordions = nodeOps.qsAll("details");

  if (accordions.length === 0) return;

  accordions.forEach((accordion) => {
    initializeDetailsAccordion(accordion, {
      duration: 300,
    });
  });
});
