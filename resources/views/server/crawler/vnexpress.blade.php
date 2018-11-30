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
                  <div class="form-group">
                      <label>Hãng</label>
                      <select name="sel_category_car">
                        @foreach($category as $rows)
                        <option value="{{ $rows->category_cars_name }}">{{$rows->category_cars_name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div>
                    @if(session()->has('errors'))
                    <p type="text-danger">{{ session()->get('errors') }}</p>
                    @endif
                    @if(session()->has('success'))
                    <p type="text-success">{{ session()->get('success') }}</p>
                    @endif
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
