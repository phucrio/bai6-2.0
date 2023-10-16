@extends('layouts.base')
@section('main')
<div class="row"> <div class="col-sm-12">
    <h1 class="display-3"> Contacts</h1>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Thêm liên hệ mới</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Họ và tên</td>
                <td>Email </td>
                <td>Địa chỉ</td>
                <td>SDT</td>
                <td colspan = 2></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->diachi }}</td>
                <td>{{ $contact->sdt }}</td>
                <td><a href="{{ route('contacts.edit',$contact->id) }}"  class="btn btn-primary">Edit</a></td>
                <td><form action="{{ route('contacts.destroy',$contact->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div></div>
    @endsection
