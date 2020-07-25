</div>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2020</span>
      </div>
    </div>
  </footer>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
  </div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="assets/admin/js/ajax.js" type="text/javascript" rel="javascript"></script>
<script src="assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
  
  $('.delete').click(function () {
        let id = $(this).data('id');
        $('.del').click(function () {
            $("#edit").modal("hide");
            location.reload();
            $.ajax({
                url: 'admin/category/' + id,
                dataType: 'json',
                type: 'delete',
                success: function (result) {
                    console.log("hello");
                    toastr.success(result.success, 'Ringring', {
                        timeOut: 5000
                    });
                    $("#edit").modal("hide");
                    location.reload();
                }
            });
        })
    });
  $(".edit").click(function () {
            console.log("hello");
            $(".error").hide();
            let id = $(this).data("id");
            $.ajax({
                url: 'admin/category/' + id + '/edit',
                dataType: 'json',
                type: 'get',
                success: function ($result) {
                    console.log($result);
                    $(".name").val($result.name)

                    if ($result.status == 1) {
                        $(".ht").attr("selected", "selected")
                    } else {
                        $(".kht").attr("selected", "selected")
                    }
                }
            });
            $(".update").click(function () {
                let name = $(".name").val();
                let status = $(".status").val();
                $.ajax({
                    url: 'admin/category/' + id,
                    data: {
                        name: name,
                        status: status,
                    },
                    type: 'put',
                    dataType: 'json',
                    success: function ($result) {
                        if ($result.errors == 'true') {
                            $(".error").show();
                            $(".error").html($result.message.name[0]);
                        } else {
                            toastr.success($result.success, 'Ringring', {
                                timeOut: 5000
                            });
                            $("#edit").modal("hide");
                            location.reload();
                        }
                    }
                })
            })

        });
    // });
    $(".editProducttype").click(function () {
        console.log("hello");
        let id = $(this).data("id");
        $.ajax({
            url: 'admin/producttype/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function ($result) {
                $(".name").val($result.producttype.name);
                var html = "";
                $.each($result.category, function ($key, $value) {
                    if ($value['id'] = $result.producttype.idCategory) {
                        html += '<option value=' + $value['id'] + '>';
                        html += $value['name'];
                        html += '</option>';
                    } else {
                        html += '<option value=' + $value['id'] + '>';
                        html += $value['name'];
                        html += '</option>';
                    }
                });
                $('.idCategory').html(html);
                console.log($('.idCategory').val())
                if ($result.producttype.status == 1) {
                    $(".ht").attr("selected", "selected")
                } else {
                    $(".kht").attr("selected", "selected")
                }
            }
        })
        $('.deleteProducttype').click(function () {
        let id = $(this).data('id');
        $('.deletePro').click(function () {
            $("#delete").modal("hide");
            location.reload();
            $.ajax({
                url: 'admin/producttype/' + id,
                dataType: 'json',
                type: 'delete',
                success: function (result) {
                    console.log("hello");
                    toastr.success(result.success, 'Ringring', {
                        timeOut: 5000
                    });
                    $("#delete").modal("hide");
                    location.reload();
                }
            });
        });
    });
        $(".updateProductType").click(function () {
            $(".error").hide();
            let idCategory = $('.idCategory').val();
            let name = $(".name").val();
            let status = $(".status").val();
            $.ajax({
                url: 'admin/producttype/' + id,
                dataType: 'json',
                data: {
                    idCategory: idCategory,
                    name: name,
                    status: status,
                },
                type: 'put',
                success: function ($data) {
                    if ($data.errors == 'true') {
                        $(".error").show();
                        $(".error").html($data.message.name[0]);
                    } else {
                        toastr.success($data.success, 'Ringring', {
                            timeOut: 5000
                        });
                        $("#edit").modal("hide");
                        location.reload();
                    }
                }
            })
        })
        
    })
});
</script>
<!-- Custom scripts for all pages-->
<script src="assets/admin/js/sb-admin-2.min.js"></script>
<script src="assets/admin/js/toastr.min.js" type="text/javascript"></script>
@if (session('inform'))
    <script type="text/javascript">
     toastr.success('{{session('inform') }}', 'Ringring', {timeOut: 5000});
    </script>
@endif
