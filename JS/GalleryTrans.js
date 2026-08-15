const resources = {
    en: {
        translation: {
            
            logoname:"Grampanchyat Bembli",
            home: "Home",
            about: "About Us",
            services: "Services",
            gallery: "Gallery",
            contact: "Contact",

            Photo_Gallery:"Village Photo Gallery",
            Photo_Gallery_desc:"Explore the Beauty of Bembli Village",

            all:"All",
            nature:"Nature",
            temple:"Temple",
            festival:"Festival",
            village:"Village",

            quote_1:"Every Picture Tells the Story of Bembli",
            quote_2:"A glimpse of our culture, nature and traditions.",

            footer_desc:"Contact: Grampanchayat Bembli, Taluka: Dharashiv, Dist: Dharashiv",
            footer_copyright:"© 2026 Grampanchayat Bembli. All Rights Reserved.",
            slogan:"Bembli - Honoring Tradition,Embracing Progreess.",

        }
    },

    mr: {
        translation: {
            logoname: "ग्रामपंचायत बेंबळी",
            home: "मुख्यपृष्ठ",
            about: "आमच्याबद्दल",
            services: "सेवा",
            gallery: "गॅलरी",
            contact: "संपर्क",

            Photo_Gallery: "गावाची फोटो गॅलरी",
            Photo_Gallery_desc: "बेंबळी गावाचे नैसर्गिक सौंदर्य, संस्कृती आणि समृद्ध परंपरा अनुभवा.",

            all: "सर्व",
            nature: "निसर्ग",
            temple: "मंदिरे",
            festival: "सण-उत्सव",
            village: "गाव",

            quote_1: "प्रत्येक छायाचित्र बेंबळी गावाची एक सुंदर कहाणी सांगते.",
            quote_2: "निसर्ग, संस्कृती, परंपरा आणि गावाच्या जीवनशैलीचे अविस्मरणीय क्षण.",

            footer_desc:"संपर्क : ग्रामपंचायत बेंबळी, ता. धाराशिव, जि. धाराशिव, महाराष्ट्र - ४१३५०६",
            footer_copyright:"© २०२६ ग्रामपंचायत बेंबळी. सर्व अधिकार राखीव.",
            slogan:"बेंबळी — परंपरा जपत विकासाच्या दिशेने वाटचाल.",




        }
    }
};

document.addEventListener("DOMContentLoaded", function () {

    let currentLanguage = localStorage.getItem("language") || "en";

    i18next.init({

        lng: currentLanguage,

        resources: resources

    }, function () {

        updateContent();
        updateLanguageButton();

    });


    function updateContent() {

        document.querySelectorAll("[data-i18n]").forEach(function (element) {

            const key = element.getAttribute("data-i18n");

            element.innerHTML = i18next.t(key);

        });
    }

    const button = document.getElementById("langBtn");

    button.addEventListener("click", function () {

        if (currentLanguage === "en") {

            currentLanguage = "mr";

        } else {

            currentLanguage = "en";

        }

        localStorage.setItem("language", currentLanguage);

        i18next.changeLanguage(currentLanguage, function () {

            updateContent();

            updateLanguageButton();

        });
    });

    function updateLanguageButton() {

        if (currentLanguage === "mr") {

            document.getElementById("langText").innerHTML = "English";

        } else {

            document.getElementById("langText").innerHTML = "मराठी";

        }
    }
});

let images = [];
let currentIndex = 0;

function openLightbox(img){

    const activeFilter = document.querySelector(".filter-btn.active").dataset.filter;

    if(activeFilter=="all"){
        images = [...document.querySelectorAll(".gallery-item img")];
    }
    else{
        images = [...document.querySelectorAll(`.gallery-item[data-filter="${activeFilter}"] img`)];
    }

    document.getElementById("lightbox").style.display="flex";
    document.getElementById("lightbox-img").src=img.src;

    images.forEach((image,index)=>{

        if(image==img){
            currentIndex=index;
        }

    });

}

function closeLightbox(){

    document.getElementById("lightbox").style.display="none";

}

function nextImage(){

    currentIndex++;

    if(currentIndex>=images.length){
        currentIndex=0;
    }

    document.getElementById("lightbox-img").src=images[currentIndex].src;

}

function prevImage(){

    currentIndex--;

    if(currentIndex<0){
        currentIndex=images.length-1;
    }

    document.getElementById("lightbox-img").src=images[currentIndex].src;

}

//======================  =======================

const filterButtons = document.querySelectorAll(".filter-btn");
const galleryItems = document.querySelectorAll(".gallery-item");

filterButtons.forEach(button => {

    button.addEventListener("click", () => {

        document.querySelector(".filter-btn.active").classList.remove("active");
        button.classList.add("active");

        const filter = button.dataset.filter;

        galleryItems.forEach(item => {

            if (filter === "all" || item.dataset.filter === filter) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }

        });

    });

});