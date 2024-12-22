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

// /* view-more 位置調整
// ----------------------------------------------------- */

function employeeBtnPosition() {
  let windowSize = window.innerWidth;
  const employeeBtn = nodeOps.qs(".js-employee-btn");

  if (windowSize >= 1440) {
    let leftMargin = (windowSize - 1440) / 2 + 542 + "px";
    employeeBtn.style.marginInlineStart = leftMargin;
  } else {
    employeeBtn.style.marginInlineStart = "";
    window.removeEventListener("resize", employeeBtnPosition);
  }
}

employeeBtnPosition();
window.addEventListener("resize", employeeBtnPosition);
