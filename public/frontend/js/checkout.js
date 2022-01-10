// $(document).ready(function () {
//     $('.razorpay_btn').click(function (e) {
//         e.preventDefault();

//         var first_name = $('.first_name').val();
//         var last_name = $('.last_name').val();
//         var email = $('.email').val();
//         var phone = $('.phone').val();
//         var address1 = $('.address1').val();
//         var address2 = $('.address2').val();
//         var city = $('.city').val();
//         var state = $('.state').val();
//         var country = $('.country').val();
//         var pin_code = $('.pin_code').val();

//         if (!first_name) {
//             first_name_error = "First Name is required";
//             $('#first_name_error').html('');
//             $('#first_name_error').html(first_name_error);
//         }
//         else {
//             first_name_error = "";
//             $('#first_name_error').html('');
//         }

//         if (!last_name) {
//             last_name_error = "Last is required";
//             $('#last_name_error').html('');
//             $('#last_name_error').html(last_name_error);
//         }
//         else {
//             last_name_error = "";
//             $('#last_name_error').html('');
//         }

//         if (!email) {
//             email_error = "Email is required";
//             $('#email_error').html('');
//             $('#email_error').html(email_error);
//         }
//         else {
//             email_error = "";
//             $('#email_error').html('');
//         }

//         if (!phone) {
//             phone_error = "Phone number is required";
//             $('#phone_error').html('');
//             $('#phone_error').html(phone_error);
//         }
//         else {
//             phone_error = "";
//             $('#phone_error').html('');
//         }

//         if (!address1) {
//             address1_error = "Address 1 is required";
//             $('#address1_error').html('');
//             $('#address1_error').html(address1_error);
//         }
//         else {
//             address1_error = "";
//             $('#address1_error').html('');
//         }

//         if (!address2) {
//             address2_error = "Address 2 is required";
//             $('#address2_error').html('');
//             $('#address2_error').html(address2_error);
//         }
//         else {
//             address2_error = "";
//             $('#address2_error').html('');
//         }

//         if (!city) {
//             city_error = "City is required";
//             $('#city_error').html('');
//             $('#city_error').html(city_error);
//         }
//         else {
//             city_error = "";
//             $('#city_error').html('');
//         }

//         if (!state) {
//             state_error = "State is required";
//             $('#state_error').html('');
//             $('#state_error').html(state_error);
//         }
//         else {
//             state_error = "";
//             $('#state_error').html('');
//         }

//         if (!country) {
//             country_error = "Country is required";
//             $('#country_error').html('');
//             $('#country_error').html(country_error);
//         }
//         else {
//             country_error = "";
//             $('#country_error').html('');
//         }

//         if (!pin_code) {
//             pin_code_error = "Pin Code is required";
//             $('#pin_code_error').html('');
//             $('#pin_code_error').html(pin_code_error);
//         }
//         else {
//             pin_code_error = "";
//             $('#pin_code_error').html('');
//         }

//         if (first_name_error != '' || last_name_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pin_code_error != '') 
//         {
//             return false;
//         }
//         else 
//         {
//             var data = {
//                 'first_name':first_name,
//                 'last_name':last_name,
//                 'email':email,
//                 'phone':phone,
//                 'address1':address1,
//                 'address2':address2,
//                 'city':city,
//                 'state':state,
//                 'country':country,
//                 'pin_code':pin_code,
//             }

//             $.ajax({
//                 method: "POST",
//                 url: "/proceed_to_pay",
//                 data: data,                
//                 success: function (response) {
//                     alert(response.city)
//                 }
//             });
//         }
//     })
// });