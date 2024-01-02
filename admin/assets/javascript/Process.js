const validateAdmin = () => {
    let email = $("#adminEmail").val();
    let password = $("#adminPassword").val();

    let data = {
        email: email,
        password: password
    };

    $.ajax({
        method: 'POST',
        url: './validations/loginValidate.php',
        data: data,
        dataType: 'json',
        success: (response) => {
            response.success === 'true' ? loginSuccess(response) : loginError(response);
        },
        error: (e) => {
            console.log(e);
        }
    });
};

const loginSuccess = (response) => {
    $("#errorDetails").html(`Message: ${response.message}`);
    $("#errorDetails").removeClass().addClass("alert alert-success");

    swal({
        title: `Message: ${response.message}`,
        text: "Go to Admin Page",
        icon: "success",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = './admin.php';
                ;
            } else {
                swal("Refresh and try again!");
            }
        });

};

const loginError = (response) => {
    $("#errorDetails").html(`Message: ${response.message} || Error: ${response.error}`);
    $("#errorDetails").removeClass().addClass("alert alert-danger");
};

var data = {};
$.ajax({
    url: './validations/chart1.validate.php',
    type: 'POST',
    dataType: 'json',
    success: function (response) {

        data.labels = response.labels;
        data.datasets = response.datasets;

        const ctx = document.getElementById('mainPageDetailChart');
        new Chart(ctx, {
            type: 'polarArea',
            data: data,
            options: {}
        });
    },
    error: function (xhr, status, error) {
        console.log('AJAX request error:', error);
    }
});


const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(navLink => {
    navLink.addEventListener('click', () => {
        navLinks.forEach(link => link.classList.remove('active'));
        navLink.classList.add('active');
    });
});

(function ($) {

    "use strict";

    $('[data-toggle="tooltip"]').tooltip()

})(jQuery);

const createPost = () => {

    $('#postUploadButton').addClass('d-none');
    $('#postUploadLoader').removeClass('d-none');


    var postTitle = $("#postTitle").val();
    var postImage = $("#postImage")[0].files[0]; // Assuming you're uploading a single file
    var postAuthor = $("#postAuthor").val();
    var postDisplayData = $("#postDisplayData").val();
    var posttagName = $("#posttagName").val();
    var postCategory = $("#postCategory").val();

    // Create a FormData object to send the data
    var formData = new FormData();
    formData.append("postTitle", postTitle);
    formData.append("postImage", postImage);
    formData.append("postAuthor", postAuthor);
    formData.append("postDisplayData", postDisplayData);
    formData.append("posttagName", posttagName);
    formData.append("postCategory", postCategory);

    // Send the request
    $.ajax({
        url: './uploads/createPost.validate.php',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);

            if (response == 'Success') {
                $('#postUploadLoader').addClass('d-none');
                $('#postUploadButton').removeClass('d-none');
                $('#postUploadButton').html('Upload Successful');
                $('#postUploadButton').prop('disabled', true);
            } else {
                $('#postUploadButton').removeClass('d-none');
                $('#postUploadButton').html('Error Uploading');
                $('#postUploadButton').prop('disabled', true);
                $('#postUploadLoader').addClass('d-none');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error: " + xhr.status);
        }
    });
}

const addPostData = () => {
    $('#postALLUploadButton').addClass('d-none');
    $('#postALLUploadLoader').removeClass('d-none');

    // Get the form inputs
    var postID = document.getElementById('postID').value;
    var paragraph1 = document.getElementById('postParagaphOne').value;
    var paragraph2 = document.getElementById('postParagaphTwo').value;
    var paragraph3 = document.getElementById('postParagaphThree').value;
    var conclusion = document.getElementById('postConclution').value;
    var quote = document.getElementById('postQUote').value;
    var quoteAuthor = document.getElementById('postQUoteAuthor').value;
    var otherImage1 = document.getElementById('postOtherImageOne').files[0];
    var otherImage2 = document.getElementById('postOtherImageTwo').files[0];

    // Create a FormData object to send the data
    var formData = new FormData();
    formData.append('postID', postID);
    formData.append('paragraph1', paragraph1);
    formData.append('paragraph2', paragraph2);
    formData.append('paragraph3', paragraph3);
    formData.append('conclusion', conclusion);
    formData.append('quote', quote);
    formData.append('quoteAuthor', quoteAuthor);
    formData.append('otherImage1', otherImage1);
    formData.append('otherImage2', otherImage2);


    fetch('./uploads/uploadPostAll.validate.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            console.log(response);
            if (response.ok) {
                $('#postALLUploadLoader').addClass('d-none');
                $('#postALLUploadButton').removeClass('d-none');
                $('#postALLUploadButton').html('Successful');
                $('#postALLUploadButton').prop('disabled', true);
            } else {
                throw new Error('Error in sending data');
            }
        })
        .catch(error => {
            console.error('Error in sending data', error);
        });
}

const sendEmail = () => {

    $('#notifyEmailButton').addClass('d-none');
    $('#notifyEmailLoader').removeClass('d-none');

    let NotifyPost = $("#NotifyPost").val();
    let NotifyPostTitle = document.querySelector("#NotifyPost option:checked").getAttribute('data-bs-info');
    let postDate = $("#NotifyPostDate").val();

    const formData = new FormData();
    formData.append('NotifyPost', NotifyPost);
    formData.append('NotifyPostTitle', NotifyPostTitle);
    formData.append('NotifyPostDate', postDate);

    $.ajax({
        url: './validations/sendEmailNotify.validate.php',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if (response == 'Success') {
                $('#notifyEmailLoader').addClass('d-none');
                $('#notifyEmailButton').removeClass('d-none');
                $('#notifyEmailButton').html('Upload Successful');
                $('#notifyEmailButton').prop('disabled', true);
            } else {
                $('#notifyEmailButton').removeClass('d-none');
                $('#notifyEmailButton').html('Error Uploading');
                $('#notifyEmailLoader').addClass('d-none');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error: " + xhr.status);
        }
    });
}
const sendHTMLEMAIL = () => {

    $('#notifyEmailButton1').addClass('d-none');
    $('#notifyEmailLoader1').removeClass('d-none');

    let postDate = $("#gotHTML").val();

    const formData = new FormData();
    formData.append('postDataHTML', postDate);


    $.ajax({
        url: './validations/sendEMailHTML.validate.php',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if (response == 'Success') {
                $('#notifyEmailLoader1').addClass('d-none');
                $('#notifyEmailButton1').removeClass('d-none');
                $('#notifyEmailButton1').html('Upload Successful');
                $('#notifyEmailButton1').prop('disabled', true);
            } else {
                $('#notifyEmailButton1').removeClass('d-none');
                $('#notifyEmailButton1').html('Error Uploading');
                $('#notifyEmailLoader1').addClass('d-none');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error: " + xhr.status);
        }
    });
}