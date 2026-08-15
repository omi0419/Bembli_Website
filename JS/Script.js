
//============= Service Image Poppup ==============\\

// function openImage(image){

//     document.getElementById("lightbox").style.display="flex";

//     document.getElementById("lightbox-img").src=image;

// }

// document.querySelector(".close").onclick=function(){

//     document.getElementById("lightbox").style.display="none";

// }

// document.getElementById("lightbox").onclick=function(e){

//     if(e.target==this){

//         this.style.display="none";

//     }

// }

//================ Sarpanch & Members popup box =================//

function openPopup(){

    document.getElementById("popup").style.display="flex";

}

function closePopup(){

    document.getElementById("popup").style.display="none";

}

//================ Government Popup ================//

function openGovSchemes() {
    document.getElementById("govSchemePopup").style.display = "flex";
}

function closeGovSchemes() {
    document.getElementById("govSchemePopup").style.display = "none";
}
//================ Development Projects Popup ================//

function openProjectPopup(){

    document.getElementById("projectPopup").style.display = "flex";

}

function closeProjectPopup(){

    document.getElementById("projectPopup").style.display = "none";

}


//=============== Village Map Popup ===============//

function openMapPopup(){

    document.getElementById("mapPopup").style.display="flex";

}

function closeMapPopup(){

    document.getElementById("mapPopup").style.display="none";

}

window.addEventListener("click", function(e){

    let popup=document.getElementById("mapPopup");

    if(e.target==popup){

        popup.style.display="none";

    }

});

// ======================================================
//                 COMPLAINT POPUP
// ======================================================

function openComplaintPopup() {

    console.log("Complaint popup clicked");

    const popup = document.getElementById("complaintPopup");

    if (popup) {

        popup.style.display = "flex";

        console.log("Complaint popup opened");

    } else {

        console.error("complaintPopup ID not found");

    }
}


function closeComplaintPopup() {

    const popup = document.getElementById("complaintPopup");

    if (popup) {

        popup.style.display = "none";

    }

}


// ======================================================
//                 COMPLAINT FORM SUBMIT
// ======================================================

document.addEventListener("DOMContentLoaded", function () {

    const complaintForm =
        document.getElementById("complaintForm");


    if (complaintForm) {

        complaintForm.addEventListener("submit", function (event) {

            // Stop normal form submission
            event.preventDefault();


            const formData =
                new FormData(complaintForm);


            // Disable submit button
            const submitButton =
                complaintForm.querySelector(
                    ".complaint-submit-btn"
                );


            submitButton.disabled = true;

            submitButton.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin"></i> नोंदवत आहे...';


            fetch("submit_complaint.php", {

                method: "POST",

                body: formData

            })

            .then(response => {

                if (!response.ok) {

                    throw new Error(
                        "Server error: " + response.status
                    );

                }

                return response.json();

            })

            .then(data => {

                console.log(
                    "Complaint Response:",
                    data
                );


                if (data.success) {

                    alert(
                        data.message +
                        "\nतक्रार क्रमांक: " +
                        data.complaint_id
                    );


                    // Reset form
                    complaintForm.reset();


                    // Close popup
                    closeComplaintPopup();


                } else {

                    alert(data.message);

                }

            })

            .catch(error => {

                console.error(
                    "Complaint Error:",
                    error
                );


                alert(
                    "तक्रार नोंदवताना काहीतरी समस्या आली."
                );

            })

            .finally(() => {

                // Enable submit button again
                submitButton.disabled = false;

                submitButton.innerHTML =
                    '<i class="fa-solid fa-paper-plane"></i> तक्रार नोंदवा';

            });

        });

    }

});


// ================= News And Annocument =====================

