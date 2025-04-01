function login(){
    console.log("Login button clicked");
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if(!username || !password){
        alert("Please fill in all fields!");
        return;
    }

    let formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if(data.includes("Login successful")){
            window.location.href = "dashboard.html";
        }
    })
    .catch(error => console.error("Error: ", error));
}
function register(){
    console.log("Register button clicked");
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;
  
    if (!username || !password || !email){
        alert("Please fill in all fields!");
        return;
    }
    let formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);
    formData.append("email", email);

    fetch("register.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert (data);
        if (data.includes("successful")){
            window.location.href = "index.html";
        }
    })
    .catch(error => console.error("Error:", error));
}
const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text")

      modeSwitch.addEventListener("click", () =>{
        body.classList.toggle("dark");
        if (body.classList.contains("dark")){
            modeText.innerText = "Light Mode"
          }else{
            modeText.innerText = "Dark Mode"
          }
      })

      toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
      })


        