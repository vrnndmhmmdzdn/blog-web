const belajarIslam = document.getElementById('belajar-islam');
const belajarIslamParent = document.getElementById('belajar-islam-parent');

belajarIslamParent.addEventListener('mouseenter', function () {
    belajarIslam.classList.remove('hidden');
    belajarIslam.addEventListener('mouseenter', function () {
        belajarIslam.classList.remove('hidden');
    })
});
belajarIslamParent.addEventListener('mouseleave', function () {
    belajarIslam.classList.add('hidden');
    belajarIslam.addEventListener('mouseleave', function () {
        belajarIslam.classList.add('hidden');
    });
});

const naskahKhutbah = document.getElementById('naskah-khutbah');
const naskahKhutbahParent = document.getElementById('naskah-khutbah-parent');

naskahKhutbahParent.addEventListener('mouseenter', function () {
    naskahKhutbah.classList.remove('hidden');
    naskahKhutbah.addEventListener('mouseenter', function () {
        naskahKhutbah.classList.remove('hidden');
    });
});
naskahKhutbahParent.addEventListener('mouseleave', function () {
    naskahKhutbah.classList.add('hidden');
    naskahKhutbah.addEventListener('mouseleave', function () {
        naskahKhutbah.classList.add('hidden');
    });
});


const sliderParent = document.getElementById('slider-parent');
const newsParent = document.getElementById('news-parent');
const next = document.getElementById('next');
const prev = document.getElementById('prev');

newsParent.addEventListener('mouseenter', function () {
    next.classList.remove('hidden');
    prev.classList.remove('hidden');
})
newsParent.addEventListener('mouseleave', function () {
    next.classList.add('hidden');
    prev.classList.add('hidden');
});

// sliderParent.forEach((item, i) => {
//     let parentDimension = item.getBoundingClientRect();
//     let parentWidth = parentDimension.width;

//     next[i].addEventListener('click', function () {
//         item.scrollLeft += parentWidth;
//     })
//     prev[i].addEventListener('click', function () {
//         item.scrollLeft -= parentWidth;
//     })
// });

const newsChild = document.querySelectorAll('.news-child');
const newsChildCapt = document.querySelectorAll('.news-child-capt');

for (let i = 0; i < newsChild.length; i++){
newsChild[i].addEventListener('mouseenter', function () {
newsChildCapt[i].classList.remove('hidden');
})
newsChild[i].addEventListener('mouseleave', function () {
    newsChildCapt[i].classList.add('hidden');
});
}

const populer = document.getElementById('populer');
const terbaru = document.getElementById('terbaru');
const populerBtn = document.getElementById('populer-button');
const terbaruBtn = document.getElementById('terbaru-button');
// text-[#E20612]
populerBtn.addEventListener('click', function () {
    populerBtn.classList.add('text-[#E20612]');
    populer.classList.add('scale-100');
    populer.classList.remove('scale-0');
    terbaruBtn.classList.remove('text-[#E20612]');
    terbaru.classList.add('scale-0');
    terbaru.classList.remove('scale-100');
});
terbaruBtn.addEventListener('click', function () {
    terbaruBtn.classList.add('text-[#E20612]');
    terbaru.classList.remove('scale-0');
    terbaru.classList.add('scale-100');
    populerBtn.classList.remove('text-[#E20612]');
    populer.classList.add('scale-0');
    populer.classList.remove('scale-100');
});

const allContent = document.getElementById('all-content').children;
const allBtn = document.getElementById('all-btn').children;

allBtn[0].addEventListener('click', function () {
    Array.from(allContent).forEach(child => {
        child.classList.add('hidden');
    });
    Array.from(allBtn).forEach(child => {
        child.classList.remove('bg-[#1F2024]', 'text-[#E20612]'); // Pisahkan class dengan koma
    });
    allBtn[0].classList.add('bg-[#1F2024]', 'text-[#E20612]');
    allContent[0].classList.remove('hidden');
})

allBtn[1].addEventListener('click', function () {
    Array.from(allContent).forEach(child => {
        child.classList.add('hidden');
    });
    Array.from(allBtn).forEach(child => {
        child.classList.remove('bg-[#1F2024]', 'text-[#E20612]'); // Pisahkan class dengan koma
    });
    allBtn[1].classList.add('bg-[#1F2024]', 'text-[#E20612]');
    allContent[1].classList.remove('hidden');
})

allBtn[2].addEventListener('click', function () {
    Array.from(allContent).forEach(child => {
        child.classList.add('hidden');
    });
    Array.from(allBtn).forEach(child => {
        child.classList.remove('bg-[#1F2024]', 'text-[#E20612]'); // Pisahkan class dengan koma
    });
    allBtn[2].classList.add('bg-[#1F2024]', 'text-[#E20612]');
    allContent[2].classList.remove('hidden');
})

allBtn[3].addEventListener('click', function () {
    Array.from(allContent).forEach(child => {
        child.classList.add('hidden');
    });
    Array.from(allBtn).forEach(child => {
        child.classList.remove('bg-[#1F2024]', 'text-[#E20612]'); // Pisahkan class dengan koma
    });
    allBtn[3].classList.add('bg-[#1F2024]', 'text-[#E20612]');
    allContent[3].classList.remove('hidden');
    console.log("Clecked")
})

        