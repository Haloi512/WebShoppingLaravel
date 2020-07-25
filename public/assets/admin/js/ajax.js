// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
// $(document).ready(function () {
//     $('.deleteProducttype').click(function () {
//         let id = $(this).data('id');
//         $('.deletePro').click(function () {
//             $("#delete").modal("hide");
//             location.reload();
//             $.ajax({
//                 url: 'admin/producttype/' + id,
//                 dataType: 'json',
//                 type: 'delete',
//                 success: function (result) {
//                     console.log("hello");
//                     toastr.success(result.success, 'Ringring', {
//                         timeOut: 5000
//                     });
//                     $("#delete").modal("hide");
//                     location.reload();
//                 }
//             });
//         });
//     });
// });