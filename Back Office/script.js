const fileInput = document.getElementById('file-input');
const imagePreview = document.getElementById('image-preview');

fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const url = URL.createObjectURL(file);
    imagePreview.src = url;
});

const fileInputUn = document.getElementById('file-input-un');
const imagePreviewUn = document.getElementById('image-preview-un');

fileInputUn.addEventListener('change', (e) => {
    const fileUn = e.target.files[0];
    const urlUn = URL.createObjectURL(fileUn);
    imagePreviewUn.src = urlUn;
});

// const fileInput = document.querySelectorAll('.file-input');
// const imagePreview = document.querySelectorAll('.image-preview');

// fileInput.forEach((input, index) => {
//     input.addEventListener('change', (e) => {
//         const file = e.target.files[0];
//         const url = URL.createObjectURL(file);
//         imagePreview[index].src = url;
//     });
// });