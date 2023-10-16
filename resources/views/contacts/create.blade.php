@extends('layouts.base')
@section('main')
<div class="row"> <div class="col-sm-8 offset-sm-2">
    <form method="post" action="{{  route('contacts.store') }}">
        @csrf
        <div class="form-group">
            <label for="first_name"> Họ, đệm:</label>
            <input type="text" class="form-control" name="first_name"/>
        </div>

        <div class="form-group">
            <label for="last_name"> Tên:</label>
            <input type="text" class="form-control" name="last_name"/>
        </div>

        <div class="form-group">
            <label for="email"> Email:</label>
            <input type="text" class="form-control" name="email"/>
        </div>

        <div class="form-group">
            <label for="diachi"> Địa chỉ:</label>
            <input type="text" class="form-control" name="diachi"/>
        </div>

        <div class="form-group">
            <label for="sdt"> SDT:</label>
            <input type="text" class="form-control" name="sdt"/>
        </div>
        <button type="submit" class="btn btn-primary"> Add contact</button>
    </form>

</div>

</div>

@endsection
