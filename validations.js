document.getElementById('RegisterBTN').addEventListener('click', function () {
    var errors = 0;
    var name = document.getElementById('UserName').value;
    var nameError = document.getElementById('NameError');
    var email = document.getElementById('UserEmail').value;
    var EmailError = document.getElementById('EmailError');
    var message = document.getElementById('MessageInput').value;
    var MessageError = document.getElementById('MessageError');
    var branch = document.getElementById('BranchSelect').value;
    var branchError = document.getElementById('BranchError');
    var Terms = document.getElementById('TermsCheck').value;
    var TermError = document.getElementById('FileError');
    //Name Validation Started!
    if (name == "") {
        nameError.innerHTML = 'Name is a required field!';
        errors++;
    } else {
        var regName = /^[A-Za-z ]+$/.test(name)
        if (regName !== true) {
            nameError.innerHTML = 'Name should contain Letter or Space only!';
            errors++;
        } else {
            nameError.innerHTML = '';
        }
    }
    
    //Email Validation Started.
    if (email == "") {
        EmailError.innerHTML = 'Email is a required field!';
        errors++;
    } else {
        var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)
        if (regEmail !== true) {
            EmailError.innerHTML = 'Should be a valid email address!';
            errors++;
        } else {
            EmailError.innerHTML = '';
        }
    }
    
    //Message Validation Started.
    if (message == "") {
        MessageError.innerHTML = 'Message or Query is a required field!';
        errors++;
    } else {
        var regMessage = /^[A-Za-z ]+$/.test(message)
        if (regMessage !== true) {
            MessageError.innerHTML = 'It should contain Letter or Space only!';
            errors++;
        } else {
            EmailError.innerHTML = '';
        }
    }
    
    //Branch Validation Started.
    if (branch == "") {
        branchError.innerHTML = 'Branch is a required field!';
        errors++;
    } else {
        branchError.innerHTML = '';
    }
    
    //Terms Validation Started.
    if (Terms == "") {
        TermError.innerHTML = 'Terms & Condition must be checked!';
        errors++;
    } else {
        TermError.innerHTML = '';
    }
    
    if (errors === 0) {
        document.getElementById('QueryForm').submit();
    }
});
