const wrapper = document.querySelector(".wrapper"),
  qrInput = wrapper.querySelector(".form input"),
  generateBtn = wrapper.querySelector(".form button"),
  qrImg = wrapper.querySelector(".qr-code img");
let preValue;
let downloadBtn = null;
let printBtn = null;

generateBtn.addEventListener("click", () => {
  let qrValue = qrInput.value.trim();
  if (!qrValue || preValue === qrValue) return;
  preValue = qrValue;
  generateBtn.innerText = "Generating QR Code...";
  qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
  qrImg.addEventListener("load", () => {
    wrapper.classList.add("active");
    generateBtn.innerText = "Generate QR Code";

    // Remove existing download button
    if (downloadBtn) {
      downloadBtn.remove();
      downloadBtn = null;
    }

    // Remove existing print button
    if (printBtn) {
      printBtn.remove();
      printBtn = null;
    }

    // Add download button
    downloadBtn = document.createElement("a");
    downloadBtn.href = qrImg.src;
    downloadBtn.download = "qr-code.png";
    downloadBtn.innerText = "Download";
    wrapper.appendChild(downloadBtn);

    // Add print button
    // printBtn = document.createElement("button");
    // printBtn.innerText = "Print";
    // printBtn.addEventListener("click", () => {
    //   printQRCode();
    // });
    // wrapper.appendChild(printBtn);
  });
});

qrInput.addEventListener("keyup", () => {
  if (!qrInput.value.trim()) {
    wrapper.classList.remove("active");
    preValue = "";

    // Remove existing download button
    if (downloadBtn) {
      downloadBtn.remove();
      downloadBtn = null;
    }

    // Remove existing print button
    if (printBtn) {
      printBtn.remove();
      printBtn = null;
    }
  }
});

function printQRCode() {
  const printWindow = window.open("", "_blank");
  printWindow.document.write(
    `<html><head><title>Print QR Code</title></head><body><img src="${qrImg.src}"></body></html>`
  );
  printWindow.document.close();
  printWindow.onload = function () {
    printWindow.print();
    printWindow.close();
  };
}
