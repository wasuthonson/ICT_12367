const modal = document.querySelector(".modal");
const previews = document.querySelectorAll(".gallery img");
const fullImg = document.querySelector(".full-image");

previews.forEach(preview => {
    preview.addEventListener("click", () => {
        // เปิด Modal โดยเพิ่ม class 'open'
        modal.classList.add("open");
        
        // ดึงชื่อไฟล์จากรูปเล็ก (small) ไปแสดงในรูปใหญ่ (full)
        const originalSrc = preview.getAttribute("src");
        const fullSrc = originalSrc.replace("small/s_", "full/");
        fullImg.src = fullSrc;
    });
});

// ปิด Modal เมื่อคลิกที่พื้นหลัง
modal.addEventListener("click", (e) => {
    if (e.target.classList.contains("modal")) {
        modal.classList.remove("open");
    }
});