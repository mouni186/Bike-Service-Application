function validate() 
{
    let password = document.getElementById('passwordsign').value;
    let confirmPassword = document.getElementById('conpasswordsign').value;
    if (password === confirmPassword) 
    {
        document.getElementById("signin").disabled = false;
    }
    else
    {
        document.getElementById("signin").disabled = true;
    }
}



function logOut()
{
    console.log(document.cookie );
    let name =document.cookie;
    let email = name.split("=");
    let emailid = email[0];
    console.log(emailid);
    document.cookie= `${emailid}=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;
    alert("welcome Back");
    window.location.href = "http://localhost/Bike-App/";
}


function addToUrl() {
    let userName = document.cookie;

    let email = userName.split("=");
    let confirmMail = email[0];
    let alink = document.getElementById("mail");
    alink.href= alink.href+confirmMail;
    let statusLink = document.getElementById("status");
    statusLink.href = statusLink.href+confirmMail;  
}

function previousDate()
{
    var date=document.getElementById("date").value;
        var d=new Date();
        
        var x=d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
        var checkDate=date.substr(8,2);
        var equalDate=d.getDate();
        var checkMonth=date.substr(5,2);
        var equalMonth=d.getMonth();
        var checkYear=date.substr(0,4);
        var equalYear=d.getFullYear();
        if(checkMonth>=equalMonth){
            if(checkDate<equalDate){
            alert("Date cannot be less than today!! ");
            history.go(0);
           
            }
        }
        else if(checkMonth<equalMonth){
            if(checkYear<equalYear){
                alert("Date cannot be less than today!! ");
            
            }
        }

        
}

