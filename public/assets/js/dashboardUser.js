const btnEdit = document.querySelector("#editUser");
const btnClose = document.querySelector(".btn_closed");
const modal = document.querySelector(".userD_modal");


btnEdit.addEventListener("click", () => {
  if (modal.classList.contains("modal_closed")) {
    modal.classList.remove("modal_closed");
    modal.classList.add("modal_open");
  }
});

btnClose.addEventListener("click", () => {
  if (modal.classList.contains("modal_open")) {
    modal.classList.remove("modal_open");
    modal.classList.add("modal_closed");
  }
});
