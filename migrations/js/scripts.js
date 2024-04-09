   // tidak ada yang harus di rubah di sini

   let modenow = "light";
   function modenight() {
       let mode = document.querySelectorAll('.mode');
       let modetext = document.querySelectorAll('.mode-text');
       let btnclose = document.querySelectorAll('.btn-close');
       let buttongroup = document.getElementById('buttongroup');

       mode.forEach(element => {
           element.classList.add('bg-dark');
           element.classList.remove('bg-white');
       });
       modetext.forEach(element => {
           element.classList.add('text-white');
       });
       btnclose.forEach(element => {
           element.classList.add('btn-close-white');
       });

       buttongroup.innerHTML = `
<button onclick="create()" class="btn border bg-dark flex-fill text-white">create</button>
       <button onclick="drop()" class="btn border bg-dark flex-fill text-white">drop</button>
       <button onclick="fresh()" class="btn border bg-dark flex-fill text-white">fresh</button>
       <button onclick="modelight()" class="btn border bg-dark flex-fill text-white"><i class="fa-regular fa-sun"></i></button>
`;

       modenow = "night";

   }
   function modelight() {
       let mode = document.querySelectorAll('.mode');
       let modetext = document.querySelectorAll('.mode-text');
       let btnclose = document.querySelectorAll('.btn-close');
       let buttongroup = document.getElementById('buttongroup');

       mode.forEach(element => {
           element.classList.remove('bg-dark');
           element.classList.add('bg-white');
       });
       modetext.forEach(element => {
           element.classList.remove('text-white');
       });
       btnclose.forEach(element => {
           element.classList.remove('btn-close-white');
       });

       buttongroup.innerHTML = `
<button onclick="create()" class="btn border flex-fill bg-white ">create</button>
       <button onclick="drop()" class="btn border flex-fill bg-white ">drop</button>
       <button onclick="fresh()" class="btn border flex-fill bg-white ">fresh</button>
       <button onclick="modenight()" class="btn border flex-fill bg-white "><i class="fa-regular fa-moon"></i></button>
`;

       modenow = "light";

   }

   let clicked = false;

   function fetchHtmlWithPost(data) {
       document.querySelector('.loading').style.opacity = "1";
       if (!clicked) {
           clicked = true;
           setTimeout(() => {
               try {
                   const url = "http://localhost/tes_ujikom_php/migrations/migrate.php";
                   const dataToSend = {
                       migrate: data
                   };

                   fetch(url, {
                       method: "POST",
                       headers: {
                           "Content-Type": "application/json"
                       },
                       body: JSON.stringify(dataToSend)
                   })
                       .then(response => response.text())
                       .then(html => {

                           if (modenow == "night") {
                               document.querySelector(".toast-container").innerHTML += `
       <div class="toast bg-dark mode show" role="alert" aria-live="assertive" aria-atomic="true">
   <div class="toast-header bg-dark text-white mode mode-text">
       <strong class="me-auto">Alert</strong>
       <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body text-secondary">
       ${html}
   </div>
</div>

       `;

                           } else {
                               document.querySelector(".toast-container").innerHTML += `
       <div class="toast mode show" role="alert" aria-live="assertive" aria-atomic="true">
   <div class="toast-header mode mode-text">
       <strong class="me-auto">Alert</strong>
       <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body text-secondary">
       ${html}
   </div>
</div>

       `;

                           }
                       })

               } catch (error) {
                   console.error("Error fetching HTML:", error);
               } finally {
                   clicked = false;
                   document.querySelector('.loading').style.opacity = "0";
               };
           }, 2000);

       }

   }

   function create() {
       fetchHtmlWithPost("create");
   }

   function drop() {
       fetchHtmlWithPost("drop");
   }

   function fresh() {
       fetchHtmlWithPost("fresh");
   }