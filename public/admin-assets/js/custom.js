// Danger
/*$(".control-danger").uniform({
 radioClass: 'choice',
 wrapperClass: 'border-danger-600 text-danger-800'
 });*/

//check all
$('#checkAll').checkAll();

$( ".required_label" ).append( "<span>*</span>" );


$.each($(".btnStatus"), function (i, v) {

    $(v).on("click", function (e) {

        e.preventDefault();

        var Status = $(this).data('status');
        var Id = $(this).data('id');
        var Url = $(this).data('url');

        $.ajax({
            type: "GET",
            url: Url,
            data: {status: Status, id: Id},
            success: function (dt) {

                if (dt) {
                    $(v).html(dt.tgle);
                }

            },
            error: function (err) {

                swal('Error', "Oops something went wrong! " + err);

            }

        });// Ajax

    });// Status
});

// Date range picker
// ------------------------------

// Basic initialization
$('.daterange-basic').daterangepicker({
    locale: {
        format: 'YYYY/MM/DD'
    }
});

$('.daterange-single').daterangepicker({
    // autoUpdateInput: false,
    locale: {
        format: 'YYYY-MM-DD'
    },
    separator: "|",
    singleDatePicker: true
});


function confirmAndSubmit(Url) {

    swal({

        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

    }).then(function (result) {
        if (result.value) {
            window.location = Url;
        }

    });

}

function confirmAndSubmitForm() {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            $("#formDelete").submit();
        }

    });
}

function confirmAndSubmitFormOnComment(formId) {

    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false

    }).then(function (result) {
        if (result.value) {
            $("#" + formId).submit();
        }

    });
}

/*
 |----------------------------------------------------------------------
 | Confirm to remove image from file browser
 |----------------------------------------------------------------------
 |
 */

function confirmFirst(field_id) {

    swal({

        title: "Are you sure?",
        text: "You will not be able to recover this imaginary data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

    }, function (isConfirm) {

        if (isConfirm) {

            if (field_id) {
                clearImg(field_id);
            }
            swal({
                title: "Successfully deleted",
                animation: "slide-from-top",
                type: "success",
                timer: 1200,
                showConfirmButton: false
            });

        } else {

            swal({
                animation: "slide-from-top",
                title: "Data deletion cancelled",
                type: 'warning',
                timer: 1200,
                showConfirmButton: false

            });
        }
    });
}

/*
 |----------------------------------------------------------------------
 | Filemanager popup box
 |----------------------------------------------------------------------
 |
 */

$('.standAloneFacnyBox').fancybox({
    'width': 900,
    'height': 600,
    'type': 'iframe',
    'autoScale': true,
    'padding': 0,
    'openEffect': 'elastic',//fade
    'closeEffect': 'elastic',
    'openSpeed': 'fast',
    'closeSpeed': 'fast'//slow
});

function responsive_filemanager_callback(field_id) {

    var image = $('#' + field_id).val();
    $('#' + field_id).attr('src', image);
    $('#h' + field_id).val(image);
}

function clearImg(field_id) {

    var noImg = '/admin/images/no_img.png';
    $('#' + field_id).attr('src', noImg);
    $('#h' + field_id).val('');
}

/*
 |----------------------------------------------------------------------
 | Product Brochure
 |----------------------------------------------------------------------
 |
 */

$('.standAloneFacnyBoxBrochure').fancybox({
    'width': 900,
    'height': 600,
    'type': 'iframe',
    'autoScale': true,
    'padding': 0,
    'openEffect': 'elastic',//fade
    'closeEffect': 'elastic',
    'openSpeed': 'fast',
    'closeSpeed': 'fast'//slow
});

// Warning
/*$(".control-warning").uniform({
 radioClass: 'choice',
 wrapperClass: 'border-warning-600 text-warning-800'
 });*/

/*$('.select2').select2();*/

//Bootstrap FileStyle
/*$(":file").filestyle({
 text: "Choose Files",
 btnClass: "btn-warning",
 buttonBefore: true,
 placeholder: "No file"
 });*/

/*$('.datepicker').datepicker({
 format: "yyyy-mm-dd"
 });*/


/*nepali date picker*/

$('.nepali-picker').nepaliDatePicker();

$("#clear-bth").on("click", function(event) {
    $(".nepali-picker").val('');
});