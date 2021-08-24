<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--title-->
    <title>PSB SMA Nusantara Plus</title>
    <!--favicon icon-->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="16x16">
    <!--Bootstrap css-->
<link rel="stylesheet" href="{{ asset('test/tempusdominus-bootstrap-4.min.css') }}">
</head>
<body>

    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                  <label>Date:</label>
                    <input type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"/>
                </div>
                <!-- Date and time -->
                <div class="form-group">
                  <label>Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.form group -->
                <!-- Date range -->
                
              </div>
              <!-- /.card-body -->
            </div>
    <!--jQuery-->
    <script src="{{ asset('test/jquery.min.js') }}"></script>
    <script src="{{ asset('test/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('test/moment.min.js') }}"></script>
    <script src="{{ asset('test/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
  $(function () {

    //Date picker
    $('#datetimepicker5').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  })
</script>
</body>
</html>