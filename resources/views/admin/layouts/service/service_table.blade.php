@extends('admin.master')
@section('contents')
<!-- Added, Edit, Delete Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->
<div class="table_button">
    <a href="{{ route('admin.add.service') }}" class="btn btn-primary">Add Service</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover"id="service_table">
        <thead class="table-primary">
            <tr class="text-center">
                <th>SL</th>
                <th>Name</th>
                {{-- <th>Slug</th> --}}
                <th>Regular Price</th>
                <th>Image</th>
                <th>Offer Price</th>
                <th>Service Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $key=>$service)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $service->service_name }}</td>
                {{-- <td>{{ $service->slug}}</td> --}}
                <td>{{ $service->price }}</td>
                <td> <img src="{{ asset('/uploads/services/'.$service->image ) }}" style="width:80px;height:80px;" alt=""> </td>
                <td>{{ $service->offer }} %</td>
                <td><textarea name="" id="" cols="0" rows="0">{{ $service->desc }}</textarea></td>

                <td>
                    <a href="{{ route('admin.view.service',$service->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.edit.service',$service->id) }}" class="btn btn-primary mt-1"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.service',$service->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#service_table').DataTable();
    });
</script>
