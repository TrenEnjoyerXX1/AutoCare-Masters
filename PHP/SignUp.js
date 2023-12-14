const form = document.getElementById('form');
const fname = document.getElementById('F_Name');
const lname = document.getElementById('L_Name');
const username = document.getElementById('UserName');
const email = document.getElementById('Email');
const password = document.getElementById('Password');
const password2 = document.getElementById('Password2');

form.addEventListener('submit', e =>
{
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email =>
{
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const checkEmailExists = (emailToCheck) =>
{
    const mysql = require('mysql');
    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'autocare'
    });

    return new Promise((resolve, reject) =>
    {
        connection.connect((err) => {
            if (err) {
                reject(err);
                return;
            }

            connection.query('SELECT COUNT(*) AS count FROM customer WHERE Email = ?', emailToCheck, (error, results) => {
                if (error)
                {
                    connection.end();
                    reject(error);
                }
                else
                {
                    connection.end();
                    const emailExists = results[0].count > 0;
                    resolve(emailExists);
                }
            });
        });
    });
};

const checkUsernameExists = (unameToCheck) =>
{
    const mysql = require('mysql');
    const connection = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'autocare'
    });

    return new Promise((resolve, reject) =>
    {
        connection.connect((err) =>
        {
            if (err) {
                reject(err);
                return;
            }

            connection.query('SELECT COUNT(*) AS count FROM customer WHERE UserName = ?', unameToCheck, (error, results) => {
                if (error)
                {
                    connection.end();
                    reject(error);
                }
                else
                {
                    connection.end();
                    const unameExists = results[0].count > 0;
                    resolve(unameExists);
                }
            });
        });
    });
}

const isValidName = name =>
{

    const re = /^[A-Za-z]+$/;


    const isValidLength = name.length >= 2 && name.length <= 15;

    // Test the name against the regular expression
    const isValidFormat = re.test(name);

    return isValidFormat && isValidLength;


}

const isValidUname = name =>
{

    const isValidLength = name.length >= 2 && name.length <= 20;


    return  isValidLength;


}

const validateInputs = () =>
{
    const fnamevalue = fname.value.trim();
    const lnamevalue = lname.value.trim();
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    //first name errors
    if (fnamevalue === '')
    {
        setError(fname, 'Username is required');
    }
    else if (!isValidName(fnamevalue))
    {
        setError(fname, 'Only alphabetic characters allowed, length is between 2 and 15 only ');
    }
    else
    {
        setSuccess(fname);
    }

// last name errors
    if (lnamevalue === '')
    {
        setError(lname, 'Username is required');
    }
    else if (!isValidName(lnamevalue))
    {
        setError(lname, 'Only alphabetic characters allowed, length is between 2 and 15 only ');
    }
    else
    {
        setSuccess(lname);
    }



//username errors
    if(usernameValue === '')
    {
        setError(username, 'Username is required');
    }
    else if(!isValidUname(usernameValue))
    {
        setError(username, 'length is between 2 and 20 only ');
    }
    else if(checkUsernameExists(usernameValue))
    {
        setError(username, 'Username is already used by another user');
    }
    else
    {
        setSuccess(username);
    }


    //email errors
    if(emailValue === '')
    {
            setError(email, 'Email is required');
        }
    else if (!isValidEmail(emailValue))
    {
        setError(email, 'Provide a valid email address');
    }
    else if(checkEmailExists(emailValue))
    {
        setError(email, 'Email is already used by another user');
    }
    else
    {
        setSuccess(email);
    }

    //password errors
    if(passwordValue === '')
    {
        setError(password, 'Password is required');
    }
    else if (passwordValue.length < 8 )
    {
        setError(password, 'Password must be at least 8 character.')
    }
    else
    {
        setSuccess(password);
    }

    //re-entered password errors
    if(password2Value === '')
    {
        setError(password2, 'Please confirm your password');
    }
    else if (password2Value !== passwordValue)
    {
        setError(password2, "Passwords doesn't match");
    }
    else
    {
        setSuccess(password2);
    }

};











