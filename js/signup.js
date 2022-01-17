let reg = /[\!\@\#\$\%\^\&\*\)\(\+\=\.\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-]/g;
let inputPass = document.querySelector('#exampleInputPassword1');
let passHelp = document.querySelector('#passwordHelp');

let inputName = document.querySelector('#signup_name');
let nameHelp = document.querySelector('#nameHelp');


inputPass.addEventListener("input", function(e){
    if(e.target.value.length>=8){
        passHelp.textContent = 'You can add special characters to strengthen your password';
        // passHelp.classList.add("warning_background");
        if(reg.test(`${e.target.value}`)){
            passHelp.textContent = 'Perfect, Now your password is strong.';
            // passHelp.classList.add("success_background");
        }
    }
    else{
        passHelp.textContent = `Add + ${8-e.target.value.length} more character(s) to fill minimum requirement.`;
    }
});

inputName.addEventListener("input", function(e){
    if(reg.test(`${e.target.value}`)){
        nameHelp.textContent = 'Oops!!, name cannot contain any special character.'
    }
    else{
        nameHelp.textContent = 'Please avoid using any fake name.'
    }
});

