@extends('server.master')
@section('content')
<section id="main-content">
          <section class="wrapper">
              <div class="row">
                 <div class="col-lg-12">
      <section class="panel">
          <header class="panel-heading">
              Lấy dữ liệu
          </header>
          <div class="panel-body">
              <form action="{{ route('admin.post.crawl') }}" method="POST">
              	{{ csrf_field() }}
                  <div class="form-group">
                      <label for="exampleInputEmail1">URL</label>
                      <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="Nhập URL...">
                  </div>
                  <button type="submit" class="btn btn-info">Lưu thông tin</button>
              </form>

          </div>
      </section>
  </div>
              </div>          
          </section>
      </section>
  
@endsection
