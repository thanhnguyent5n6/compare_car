@extends('server.master')
@section('content')

<section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Thêm hãng xe
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <form>
								  <div class="form-group">
								    <label for="exampleInputEmail1">Tên hãng</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập hãng xe">
								    <small id="emailHelp" class="form-text text-muted"></small>
								  </div>
								  <button type="submit" class="btn btn-primary">Submit</button>
								</form>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>          
          </section>
      </section>

@endsection