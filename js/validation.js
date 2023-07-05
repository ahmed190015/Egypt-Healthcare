$(function() {

    // UserName Validation
    $('#FullName').blur(function() {

        var pattern = /^[a-zA-Z]*$/;
        var username = $("#FullName").val();
        if(pattern.test(username) && username !== '' && username.length >=4 ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // UserName Validation
     $('#userName').blur(function() {

        var pattern = /^[a-zA-Z]*$/;
        var username = $("#userName").val();
        if(pattern.test(username) && username !== '' && username.length >=4 ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // UserName Validation
    $('#DoctorFullName').blur(function() {

        var pattern = /^[a-zA-Z]*$/;
        var username = $("#DoctorFullName").val();
        if(pattern.test(username) && username !== '' && username.length >=4 ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // Name Validation
     $('#name').blur(function() {

        var pattern = /^[a-zA-Z]*$/;
        var username = $("#name").val();
        if(pattern.test(username) && username !== '' && username.length >=4 ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

       // Message Validation
       $('#message').blur(function() {

        var pattern = /^[a-zA-Z]*$/;
        var username = $("#message").val();
        if(pattern.test(username) && username !== '' ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // National ID Validation
     $('#ID').blur(function() {
        var nationalid_length = $("#ID").val().length;
        var pattern1 = /^2[0-9]{13}$/;
        var pattern2 = /^3[0-9]{13}$/;
        var national = $("#ID").val();
    
      if(nationalid_length === 14 && (pattern1.test(national) || pattern2.test(national)) && national !=='') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);

        }
    });

 

    // Email Validation
    $('#email').blur(function() {
        var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $("#email").val();
        if(pattern.test(email) && email !== '' ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }
    });

   

     // Phone Validation
     $('#phoneNumber').blur(function() {
        
        var phone_length = $("#phoneNumber").val().length;
        var pattern = /^01[0125][0-9]{8}$/gm;
        var phone = $("#phoneNumber").val();
        if(phone_length === 11 && pattern.test(phone) && phone !== '') {
           $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
           $(this).parent().find('.custom-alert').fadeIn(100);
        }
    });

    // Phone Validation
    $('#phone').blur(function() {
        
        var phone_length = $("#phone").val().length;
        var pattern = /^01[0125][0-9]{8}$/gm;
        var phone = $("#phone").val();
        if(phone_length === 11 && pattern.test(phone) && phone !== '') {
           $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
           $(this).parent().find('.custom-alert').fadeIn(100);
        }
    });

     // Password Validation
     $('#password').blur(function() { 

        var password_length = $("#password").val().length;
        if(password_length < 8 ) {
            $(this).parent().find('.custom-alert').fadeIn(100);
        } else {
            $(this).parent().find('.custom-alert').fadeOut(100);
        }
    });

    // Confirm-Password Validation
    $('#confirm_password').blur(function() { 

        var password= $("#password").val();
        var ch_pass = $("#confirm_password").val();
        if(password !== ch_pass) {
            $(this).parent().find('.custom-alert').fadeIn(100);
        } else {
           $(this).parent().find('.custom-alert').fadeOut(100);
        }
    });

     // Confirm-Password Validation
     $('#confirm-password').blur(function() { 

        var password= $("#password").val();
        var ch_pass = $("#confirm-password").val();
        if(password !== ch_pass) {
            $(this).parent().find('.custom-alert').fadeIn(100);
        } else {
           $(this).parent().find('.custom-alert').fadeOut(100);
        }
    });

    // Choose Gender Validation
    $('#gender').blur(function() {

        var genderType = $("#gender").val();
        if( genderType !== '' ) {
            $(this).parent().find('.custom-alert').fadeIn(100);
        } else {
            $(this).parent().find('.custom-alert').fadeOut(100);
        }

    });

    // Choose Blood Type Validation
    $('#blood_type').blur(function() {

        var genderType = $("#blood_type").;
        if( genderType !== '' ) {
            $(this).parent().find('.custom-alert').fadeIn(100);
        } else {
            $(this).parent().find('.custom-alert').fadeOut(100);
         }

    });

    // Choose Speciality Validation
    $('#speciality').blur(function() {

        var Spec = $("#speciality").val();
        if( Spec !== '' ) {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // Verfying Code Validation
     $('#verfying').blur(function() {
        
        var verfy_length = $("#verfying").val().length;
        var pattern = /[0-9]{8}$/gm;
        var verfy = $("#verfying").val();
        if(verfy_length === 8 && pattern.test(verfy) && phone !== '') {
           $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
           $(this).parent().find('.custom-alert').fadeIn(100);
        }
    });

       // Phone Validation
       $('#phone_doctor').blur(function() {
        
        var phone_length = $("#phone_doctor").val().length;
        var pattern = /^01[0125][0-9]{8}$/gm;
        var phone = $("#phone_doctor").val();
        if(phone_length === 11 && pattern.test(phone) && phone !== '') {
           $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
           $(this).parent().find('.custom-alert').fadeIn(100);
        }
    });

    // Select Time Validation
    $('#Time').blur(function() {

        var genderType = $("#Time").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select Date Validation
    $('#date').blur(function() {

        var genderType = $("#date").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select Start Time Work of Sunday Validation
    $('#start').blur(function() {

        var genderType = $("#start").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work  of Sunday Validation
    $('#end').blur(function() {

        var genderType = $("#end").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // Select Start Time Work of Saturday Validation
     $('#start1').blur(function() {

        var genderType = $("#start1").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work of Saturday Validation
    $('#end1').blur(function() {

        var genderType = $("#end1").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

      // Select Start Time Work of Monday Validation
      $('#start2').blur(function() {

        var genderType = $("#start2").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work of Monday Validation
    $('#end2').blur(function() {

        var genderType = $("#end2").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

      // Select Start Time Work of Tuesday Validation
      $('#start3').blur(function() {

        var genderType = $("#start3").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work of Tuesday Validation
    $('#end3').blur(function() {

        var genderType = $("#end3").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // Select Start Time Work of Wednesday Validation
     $('#start4').blur(function() {

        var genderType = $("#start4").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work of Wednesday Validation
    $('#end4').blur(function() {

        var genderType = $("#end4").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

     // Select Start Time Work of Thursday Validation
     $('#start5').blur(function() {

        var genderType = $("#start5").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work of Thursday Validation
    $('#end5').blur(function() {

        var genderType = $("#end5").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select Start Time Work of Friday Validation
    $('#start6').blur(function() {

        var genderType = $("#start6").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

    // Select End Time Work of Friday Validation
    $('#end6').blur(function() {

        var genderType = $("#end6").val();
        if(genderType !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });



     // Select File Validation
     $('#contact-file').blur(function() {

        var fi;e = $("#contact-file").val();
        if(file !== '') {
            $(this).parent().find('.custom-alert').fadeOut(100);
        } else {
            $(this).parent().find('.custom-alert').fadeIn(100);
        }

    });

});