function loadLatestNews() {

    fetch("get_all_news.php")

        .then(response => {

            if (!response.ok) {
                throw new Error("Failed to load news");
            }

            return response.json();

        })

        .then(data => {

            console.log("Home Page News:", data);

            if (!data || data.length === 0) {
                return;
            }

            const currentLanguage = i18next.language || "en";

            console.log("Home News Language:", currentLanguage);


            // ================= NEWS 1 =================

            const news1 = data[0];

            let title1;
            let date1;

            if (currentLanguage === "mr") {

                title1 = news1.title_mr;

            } else {

                title1 = news1.title;

            }


            // Date

            const dateObj1 = new Date(news1.date);

            if (currentLanguage === "mr") {

                date1 = dateObj1.toLocaleDateString("mr-IN", {
                    day: "numeric",
                    month: "long",
                    year: "numeric"
                });

            } else {

                date1 = dateObj1.toLocaleDateString("en-GB", {
                    day: "2-digit",
                    month: "long",
                    year: "numeric"
                });

            }


            document.getElementById("newsTitle1").textContent = title1 || "";
            document.getElementById("newsDate1").textContent = date1 || "";


            // ================= NEWS 2 =================

            if (data.length > 1) {

                const news2 = data[1];

                let title2;
                let date2;


                if (currentLanguage === "mr") {

                    title2 = news2.title_mr;

                } else {

                    title2 = news2.title;

                }


                // Date

                const dateObj2 = new Date(news2.date);

                if (currentLanguage === "mr") {

                    date2 = dateObj2.toLocaleDateString("mr-IN", {
                        day: "numeric",
                        month: "long",
                        year: "numeric"
                    });

                } else {

                    date2 = dateObj2.toLocaleDateString("en-GB", {
                        day: "2-digit",
                        month: "long",
                        year: "numeric"
                    });

                }


                document.getElementById("newsTitle2").textContent = title2 || "";
                document.getElementById("newsDate2").textContent = date2 || "";

            }

        })

        .catch(error => {

            console.error("Home News Error:", error);

        });

}


// ================= News And Annocument Popup =====================

function openNewsPopup() {

    document.getElementById("newsPopup").style.display = "flex";

    const newsList = document.getElementById("newsList");

    newsList.innerHTML = `<div class="news-loading">Loading news...</div>`;

    fetch("get_all_news.php")
        .then(response => {

            if (!response.ok) {
                throw new Error("Failed to load news");
            }

            return response.json();

        })
        .then(data => {

            console.log("News Data:", data);

            newsList.innerHTML = "";

            if (!data || data.length === 0) {

                newsList.innerHTML = `
                    <div class="no-news">
                        <i class="fa-regular fa-newspaper"></i>
                        <h3>No News Available</h3>
                    </div>
                `;

                return;
            }


            // Current website language
            const currentLanguage = i18next.language || "en";
            console.log("Current Language:", currentLanguage);


            data.forEach(news => {


                // Select language
                let title;
                let description;


                if (currentLanguage === "mr") {

                    title = news.title_mr;

                    description = news.description_mr;

                } else {

                    title = news.title;

                    description = news.description;

                }


                // Date formatting

                let formattedDate = news.date;

                if (news.date) {

                    const date = new Date(news.date);

                    if (!isNaN(date)) {

                        if (currentLanguage === "mr") {

                            formattedDate =
                                date.toLocaleDateString("mr-IN", {
                                    day: "numeric",
                                    month: "long",
                                    year: "numeric"
                                });

                        } else {

                            formattedDate =
                                date.toLocaleDateString("en-GB", {
                                    day: "2-digit",
                                    month: "long",
                                    year: "numeric"
                                });

                        }

                    }

                }


                const newsItem =
                    document.createElement("div");

                newsItem.className =
                    "news-and-item";


                newsItem.innerHTML = `

                    <div class="news-icon">

                        <i class="fa-regular fa-calendar-days"></i>

                    </div>


                    <div class="news-details">

                        <h3>
                            ${title || ""}
                        </h3>


                        <div class="news-date">

                            <i class="fa-regular fa-calendar"></i>

                            ${formattedDate || ""}

                        </div>


                        <p>
                            ${description || ""}
                        </p>

                    </div>

                `;


                newsList.appendChild(newsItem);

            });

        })
        .catch(error => {

            console.error("News Error:", error);

            newsList.innerHTML = `
                <div class="no-news">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                    <h3>Unable to Load News</h3>

                </div>
            `;

        });

}
function closeNewsPopup() {

    document.getElementById("newsPopup").style.display = "none";

}
// function formatNewsDate(dateString) {

//     const date = new Date(dateString);

//     return date.toLocaleDateString("en-IN", {

//         day: "2-digit",
//         month: "long",
//         year: "numeric"

//     });
// }


// function escapeHtml(text) {

//     const div = document.createElement("div");

//     div.textContent = text;

//     return div.innerHTML;
// }

// function closeNewsPopup() {
//     document.getElementById("newsPopup").style.display = "none";
// }

//====================== API Function ======================

//function getData() {
   // fetch("http://localhost:3000/get")
        //.then(response => {
            // return response.json();
          //  console.log(response);
        //})
       // .then(data => {
      //         data.forEach(item => {
    //            t1 = item.title;
  //             console.log(t1);
//            });

           // document.getElementById("id").innerHTML = output;
  //      })
        // .catch(error => {
        //     console.log(error);
        // });
//}








