function openForm(elementId) {
  document.getElementById(elementId).style.display = "block";
}
function closeForm(close) {
  let closebtn = document.getElementById(close);
  if (closebtn) {
    closebtn.style.display = "none";
  }
}
