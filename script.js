function validateInput(input) {
    // Проверка наличия специальных символов
    const pattern = /[`!@#$%^&*()+\-=\[\]{};':"\\|,.<>\/?~]/;
    return !pattern.test(input);
}

function removeClassname(arr, cls) {
    for (const el of arr) {
        el.classList.remove(cls);
    }
}

function showLoader() {
    document.getElementById('form').style.opacity = 0.5;
    document.getElementById("loader").style.display = "block";
}

function hideLoader() {
    document.getElementById('form').style.opacity = 1;
    document.getElementById("loader").style.display = "none";
}


function checkRegister(event) {
    event.preventDefault();

    const nameInput = document.getElementById("login");
    const dateInput = document.getElementById("date");
    const pwdInput = document.getElementById("pwd");
    const pwd2Input = document.getElementById("pwd2");
    const errors = document.getElementsByClassName('error-message');
    removeClassname(errors, 'error-message-vis');

    const name = nameInput.value;
    const date = dateInput.value;
    const pwd = pwdInput.value;
    const pwd2 = pwd2Input.value;

    if (!validateInput(name) || name.length === 0) {
        let err = document.getElementById('login-err');
        err.classList.add('error-message-vis');
        return;
    }
    if (date.length === 0) {
        let err = document.getElementById('date-err');
        err.classList.add('error-message-vis');
        return;
    }
    if (pwd.length < 6) {
        let err = document.getElementById('pwd-err');
        err.classList.add('error-message-vis');
        return;
    }
    if (pwd !== pwd2) {
        let err = document.getElementById('pwd2-err');
        err.classList.add('error-message-vis');
        return;
    }
    else {
        const data = {
            login: name,
            date: date,
            pwd: pwd
        }

        showLoader();

        fetch('registration_handler.php', {
            'method': 'POST',
            'headers': {
                'Content-Type': 'application/json; charset=utf-8'
            },
            'body': JSON.stringify(data)
        }).then(function (response) {
            return response.text();
        }).then(function (data) {
            data = JSON.parse(data);
            if (data.success) {
                // Save the session ID in localStorage
                localStorage.setItem('session_id', data.session_id);
                window.location.href = 'profile.php';
            } else {
                alert(data.message);
            }

        }).catch(function (error) {
            console.error('Error:', error);
        }).finally(function () {
            hideLoader();
        });
    }

}

function checkLogin(event) {
    event.preventDefault();
    showLoader();
    const nameInput = document.getElementById("login");
    const pwdInput = document.getElementById("pwd");

    const name = nameInput.value;
    const pwd = pwdInput.value;


    const data = {
        login: name,
        pwd: pwd
    }

    fetch('login_handler.php', {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/json; charset=utf-8'
        },
        'body': JSON.stringify(data)
    }).then(function (response) {
        return response.text();
    }).then(function (data) {
        data = JSON.parse(data);
        if (data.success) {
            // Save the session ID in localStorage
            localStorage.setItem('session_id', data.session_id);
            window.location.href = 'profile.php';
        } else {
            document.getElementById('login-err').classList.add('error-message-vis');
        }

    }).catch(function (error) {
        console.error('Error:', error);
    }).finally(function () {
        hideLoader();
    });

}