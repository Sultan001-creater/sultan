$(document).ready(function () {
    alertify.set('notifier', 'position', 'bottom-right');
    // alertify.success('Quantity Updated');
    $(document).on('click', '.increment', function () {

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue)) {
            var qtyVal = currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal)
        }
    });
    $(document).on('click', '.decrement', function () {

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue) && currentValue > 1) {
            var qtyVal = currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal)
        }
    });

    function quantityIncDec(prodId, qty) {
        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'productIncDec': true,
                'product_id': prodId,
                'quantity': qty,
            },
            success: function (response) {

                var res = JSON.parse(response);

                if (res.status == 200) {

                    $('#productArea').load(' #productContent');
                    alertify.success(res.message);
                } else {
                    $('#productArea').load(' #productContent');
                    alertify.error(res.message);
                }
            }

        });


    }
    //Proceed to place Order button click
    $(document).on('click', '.proceedToPlace', function () {

        //console.log('proceedToPlace');
        var cphone = $('#cphone').val();
        var payment_mode = $('#payment_mode').val();
        var sales_rep = $('#sales_rep').val();


        if (payment_mode == '') {

            swal("Select Payment Mode", "Please selected your preferred payment mode", "warning");
            return false;
        }



        if (cphone == '' && !$.isNumeric(cphone)) {
            swal("Enter Phone Number", "Please Enter a valid customer's Phone Number", "warning");
            return false;
        }
        if (sales_rep == '') {
            swal("Enter Sales Rep Please ", "Please Select a valid Sales Representative please", "warning");
            return false;
        }
        var data = {
            'proceedToPlaceBtn': true,
            'cphone': cphone,
            'payment_mode': payment_mode,
            'sales_rep': sales_rep,


        };
        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: data,
            success: function (response) {

                var res = JSON.parse(response);
                if (res.status == 200) {
                    window.location.href = "order-summary.php";

                } else if (res.status == 404) {

                    swal(res.message, res.message, res.status_type, {
                        buttons: {
                            catch: {
                                text: "Add Customer",
                                value: "catch"
                            },
                            cancel: "Cancel"
                        }

                    })
                        .then((value) => {
                            switch (value) {

                                case "catch":
                                    $('#c_phone').val(cphone);
                                    $('#addCustomerModal').modal('show');
                                    // console.log('Pop the Customer add modal');
                                    break;
                                default:

                            }
                        });
                } else {
                    swal(res.message, res.message, res.status_type);
                }
            }


        });


    });
    //Add Customer to customers table
    $(document).on('click', '.saveCustomer', function () {
        var c_name = $('#c_name').val();
        var c_phone = $('#c_phone').val();
        var c_email = $('#c_email').val();
        var c_pin = $('#c_pin').val();
        var c_company = $('#c_company').val();

        if (c_name != '' && c_phone != '') {
            if ($.isNumeric(c_phone)) {

                var data = {
                    'saveCustomerBtn': true,
                    'name': c_name,
                    'phone': c_phone,
                    'email': c_email,
                    'pin': c_pin,
                    'company': c_company,

                };
                $.ajax({
                    type: "POST",
                    url: "orders-code.php",
                    data: data,
                    success: function (response) {
                        var res = JSON.parse(response);

                        if (res.status == 200) {
                            swal(res.message, res.message, res.status_type);
                            $('#addCustomerModal').modal('hide');
                        } else if (res.status == 422) {
                            swal(res.message, res.message, res.status_type);
                        } else {
                            swal(res.message, res.message, res.status_type);
                        }

                    }
                });

            } else {
                swal("Enter valid phone Number", "", "warning");
            }
        }
        else {
            swal("Please Fill required fields", "", "warning");
        }
    });
    $(document).on('click', '#saveOrder', function () {
        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'saveOrder': true
            },
            success: function (response) {
                var res = JSON.parse(response);

                if (res.status == 200) {
                    swal(res.message, res.message, res.status_type);
                    $('#orderPlaceSuccessMessage').text(res.message);
                    $('#orderSuccessModal').modal('show');

                } else {
                    swal(res.message, res.message, res.status_type);
                }
            }
        });
    });


});
function printMyBillingArea() {

    var divContents = document.getElementById("myBillingArea").innerHTML;
    var a = window.open('', '', 'heigt=600,width=800');
    a.document.write('<html><title>RUSH-Track Retail Management System(R.M.S)</title>');
    a.document.write('<body style="font-family: fangsong;">');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}

window.jsPDF = window.jspdf.jsPDF;
var docPDF = new jsPDF();

function downloadPDF(invoiceNo) {

    var elementHTML = document.querySelector("#myBillingArea");
    docPDF.html(elementHTML, {
        callback: function () {
            docPDF.save(invoiceNo + '.pdf');
        },
        x: -0,
        y: -0,
        width: 208,
        windowWidth: 800,
    });

}

