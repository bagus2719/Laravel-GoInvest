// Function to display the buy Produk popup
function showPopup() {
  document.getElementById("buyProdukPopup").style.display = "block";
}
// Function to close the buy Produk popup
function closePopup() {
  document.getElementById("buyProdukPopup").style.display = "none";
}
// Event listener to show the popup when "Buy Produk" is clicked
document
  .getElementById("buyProduk")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent default link behavior
    showPopup();
  });

// Fungsi untuk menampilkan atau menyembunyikan tombol "Scroll To Top" berdasarkan posisi scroll
window.onscroll = function () {
  scrollFunction();
};
function scrollFunction() {
  var scrollToTopBtn = document.getElementById("scrollToTopBtn");

  // Tampilkan tombol jika pengguna menggulir lebih dari 20px dari atas halaman
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}
// Fungsi untuk melakukan animasi scrolling kembali ke bagian atas halaman
function scrollToTop() {
  var currentPosition =
    document.documentElement.scrollTop || document.body.scrollTop;

  if (currentPosition > 0) {
    window.requestAnimationFrame(scrollToTop);
    window.scrollTo(0, currentPosition - currentPosition / 8);
  }
}

function saveFormDataToLocalStorage(formData) {
  return new Promise((resolve, reject) => {
    try {
      const data = {};
      for (const [key, value] of formData.entries()) {
        data[key] = value;
      }
      localStorage.setItem("formData", JSON.stringify(data));
      resolve();
    } catch (error) {
      reject(error);
    }
  });
}

function getFormDataFromLocalStorage() {
  return new Promise((resolve, reject) => {
    try {
      const formData = localStorage.getItem("formData");
      resolve(formData ? JSON.parse(formData) : null);
    } catch (error) {
      reject(error);
    }
  });
}

function closePopup() {
  document.getElementById("buyProdukPopup").style.display = "none";
}

function handleSubmit(event) {
  event.preventDefault();
  const form = event.target;
  const formData = new FormData(form);

  saveFormDataToLocalStorage(formData).catch((error) => console.error(error));

  form.reset();
  getFormDataFromLocalStorage()
    .then((formData) => {
      if (formData) {
        const nameInput = document.querySelector('input[name="Nama"]');
        const emailInput = document.querySelector('input[name="Email"]');
        const assetsInput = document.querySelector('input[name="Nama Assets"]');
        const quantityInput = document.querySelector(
          'input[name="Jumlah Saham"]'
        );
        if (nameInput) nameInput.value = formData["Nama"] || "";
        if (emailInput) emailInput.value = formData["Email"] || "";
        if (assetsInput) assetsInput.value = formData["Nama Assets"] || "";
        if (quantityInput) quantityInput.value = formData["Jumlah Saham"] || "";
      }
    })
    .catch((error) => console.error(error));
}

document
  .querySelector(".popup-content form")
  .addEventListener("submit", handleSubmit);
