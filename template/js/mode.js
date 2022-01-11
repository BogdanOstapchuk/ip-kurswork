document.querySelector(".themes").addEventListener("change", (e) => {
  if (e.target.nodeName === "INPUT") {
    if (document.documentElement.classList.contains("light")) {
      document.documentElement.classList.remove(e.target.value);
      document.documentElement.classList.add("dark");
    } else {
      document.documentElement.classList.remove("dark");
      document.documentElement.classList.add(e.target.value);
    }
  }
});
//
