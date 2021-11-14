function getName() {
    let gmailBox = document.getElementById("gmail");
    let user = document.cookie;
    let userSplit = user.split("=");
    let userMail = userSplit[0];

    gmailBox.value = userMail;
}

function mail()
{
    let user = document.cookie;
    let userSplit = user.split("=");

    let userMail = userSplit[0];

    let serviceDate = document.getElementById("date").value;
    let service;
    if (document.getElementById('oil').checked) 
    {
        service = document.getElementById('oil').value;
    }
    else if (document.getElementById('water').checked) 
    {
        service = document.getElementById('water').value;
    }
    else if (document.getElementById('general').checked) 
    {
        service = document.getElementById('general').value;
    }

    console.log(service);

    let http = new XMLHttpRequest();
    http.onreadystatechange = () =>  {
        if(this.readyState == 4 && this.status == 200)
        {
            console.log(this.response);
        }
    }

    http.open('GET', "http://localhost:5000/sendMail?mail=" + userMail + "&service=" + service + "&date=" + serviceDate, true);
    http.send();
    
}