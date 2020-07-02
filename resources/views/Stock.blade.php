<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <div class="card-footer">
                          <a class="btn btn-primary" href="/verifikasi">Kembali</a>
                  </div>
        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    </head>
    <body>
         <div class="container">
          <br />
          <form action="{{url('stock/add')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
               <label for="stockName">Nama Homestay:</label>
               <input type="text" class="form-control" id="stockName" name="stockName">
             </div>
             <div class="form-group">
               <label for="stockPrice">Harga Homestay:</label>
               <input type="text" class="form-control" id="stockPrice" name="stockPrice">
             </div>
             <div class="form-group">
               <label for="stockPrice">Waktu Order (Bulan) :</label>
               <select class="selectPicker" name="stockYear">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
              </select>
            </div>
             <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
    </body>
</html>